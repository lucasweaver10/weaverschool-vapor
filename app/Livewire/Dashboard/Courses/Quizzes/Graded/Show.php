<?php

namespace App\Livewire\Dashboard\Courses\Quizzes\Graded;

use Livewire\Component;

class Show extends Component
{
    public $assignedQuiz;

    public function render()
    {
        return view('livewire.dashboard.courses.quizzes.graded.show');
    }
}
