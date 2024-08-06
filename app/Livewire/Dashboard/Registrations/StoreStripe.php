<?php

namespace App\Livewire\Dashboard\Registrations;

use Carbon\Carbon;
use Stripe\Stripe;
use App\Models\User;
use Segment\Segment;
use Stripe\Customer;
use App\Models\Payment;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Registration;
use App\Jobs\SendPaymentReminder;
use App\Models\RegistrationTrial;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Jobs\ConfirmAuthorizedPayment;


class StoreStripe extends Component
{
    public User $user;
    public $course;
    public $plan;
    public $outstandingBalance;
    public $monthlyPrice;
    public $clientSecret;
    public $setupIntentId;
    public $currencyCode;

    #[On('handle-registration')]
    public function register($setupIntent)
    {
        // If they have already registered, redirect them back with an error message //
        // if (Registration::hasAlreadyRegistered($this->user->id, $this->course->id)) {
        //     session()->flash('error', 'You have already registered for this course.');
        //     return redirect()->back()->with('error', 'You have already registered for this course.');
        // }

        // If the setup intent was successful, save the payment method info to the user //
        if($setupIntent['status'] == 'succeeded') {
            // Add call to User model to update payment methods //
            $paymentMethodId = User::updatePaymentMethod($this->user->id, $setupIntent);
            // Update the user model after updating the payment method //
            $this->user = User::find($this->user->id);
            
            if($paymentMethodId) {
                // Attempt to pre-authorize the payment method for the amount due, returns response object //
                // Check for a discounted price on the plan first then set the price //
                if ($this->plan->discounted_total_price > 0) {
                    $price = $this->plan->discounted_total_price;
                } else {
                    $price = $this->plan->total_price;
                }
                $paymentIntent = Payment::authorizeFuturePayment($this->user->id, $price, $this->currencyCode);

                // If the payment authorization attempt was successful, create the registration and trial, then below //
                // create the job to confirm the payment in 6 days and 23 hours including the registration_id in metadata //
                // 'requires_capture' means success, as this means we will catpure it in the future //
                if ($paymentIntent->status == 'requires_capture')
                {
                    // Create the array of data, create registration from data, create payment from registration //
                    $registration = $this->createRegistrationAndTrial();
                    $this->createPayment($registration->id, $paymentIntent);
                    // If there are any bonuses courses, register those automatically for free //
                    $this->registerForBonusCourses($registration);
                    // Send to tracking tools //
                    $this->sendToTrackingTools($registration, $registration->trial);
                    $this->sendMails($registration, $this->user);
                    session()->flash('success', 'Registration successful!');
                    return redirect()->route('stripe.thank-you');
                } elseif ($paymentIntent->status == 'requires_action')
                {
                    $this->dispatch('requiresAction', $paymentIntent->client_secret);
                } else {
                    return redirect()->back()->with('error', 'Payment setup failed: ' . $paymentIntent->error . ' Please try again.');
                }
            } else {
                return redirect()->back()->with('error', 'Payment setup failed. Please try again.');
            }
        }
        else {
            session()->flash('error', 'Payment authorization failed. Please try again.');
        }
    }

    public function createRegistrationAndTrial() {
        if($this->plan->discounted_total_price > 0) {
            $this->outstandingBalance = $this->plan->discounted_total_price;
            $this->monthlyPrice = $this->plan->discounted_monthly_price;
        } else {
            $this->outstandingBalance = $this->plan->total_price;
            $this->monthlyPrice = $this->plan->monthly_price;
        }
        $registration = $this->createRegistration();
        $trial = $this->createTrial($registration);
        $this->dispatchConfirmationJob($registration->id);
        return $registration;
    }

    public function createRegistration() {
        $data = [
            'course_id' => $this->course->id,
            'course_name' => $this->course->name,
            'subcategory_id' => $this->course->subcategory_id,
            'status' => 'Active',
            'experience' => $this->plan->experience,
            'type' => $this->course->type,
            'user_id' => $this->user->id,
            'user_name' => $this->user->first_name . ' ' . $this->user->last_name,
            'total_hours' => $this->course->total_hours,
            'weekly_lessons' => $this->plan->weekly_lessons,
            'outstanding_balance' => $this->outstandingBalance,
            'plan_name' => $this->plan->name,
            'plan_id' => $this->plan->id,
            'plan_times' => $this->plan->times,
            'plan_interval' => $this->plan->interval,
            'plan_monthly_price' => $this->monthlyPrice,
            'total_paid' => 0.00,
        ];
        $registration = Registration::create($data);
        return $registration;
    }

    public function createTrial($registration) {
        $startDate = Carbon::now();
        $endDate = $startDate->copy()->addWeek();
        $trial = RegistrationTrial::create([
            'user_id' => $this->user->id,
            'registration_id' => $registration->id,
            'stripe_pm_id' => $this->user->pm_id,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'status' => 'Active',
        ]);
        return $trial;
    }

    public function dispatchConfirmationJob($registrationId) {
        ConfirmAuthorizedPayment::dispatch($registrationId)
            ->delay(now()->addSeconds(604800)); // 604800 seconds = 6 days and 23 hours
    }

