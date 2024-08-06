<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Group;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Teacher;
use App\Models\Registration;
use Illuminate\Http\Request;
use App\Models\QuizAssignment;

class QuizController extends Controller
{
    public function create()
    {
        return view('myteacher.quizzes.create');
    }

    public function show($id)
    {
        $quiz = Quiz::where('id', $id)->with('questions')->first();

        return view('myteacher.quizzes.show', ['quiz' => $quiz]);
    }

    public function edit($id)
    {
        $quiz = Quiz::find($id);

        return view('myteacher.quizzes.edit', ['quiz' => $quiz]);
    }

    public function store(Request $request)
    {
    }

    public function dashboardIndex()
    {
        $user = auth()->user();

        return view('dashboard.quizzes.index', ['user' => $user]);
    }

    public function dashboardGradedIndex()
    {
        $user = auth()->user();

        return view('dashboard.quizzes.graded.index', ['user' => $user]);
    }

    public function dashboardShow($locale, $id)
    {
        $quiz = Quiz::find($id);

        return view('dashboard.quizzes.show', ['quiz' => $quiz]);
    }

    public function assign()
    {
//        $groups = Group::where('teacher_id', $teacher->id )->get();
        $user = auth()->user();
        $teacher = Teacher::find($user->teacher_id);
//        dd($teacher->groups);

        return view('myteacher.quizzes.assign', ['user' => $user, 'teacher' => $teacher]);
    }
}
