<?php

namespace App\Livewire\Registrations;

use Livewire\Component;

class RegistrationTab extends Component
{
    public $courses;
    public $privateLessons;
    public $subcategories;
    public $teachers;
    public $step = 0;
    public $selection;
    public $selectedPrivateLessonsId;
    public $selectedCourseId;

    protected $listeners = ['courseSelected', 'registrationCompleted'];

    public function courseSelected($selection)
    {
        if ($selection === 'Private Lessons')
        {
            $this->selection = $selection;
            $this->selectedPrivateLessonsId = $this->privateLessons['0']['id'];
            $this->step = 1;
        }

        elseif ($selection === 'Group Course')
        {
            $this->selection = $selection;
            $this->selectedCourseId = $this->courses['0']['id'];
            $this->step = 1;
        }
        else {
            return back();
        }
    }

    public function registrationCompleted()
    {
        $this->step = 'completed';
    }

    public function render()
    {
        return view('livewire.registrations.registration-tab');
    }
}
