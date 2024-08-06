<?php

namespace App\Http\Middleware;

use App;
use Closure;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = $request->locale;
        $supportedLocales = [
            'en', 'en-EU', 'en-IN', 'en-JP', 'en-TW', 'en-TH', 'en-VN', 'en-PH', 'en-KR', 'th-TH', 'vi-VN', 'zh-CN', 'jp-JP', 'ko-KR',
        ];

        if (in_array($locale, $supportedLocales)) {
            App::setLocale($locale);
            session()->put('locale', $locale);
            session()->put('root', env('APP_URL'));

            // Dynamic path extraction
            $path = $this->extractPath($request->path(), $locale);
            session()->put('path', $path);

            // Generate canonical URL
            $englishUrl = url('/') . '/en/' . $path;
            view()->share('englishUrl', $englishUrl);
        } else {
            // Logic for non-localized pages
            session()->forget('path');
        }

        return $next($request);
    }

    private function extractPath($path, $locale)
    {
        // Assuming the locale is always at the start of the path
        $localePrefixLength = strlen($locale) + 1; // +1 for the slash
        return substr($path, $localePrefixLength);
    }
}
