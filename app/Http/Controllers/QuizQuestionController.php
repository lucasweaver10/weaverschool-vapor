<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizQuestionController extends Controller
{
    public function index($id)
    {
        $quiz = Quiz::where('id', $id)->with('questions')->first();

//        dd($quiz);

        return view('myteacher.quizzes.questions.index', ['quiz' => $quiz]);
    }
}
