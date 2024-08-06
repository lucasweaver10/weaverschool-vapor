<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseProgressController extends Controller
{
    public function index($locale, $id)
    {
        $user = auth()->user();        

        $course = Course::find($id);

        $progress = $course->progress->where('user_id', $user->id)->where('course_id', $course->id)->first();

        // $lessonProgresses = $progress->lessonProgresses;

        return view ('dashboard.courses.progress.index', compact('course', 'progress'));
    }
}
