<?php

namespace App\Listeners;

use App\Events\EmailProcessed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mixpanel;

class EmailProcessedListener
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
     * @param  \App\Events\EmailProcessed  $event
     * @return void
     */
    public function handle(EmailProcessed $event)
    {
        //
    }
}
