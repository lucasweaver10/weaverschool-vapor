<?php

namespace App\Livewire\Dashboard\Courses\Assignments;

use App\Notifications\AssignmentCompleted;
use Livewire\Component;
use App\Models\Assignment;
use Carbon\Carbon;

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

        $this->assignment->teacher->notify(new AssignmentCompleted($this->assignment));

        $this->dispatch('refreshAssignmentsIndex');
    }

    public function render()
    {
        return view('livewire.dashboard.courses.assignments.show');
    }
}
