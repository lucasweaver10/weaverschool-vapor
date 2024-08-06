<?php

namespace App\Jobs;

use App\Models\Course;
use App\Models\Registration;
use Illuminate\Bus\Queueable;
use App\Models\CourseProgress;
use App\Models\LessonProgress;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class CreateRegistrationProgresses implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $registrationId;

    public $tries = 3;

    public function __construct($registrationId)
    {
        $this->registrationId = $registrationId;
    }

    public function handle()
    {
        $registration = Registration::find($this->registrationId);
        $course = Course::find($registration->course_id);

        // Create CourseProgress instance
        $courseProgress = new CourseProgress([
            'registration_id' => $registration->id,
            'course_id' => $registration->course->id,
            'user_id' => $registration->user->id,
        ]);
        $courseProgress->save();

        // Create LessonProgress instance for each course lesson
        foreach ($course->lessons as $key => $lesson) {

            $lessonProgress = new LessonProgress([
                'registration_id' => $registration->id,
                'lesson_id' => $lesson->id,
                'user_id' => $registration->user->id,
            ]);

            if ($key === 0) {
                $lessonProgress->started_at = now();
            }

            $lessonProgress->save();
        }
    }
}
