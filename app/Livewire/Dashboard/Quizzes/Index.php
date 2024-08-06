<?php

namespace App\Livewire\Dashboard\Quizzes;

use App\Models\Quiz;
use App\Models\QuizAssignment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $user;

    public function render()
    {
        $userId = Auth::id();

        $user =  User::find($userId);

        $quizAssignments = QuizAssignment::where('user_id', $userId)->get();

        return view('livewire.dashboard.quizzes.index', ['user' => $user, 'quizAssignments' => $quizAssignments]);
    }
}
