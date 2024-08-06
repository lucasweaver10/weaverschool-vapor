<!DOCTYPE HTML>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset = "UTF-8" />
    <link rel="icon"
          type="image/svg"
          href="{{config('app.favicon')}}">

    <title>{{ $title ?? env('APP_NAME') }}</title>
    <meta property='og:title' content="{{ $title ?? env('APP_NAME') }}"/>
    <meta name="description" content="{{ $description ?? '' }}"/>
    <meta property='og:description' content="{{ $description ?? '' }}"/>
    <meta property='og:url' content="{{ url()->current() }}"/>
    <meta property="og:image" content="{{ $image ?? asset('/images/pages/online-language-courses.jpg') }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="{{ $image ?? asset('/images/pages/online-language-courses.jpg') }}">

    <x-app.scripts-head></x-app.scripts-head>

    <x-app.schema/>
    <x-app.gtm-head/>
</head>

<body>
<x-app.styles/>
<x-app.gtm-body/>

<div id="app">
    <x-alerts.success>
    </x-alerts.success>

    @if(session()->has('impersonate'))
        <div class="relative bg-red-600">
            <div class="max-w-screen-xl mx-auto pt-3 pb-2 px-3 sm:px-6 lg:px-8">
                <div class="pr-16 sm:text-center sm:px-16">
                    <p class="font-medium text-white">
                            <span class="md:hidden">
                                You are impersonating {{auth()->user()->first_name ?? ''}} {{auth()->user()->last_name ?? ''}}
                            </span>
                        <span class="hidden md:inline">
                                You are impersonating {{auth()->user()->first_name ?? ''}} {{auth()->user()->last_name ?? ''}}
                            </span>
                        <span class="block sm:ml-2 sm:inline-block">
                                <a href="{{route('leave-impersonation')}}" class="text-white font-bold underline">
                                    Leave Impersonation &rarr;
                                </a>
                            </span>
                    </p>
                </div>
            </div>
        </div>
    @endif

    <x-navbars.squeeze-dark />
    {{ $slot }}

</div>

<x-app.scripts-body/>

</body>
</html>
