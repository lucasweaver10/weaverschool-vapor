<?php

namespace App\Livewire\Dashboard\Assignments;

use Carbon\Carbon;
use Livewire\Component;

class Show extends Component
{
    public $assignment;
    public $assignmentId;

    protected $listeners = ['refreshAssignment' => '$refresh'];

    public function completeAssignment()
    {
        $timestamp = Carbon::now()->toDateTimeString();

        $this->assignment->update([
            'status' => 'completed',
            'completed_date' => Carbon::now()->toDateTimeString(),
        ]);

        session()->flash('success', 'Assignment completed!');

        $this->dispatch('refreshAssignmentsIndex');
    }

    public function render()
    {
        return view('livewire.dashboard.assignments.show');
    }
}
