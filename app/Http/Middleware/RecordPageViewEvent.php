<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Event;

class RecordPageViewEvent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if( app('env') == 'local' ) {
            return $next($request);
        }

        $uri = $request->getRequestUri();

        $isLivewireRequest = $request->header('X-Livewire');

        if (preg_match('/\.(jpg|png|css|js|ico)$/', $uri) || $isLivewireRequest) {
            return $next($request);
        }

        // Get user ID and/or session ID (as your anonymous ID)
        $userId = auth()->id();
        $uniqueID = $request->session()->get('uniqueID');

        // Get UTM parameters, referrer, and other details
        $utmParameters = $request->only(['utm_source', 'utm_medium', 'utm_campaign']);
        $referrer = $request->headers->get('referer');
        $pageTitle = 'Your Page Title Here'; // Retrieve this dynamically, if possible

        // Store in the Events table
        Event::create([
            'user_id' => $userId,
            'anonymous_id' => $uniqueID,
            'name' => 'Page View',
            'properties' => json_encode([
                'url' => $request->fullUrl(),
                'utm_parameters' => $utmParameters,
                'referrer' => $referrer,
            ]),
        ]);

        return $next($request);
    }
}
