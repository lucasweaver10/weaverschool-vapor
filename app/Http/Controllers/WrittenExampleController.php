<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class WrittenExampleController extends Controller
{
    public function index(Lesson $lesson)
    {
        $lesson = Lesson::with('vocabularyWords', 'grammarTopics', 'writtenExamples')->find($lesson->id);

        return view('admin.lessons.written-examples.index', compact('lesson'));
    }
}
