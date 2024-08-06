<?php

namespace App\Livewire\Myteacher\Quizzes;

use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $userId = Auth::id();

        $quizzes = Quiz::where('user_id', $userId)->get();

        return view('livewire.myteacher.quizzes.index', ['quizzes' => $quizzes]);
    }
}
