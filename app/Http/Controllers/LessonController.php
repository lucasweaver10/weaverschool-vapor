<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\LessonPlan;
use App\Models\Flashcard;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::all();

        return view('lessons.index', ['lessons' => $lessons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();

        return view('admin.lessons.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'lesson_number' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'course_id' => 'required|integer|exists:courses,id'
        ]);

        $lesson = new Lesson();
        $lesson->lesson_number = $validatedData['lesson_number'];
        $lesson->title = $validatedData['title'];
        $lesson->description = $validatedData['description'];
        $lesson->course_id = $validatedData['course_id'];
        $lesson->save();

        return redirect()->route('admin.lessons.show', ['lessonId' => $lesson->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        return view('admin.lessons.show', compact('lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        $lesson = Lesson::with('vocabularyWords', 'grammarTopics', 'speakingTopics', 'writtenExamples')->find($lesson->id);
        $courses = Course::all();

        return view('admin.lessons.edit', compact('lesson', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
        $lesson->update(request()->validate([
            'name' => 'required',
            'description' => 'nullable',
            'lesson_plan_id' => 'required',
            'number' => 'nullable',
            'image' => 'nullable',
            'video' => 'nullable',
            'homework' => 'nullable',
            'resources' => 'nullable',
        ]));

        return redirect('/lessons/' . $lesson->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        //
    }

    public function flashcardsIndex(Lesson $lesson) {
        $flashcardSet = $lesson->flashcardSet;
        return view('admin.lessons.flashcards.index', compact('flashcardSet'));
    }

    public function flashcardsUpdate($flashcardId) {
        $flashcard = Flashcard::find($flashcardId);
        $flashcard->update(request()->validate([
            'term' => 'required',
            'definition' => 'required',
            'image_url' => 'required',
            'context' => 'nullable',
            'lesson_id' => 'nullable',
        ]));

        return redirect('/admin/lessons/' . $flashcard->set->lesson_id . '/flashcards');
    }
}
