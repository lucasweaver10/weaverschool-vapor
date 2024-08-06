<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use App\Models\Plan;
use App\Models\Registration;
use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;
use App\MolliePayment;
use Laravel\Cashier\SubscriptionBuilder\Contracts\SubscriptionBuilder;
use Laravel\Cashier\SubscriptionBuilder\RedirectToCheckoutResponse;
use Illuminate\Support\Facades\Auth;
use Segment\Segment;

class MolliePaymentsController extends Controller
{
    public function prepareMandate(Request $request, Payment $payment)
    {
        $user = Auth::user();

        $customerId = $user->mollie_customer_id;

        if(session('locale') == 'en') {
            $currency = 'USD';
        } else {
            $currency = 'EUR';
        }

        $molliePayment = Mollie::api()->payments()->create([
            'amount' => [
                'currency' => $currency,
                'value' => '0.01', // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            'customerId' => $customerId,
            'sequenceType' => 'first',
            'description' => 'One time deposit to set up your subscriptions.',
            'locale' => 'en_US',
            'redirectUrl' => route('dashboard.payments', ['locale' => session('locale', 'en'), 'tab' => 'subscriptions']),
            'webhookUrl' => env('MOLLIE_WEBHOOK_URL') . '/mandate',
            'metadata' => [
                'user_id' => $user->id,
                'type' => 'mandate',
            ],
        ]);

        $payment = Payment::create([
            'user_id' => $user->id,
            'mollie_payment_id' => $molliePayment->id,
            'payment_type' => 'mandate',
            'amount' => '0.01',
        ]);

        Segment::track([
            "userId" => $user->id,
            "event" => "Payment Started",
            "properties" => [
                "type" => "deposit",
                "amount" => "$request->amount",
            ],
        ]);

        return redirect($molliePayment->getCheckoutUrl(), 303);

    }


    public function prepareBalance(Request $request, Plan $plan, Registration $registration, Payment $payment)
    {
        $user = Auth::user();

        // $registration = RegistrationDB::table('users')

        $registrationId = $request->registrationId;

        $outstanding_balance = Registration::find($registrationId)->outstanding_balance;

        $planId = $registration->plan_id;

        if(session('locale') == 'en') {
            $currency = 'USD';
        } else {
            $currency = 'EUR';
        }

        $molliePayment = Mollie::api()->payments()->create([
            'amount' => [
                'currency' => $currency,
                'value' => $outstanding_balance, // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            'locale' => 'en_US',
            'description' => 'Full payment for your course.',
            'redirectUrl' => route('payments-thank-you'),
            'cancelUrl' => route('dashboard.payments', ['locale' => session('locale', 'en')]),
            'webhookUrl' => env('MOLLIE_WEBHOOK_URL') . '/payment',
            'metadata' => [
                'user_id' => $user->id,
                'registration_id' => $registrationId,
                'type' => 'full',
            ],
        ]);

        $payment = Payment::create([
            'user_id' => $user->id,
            'mollie_payment_id' => $molliePayment->id,
            'payment_type' => 'balance',
            'amount' => $outstanding_balance,
            'registration_id' => $registrationId,
            'status' => 'open',
        ]);

        Segment::track([
            "userId" => $user->id,
            "event" => "Payment Started",
            "properties" => [
                "registrationId" => $registrationId,
                "type" => "full",
                "amount" => $outstanding_balance,
            ],
        ]);

        // redirect customer to Mollie checkout page
        return redirect($molliePayment->getCheckoutUrl(), 303);
    }

    /**
     * After the customer has completed the transaction,
     * you can fetch, check and process the payment.
     * (See the webhook docs for more information.)
     */
    // if ($payment->isPaid())
    // {
    // echo 'Payment received.';
    // // Do your thing ...
    // }

    public function prepareDeposit(Request $request, Registration $registration, Plan $plan, Payment $payment)
    {
        $userId = Auth::id();

        $registrationId = $request->registrationId;

        $planId = $registration->plan_id;

        $payment = Mollie::api()->payments()->create([
            'amount' => [
                'currency' => 'EUR',
                'value' => '20.00', // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            'description' => 'One time deposit for your registration.',
            'locale' => 'en_US',
            'redirectUrl' => route('payments-thank-you'),
            'webhookUrl' => env('MOLLIE_WEBHOOK_URL') . '/payment',
            'metadata' => [
                'user_id' => $userId,
                'registration_id' => $registrationId,
                'type' => 'deposit',
            ],
        ]);

        $payment = Mollie::api()->payments()->get($payment->id);

        $molliePaymentId = Mollie::api()->payments()->get($payment->id)->id;

        Payment::create([
            'user_id' => $userId,
            'mollie_payment_id' => $molliePaymentId,
            'payment_type' => 'deposit',
            'amount' => '20.00',
            'registration_id' => $registrationId
        ]);

        Segment::track([
            "userId" => $userId,
            "event" => "Payment Started",
            "properties" => [
                "registrationId" => $registrationId,
                "type" => "deposit",
                "amount" => "$request->amount",
                "plan" => "$planId",
            ],
        ]);

        $paymentId = User::find($userId)->payments->last()->id;

        return redirect($payment->getCheckoutUrl(), 303);
    }

    /**
     * After the customer has completed the transaction,
     * you can fetch, check and process the payment.
     * (See the webhook docs for more information.)
     */
    // if ($payment->isPaid())
    // {
    // echo 'Payment received.';
    // // Do your thing ...
    // }

    public function prepareRemainder(Request $request,  Registration $registration, Plan $plan, Payment $payment)
    {
        $userId = Auth::user()->id;

        $registrationId = $request->registrationId;

        $outstanding_balance = Registration::find($registrationId)->outstanding_balance;

        $planId = $registration->plan_id;

        $payment = Mollie::api()->payments()->create([
            'amount' => [
                'currency' => 'EUR',
                'value' => $outstanding_balance, // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            'description' => 'Full payment for your course.',
            'locale' => 'en_US',
            'redirectUrl' => route('payments-thank-you'),
            'webhookUrl' => env('MOLLIE_WEBHOOK_URL'),
            'metadata' => [
                'user_id' => $userId,
                'registration_id' => $registrationId,
                'type' => 'remainder',
            ],
        ]);

        $payment = Mollie::api()->payments()->get($payment->id);

        $molliePaymentId = Mollie::api()->payments()->get($payment->id)->id;

        Payment::create([
            'user_id' => $userId,
            'mollie_payment_id' => $molliePaymentId,
            'payment_type' => 'remainder',
            'amount' => $outstanding_balance,
            'registration_id' => $registrationId
        ]);

         Segment::track([
             "userId" => $userId,
             "event" => "Payment Started",
             "properties" => [
                 "registrationId" => $registrationId,
                 "type" => "remainder",
                 "amount" => "$request->amount",
                 "plan" => "$planId",
             ],
         ]);

        // redirect customer to Mollie checkout page
        return redirect($payment->getCheckoutUrl(), 303);
    }

    /**
     * After the customer has completed the transaction,
     * you can fetch, check and process the payment.
     * (See the webhook docs for more information.)
     */
    // if ($payment->isPaid())
    // {
    // echo 'Payment received.';
    // // Do your thing ...
    // }

    public function showPayment()
    {

        phpinfo();
    }

    public function thankYou()
    {
        $user = auth()->user();

        return view('payments.thank-you', ['user' => $user]);
    }

}
