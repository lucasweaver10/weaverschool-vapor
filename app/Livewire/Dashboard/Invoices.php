<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class Invoices extends Component
{
    public $user;
    public $registrations;

    public function render()
    {
        return view('livewire.dashboard.invoices');
    }
}
