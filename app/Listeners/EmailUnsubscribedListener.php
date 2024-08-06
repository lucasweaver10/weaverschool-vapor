<?php

namespace App\Listeners;

use App\Events\EmailUnsubscribed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mixpanel;

class EmailUnsubscribedListener
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
     * @param  \App\Events\EmailUnsubscribed  $event
     * @return void
     */
    public function handle(EmailUnsubscribed $event)
    {
        $user = User::where('email', $event->data['email'])->first();

        if($user) {
            $mp = Mixpanel::getInstance(env('MIXPANEL_TOKEN'));
            $mp->identify($user->id);
            $mp->track("Email unsubscribed", array("subject" => $event->data['subject']));
        }
    }
}
