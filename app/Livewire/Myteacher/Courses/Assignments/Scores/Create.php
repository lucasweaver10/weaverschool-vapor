<?php

namespace App\Livewire\Myteacher\Courses\Assignments\Scores;

use App\Models\Assignment;
use App\Notifications\AssignmentGraded;
use Livewire\Component;

class Create extends Component
{
    public $assignment;
    public $assignmentId;
    public $score;
    public $feedback;
    public $loading;

    public function save()
    {
        $assignment = Assignment::find($this->assignmentId);

        $assignment->update([
            'score' => $this->score,
            'feedback' => $this->feedback,
            'status' => 'graded',
        ]);

        $assignment->user->notify(new AssignmentGraded($assignment));

        $this->score = '';
        $this->feedback = '';

        session()->flash('success', 'Score and feedback saved.');

        $this->dispatchUp('refreshAssignment');

    }

    public function render()
    {
        return view('livewire.myteacher.courses.assignments.scores.create');
    }
}
