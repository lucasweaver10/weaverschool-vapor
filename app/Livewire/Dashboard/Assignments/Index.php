<?php

namespace App\Livewire\Dashboard\Assignments;

use Livewire\Component;

class Index extends Component
{
    public $registration;
    public $user;
    public $status = 'open';
    public $tab;

    protected $listeners = ['refreshAssignmentsIndex' => '$refresh'];

    protected $queryString = [
        'status',
    ];

    public function setStatus($newStatus)
    {
        $this->status = $newStatus;
    }

//    public function render()
//    {
//        $assignments = $this->registration->assignments
//            ->where('status', $this->status);
//
//        return view('livewire.dashboard.courses.assignments.index', [
//            'assignments' => $assignments,
//        ]);
//    }

    public function render()
    {
        return view('livewire.dashboard.assignments.index');
    }
}
