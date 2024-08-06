<?php

namespace App\Livewire\Upgrades;

use Carbon\Carbon;
use Stripe\Stripe;
use Segment\Segment;
use Stripe\Customer;
use Livewire\Component;
use App\Models\Registration;
use App\Models\RegistrationTrial;
use Illuminate\Support\Facades\Log;

class Create extends Component
{
    public $user;
    public $course;
    public $plan;
    public $clientSecret;

    protected $listeners = ['handleRegistration' => 'register'];

    public function register($setupIntent)
    {
        $registered = Registration::where('course_id', $this->course->id)
            ->where('user_id', $this->user->id)
            ->count();

        if($registered > 0) {
            return redirect()->back()->with('error', 'You have already registered for this course.');
        }

        if($setupIntent['status'] == 'succeeded') {

            $paymentMethodType = $setupIntent['payment_method_types'][0]; // Access the first payment method type
            $this->user->pm_type = $paymentMethodType;
            $this->user->save();

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
                'outstanding_balance' => $this->plan->total_price,
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

            Stripe::setApiKey(env('STRIPE_SECRET'));
            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

            $paymentMethods = $stripe->paymentMethods->all([
                'customer'=> $this->user->stripe_id,
                'type'=> $this->user->pm_type,
            ]);

            $paymentMethodId = $paymentMethods['data'][0]['id'];

            $this->user->update([
                'pm_id' => $paymentMethodId,
                'pm_last_four' => $paymentMethods['data'][0]['last4'] ?? null,
            ]);

            Segment::track([
                "userId" => $this->user->id,
                "event" => "Product subscribed",
                "properties" => [
                    "product" => 'IELTS AI essay grader',
                ],
            ]);

            session()->flash('success', 'Upgrade successful!');
            return redirect()->route('stripe.thank-you');
        } else {
            session()->flash('error', 'Payment setup failed. Please try again.');
        }
    }

    public function mount() {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

//        if($this->user->stripe_id) {
//            $customer = Customer::retrieve($this->user->stripe_id);
//        } else{
//            $customer = Customer::create();
//            $this->user->update([
//                'stripe_id' => $customer->id,
//            ]);
//        }
//
//        $intent = $stripe->setupIntents->create([
//            'customer' => $this->user->stripe_id,
//        ]);

//        $this->clientSecret = $intent->client_secret;

    }



    public function render()
    {
        return view('livewire.upgrades.create',
            [ 'clientSecret' => $this->clientSecret]);
    }
}