    public function createPayment($registrationId, $paymentIntent) {
        $payment = Payment::create([
            'user_id' => $this->user->id,
            'registration_id' => $registrationId,
            'amount' => $paymentIntent->amount / 100,
            'stripe_payment_id' => $paymentIntent->id,
            'payment_type' => 'balance',
            'status' => $paymentIntent->status,
        ]);

        return $payment;
    }

    public function registerForBonusCourses() {
        $bonusCourses = $this->course->bonusCourses;
        if ($bonusCourses->count() > 0)
        {
            foreach ($bonusCourses as $bonusCourse)
            {
                Registration::registerForBonusCourse($this->user->id, $bonusCourse->id);
            }
        }
    }

    public function registerFreeCourse()
    {
        $registered = Registration::where('course_id', $this->course->id)
            ->where('user_id', $this->user->id)
            ->count();

        if($registered > 0) {
            return redirect()->back()->with('error', 'You have already registered for this course.');
        }

        $data = [
            'course_id' => $this->course->id,
            'course_name' => $this->course->name,
            'subcategory_id' => $this->course->subcategory_id,
            'status' => 'Active',
            'experience' => $this->plan->experience,
            'type' => $this->course->type,
            'user_id' => $this->user->id,
            'user_name' => $this->user->first_name . ' ' . $this->user->last_name,
            'total_hours' => $this->course->total_hours,
            'weekly_lessons' => $this->plan->weekly_lessons,
            'outstanding_balance' => 0.00,
            'plan_name' => $this->plan->name,
            'plan_id' => $this->plan->id,
            'plan_times' => $this->plan->times,
            'plan_interval' => $this->plan->interval,
            'plan_monthly_price' => $this->plan->monthly_price,
            'total_paid' => 0.00,
        ];

        $registration = Registration::create($data);

        if($this->course->bonusCourses->count() > 0) {
            foreach($this->course->bonusCourses as $bonusCourse) {
                Registration::registerForBonusCourse($this->user->id, $bonusCourse->id);
            }
        }

        Segment::track([
            "userId" => $this->user->id,
            "event" => "Course registration",
            "properties" => [
                "course" => $this->course->name,
                "registrationId" => $registration->id,
                "location" => "Store Stripe",
            ],
        ]);

        $this->sendMails($registration, $this->user);
        session()->flash('success', 'Registration successful!');
        return redirect()->route('dashboard.courses', ['locale' => App::getLocale()]);

    }

    public function sendToTrackingTools($registration, $trial) {
        Segment::track([
            "userId" => $this->user->id,
            "event" => "Course registration",
            "properties" => [
                "course" => $this->course->name,
                "registrationId" => $registration->id,
                "trialId" => $trial->id,
                "location" => "Store Stripe",
            ],
        ]);
    }

    public function sendMails($registration, $user)
    {
        Registration::sendMails($registration, $user);

//        SendPaymentReminder::dispatch($user, $registration)
//            ->delay(now()->addSeconds(86400));
    }

    public function mount() {
        // $locale = session('locale', 'en');
        // $price = $this->plan->total_price;
        // dd($price);
        Stripe::setApiKey(config('services.stripe.secret'));
        $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));
        $this->setupIntentId = request()->query('setup_intent');
        $locale = App::getLocale();
        $this->currencyCode = __('currency.code', [], $locale);

        if (!$this->user) {
            // Redirect to login page and return an error message            
            session()->put('url.intended', url()->current());
            return redirect()->route('login')->with('error', 'You must be logged in to register for a course.');
        }

        if($this->setupIntentId) {
            $setupIntent = $stripe->setupIntents->retrieve($this->setupIntentId);
            if ($setupIntent->status == 'succeeded') {
                $this->register($setupIntent);
            }
            elseif ($setupIntent->status == 'requires_payment_method') {
                session()->flash('error', 'We\'re sorry, but there was an error setting up your payment method. Please try a different payment method.');
            }
            elseif ($setupIntent->status == 'requires_confirmation') {
                session()->flash('error', 'Your payment method requires confirmation. Please confirm to proceed.');
            }
            elseif ($setupIntent->status == 'requires_action') {
                session()->flash('info', 'Additional action required! Please follow the instructions to complete the setup.');
            }
            elseif ($setupIntent->status == 'processing') {
                session()->flash('info', 'Your payment is still processing. We will email you when your payment status updates.');
            }
            elseif ($setupIntent->status == 'canceled') {
                session()->flash('error', 'The payment setup was canceled.');
            }
            else {
                session()->flash('error', 'An unexpected error occurred. Please try again.');
            }
        } else {
            if($this->user) {
                // Get the Stripe customer object if it exists or create a new one //
                if(!$this->user->stripe_id) {
                    $customer = $stripe->customers->create();
                    $this->user->update(['stripe_id' => $customer->id]);
                }

                $intent = $stripe->setupIntents->create([
                    'customer' => $this->user->stripe_id,                    
                    'automatic_payment_methods' => [
                        'enabled' => true,
                    ],
                ]);

                $this->clientSecret = $intent->client_secret;
            }
        }        
    }

    public function render()
    {
        return view('livewire.dashboard.registrations.store-stripe',
            [ 'clientSecret' => $this->clientSecret ?? '']);
    }
}
