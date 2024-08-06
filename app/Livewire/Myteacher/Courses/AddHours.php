<?php

namespace App\Livewire\Myteacher\Courses;

use Livewire\Component;

class AddHours extends Component
{
    public $registration;
    public $lessonHours = '';

    public function addHours()
    {
        $this->registration->hours_completed = ( $this->registration->hours_completed + $this->lessonHours );

        $this->registration->save();

        session()->flash('success', 'Hours added');

        $this->lessonHours = '';

    }

    public function render()
    {
        return view('livewire.myteacher.courses.add-hours');
    }
}
