<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use App\Models\LessonPlan;
use App\Models\Lesson;
use Illuminate\Http\Request;

class OcoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Course $course)
    {
        $ocourses = Course::where('experience', 'online')->get();

        $user = auth()->user();

        return view('ocourses.index', [
            'ocourses' => $ocourses,
            'user' => $user,
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ecourse  $ecourse
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ocourse = Course::where('id', $id)->with('plans')->first();

        $plans = $ocourse->plans;

        $lessonPlan = LessonPlan::where('course_id', $id)->first();

        $lessonPlanId = $lessonPlan->id;

        // $lessons = Lesson::where('lesson_plan_id', $lessonPlanId)->get();

        $teacher = Teacher::findOrFail($ocourse->teacher_id);

        return view('ocourses.show', compact('ocourse', 'teacher', 'lessonPlan', 'plans'));
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ecourse  $ecourse
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ecourse  $ecourse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ecourse  $ecourse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $oourse)
    {
        //
    }
}
