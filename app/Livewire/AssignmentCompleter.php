<?php

namespace App\Livewire;

use App\Notifications\AssignmentCompleted;
use Livewire\Component;

use App\Models\Assignment;

class AssignmentCompleter extends Component
{
    public $assignmentId;
    public $completed = 0;

    protected $listeners = ['complete'];

    public function complete()
    {
        $assignment = Assignment::find($this->assignmentId);

        $assignment->update([
            'completed' => 1,
        ]);

        $this->completed = 1;

        $assignment->teacher->notify(new AssignmentCompleted($assignment));

        session()->flash('success', 'Assignment completed!');

        // return back();
    }

    public function render()
    {
        return view('livewire.assignment-completer');
    }
}
