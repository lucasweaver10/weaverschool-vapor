<?php

namespace App\Livewire\Dashboard\Payments\Methods;

use Livewire\Component;
use Stripe\Customer;
use Stripe\Stripe;

class Create extends Component
{
    public $clientSecret;
    public $user;

    protected $listeners = ['handleIntent' => 'storeIntent'];

    public function storeIntent($setupIntent) {
        $this->user = auth()->user();

        if($setupIntent['status'] == 'succeeded')
        {
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

            $paymentMethodType = $setupIntent['payment_method_types'][0]; // Access the first payment method type
            $this->user->pm_type = $paymentMethodType;

            $this->user->save();

            $paymentMethods = $stripe->paymentMethods->all([
                'customer' => $this->user->stripe_id,
                'type' => $this->user->pm_type,
            ]);

            $paymentMethodId = $paymentMethods['data'][0]['id'];
            $paymentMethodLastFour = $paymentMethods['data'][0]['card']['last4'];

            $this->user->pm_id = $paymentMethodId;
            $this->user->pm_last_four = $paymentMethodLastFour ?? null;

            $this->user->save();

            session()->flash('success', 'Payment method setup successfully.');
        } else {
            session()->flash('error', 'Payment setup failed. Please try again.');
        }
        return redirect()->route('dashboard.payments.methods.index', [
            'locale' => session('locale')]
        );
    }

    public function mount() {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        if($this->user->stripe_id) {
            $customer = Customer::retrieve($this->user->stripe_id);
        } else{
            $customer = Customer::create();
            $this->user->update([
                'stripe_id' => $customer->id,
            ]);
        }

        $intent = $stripe->setupIntents->create([
            'customer' => $this->user->stripe_id,
            'automatic_payment_methods' => ['enabled' => true],
        ]);

        $this->clientSecret = $intent->client_secret;
    }

    public function render()
    {
        return view('livewire.dashboard.payments.methods.create',
            [ 'clientSecret' => $this->clientSecret,]
        );
    }
}
