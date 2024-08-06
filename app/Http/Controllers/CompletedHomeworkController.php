<?php

namespace App\Http\Controllers;

use App\Models\CompletedHomework;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompletedHomeworkController extends Controller
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
        if ($request->hasFile('uploads')) {

            foreach ($request->file('uploads') as $upload) {

                $extension = $upload->getClientOriginalExtension();

                $originalFileName = pathinfo($upload->getClientOriginalName(), PATHINFO_FILENAME);

                $filename = $originalFileName . '_' . now()->timestamp . '.' . $extension;

                $upload->storeAs('/homework/', $filename, 's3');

                $homework = [
                    'assignment_id' => $assignment->id,
                    'filename' => $filename,
                    'extension' => $extension,
                    'size' => $upload->getSize(),
                ];

                CompletedHomework::create($homework);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompletedHomework  $completedHomework
     * @return \Illuminate\Http\Response
     */
    public function show(CompletedHomework $completedHomework, $filename)
    {
        $homework = CompletedHomework::where('filename', $filename)->get()->first();

        if ($homework->extension == 'pdf') {
            return response(Storage::disk('s3')->get('completed-homework/' . $filename))->header('Content-Type', 'application/pdf');
        }
        else {
            return response(Storage::disk('s3')->get('completed-homework/' . $filename))->header('Content-Type', 'application/' . $homework->extension );
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompletedHomework  $completedHomework
     * @return \Illuminate\Http\Response
     */
    public function edit(CompletedHomework $completedHomework)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompletedHomework  $completedHomework
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompletedHomework $completedHomework)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompletedHomework  $completedHomework
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompletedHomework $completedHomework)
    {
        //
    }
}
