<?php

namespace App\View\Components\Cta\BetaTester;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class JoinWaitingList extends Component
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
        return view('components.cta.beta-tester.join-waiting-list');
    }
}
