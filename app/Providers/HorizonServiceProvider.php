<?php

namespace App\Providers;

use Laravel\Horizon\Horizon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Laravel\Horizon\HorizonApplicationServiceProvider;

class HorizonServiceProvider extends HorizonApplicationServiceProvider
{
    protected function authorization()
    {
        Horizon::auth(function ($request) {
            return Auth::user()->hasRole('Owner');
        });
    }
    
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    // parent::boot();
        $this->authorization();

        // Horizon::routeSmsNotificationsTo('15556667777');
        Horizon::routeMailNotificationsTo('lucas@weaverschool.com');
        // Horizon::routeSlackNotificationsTo('slack-webhook-url', '#channel');
    }

    /**
     * Register the Horizon gate.
     *
     * This gate determines who can access Horizon in non-local environments.
     */
    protected function gate(): void
    {
        Gate::define('viewHorizon', function (User $user = null) {
            return true;
        });
    }
}
