<?php

namespace App\View\Components\Testimonials;

use App\Models\Testimonial;
use Illuminate\View\Component;

class Carousel extends Component
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
        $testimonials = Testimonial::where('available', true)->get()->shuffle();

        return view('components.testimonials.carousel', ['testimonials' => $testimonials]);
    }
}
