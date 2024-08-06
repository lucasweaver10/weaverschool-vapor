<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StripeScripts extends Component
{

    public $publishableKey;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($publishableKey)
    {
        $this->publishableKey = $publishableKey;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.stripe-scripts');
    }
}
