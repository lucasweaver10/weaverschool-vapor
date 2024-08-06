<?php

namespace App\Livewire\Registrations;

use Livewire\Component;

class AddHours extends Component
{
    public $registration;
    public $additionalHours;

    public function addHours() {
        $this->registration->total_hours = $this->registration->total_hours + $this->additionalHours;

        $this->registration->outstanding_balance = $this->additionalHours * $this->registration->hourly_rate;

        $this->registration->save();

        session()->flash('success', 'Hours added! Make sure to pay your new balance.');

        $this->additionalHours = '';
    }

    public function render()
    {
        return view('livewire.registrations.add-hours');
    }
}
