<?php

namespace App\Models;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Plan;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mollie\Api\MollieApiClient;
use Mollie\Laravel\Facades\Mollie;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentReceived;
use App\Mail\PaymentUnsuccessful;
use App\Models\Subscription;
use Illuminate\Support\Facades\DB;
use Segment\Segment;
use Illuminate\Support\Facades\Log;


class MolliePayment extends Model
{
    public static function updateBalance()
    {

        $userId = Auth::id();

        $registrationId = User::find($userId)->registrations->last()->id;

        // $outstanding_balance = Registration::find($registrationId)->outstanding_balance;

        $total_paid = Registration::find($registrationId)->payments->where('status', 'paid')->sum('amount');

        $outstanding_balance = Registration::find($registrationId)->plan_total_price - $total_paid;

        Registration::where('id', $registrationId)->update(['total_paid' => $total_paid, 'outstanding_balance' => $outstanding_balance,]);
    }

    public static function storeMandate($molliePayment)
    {
        $mollie = new MollieApiClient();

        $mollie->setApiKey(env('MOLLIE_KEY'));

        $payment = Payment::where('mollie_payment_id', $molliePayment->id)->first();

        $payment->status = $molliePayment->status;

        $payment->save();

        $user = User::where('id', $payment->user_id)->first();

        $customer = $mollie->customers->get("$user->mollie_customer_id");

        $mandates = $customer->mandates();

        $user->mollie_mandate_id = $mandates[0]->id;

        $user->save();

        $paymentType = $molliePayment->metadata->type;

        if ($molliePayment->status === 'paid') {

            Mail::to($user->email)->send(new PaymentReceived($user, $payment));

            Segment::track([
                "userId" => $user->id,
                "event" => "Mandate Payment Successful",
                "properties" => [
                    "paymentId" => $payment->id,
                    "type" => $paymentType,
                    "amount" => "$payment->amount",
                ],
            ]);
        } else {
            Mail::to($user->email)->send(new PaymentUnsuccessful($user, $payment));
            Segment::track([
                "userId" => $user->id,
                "event" => "Mandate Payment Failed",
                "properties" => [
                    "paymentId" => $payment->id,
                    "type" => $paymentType,
                    "amount" => "$payment->amount",
                ],
            ]);
        }

    }

    public static function storeTrialMandate($molliePayment)
    {
        $mollie = new MollieApiClient();

        $mollie->setApiKey(env('MOLLIE_KEY')); 

        $payment = Payment::where('mollie_payment_id', $molliePayment->id)->first();

        $payment->status = $molliePayment->status;        

        $payment->save();

        $user = User::where('id', $payment->user_id)->first();

        $customer = $mollie->customers->get("$user->mollie_customer_id");

        $mandates = $customer->mandates();

        $user->mollie_mandate_id = $mandates[0]->id;        

        $user->save();

        $registration = Registration::find($molliePayment->metadata->registration_id);

        $paymentType = $molliePayment->metadata->type;

        if ($molliePayment->status === 'paid') {
            
            $registration->total_paid = $registration->total_paid + $payment->amount;

            $registration->outstanding_balance = $registration->outstanding_balance - $payment->amount;

            $registration->status = 'Active';

            Mail::to($user->email)->send(new PaymentReceived($user, $payment));

            Segment::track([
                "userId" => $user->id,
                "event" => "Mandate Payment Successful",
                "properties" => [
                    "paymentId" => $payment->id,
                    "type" => $paymentType,
                    "amount" => "$payment->amount",
                ],
            ]);

        } else {
            Mail::to($user->email)->send(new PaymentUnsuccessful($user, $payment));
            Segment::track([
                "userId" => $user->id,
                "event" => "Mandate Payment Failed",
                "properties" => [
                    "paymentId" => $payment->id,
                    "type" => $paymentType,
                    "amount" => "$payment->amount",
                ],
            ]);
        }

    }

    public static function storePayment($molliePayment)
    {
        $payment = Payment::where('mollie_payment_id', $molliePayment->id)->first();

        $payment->update(['status' => $molliePayment->status]);

        $registration = Registration::find($molliePayment->metadata->registration_id);

        $total_paid = $registration->payments->where('status', 'paid')->sum('amount');

        $outstanding_balance = $registration->outstanding_balance - $total_paid;

        $registration->update(['total_paid' => $total_paid, 'outstanding_balance' => $outstanding_balance, 'status' => 'Active']);

        $user = DB::table('users')->find($molliePayment->metadata->user_id);

        $paymentType = $molliePayment->metadata->type;

        if ($molliePayment->status === 'paid') {

            Mail::to($user->email)->send(new PaymentReceived($user, $payment));

            Segment::track([
                "userId" => $user->id,
                "event" => "Payment Successful",
                "properties" => [
                    "paymentId" => $payment->id,
                    "registrationId" => $registration->id,
                    "type" => "$paymentType",
                    "amount" => "$payment->amount",
                ],
            ]);
        } else {
            Mail::to($user->email)->send(new PaymentUnsuccessful($user, $payment));
            Segment::track([
                "userId" => $user->id,
                "event" => "Payment Failed",
                "properties" => [
                    "paymentId" => $payment->id,
                    "registrationId" => $registration->id,
                    "type" => "$paymentType",
                    "amount" => "$payment->amount",
                ],
            ]);
        }

    }

    public static function storeSubscriptionPayment($molliePayment)
    {

        $mollie = new \Mollie\Api\MollieApiClient();
        $mollie->setApiKey(env('MOLLIE_KEY'));
        $subscription = Subscription::where('mollie_subscription_id', $molliePayment->subscriptionId)->first();
        $registration = Registration::find($subscription->registration_id);
        $user = User::find($subscription->user_id);
        $customer = $mollie->customers->get("$user->mollie_customer_id");
        $mollieSubscription = $customer->getSubscription("$molliePayment->subscriptionId");

        $payment = Payment::create([
            'amount' => $molliePayment->amount->value,
            'user_id' => $user->id,
            'mollie_payment_id' => $molliePayment->id,
            'mollie_subscription_id' => $molliePayment->subscriptionId,
            'status' => $molliePayment->status,
            'payment_type' => "subscription",
            'registration_id' => $registration->id,
            'subscription_id' => $subscription->id,
        ]);

        Segment::track([
            "userId" => $user->id,
            "event" => "Payment Started",
            "properties" => [
                "subscription_id" => $subscription->id,
                "type" => "subscription",
                "amount" => $molliePayment->amount->value,
                "registration_id" => $registration->id,
            ],
        ]);

        $total_paid = $registration->payments->where('status', 'paid')->sum('amount');

        $outstanding_balance = $registration->outstanding_balance - $total_paid;

        $registration->update(['total_paid' => $total_paid, 'outstanding_balance' => $outstanding_balance,]);

        // $subscription->update([
        //     'start_date' => $mollieSubscription->startDate,
        //     'next_payment_date' => $mollieSubscription->nextPaymentDate
        // ]);

        Mail::to($user->email)->send(new PaymentReceived($user, $payment));

    }
}
