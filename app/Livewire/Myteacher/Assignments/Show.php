<?php

namespace App\Livewire\Myteacher\Assignments;

use Livewire\Component;
use App\Models\Assignment;

class Show extends Component
{
    public $assignment;
    public $completed;
    public $assignmentId;
    public $score;
    public $feedback;
    public $loading;

    public function save()
    {
        $assignment = Assignment::find($this->assignment->id);

        $assignment->update([
            'score' => $this->score,
            'feedback' => $this->feedback,
            'status' => 'graded',
        ]);

        $this->score = '';
        $this->feedback = '';

        session()->flash('success', 'Score and feedback saved.');

    }

    public function render()
    {
        $this->completed = $this->assignment->completed;
        return view('livewire.myteacher.assignments.show');
    }
}
