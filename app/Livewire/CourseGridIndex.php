<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class CourseGridIndex extends Component
{

    public $courses = [];

    public function render()
    {
        return view('livewire.course-grid-index');
    }
}
