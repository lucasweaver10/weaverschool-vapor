<?php

namespace App\Livewire\Assignments;

use Livewire\Component;
use App\Models\Assignment;

class Show extends Component
{
    public $assignment;
    public $completed;
    public $assignmentId;

    public function complete()
    {
        $assignment = Assignment::find($this->assignmentId);

        $assignment->update([
            'completed' => 1,
        ]);

        $this->completed = 1;

        session()->flash('success', 'Assignment completed!');

        // return back();
    }

    public function render()
    {
        $this->completed = $this->assignment->completed;
        return view('livewire.assignments.show');
    }
}
