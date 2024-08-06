<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class Welcome extends Component
{
    public $registrations;
    public $openAssignments;
    public $gradedAssignments;
    public $openQuizzes;

    public function render()
    {
        return view('livewire.dashboard.welcome');
    }
}
