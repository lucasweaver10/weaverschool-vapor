<?php

namespace App\Models;

use Error;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\QuizSumbission;

class LessonProgress extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'lesson_progresses';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function courseProgress()
    {
        return $this->belongsTo(CourseProgress::class);
    }

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }

    public static function recordExerciseSubmission($submission)
    {
        $progress = LessonProgress::where('lesson_id', $submission->exercise->lesson->id)->where('user_id', auth()->id());

        if ($submission->exercise->type == 'Guided Practice') {
            $progress->update([
                'guided_practice_grade' => $submission->grade,
            ]);
        }

        elseif ($submission->exercise->type == 'Free Practice') {
            $progress->update([
                'free_practice_grade' => $submission->grade,
            ]);
        }

        else {
            return new Error('Invalid exercise type');
        }

        return $progress;
    }

    public static function recordQuizSubmission($submission)
    {
        $progress = LessonProgress::where('lesson_id', $submission->quiz->lesson_id)->where('user_id', auth()->id())->firstOrFail();

        $progress->update([
            'quiz_grade' => $submission->grade,
        ]);

        self::updateLessonGrade($progress);

        return $progress;
    }

    public static function updateLessonGrade(&$progress)
    {
        $progress->update([
            'lesson_grade' => ($progress->guided_practice_grade * 0.15 + $progress->free_practice_grade * 0.35 + $progress->quiz_grade * 0.5),
        ]);
    }
}
