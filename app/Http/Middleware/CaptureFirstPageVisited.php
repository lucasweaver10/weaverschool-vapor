<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CaptureFirstPageVisited
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
        if (!$request->session()->has('firstPageVisited')) {
            $request->session()->put('firstPageVisited', $request->fullUrl());
        }

        if (!$request->session()->has('referralCode')) {
            $request->session()->put('referralCode', $request->referralCode);
        }

        return $next($request);
    }

}
