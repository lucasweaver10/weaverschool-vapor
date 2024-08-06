<?php

namespace App\View\Components\teacher;

use Illuminate\View\Component;

class sidebar extends Component
{

    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $registrations;

     public function __construct($registrations)
    {
        $this->registrations = $registrations;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.teacher.sidebar');
    }
}
