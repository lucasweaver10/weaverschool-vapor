<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\User;
use Segment\Segment;
use Illuminate\Support\Str;
use App\Models\ProductPrice;
use App\Models\Registration;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function create(Request $request)
    {
        $user = auth()->user();
        $type = $request->type;
        $productPriceId = $request->id;
        $productPrice = ProductPrice::findOrFail($productPriceId);        
        $fbClickId = $request->fbclid ?? null;           

        return view('dashboard.subscriptions.trials.create', compact('user', 'type', 'productPrice', 'fbClickId'));
    }

    public function getMandate()
    {

        $user = Auth::user();

        $mollie = new \Mollie\Api\MollieApiClient();

        $mollie->setApiKey(env('MOLLIE_KEY'));

        $customer = $mollie->customers->get("$user->mollie_customer_id");

        $mandates = $customer->mandates();

        $mandateId = $mandates[0]->id;

    }

    public function getSubscriptionPayments()
    {
        $mollie = new \Mollie\Api\MollieApiClient();
        $mollie->setApiKey(env('MOLLIE_KEY'));
        $user = Auth::user();
        $customer = $mollie->customers->get("$user->mollie_customer_id");

        $subscription = $customer->getSubscription("sub_98qu4nccp3");

        $subscriptionPayment = $subscription->payments()[0];

        dd($subscriptionPayment->_links->changePaymentState->href);

        $payment = $mollie->payments->get("$subscriptionPayment->id");

        $payment->webhookUrl = "https://dxwbmj9yz5.sharedwithexpose.com/api/mollie/webhook/subscription";

        $payment = $payment->update();

        dd($payment);

    }


}
