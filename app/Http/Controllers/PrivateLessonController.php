<?php

namespace App\Http\Controllers;

use App\Mail\CourseRegistrationNotification;
use App\Mail\PrivateLessonsRequest;
use App\Models\Course;
use App\Models\PrivateLesson;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PrivateLessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $privateLessons = PrivateLesson::where('available', 1)->get();
//        $courses = Course::where('available', 1)->where('type', 'private')->get();

        return view('privateLessons.index', ['privateLessons' => $privateLessons]);
    }

    public function onlineIndex()
    {
//        dd($locale);
//        $privateLessons = PrivateLesson::where('experience', 'online')->where('subcategory_id', '1')->get();

        $courses = Course::where('available', 1)->where('subcategory_id', 1)->where('type', 'private')->get();

        return view('privateLessons.english.online.index', compact('courses'));
    }

    public function onlineShow($locale, $slug)
    {
        $course = PrivateLesson::where('slug', $slug)
            ->where('available', 1)
            ->where('subcategory_id', 1)
            ->first();

        if (!$course) {
            // You can redirect to a custom error page or back to a previous page with an error message
            return response()->view('errors.404', [], 404);
        }

        $plans = $course->plans ?? null;

        $teachers = Teacher::where('active', true)
            ->where('subcategory_id', $course->subcategory_id)
            ->inRandomOrder()
            ->get();

        return view('privateLessons.english.online.show', compact('course', 'teachers', 'plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function requestEnglish()
    {
        return view('private-lessons.requests.english.create');
    }

    public function requestThai()
    {
        return view('private-lessons.requests.thai.create');
    }

    public function requestVietnamese()
    {
        return view('private-lessons.requests.vietnamese.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeRequestEnglish(Request $request)
    {
        $data = $request->all();
        $data['url'] = $request->url();
        Mail::to('lucas@weaverschool.com')->send(new PrivateLessonsRequest($data));
        return back()->with("success", "Thank you for your request. We'll be in touch within 24 hours.");
    }

    public function storeRequestThai(Request $request)
    {
        $data = $request->all();
        $data['url'] = $request->url();
        Mail::to('lucas@weaverschool.com')->send(new PrivateLessonsRequest($data));
        return back()->with("success", "Thank you for your request. We'll be in touch within 24 hours.");
    }

    public function storeRequestVietnamese(Request $request)
    {
        $data = $request->all();
        $data['url'] = $request->url();
        Mail::to('lucas@weaverschool.com')->send(new PrivateLessonsRequest($data));
        return back()->with("success", "Thank you for your request. We'll be in touch within 24 hours.");
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\PrivateLesson  $privateLesson
     * @return \Illuminate\Http\Response
     */

//    public function OnlineShow($locale, $slug)
//    {
//        $privateLesson = PrivateLesson::where('slug', $slug)->first();
//
//        $teachers = Teacher::where('active', true)->where('subcategory_id', $privateLesson->subcategory_id)->inRandomOrder()->get();
//
//        return view('privateLessons.english.online.show', compact('privateLesson', 'teachers'));
//    }

    public function DutchOnlineShow($locale, $slug)
    {
        $privateLesson = PrivateLesson::where('slug', $slug)->first();

        $teachers = Teacher::where('active', true)->where('subcategory_id', $privateLesson->subcategory_id)->inRandomOrder()->get();

        return view('privateLessons.dutch.online.show', compact('privateLesson', 'teachers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PrivateLesson  $privateLesson
     * @return \Illuminate\Http\Response
     */
    public function edit(PrivateLesson $privateLesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PrivateLesson  $privateLesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PrivateLesson $privateLesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PrivateLesson  $privateLesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrivateLesson $privateLesson)
    {
        //
    }

    public function show() {
        $privateLesson = PrivateLesson::where('subcategory_id', 1)->first();

        return view('privateLessons.show', compact('privateLesson'));
    }
}
