<?php

namespace App\Listeners;

use App\Events\WebhookCalled;
use App\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StoreMollieId
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
     * @param  WebhookCalled  $event
     * @return void
     */
    public function handle(WebhookCalled $event)
    {
        Payment::create([
            'user_id' => $user->id,
            'mollie_payment_id' => $mollie_payment_id,
        ]);
    }
}
