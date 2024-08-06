<?php

namespace App\View\Components\Heroes\PrivateLessons\Online;

use Illuminate\View\Component;

class Show extends Component
{
    public $privateLesson;

    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct($privateLesson)
    {
        $this->privateLesson = $privateLesson;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.heroes.privateLessons.online.show');
    }
}
