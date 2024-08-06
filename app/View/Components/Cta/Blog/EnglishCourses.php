<?php

namespace App\View\Components\Cta\Blog;

use Illuminate\View\Component;

class EnglishCourses extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cta.blog.english-courses');
    }
}
