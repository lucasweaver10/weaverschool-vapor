<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Course;
use App\Models\PrivateLesson;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Course $course, Location $location, privateLesson $privateLessons, Request $request)
    {
        $courses = Course::all();
        $privateLessons = PrivateLesson::all();
        $locations = Location::all();

        return view('locations.index', [
            'locations' => $locations,
            'courses' => $courses,
            'privateLessons' => $privateLessons,
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
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show($locationId, Location $location, Course $course, privateLesson $privateLesson, Request $request)
    {
        $courses = Course::all();
        $privateLessons = PrivateLesson::all();

        \App::setLocale($request->locale);

        return view('locations.show', compact('location'), [
            'courses' => $courses,
            'privateLessons' => $privateLessons,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        //
    }
}
