<?php

namespace App\Http\Middleware;

use App\Models\LessonProgress;
use Closure;
use Illuminate\Http\Request;
use App\Models\Lesson; // Assuming you have a Lesson model
use App\Models\Registration; // Assuming you have a Registration model

class CheckLessonAccess
{
    public function handle(Request $request, Closure $next)
    {
        $lessonId = $request->route('lessonId'); // Assuming the lesson ID is passed as a route parameter
        $lesson = Lesson::find($lessonId);
        $user = auth()->user();

        if (!$lesson->course) {
            abort(500, 'The course associated with this lesson could not be found.');
        }

        $registration = Registration::where('user_id', $user->id)->where('course_id', $lesson->course->id)->first();
        $lessonProgress= LessonProgress::where('lesson_id', $lessonId)->where('user_id', $user->id)->first();

        // Check if the lesson exists and has been started
        if (!$lessonProgress || !$lessonProgress->started_at) {
            return abort(500, 'You must complete all previous lessons before starting this lesson.');
        }

        // Check if user has pro subscription //
        if(!$user->subscribed('pro') ) {
            // Check the accessibility status of the lesson
            if ($registration->trial) {
                // Check if the user has made a payment
                if ($registration->trial->end_date < now() && $registration->total_paid == 0) {
                    return back()->with('error', 'Your trial has expired. You need to pay for your course to access this lesson.');
                }
            } elseif ($registration->outstanding_balance > 0 && $registration->total_paid == 0) {
                return back()->with('error', 'You need to pay for your course to access this lesson.');
            }
        }

        return $next($request);
    }
}
