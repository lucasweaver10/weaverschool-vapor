<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;

class Payments extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $user;
    public $registrations;
    public $subscriptions;

    public function __construct($user, $registrations, $subscriptions)
    {
        $this->user = $user;
        $this->registrations = $registrations;
        $this->subscriptions = $subscriptions;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.payments');
    }
}
