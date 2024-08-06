<?php

namespace App\Models;

use App\Mail\NewUserNotification;
use App\Mail\PaymentReceived;
use App\Mail\Welcome\First;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Plan;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Mollie\Laravel\Facades\Mollie;
use Illuminate\Support\Facades\Auth;

class Payment extends Model
{
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }        

    public static function authorizeFuturePayment($userId, $amount, $currencyCode, $stripeSubscriptionId) {
        $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        $user = User::findOrFail($userId);
        try {            
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $amount,
                'description' => 'Subscription creation',
                'currency' => $currencyCode,
                'customer' => $user->stripe_id,
                'payment_method' => $user->pm_id,
                'capture_method' => 'manual',                
                'setup_future_usage' => 'off_session',
                'confirm' => true,                
                'return_url' => 'https://weaverschool.com/subscriptions/create',
            ]);
            // 'requires_capture means success, we will capture in 1 week if not cancelled //
            if($paymentIntent->status == 'requires_capture') {                                                
                return $paymentIntent;
            } elseif ($paymentIntent->status == 'requires_payment_method') {                
                return back()->with('error', 'Your payment method was declined. Please try a different payment method.');
            } elseif ($paymentIntent->status == 'canceled') {                
                return back()->with('error', 'Your payment was canceled. Please try again.');
            } elseif ($paymentIntent->status == 'requires_confirmation') {
                // Confirm the PaymentIntent on the server-side
                try {
                    $paymentIntent->confirm();
                    // After confirming, check the payment intent's status again
                    if ($paymentIntent->status == 'requires_action') {
                        // The payment requires additional actions (like SCA)
                        return $paymentIntent;
                    } elseif ($paymentIntent->status == 'succeeded') {
                        return $paymentIntent;
                    }
                } catch (\Stripe\Exception\ApiErrorException $e) {
                    // Handle any exceptions and inform the user if necessary                    
                    return back()->with('error', 'Payment confirmation failed: ' . $e->getMessage() . ' Please try again.');
                }
            } else {                
                return back()->with('error', 'Payment authorization failed. Please try again.');
            }
        } catch (\Stripe\Exception\CardException $e) {
            // Error code will be authentication_required if authentication is needed
            echo 'Error code is:' . $e->getError()->code;
            $payment_intent_id = $e->getError()->payment_intent->id;
            $payment_intent = \Stripe\PaymentIntent::retrieve($payment_intent_id);            
            return ['error' => $e->getError()->message];
        }
    }

    public static function captureAuthorizedPayment($paymentIntent, $stripeCustomerId, $stripeSubscriptionId, $amount)
    {        
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));                                
                
        $paymentIntent->capture();
        // If Stripe returns status "succeeded" update the payment and registration //
        if ($paymentIntent->status == 'succeeded')
        {                        
            self::createInvoiceItem($stripeSubscriptionId, $stripeCustomerId, $amount);            
            // send PaymentReceived email to user //
            // Mail::to($user->email)->bcc('2144262@bcc.hubspot.com')->send(new PaymentReceived($user, $payment));
        }
    }

    public static function createInvoiceItem($stripeSubscriptionId, $stripeCustomerId, $amount)
    {
        $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));

        $invoiceItem = $stripe->invoiceItems->create([
            'customer' => $stripeCustomerId,
            'subscription' => $stripeSubscriptionId,
            'description' => 'Credit for pre-authorized payment',
            'price' => 'price_1PfaEbGU36zs4gOvGOzSmo3l',
        ]);

        $updatedInvoiceItem = $stripe->invoiceItems->update(
            $invoiceItem->id,
            [
                'amount' => - $amount,
            ]
        );
    }

}
