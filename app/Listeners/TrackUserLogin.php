<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Segment\Segment;
use Laravel\Cashier\Cashier;

class TrackUserLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $user)
    {
        $user = Auth::user();

        Segment::identify([
            "userId" => "$user->id",
            "traits" => [
                "email" => $user->email,
            ],
        ]);

        Segment::track([
            "userId" => $user->id,
            "event" => "Student Login",
            "properties" => [
                "email" => $user->email,
                "name" => $user->first_name,
            ]
        ]);

    }
}
