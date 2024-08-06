<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Segment\Segment;

class SegmentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Segment::init('zK9nJmPqUPLB6tjQWjqLlEbVKWvyW9bW');
    }
}
