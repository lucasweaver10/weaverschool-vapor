<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class StripeEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    /**
     * Handle received Stripe webhooks.
     */
    // public function handle(WebhookReceived $event): void
    // {
    //     if ($event->payload['type'] === 'checkout.session.completed') {
    //         if ($event->payload['payment_status'] === 'paid') {
    //            $registration = Registration::where('id', $event->payload['client_reference_id'])->first();
    //            $registration->update([
    //                'status' => 'Paid',
    //                'total_paid' => $event->payload['amount_total'] / 100,
    //                'outstanding_balance' => $registration->outstanding_balance - ($event->payload['amount_total'] / 100),
    //            ]);
    //             return response('This worked', 200);
    //         }
    //     }
    // }
}
