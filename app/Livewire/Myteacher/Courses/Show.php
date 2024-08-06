<?php

namespace App\Livewire\Myteacher\Courses;

use Livewire\Component;

class Show extends Component
{
    public $registration;
    public $selection = 0;
    public $content = 'overview';
    public $tab;

    protected $listeners = ['contentSelected', 'tabSelected'];

    protected $queryString = [
        'tab',
        'content',
    ];

    public function tabSelected($newTab)
    {
        $this->content = 'overview';
    }

    public function contentSelected($newContent)
    {
        $this->content = $newContent;
    }

    public function render()
    {
        $totalPoints = (collect($this->registration->assignments)->sum('score') + collect($this->registration->quizAssignments)->sum('score')) * 10;
        $possiblePoints = (count($this->registration->assignments) + count($this->registration->quizAssignments)) * 10;

        return view('livewire.myteacher.courses.show', ['totalPoints' => $totalPoints, 'possiblePoints' => $possiblePoints]);
    }
}
