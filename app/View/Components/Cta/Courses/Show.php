<?php

namespace App\View\Components\Cta\Courses;

use Illuminate\View\Component;

class Show extends Component
{
    /**
     * The button url.
     *
     * @var string
     */
    public $url;

    public $subcategory;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($url = null, $subcategory = null)
    {
        $this->url = $url;
        $this->subcategory = $subcategory;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cta.courses.show');
    }
}
