<?php

namespace App\Providers;

use App\Events\EmailOpened;
use App\Events\EmailClicked;
use App\Events\EmailDelivered;
use App\Events\EmailProcessed;
use App\Events\EmailUnsubscribed;
use App\Events\LessonPlanCreated;
use App\Listeners\TrackUserLogin;
use Illuminate\Auth\Events\Login;
use Laravel\Cashier\Subscription;
use App\Events\RegistrationCreated;
use App\Listeners\TrackRegistration;
use App\Listeners\SetUserIdInSession;
use App\Listeners\TrackNewlessonPlan;
use Illuminate\Support\Facades\Event;
use App\Listeners\EmailOpenedListener;
use App\Listeners\TrackRegisteredUser;
use Illuminate\Auth\Events\Registered;
use App\Listeners\EmailClickedListener;
use App\Listeners\EmailDeliveredListener;
use App\Listeners\EmailProcessedListener;
use App\Listeners\EmailUnsubscribedListener;
use App\Listeners\SubscriptionCreatedListener;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
            TrackRegisteredUser::class,
        ],
        Login::class => [
            TrackUserLogin::class,
            SetUserIdInSession::class,
        ],
        LessonPlanCreated::class => [
            TrackNewlessonPlan::class,
        ],
        RegistrationCreated::class => [
            TrackRegistration::class,
        ],
        WebhookReceived::class => [
            StripeEventListener::class,
        ],
        EmailClicked::class => [
            EmailClickedListener::class,
        ],
        EmailDelivered::class => [
            EmailDeliveredListener::class,
        ],
        EmailOpened::class => [
            EmailOpenedListener::class,
        ],
        EmailProcessed::class => [
            EmailProcessedListener::class,
        ],
        EmailBounced::class => [
            EmailBouncedListener::class,
        ],
        EmailUnsubscribed::class => [
            EmailUnsubscribedListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Subscription::created(function ($subscription) {
            app(SubscriptionCreatedListener::class)->handle($subscription);
        });
    }
}
