<?php

namespace App\View\Components\Courses;

use Illuminate\View\Component;

class Cta extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $course;

    public function __construct($course)
    {
        $this->course = $course;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.courses.cta');
    }
}
