<?php

namespace App\Livewire\Dashboard\Courses;

use App\Models\Quiz;
use App\Models\QuizAssignment;
use Livewire\Component;
use App\Models\Registration;
use App\Models\User;

class Show extends Component
{
    public $registration;
    public $selection = 'open';
    public $content = 'overview';
    public $tab;

    protected $listeners = ['contentSelected', 'tabSelected'];

    protected $queryString = [];

    public function tabSelected($newTab)
    {
        if ($newTab === $this->registration->id) {
            $this->content = 'overview';

            $this->dispatch('contentSelected', $this->content);
        }

    }

    public function contentSelected($newContent)
    {
        $this->content = $newContent;
    }

    public function render()
    {
        $assignments = $this->registration->assignments->all();
//        $quizAssignments = $this->registration->quizAssignments->all();
        $openAssignments = $this->registration->assignments->where('status', 'open');
        $completedAssignments = $this->registration->assignments->where('status', 'completed');
        $gradedAssignments = $this->registration->assignments->where('status', 'graded');
        $quizAssignments = QuizAssignment::where('registration_id', $this->registration->id)->get();
        $openQuizzes =  $this->registration->quizAssignments->where('completed_at', null);
        $completedQuizzes = QuizAssignment::where('registration_id', $this->registration->id)->where('score', '!=', null)->get();
        $possiblePoints = (count($assignments) + count($quizAssignments)) * 10;
        $totalPoints = ((collect($assignments)->sum('score') + collect($quizAssignments)->sum('score'))) * 10;

        return view('livewire.dashboard.courses.show', ['assignments' => $assignments, 'openAssignments' => $openAssignments,
            'completedAssignments' => $completedAssignments, 'gradedAssignments' => $gradedAssignments, 'totalPoints' => $totalPoints,
            'possiblePoints' => $possiblePoints, 'quizAssignments' => $quizAssignments, 'openQuizzes' => $openQuizzes, 'completedQuizzes' => $completedQuizzes]);
    }
}
