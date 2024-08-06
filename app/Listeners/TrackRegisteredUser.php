<?php

namespace App\Listeners;

use App\Jobs\CreateBonusRegistration;
use App\Jobs\SendRegistrationReminder;
use App\Mail\Welcome\First as WelcomeFirst;
use App\Mail\Welcome\Ielts\First as IeltsFirst;
use App\Mail\NewUserNotification;
use App\Models\UserTrackingData;
use Illuminate\Auth\Events\Registered;
use App\Jobs\SendIeltsRegistrationReminder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\LevelTestSubmission;
use App\Models\User;
use Segment\Segment;
use Stripe\StripeClient;

class TrackRegisteredUser
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
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $user = $event->user;

        $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));
        $customer = $stripe->customers->create([
            'email' => $user->email,
        ]);

        $user->update([
            'stripe_id' => $customer->id,
        ]);

        $trackingData = UserTrackingData::create([
            'user_id' => $user->id,
            'anonymous_id' => session('uniqueID'),
            'first_page_visited' => session('firstPageVisited'),
            'converting_page_url' => session('convertingPageUrl'),
        ]);

        // Mail::to('lucas@weaverschool.com')->send(new NewUserNotification($user));

        if (strpos($trackingData->converting_page_url, 'flashcards') !== false) {
            // 'flashcards' is found in the URL, so do this
        } elseif(strpos($trackingData->converting_page_url, 'ielts') !== false) {
            Mail::to($user->email)->bcc('2144262@bcc.hubspot.com')->send(new IeltsFirst($user));
        } elseif(strpos($trackingData->converting_page_url, 'thai') !== false) {
        // 'flashcards' is not found in the URL, so do that
        } else {
        Mail::to($user->email)->bcc('2144262@bcc.hubspot.com')->send(new WelcomeFirst($user));
        }

        Segment::track([
            "userId" => $user->id,
            "event" => "Account Created",
            "properties" => [
                "email" => $user->email,
            ]
        ]);

    }
}
