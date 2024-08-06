<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Segment\Segment;

class LessonProgressController extends Controller
{
    public function show($locale, $courseId, $lessonId)
    {
        $user = auth()->user();

        $course = Course::find($courseId);
        $lesson = Lesson::find($lessonId);
        $registration = auth()->user()->registrations->where('course_id', $courseId)->firstOrFail();

        $progress = $lesson->progress->where('user_id', $user->id)->where('lesson_id', $lesson->id)->firstOrFail();

        return view('dashboard.lessons.progress.show', compact('course', 'lesson', 'registration', 'progress'));
    }

    public function markLessonComplete($locale, $courseId, $lessonId, $experience)
    {
        $user = auth()->user();
        $lesson = Lesson::find($lessonId);
        $progress = $lesson->progress->where('user_id', $user->id)->where('lesson_id', $lesson->id)->firstOrFail();

        if(isset($progress->guided_practice_grade) && isset($progress->free_practice_grade) && isset($progress->quiz_grade))
            {
                $progress->update([
                    'completed_at' => Carbon::now(),
                ]);

                Segment::track([
                    "event" => "Lesson completed",
                    "userId" => $user->id,
                    "properties" => [
                        "lessonId" => $lesson->id,
                    ]
                ]);

                $nextLesson = Lesson::where('course_id', $lesson->course->id)
                    ->where('id', '>', $lesson->id)
                    ->orderBy('id')
                    ->first();

                $nextProgress = $nextLesson->progress->where('user_id', $user->id)->where('lesson_id', $nextLesson->id)->firstOrFail();

                $nextProgress->update([
                    'started_at' => Carbon::now(),
                ]);

                return redirect()->route('dashboard.lessons.index', [$locale, $courseId, $lessonId]);
            }

        elseif($experience == 'self-paced')
            {
                $progress->update([
                    'completed_at' => Carbon::now(),
                ]);

                $nextLesson = Lesson::where('course_id', $lesson->course->id)
                    ->where('id', '>', $lesson->id)
                    ->orderBy('id')
                    ->first();

                $nextProgress = $nextLesson->progress->where('user_id', $user->id)->where('lesson_id', $nextLesson->id)->firstOrFail();

                $nextProgress->update([
                    'started_at' => Carbon::now(),
                ]);

                return redirect()->route('dashboard.lessons.index', [$locale, $courseId, $lessonId]);
            }

        else
            {
                return redirect()->back()->with('error', 'You must complete all exercises and quizzes before you can mark this lesson complete.');
            }

    }
}
