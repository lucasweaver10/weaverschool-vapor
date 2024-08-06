<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Customer;
use Stripe\Stripe;

class PaymentMethodController extends Controller
{
    public function create() {
        $user = auth()->user();
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        if($user->stripe_id) {
            $customer = Customer::retrieve($user->stripe_id);
        } else{
            $customer = Customer::create();
            $user->update([
                'stripe_id' => $customer->id,
            ]);
        }

        $intent = $stripe->setupIntents->create([
            'customer' => $user->stripe_id,
            'automatic_payment_methods' => ['enabled' => true],
        ]);

        $clientSecret = $intent->client_secret;
        return view('dashboard.payments.methods.create', [
            'user' => auth()->user(),
            'clientSecret' => $clientSecret,
        ]);
    }

    public function index() {
        return view('dashboard.payments.methods.index', [
            'user' => auth()->user(),
        ]);
    }
}
