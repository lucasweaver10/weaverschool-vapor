<?php

namespace App\Http\Controllers;

use App\Models\AssignmentAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AssignmentAttachmentController extends Controller
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
     * @param  \App\Models\AssignmentAttachment  $assignmentAttachment
     * @return \Illuminate\Http\Response
     */
    public function show(AssignmentAttachment $assignmentAttachment, $filename)
    {
      $attachment = AssignmentAttachment::where('filename', $filename)->get()->first();

      if ($attachment->extension == 'pdf') {
      return response(Storage::disk('s3')->get('attachments/' . $filename))->header('Content-Type', 'application/pdf');
      }
      else {
        return response(Storage::disk('s3')->get('attachments/' . $filename))->header('Content-Type', 'application/' . $attachment->extension );
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssignmentAttachment  $assignmentAttachment
     * @return \Illuminate\Http\Response
     */
    public function edit(AssignmentAttachment $assignmentAttachment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssignmentAttachment  $assignmentAttachment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssignmentAttachment $assignmentAttachment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssignmentAttachment  $assignmentAttachment
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssignmentAttachment $assignmentAttachment)
    {
        //
    }

    public function download($filename)
    {
//        dd($filename->extension);

        return response(Storage::disk('s3')->get('attachments/' . $filename))->header('Content-Type', 'application/pdf');
    }
}
