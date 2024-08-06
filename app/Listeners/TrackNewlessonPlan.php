<?php

namespace App\Listeners;

use App\Events\LessonPlanCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TrackNewlessonPlan
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
     * @param  LessonPlanCreated  $event
     * @return void
     */
    public function handle(LessonPlanCreated $event)
    {
        //
    }
}
