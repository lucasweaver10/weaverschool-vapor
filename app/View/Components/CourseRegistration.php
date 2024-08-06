<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CourseRegistration extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $privateLessons;
    public $courses;

    public function __construct($privateLessons, $courses)
    {
        $this->privateLessons = $privateLessons;
        $this->courses = $courses;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.course-registration');
    }
}
