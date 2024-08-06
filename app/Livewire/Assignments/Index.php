<?php

namespace App\Livewire\Assignments;

use Livewire\Component;

class Index extends Component
{
    public $assignment;
    public $completed;

    public function render()
    {
        $this->completed = $this->assignment->completed;
        return view('livewire.assignments.index');
    }
}
