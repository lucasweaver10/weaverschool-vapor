<?php

namespace App\Listeners;

use App\Events\EmailBounced;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mixpanel;

class EmailBouncedListener
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
     * @param  \App\Events\EmailBounced  $event
     * @return void
     */
    public function handle(EmailBounced $event)
    {
        $user = User::where('email', $event->data['email'])->first();

        if($user) {
            $mp = Mixpanel::getInstance(env('MIXPANEL_TOKEN'));
            $mp->identify($user->id);
            $mp->track("Email bounced", array("subject" => $event->data['subject']));
        }
    }
}
