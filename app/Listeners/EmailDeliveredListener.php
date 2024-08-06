<?php

namespace App\Listeners;

use App\Events\EmailDelivered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Mixpanel;

class EmailDeliveredListener
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
     * @param  \App\Events\EmailDelivered  $event
     * @return void
     */
    public function handle(EmailDelivered $event)
    {
        $user = User::where('email', $event->data['email'])->first();

        if($user) {
            $mp = Mixpanel::getInstance(env('MIXPANEL_TOKEN'));
            $mp->identify($user->id);
            $mp->track("Email delivered", array("subject" => $event->data['subject'] ?? 'Undefined subject'));
        }
    }
}
