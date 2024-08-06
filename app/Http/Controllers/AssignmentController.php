<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\AssignmentAttachment;
use App\Models\Group;
use App\Models\Teacher;
use App\Models\Worksheet;
use App\Models\Registration;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index($id, Request $request)
//    {
//        $id = $request->id;
//
//        $registration = Registration::where('id', $id)->first();
//
//        $assignments = Assignment::with('registration', 'attachments')->where('registration_id', $id)->get();
//
//        return view ('dashboard.assignments.index', ['assignments' => $assignments, 'id' => $id, 'registration' => $registration]);
//    }

    public function dashboardIndex()
    {
        $user =  auth()->user();

        return view('dashboard.assignments.index', ['user' => $user]);
    }

    public function myteacherIndex()
    {
        $user = auth()->user();

        $teacher = Teacher::where('user_id', Auth::id())->first();

        return view('myteacher.assignments.index', ['user' => $user, 'teacher' => $teacher]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teacher = Teacher::where('user_id', Auth::id())->first();

        $registrations = Registration::where('teacher_id', $teacher->id)->get();

        $groups = Group::where('teacher_id', $teacher->id )->get();

        return view('myteacher.assignments.create', ['groups' => $groups, 'registrations' => $registrations]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dueDate = date_create_from_format('Y-m-d H:i:s', $request->selected_date . ' ' . '22:00:00');

        $data = [
            'teacher_id' => $request->teacher_id,
            'user_id' => $request->user_id,
            'registration_id' => $request->registration_id,
            'title' => $request->title,
            'content' => $request->content,
            'due_date' => $dueDate
        ];

        $assignment = Assignment::create($data);

        if ($request->hasFile('attachments')) {

            foreach ($request->file('attachments') as $attachment) {

                $extension = $attachment->getClientOriginalExtension();

                $originalFileName = pathinfo($attachment->getClientOriginalName(), PATHINFO_FILENAME);

                $filename = $originalFileName . '_' . now()->timestamp . '.' . $extension;

                $attachment->storeAs('/attachments/', $filename, 's3');

                $assignmentAttachment = [
                    'assignment_id' => $assignment->id,
                    'filename' => $filename,
                    'extension' => $extension,
                    'size' => $attachment->getSize(),
                ];

                AssignmentAttachment::create($assignmentAttachment);
            }
        }

        session()->flash('success', 'Assignment created!');

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show(Assignment $assignment, $id)
    {
        $assignments = Assignment::with('registration', 'attachments')->where('id', $id)->get();

        return view ('dashboard.assignments', ['assignments' => $assignments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assignment $assignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assignment $assignment)
    {
        //
    }

    public function complete($id)
    {
        $assignment = Assignment::find($id);

        $assignment->completed = 1;

        $assignment->save();

        session()->flash('success', 'Assignment completed!');

        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assignment $assignment)
    {
        //
    }
}
