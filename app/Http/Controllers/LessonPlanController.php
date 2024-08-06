<?php

namespace App\Http\Controllers;

use App\Models\LessonPlan;
use App\Models\Course;
use Illuminate\Http\Request;

class LessonPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course)
    {
        $courses = Course::all();

        return view('lesson-plans.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'name' => 'required',
            'description' => 'nullable',
            'course_id' => 'nullable',
        ]);

        LessonPlan::create($attributes);

        return back()->with('success', 'Lesson plan successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LessonPlan  $lessonPlan
     * @return \Illuminate\Http\Response
     */
    public function show(LessonPlan $lessonPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LessonPlan  $lessonPlan
     * @return \Illuminate\Http\Response
     */
    public function edit(LessonPlan $lessonPlan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LessonPlan  $lessonPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LessonPlan $lessonPlan)
    {
        $lessonPlan->update(request()->validate([
            'name' => 'required',
            'description' => 'nullable',
            'course_id' => 'required',
        ]));

        return redirect('/lesson-plans/' . $lessonPlan->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LessonPlan  $lessonPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(LessonPlan $lessonPlan)
    {
        //
    }
}
