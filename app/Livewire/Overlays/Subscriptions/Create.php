<?php

namespace App\Livewire\Overlays\Subscriptions;

use Carbon\Carbon;
use Stripe\Stripe;
use App\Models\User;
use Segment\Segment;
use Stripe\Customer;
use App\Models\Event;
use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\StripeSubscription;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class Create extends Component
{
    public $user;
    public $course;
    public $plan;
    public $clientSecret;
    public $productId = 5001;
    public $product;
    public $subscriptionOverlayVisible = false;
    public $setupIntentId;
    public $currencyCode;

    #[On('upgrade-clicked')]
    public function openOverlay($id)
    {
        $this->productId = $id;
        $this->product = Product::findOrFail($this->productId);
        $this->dispatch('overlay-opened');
        $this->subscriptionOverlayVisible = true;
        
        Event::create([
            'user_id' => auth()->user()->id ?? null,
            'anonymous_id' => session('uniqueID') ?? null,
            'name' => 'Overlay opened',
            'properties' => json_encode([
                'url' => request()->fullUrl(),
                'product_id' => $this->productId,
            ]),
        ]);
    }

    #[On('handle-subscription')]
    public function subscribe($setupIntent)
    {
        Event::create([
            'user_id' => auth()->user()->id ?? null,
            'anonymous_id' => session('uniqueID') ?? null,
            'name' => 'Subscription attempt started',
            'properties' => json_encode([
                'url' => request()->fullUrl(),
                'product_id' => $this->productId,
            ]),
        ]);

        if($setupIntent['status'] == 'succeeded')
        {
            // Add call to User model to update payment methods //
            $paymentMethodId = User::updatePaymentMethod($this->user->id, $setupIntent);
            
            // Update the user model after updating the payment method //
            $this->user = User::find($this->user->id);
            if ($paymentMethodId)
            {
                $product = Product::findOrFail($this->productId);
                $stripePriceId = $product->prices()->where('billing_period', 'Monthly')->first()->stripe_price_id;
                $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));
                $subscription = $stripe->subscriptions->create([
                    'customer' => $this->user->stripe_id,
                    'currency' => $this->currencyCode,
                    'default_payment_method' => $this->user->pm_id,
                    'items' => [
                        ['price' => $stripePriceId],
                    ],
                ]);

                $this->createStripeSubscription($stripePriceId, $product->id, $subscription->id);

                Event::create([
                    'user_id' => auth()->user()->id ?? null,
                    'anonymous_id' => session('uniqueID') ?? null,
                    'name' => 'Subscription successful',
                    'properties' => json_encode([
                        'url' => request()->fullUrl(),
                        'product_id' => $this->productId,
                    ]),
                ]);

                return redirect()->to(route('payments.thank-you.generic', ['locale' => session('locale')]));
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
            return back()->with('error', 'Something went wrong, please refresh the page and try again.');
        }
    }

    public function createStripeSubscription($stripePriceId, $productId, $stripeSubscriptionId)
    {
        $stripeSubscription = StripeSubscription::create([
            'user_id' => $this->user->id,
            'product_id' => $productId,
            'stripe_id' => $stripeSubscriptionId,
            'stripe_price_id' => $stripePriceId,
            'stripe_status' => 'active',
        ]);
    }

    public function mount() {
        Stripe::setApiKey(config('services.stripe.secret'));
        $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));
        $this->product = Product::findOrFail($this->productId);
        $this->user = auth()->user();
        $this->setupIntentId = request()->query('setup_intent');
        $locale = App::getLocale();
        $this->currencyCode = __('currency.code', [], $locale);

        if($this->setupIntentId) {
            $setupIntent = $stripe->setupIntents->retrieve($this->setupIntentId);
            if ($setupIntent->status == 'succeeded') {
                $this->subscribe($setupIntent);
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
            } else {
                Log::error('User not logged in');
            }
        }
    }

    public function render()
    {
        return view('livewire.overlays.subscriptions.create',
            [ 'clientSecret' => $this->clientSecret ?? '']);
    }
}
