<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class DiscussionQuestionController extends Controller
{
    public function index(Lesson $lesson)
    {
        $lesson = Lesson::with('vocabularyWords', 'grammarTopics', 'discussionQuestions')->find($lesson->id);

        return view('admin.lessons.discussion-questions.index', compact('lesson'));
    }
}
