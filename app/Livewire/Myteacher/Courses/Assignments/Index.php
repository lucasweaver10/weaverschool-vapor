<?php

namespace App\Livewire\Myteacher\Courses\Assignments;

use Livewire\Component;

class Index extends Component
{
    public $registration;
    public $user;
    public $status = 'open';

    protected $listeners = ['refreshAssignmentsIndex' => '$refresh' ];

    protected $queryString = [
        'status',
    ];

    public function setStatus($newStatus)
    {
        $this->status = $newStatus;
    }

    public function render()
    {
        $assignments = $this->registration->assignments->where('status', $this->status);

        return view('livewire.myteacher.courses.assignments.index', [
            'assignments' => $assignments,
        ]);
    }
}
