<?php

namespace App\Livewire\Myteacher\Courses;

use Livewire\Component;

class Index extends Component
{
    public $registrations;

    public function render()
    {
        return view('livewire.myteacher.courses.index');
    }
}
