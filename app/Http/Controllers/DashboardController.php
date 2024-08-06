<?php

namespace App\Http\Controllers;

use App\Models\FlashcardSet;
use App\Models\Plan;
use App\Models\Quiz;
use App\Models\StripeSubscription;
use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Teacher;
use App\Models\Assignment;
use App\Models\Subcategory;
use App\Models\Registration;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\PrivateLesson;
use App\Models\QuizAssignment;
use App\Models\QuizSubmission;
use Illuminate\Support\Facades\Auth;
use Segment\Segment;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $registrations = Registration::where('user_id', $user->id)
            ->with('teacher')->with('assignments')->get();

        return view('dashboard.index', [
            'user' => $user,
            'registrations' => $registrations,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function payments()
    {
        $user = auth()->user();
        $registrations = Registration::where('user_id', $user->id)->get();
        $subscriptions = StripeSubscription::where('user_id', $user->id)->get();

        return view('dashboard.payments.index',
            compact('user', 'registrations', 'subscriptions'));
    }

    public function assignments()
    {
        $registrations = Registration::all()->with('assignments');

        return view ('dashboard.assignments', []);
    }

    public function courseIndex()
    {
        $user = auth()->user();

        $registrations = Registration::where('user_id', $user->id)->with('course')->get();

        return view('dashboard.courses.index', ['registrations' => $registrations]);
    }

    public function courseShow($locale, $id, Request $request)
    {
        $user = auth()->user();
        $registration = $user->registrations->where('course_id', $id)->first();
        $course = Course::find($id);

        return view('dashboard.courses.show', ['registration' => $registration, 'id' => $id, 'course' => $course]);
    }

    public function subscriptions()
    {
        $user = auth()->user();        
        $subscriptions = $user->subscriptions;        

        return view('dashboard.subscriptions.index', [
            'subscriptions' => $subscriptions,
        ]);
    }

    public function companyIndex()
    {
        $user = auth()->user();

        return view('dashboard.company.index', [
            'user' => $user,
        ]);

    }

    public function lessonIndex($locale, $courseId)
    {
        $user = auth()->user();        
        $registration = $user->registrations->where('course_id', $courseId)->firstOrFail();
        $course = Course::find($courseId);
        $lessons = Lesson::where('course_id', $courseId)->get();

        return view('dashboard.lessons.index', compact('course', 'lessons', 'registration'));
    }

    public function lessonShow($locale, $courseId, $lessonId)
    {
        $user = auth()->user();
        $course = Course::find($courseId);
        $lesson = Lesson::find($lessonId);
        $registration = $user->registrations->where('course_id', $courseId)->firstOrFail();

        return view('dashboard.lessons.show',
            compact('course','lesson', 'user', 'registration'));
    }

    public function goToNextLesson($locale, $currentLessonId)
    {
        $user = auth()->user();

        $currentLesson = Lesson::find($currentLessonId);

        $nextLesson = Lesson::where('course_id', $currentLesson->course->id)
            ->where('id', '>', $currentLessonId)
            ->orderBy('id')
            ->first();

        $currentProgress = $currentLesson->progress->where('user_id', $user->id)
            ->where('lesson_id', $currentLesson->id)->firstOrFail();

        if($currentProgress->completed_at == null) {
            $currentProgress->update([
                'completed_at' => Carbon::now(),
            ]);

            Segment::track([
                "event" => "Lesson completed",
                "userId" => $user->id,
                "properties" => [
                    "lessonId" => $currentLesson->id,
                ]
            ]);
        }

        $nextProgress = $nextLesson->progress->where('user_id', $user->id)
            ->where('lesson_id', $nextLesson->id)->firstOrFail();

        $nextProgress->update([
            'started_at' => Carbon::now(),
        ]);

        if($nextLesson) {
            return redirect()->route('dashboard.lessons.show',
                ['locale' => session('locale', 'en'), 'courseId' => $currentLesson->course_id,
                    'lessonId' => $nextLesson->id]);
        }
        else {
            return redirect()->route('dashboard.courses.show',
                ['locale' => session('locale', 'en'), 'id' => $currentLesson->course_id]);
        }
    }

    public function vocabularyWordsIndex($locale, $courseId, $lessonId)
    {
        $course = Course::find($courseId);
        $lesson = Lesson::find($lessonId);
        $registration = auth()->user()->registrations->where('course_id', $courseId)->firstOrFail();
        $vocabularyWords = $lesson->vocabularyWords;

        return view('dashboard.lessons.vocabulary-words.index',
            compact('course', 'lesson', 'vocabularyWords', 'registration'));

    }

    public function guidedPracticeShow($locale, $courseId, $lessonId)
    {
        $course = Course::findOrFail($courseId);
        $lesson = Lesson::find($lessonId);
        $registration = auth()->user()->registrations->where('course_id', $courseId)->firstOrFail();

        return view('dashboard.lessons.guided-practice.show',
            compact('course', 'lesson', 'registration'));

    }

    public function freePracticeShow($locale, $courseId, $lessonId)
    {
        $course = Course::find($courseId);
        $lesson = Lesson::find($lessonId);
        $exercise = $lesson->exercises->where('type', 'Free Practice')->first();
        $registration = auth()->user()->registrations->where('course_id', $courseId)->firstOrFail();

        return view('dashboard.lessons.free-practice.show',
            compact('course', 'lesson', 'registration', 'exercise'));

    }

    public function quizShow($locale, $courseId, $lessonId)
    {
        $course = Course::find($courseId);
        $lesson = Lesson::find($lessonId);
        $quiz = Quiz::where('lesson_id', $lessonId)->with('questions')->first();
        $registration = auth()->user()->registrations->where('course_id', $courseId)->firstOrFail();

        return view('dashboard.lessons.quizzes.show', [
            'course' => $course,
            'lesson' => $lesson,
            'quiz' => $quiz,
            'registration' => $registration
        ]);

    }

    public function quizResultsShow($locale, $courseId, $lessonId)
    {
        $course = Course::find($courseId);
        $lesson = Lesson::find($lessonId);
        $quiz = Quiz::where('lesson_id', $lessonId)->firstOrFail();
        $registration = auth()->user()->registrations->where('course_id', $courseId)->firstOrFail();
        $submission = QuizSubmission::where('quiz_id', $quiz->id)->first();
        $results = json_decode($submission->results, true);

        return view('dashboard.lessons.quizzes.results',
            ['course' => $course, 'lesson' => $lesson, 'quiz' => $quiz, 'registration' => $registration,
                'results' => $results, 'submission' => $submission]);
    }

    public function flashcardIndex($locale, $courseId, $lessonId) {
        $course = Course::find($courseId);
        $lesson = Lesson::find($lessonId);
        $registration = auth()->user()->registrations->where('course_id', $courseId)->firstOrFail();
        $flashcardSet = $lesson->flashcardSet;
        $id = $flashcardSet->id;
        $flashcards = $flashcardSet->flashcards->shuffle();
        $neuralBreaks = number_format((ceil($flashcards->count() * .1)), 0);

        if($flashcards->count() > 9) {
            $randomKeys = array_rand(range(1, $flashcards->count() - 2), $neuralBreaks);
            $randomNumbers = array_map(function ($key) {
                return $key + 1;
            }, $randomKeys);
        }
        else {
            $randomNumbers = [1];
        }

        $totalWords = $flashcards->count();

        return view('flashcards.index',
            compact(
                'flashcards',
                'randomNumbers',
                'totalWords',
                'id'));
    }
}
