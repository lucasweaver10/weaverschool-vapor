<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Registration extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $privateLessons;
    public $courses;
    public $teachers;

    public function __construct($privateLessons, $courses, $teachers)
    {
        $this->privateLessons = $privateLessons;
        $this->courses = $courses;
        $this->teachers = $teachers;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.registration');
    }
}
