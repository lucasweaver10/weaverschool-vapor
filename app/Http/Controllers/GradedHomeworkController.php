<?php

namespace App\Http\Controllers;

use App\Models\GradedHomework;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GradedHomeworkController extends Controller
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
     * @param  \App\Models\GradedHomework  $gradedHomework
     * @return \Illuminate\Http\Response
     */
    public function show(GradedHomework $gradedHomework, $filename)
    {
        $homework = GradedHomework::where('filename', $filename)->get()->first();

        if ($homework->extension == 'pdf') {
            return response(Storage::disk('s3')->get('graded-homework/' . $filename))->header('Content-Type', 'application/pdf');
        }
        else {
            return response(Storage::disk('s3')->get('graded-homework/' . $filename))->header('Content-Type', 'application/' . $homework->extension );
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GradedHomework  $gradedHomework
     * @return \Illuminate\Http\Response
     */
    public function edit(GradedHomework $gradedHomework)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GradedHomework  $gradedHomework
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GradedHomework $gradedHomework)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GradedHomework  $gradedHomework
     * @return \Illuminate\Http\Response
     */
    public function destroy(GradedHomework $gradedHomework)
    {
        //
    }
}
