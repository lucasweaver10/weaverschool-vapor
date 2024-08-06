<?php

namespace App\Listeners;

use App\Events\EmailOpened;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Mixpanel;

class EmailOpenedListener
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
     * @param  \App\Events\EmailOpened  $event
     * @return void
     */
    public function handle(EmailOpened $event)
    {
        $user = User::where('email', $event->data['email'])->first();

        if($user) {
            $mp = Mixpanel::getInstance(env('MIXPANEL_TOKEN'));
            $mp->identify($user->id);
            $mp->track("Email opened", array("subject" => $event->data['subject']));
        }
    }
}
