<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Teacher;
use App\Models\User;

class MyTeacherController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id);

        $registrations = Registration::with('assignments')->where('teacher_id', $user->teacher_id)->where('status', 'active')->with('teacher')->get();

        $assignments = Assignment::where('teacher_id', $user->teacher_id)->get();

        return view('myteacher.index', ['assignments' => $assignments, 'registrations' => $registrations, 'user' => $user]);
    }

    public function showCourse($id)
    {
        $registration = Registration::where('id', $id)->first();

        return view('myteacher.courses.show', ['registration' => $registration]);
    }

    public function studentsIndex()
    {
        $user = auth()->user();

        $registrations = Registration::with('assignments')->where('teacher_id', $user->teacher_id)->where('active', '1')->with('teacher')->get();

        return view('myteacher.students.index', ['registrations' => $registrations, 'user' => $user]);
    }

    public function quizzesIndex()
    {
        return view('myteacher.quizzes.index');
    }

    public function coursesIndex()
    {
        $user = auth()->user();

        $registrations = Registration::with('assignments')->where('teacher_id', $user->teacher_id)->where('active', '1')->with('teacher')->get();

        return view('myteacher.courses.index', ['registrations' => $registrations]);
    }
}
