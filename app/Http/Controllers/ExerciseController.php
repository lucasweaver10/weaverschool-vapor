<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Exercise;
use App\Models\ExerciseSubmission;
use App\Models\LessonProgress;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{

    public function create()
    {
        return view('myteacher.exercises.create');
    }

    public function show($id)
    {
        $exercise = Exercise::where('id', $id)->with('questions')->first();

        return view('myteacher.exercises.show', ['exercise' => $exercise]);
    }

    public function guidedPracticeShow($locale, $courseId, $lessonId)
    {
        $course = Course::find($courseId);
        $lesson = Lesson::find($lessonId);
        $registration = auth()->user()->registrations->where('course_id', $courseId)->firstOrFail();
        $exercise = $lesson->exercises->where('type', 'Guided Practice')->first();

        return view('dashboard.lessons.guided-practice.show', compact('course', 'lesson', 'registration', 'exercise'));

    }

    public function guidedPracticeResults($locale, $courseId, $lessonId)
    {
        $course = Course::find($courseId);
        $lesson = Lesson::find($lessonId);
        $user = auth()->user();
        $registration = auth()->user()->registrations->where('course_id', $courseId)->firstOrFail();
        $exercise = Exercise::where('lesson_id', $lessonId)->where('type', 'Guided Practice')->first();
        $submission = ExerciseSubmission::where('exercise_id', $exercise->id)->where('user_id', $user->id)->first();
        if($submission == null) {
            return back()->with('error', 'You have not submitted this exercise yet.');
        }

        $results = json_decode($submission->results, true);

        return view('dashboard.lessons.guided-practice.results', compact('course', 'lesson', 'registration', 'exercise', 'submission', 'results'));
    }

    public function freePracticeShow($locale, $courseId, $lessonId)
    {
        $course = Course::find($courseId);
        $lesson = Lesson::find($lessonId);
        $registration = auth()->user()->registrations->where('course_id', $courseId)->firstOrFail();
        $exercise = $lesson->exercises->where('type', 'Free Practice')->first();

        return view('dashboard.lessons.free-practice.show', compact('course', 'lesson', 'registration', 'exercise'));

    }


    public function freePracticeResults($locale, $courseId, $lessonId)
    {
        $course = Course::find($courseId);
        $lesson = Lesson::find($lessonId);
        $user = auth()->user();
        $registration = $user->registrations->where('course_id', $courseId)->firstOrFail();
        $exercise = Exercise::where('lesson_id', $lessonId)->where('type', 'Free Practice')->first();
        $submission = ExerciseSubmission::where('exercise_id', $exercise->id)->where('user_id', $user->id)->first();
        if($submission == null) {
            return back()->with('error', 'You have not submitted this exercise yet.');
        }

        $results = json_decode($submission->results, true);

        return view('dashboard.lessons.free-practice.results', compact('course', 'lesson', 'registration', 'exercise', 'submission', 'results'));
    }

    public function gradeExercise(Request $request)
    {
        $user = auth()->user();
        $exercise = Exercise::find($request->exercise_id);
        $questions = $exercise->questions;
        $correctAnswers = [];
        foreach ($questions as $question) {
            $correctAnswers[$question->number] = $question->correct_answer;
        }

        $studentAnswers = $request->input('answer');
        $results = [];
        $score = 0;
        $total = 0;

        foreach ($studentAnswers as $questionNumber => $studentAnswer) {
            $correctAnswer = $correctAnswers[$questionNumber];
            $question = $questions->where('number', $questionNumber)->first();

            $result = [
                'question_number' => $questionNumber,
                'question_text' => $question->text,
                'correct_answer' => $correctAnswer,
                'student_answer' => $studentAnswer,
                'is_correct' => ($studentAnswer == $correctAnswer),
                'explanation' => $question->explanation,
            ];

            $results[] = $result;

            $total++;

            if ($result['is_correct']) {
                $score++;
            }
        }

        $grade = $score / $total * 10;

        $submission = new ExerciseSubmission();
        $submission->exercise_id = $exercise->id;
        $submission->user_id = auth()->user()->id;
        $submission->results = json_encode($results);
        $submission->grade = $grade;
        $submission->save();

        LessonProgress::recordExerciseSubmission($submission);

        if($exercise->type == 'Guided Practice')
        {
            return redirect()->route('dashboard.lessons.guided-practice.results',
                [
                    'locale' => session('locale'),
                    'courseId' => $exercise->lesson->course->id,
                    'lessonId' => $exercise->lesson->id,
                    'submissionId' => $submission->id,
                ]);
        }
        elseif($exercise->type == 'Free Practice')
        {
            return redirect()->route('dashboard.lessons.free-practice.results',
                [
                    'locale' => session('locale'),
                    'courseId' => $exercise->lesson->course->id,
                    'lessonId' => $exercise->lesson->id,
                    'submissionId' => $submission->id,
                ]);
        }
    }
}
