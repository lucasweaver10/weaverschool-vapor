<?php

namespace App\Livewire\Dashboard\Courses\Quizzes;

use Livewire\Component;

class Index extends Component
{
    public $registration;
    public $user;
    public $status = 'open';
    public $tab;

    protected $queryString = [
        'status',
    ];

    public function setStatus($newStatus)
    {
        $this->status = $newStatus;
    }

    public function render()
    {
        $quizzes = $this->registration->quizAssignments
            ->where('status', $this->status);

        $openQuizzes =  $this->registration->quizAssignments->where('completed_at', null);
        $gradedQuizzes =  $this->registration->quizAssignments->where('completed_at', '!==', null);

//        dd($quizzes);

        return view('livewire.dashboard.courses.quizzes.index', [
            'openQuizzes' => $openQuizzes,
            'gradedQuizzes' => $gradedQuizzes]);
    }
}
