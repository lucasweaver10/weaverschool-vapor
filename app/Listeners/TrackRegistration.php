<?php

namespace App\Listeners;

use Segment\Segment;
use App\Events\RegistrationCreated;
use Illuminate\Queue\InteractsWithQueue;
use App\Jobs\CreateRegistrationProgresses;
use Illuminate\Contracts\Queue\ShouldQueue;

class TrackRegistration
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
     * @param  RegistrationCreated  $event
     * @return void
     */
    public function handle(RegistrationCreated $event)
    {
        $registration = $event->registration;

        CreateRegistrationProgresses::dispatch($registration->id);

        Segment::track([
            "userId" => $registration->user_id,
            "event" => "Course Registration",
            "properties" => [
                "registration_id" => $registration->id,
                "name" => $registration->course_name,
            ]
        ]);
    }
}
