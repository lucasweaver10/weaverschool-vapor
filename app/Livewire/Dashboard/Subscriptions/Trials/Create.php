<?php

namespace App\Livewire\Dashboard\Subscriptions\Trials;

use Stripe\Stripe;
use App\Models\User;
use App\Models\Event;
use App\Models\Payment;
use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\ProductPrice;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use App\Jobs\CaptureAuthorizedPayment;

class Create extends Component
{
    public $user;    
    public $clientSecret;      
    public $setupIntentId;
    public $currencyCode;    
    public $type;
    public $productId;
    public $product;
    public $productPrice;
    public $stripeSubscriptionId;
    public $loading = false;

    #[On('subscription-initiated')]
    public function createSubscription($setupIntent)
    {
        $this->loading = true;
        $this->user = User::find($this->user->id);
        Stripe::setApiKey(config('services.stripe.secret'));

        $subscription = $this->user->newSubscription($this->type, $this->productPrice->stripe_price_id)->allowPromotionCodes()
        ->trialDays(7)
        ->withMetadata(['fbclid' => $this->fbClickId ?? ''])
            ->create($this->user->pm_id, [
                'payment_behavior' => 'default_incomplete',
                'payment_settings' => ['save_default_payment_method' => 'on_subscription'],
            ]);        

        $stripeSubscription = \Stripe\Subscription::retrieve([
            'id' => $subscription->stripe_id,
            'expand' => ['pending_setup_intent'],
        ]);

        // $clientSecret = $stripeSubscription->pending_setup_intent->client_secret;
        $this->stripeSubscriptionId = $subscription->stripe_id;                    
        // $this->dispatch('subscription-created', clientSecret: $clientSecret);

        $this->authorizePayment($setupIntent);
    }

    #[On('setup-intent-creation-succeeded')]
    public function authorizePayment($setupIntent)
    {        
        if ($setupIntent['status'] == 'succeeded') {
            // Add call to User model to update payment methods //
            $paymentMethodId = User::updatePaymentMethod($this->user->id, $setupIntent);

            // Update the user model after updating the payment method //
            $this->user = User::find($this->user->id);
            if ($paymentMethodId) {
                $amount = $this->productPrice->amount * 100;
                $paymentIntent = Payment::authorizeFuturePayment($this->user->id, $amount, $this->currencyCode, $this->stripeSubscriptionId);
                // If the payment authorization attempt was successful //
                // create the job to confirm the payment in 6 days and 23 hours including the registration_id in metadata //
                // 'requires_capture' means success, as this means we will catpure it in the future //
                if ($paymentIntent->status == 'requires_capture') {                    
                    // Schedule a job to capture the payment and create an invoice credit in 6 days and 23 hours                    
                    CaptureAuthorizedPayment::dispatch($paymentIntent, $this->user->stripe_id, $this->stripeSubscriptionId, $amount)->delay(now()->addSeconds(604800));
                        
                    return redirect()->to(route('payments.thank-you.generic', ['locale' => session('locale')]));

                }
            } 
        } else {
            Event::create([
                'user_id' => auth()->user()->id ?? null,
                'anonymous_id' => session('uniqueID') ?? null,
                'name' => 'Subscription attempt failed',
                'properties' => json_encode([
                    'url' => request()->fullUrl(),
                    'product_id' => $this->productId,
                ]),
            ]);

            $this->loading = false;
            return back()->with('error', 'Something went wrong, please refresh the page and try again.');
        } 
    
    } 
    
    #[On('setup-intent-returned-pending')]
    public function hanldePendingSetupIntent()
    {
        $this->loading = false;
    }
    
    public function mount()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));        
        $this->user = auth()->user();        
        $this->product = Product::findOrFail($this->productPrice->product_id);
        $this->setupIntentId = request()->query('setup_intent');
        $locale = App::getLocale();
        $this->currencyCode = __('currency.code', [], $locale);

        if ($this->setupIntentId) {
            $setupIntent = $stripe->setupIntents->retrieve($this->setupIntentId);
            if ($setupIntent->status == 'succeeded') {
                $this->authorizePayment($setupIntent);
            } elseif ($setupIntent->status == 'requires_payment_method') {
                session()->flash('error', 'We\'re sorry, but there was an error setting up your payment method. Please try a different payment method.');
                Event::create([
                    'user_id' => $this->user->id,                    
                    'name' => 'Trial setup failed',
                    'properties' => json_encode([
                        'reason' => 'Requires payment method',                        
                    ]),
                ]);
            } elseif ($setupIntent->status == 'requires_confirmation') {
                session()->flash('error', 'Your payment method requires confirmation. Please confirm to proceed.');
                Event::create([
                    'user_id' => $this->user->id,
                    'name' => 'Trial setup failed',
                    'properties' => json_encode([
                        'reason' => 'Requires confirmation',
                    ]),
                ]);
            } elseif ($setupIntent->status == 'requires_action') {
                session()->flash('info', 'Additional action required! Please follow the instructions to complete the setup.');
            } elseif ($setupIntent->status == 'processing') {
                session()->flash('info', 'Your payment is still processing. We will email you when your payment status updates.');
            } elseif ($setupIntent->status == 'canceled') {
                session()->flash('error', 'The payment setup was canceled.');
            } else {
                session()->flash('error', 'An unexpected error occurred. Please try again.');
            }
        } else {
            if ($this->user) {
                // Get the Stripe customer object if it exists or create a new one //
                if (!$this->user->stripe_id) {
                    $customer = $stripe->customers->create();
                    $this->user->update(['stripe_id' => $customer->id]);
                }

                $intent = $stripe->setupIntents->create([
                    'customer' => $this->user->stripe_id,
                    'payment_method_types' => ['card'],
                ]);

                $this->clientSecret = $intent->client_secret;
            }
        }
    }
    
    public function render()
    {
        return view(
            'livewire.dashboard.subscriptions.trials.create',
            ['clientSecret' => $this->clientSecret ?? '']
        );
    }
}
