<?php

namespace App\Listeners;

use App\Jobs\Subscriptions\HandleSubscriptionCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue; 
use Laravel\Cashier\Subscription;

class SubscriptionCreatedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Subscription $subscription): void
    {
        HandleSubscriptionCreated::dispatch($subscription);        
    }
}
