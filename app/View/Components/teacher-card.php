<?php

namespace App\View\Components;

use Illuminate\View\Component;

class teacher-card extends Component
{

    public $teacher;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($teacher)
    {
        $this->teacher = $teacher;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.teacher-card');
    }
}
