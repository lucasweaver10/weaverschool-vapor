<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class Assignment extends Component
{
    public $assignment;
    public $completed;

    public function render()
    {
        $this->completed = $this->assignment->completed;
        return view('livewire.assignment');
    }
}
