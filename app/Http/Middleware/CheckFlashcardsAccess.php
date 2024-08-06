<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckFlashcardsAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user has access to flashcards
        $user = $request->user();

        if (!$user->getDaysLeftInTrial() > 0 || !$user->subscribed('pro') || !$user->hasCourseRegistrations()) {
            return back()->with('error', "Your trial has expired. You'll need to subscribe to access flashcards.");
        }
        return $next($request);
    }
}
