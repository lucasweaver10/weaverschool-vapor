<?php

namespace App\Http\Controllers;

use App\Events\WebhookCalled;
use App\Models\Payment;
use App\Models\MolliePayment;
use App\Models\Registration;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Mollie\Api\MollieApiClient;
use Mollie\Laravel\Facades\Mollie;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentReceived;
use App\Mail\PaymentUnsuccessful;
use App\Models\Subscription;
use Illuminate\Support\Facades\DB;
use Segment;
use Illuminate\Support\Facades\Log;


class WebhooksController extends Controller
{
    public function handleMandate(Request $request)
    {
        $mollie = new MollieApiClient();

        $mollie->setApiKey(env('MOLLIE_KEY'));

        $molliePayment = $mollie->payments->get($_POST["id"]);

        MolliePayment::storeMandate($molliePayment);

        return response('Webhook received');

    }

    public function handleTrialMandate(Request $request)
    {
        $mollie = new MollieApiClient();

        $mollie->setApiKey(env('MOLLIE_KEY'));

        $molliePayment = $mollie->payments->get($_POST["id"]);

        MolliePayment::storeTrialMandate($molliePayment);

        return response('Webhook received');
    }

    public function handlePayment(Request $request, Payment $payment)

    {
        $mollie = new MollieApiClient();

        $mollie->setApiKey(env('MOLLIE_KEY'));

        $molliePayment = $mollie->payments->get($_POST["id"]);

        MolliePayment::storePayment($molliePayment);

        return response('Webhook received');
    }

    public function handleSubscriptionPayment(Request $request, Payment $payment)

    {
        $mollie = new MollieApiClient();

        $mollie->setApiKey(env('MOLLIE_KEY'));

        $molliePayment = $mollie->payments->get($_POST["id"]);

        MolliePayment::storeSubscriptionPayment($molliePayment);

        return response('Webhook received');

    }

    public function handleLevelTest(Request $request)
    {
        $submission = $request->all();

        $email = $request->input('form_response.answers.0.email');

        $score = $request->input('form_response.calculated.score');

        $eventId = $request->input('event_id');

        $user = User::where('email', $email)->first();

        $user->update(['level_test_score' => $score]);

        User::calculateLevel($user);

        return response('Webhook received');

    }

    public function handleStripePayment(Request $request)
    {
        $payload = json_decode($request->getContent(), true);

        if ($payload['type'] === 'checkout.session.completed' && $payload['data']['object']['subscription'] !== null) {
            if($payload['data']['object']['status'] == 'complete') {
                $subscriptionStatus = 'Active';
            }
            else {
                $subscriptionStatus = 'Pending';
            }

            // $subscription = Subscription::create([
            //     'name' => 'Flashcards annual subscription',
            //     'amount' => $payload['data']['object']['amount_total'] / 100,
            //     'user_id' => $payload['data']['object']['client_reference_id'],
            //     'status' => $subscriptionStatus,
            //     'stripe_status' => $subscriptionStatus,
            //     'stripe_id' => $payload['data']['object']['subscription'],
// For testing purposes, uncomment the below line and comment out the above line //
//                'stripe_id' => 12345678,
            //     'times' => '1',
            //     'interval' => '1 year',
            // ]);


            $payment = Payment::create([
                'amount' => $payload['data']['object']['amount_total'] / 100,
                'user_id' => $payload['data']['object']['client_reference_id'],
                'stripe_payment_id' => $payload['data']['object']['id'],
                'payment_type' => 'subscription',
                'subscription_id' => $subscription->id,
                'status' => $payload['data']['object']['status'],
            ]);

            return response('Checkout session webhook received');
        }

        elseif ($payload['type'] === 'checkout.session.completed' && $payload['data']['object']['subscription'] === null) {
            $payment = Payment::create([
                'stripe_payment_id' => $payload['data']['object']['id'],
                'payment_type' => 'balance',
                'amount' => $payload['data']['object']['amount_total'] / 100,
                'status' => $payload['data']['object']['status'],
            ]);

            $registration = Registration::find($payload['data']['object']['client_reference_id']);
            // commenting out the above line and uncommenting the below line will allow you to test the webhook locally //
            // without a dummy client_reference_id which stripe does not provide  / /
//            $registration = Registration::find(3177);
            $payment->update([
                'registration_id' => $registration->id,
                'user_id' => $registration->user_id,
            ]);

            // update the registration with the status, total_paid, and outstanding_balance //
            $registration->update([
                'status' => 'Active',
                'total_paid' => $registration->total_paid + $payment->amount,
                'outstanding_balance' => $registration->outstanding_balance - $payment->amount,
            ]);

            return response('Checkout session webhook received');
        }

        elseif ($payload['type'] === '') {

        }

        else {
            return response('Webhook received without processing');
        }
    }

    public function handleSendgrid(Request $request) {

        $emailEvents = json_decode($request->getContent(), true);

        foreach ($emailEvents as $data) {
            // Here, you now have each event and can process them how you like
            if ($data['event'] == 'delivered') {
                event(new \App\Events\EmailDelivered($data));
//            } elseif ($data['event'] == 'open') {
//                event(new \App\Events\EmailOpened($data));
//            } elseif ($data['event'] == 'clicked') {
//                event(new \App\Events\EmailClicked($data));
//            } elseif ($data['event'] == 'unsubscribed') {
//                event(new \App\Events\EmailUnsubscribed($data));
//            } else {
                // Optionally, handle other event types or log an unrecognized event type
            }
        }

        return response('Webhook received');

    }
}
