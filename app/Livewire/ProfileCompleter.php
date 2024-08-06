<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;
use Segment\Segment;

class ProfileCompleter extends Component
{
    public $firstName;
    public $lastName;
    public $user;

    public function save()
    {
        $user = Auth::user();

        User::where('id', $user->id)->update([
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'profile_complete' => 1,
        ]);

        $user = User::where('id', $user->id)->first();

        Segment::identify([
            "userId" => "$user->id",
            "traits" => [
                "email" => $user->email,
                "firstName" => $this->firstName,
                "lastName" => $this->lastName,
            ],
        ]);

        Segment::track([
            "event" => "Profile Completed",
            "userId" => $this->user->id,
        ]);

//        $mollie = new \Mollie\Api\MollieApiClient();
//        $mollie->setApiKey(env('MOLLIE_KEY'));
//
//        $customer = $mollie->customers->get("$user->mollie_customer_id");
//        $customer->name = $user->first_name . ' ' . $user->last_name;
//        $customer->update();

        session()->flash('success', 'Profile complete!');

        return redirect()->to('/dashboard');
    }

    public function render()
    {
        return view('livewire.profile-completer');
    }
}
