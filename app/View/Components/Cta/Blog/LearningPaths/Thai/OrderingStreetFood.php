<?php

namespace App\View\Components\Cta\Blog\LearningPaths\Thai;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OrderingStreetFood extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cta.blog.learning-paths.thai.ordering-street-food');
    }
}
