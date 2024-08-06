<?php

namespace App\Livewire\Registrations;

use Livewire\Component;

class ChooseCourseType extends Component
{
    public $selection = 'Private Lessons';

    public function render()
    {
        return view('livewire.registrations.choose-course-type');
    }
}
