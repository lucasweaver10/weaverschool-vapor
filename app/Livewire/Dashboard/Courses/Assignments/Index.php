<?php

namespace App\Livewire\Dashboard\Courses\Assignments;

use Livewire\Component;
use App\Models\Assignment;

class Index extends Component
{
    public $registration;
    public $user;
    public $status = 'open';
    public $tab;

    protected $listeners = ['refreshQuizzesIndex' => '$refresh'];

     protected $queryString = [
         'status',
     ];

    public function setStatus($newStatus)
    {
        $this->status = $newStatus;
    }

    public function render()
    {
        $assignments = $this->registration->assignments
        ->where('status', $this->status);

        return view('livewire.dashboard.courses.assignments.index', [
            'assignments' => $assignments,
        ]);
    }
}
