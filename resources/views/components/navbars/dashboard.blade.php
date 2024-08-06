@php $locale = App::getLocale(); @endphp
@php
    $url = request()->path();
    $path = substr("$url", 6);
@endphp
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <button href="/{{$locale}}" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/{{$locale}}">
        <img src="{{config('app.logo')}}" width="165" height="165" class="d-inline-block align-top"
             alt="The Weaver School logo">
    </a>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="nav navbar-nav">
        </ul>
        <ul class="navbar-nav ml-auto nav-cta">
            <li class="nav-item">
{{--                <svg class="h-6 w-6 mt-2.5 mr-4" viewBox="0 0 20 20" fill="currentColor">--}}
{{--                    <path fill-rule="evenodd" d="M4.083 9h1.946c.089-1.546.383-2.97.837-4.118A6.004 6.004 0 004.083 9zM10 2a8 8 0 100 16 8 8 0 000-16zm0 2c-.076 0-.232.032-.465.262-.238.234-.497.623-.737 1.182-.389.907-.673 2.142-.766 3.556h3.936c-.093-1.414-.377-2.649-.766-3.556-.24-.56-.5-.948-.737-1.182C10.232 4.032 10.076 4 10 4zm3.971 5c-.089-1.546-.383-2.97-.837-4.118A6.004 6.004 0 0115.917 9h-1.946zm-2.003 2H8.032c.093 1.414.377 2.649.766 3.556.24.56.5.948.737 1.182.233.23.389.262.465.262.076 0 .232-.032.465-.262.238-.234.498-.623.737-1.182.389-.907.673-2.142.766-3.556zm1.166 4.118c.454-1.147.748-2.572.837-4.118h1.946a6.004 6.004 0 01-2.783 4.118zm-6.268 0C6.412 13.97 6.118 12.546 6.03 11H4.083a6.004 6.004 0 002.783 4.118z" clip-rule="evenodd" />--}}
{{--                </svg>--}}
{{--            @unless ( $locale !== 'en-NL' and $locale !== 'nl-NL' and $locale !== 'de-DE')--}}
                <li class="nav-item dropdown">
                    <a class="nav-link" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="">
                        <svg class="h-6 w-6 mt-1 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.083 9h1.946c.089-1.546.383-2.97.837-4.118A6.004 6.004 0 004.083 9zM10 2a8 8 0 100 16 8 8 0 000-16zm0 2c-.076 0-.232.032-.465.262-.238.234-.497.623-.737 1.182-.389.907-.673 2.142-.766 3.556h3.936c-.093-1.414-.377-2.649-.766-3.556-.24-.56-.5-.948-.737-1.182C10.232 4.032 10.076 4 10 4zm3.971 5c-.089-1.546-.383-2.97-.837-4.118A6.004 6.004 0 0115.917 9h-1.946zm-2.003 2H8.032c.093 1.414.377 2.649.766 3.556.24.56.5.948.737 1.182.233.23.389.262.465.262.076 0 .232-.032.465-.262.238-.234.498-.623.737-1.182.389-.907.673-2.142.766-3.556zm1.166 4.118c.454-1.147.748-2.572.837-4.118h1.946a6.004 6.004 0 01-2.783 4.118zm-6.268 0C6.412 13.97 6.118 12.546 6.03 11H4.083a6.004 6.004 0 002.783 4.118z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @switch($locale)
                            @case('en-NL')
                            <a class="dropdown-item" href="/nl-NL/{{$path}}">Nederlands</a>
                            <a class="dropdown-item" href="/de-DE/{{$path}}">Deutsch</a>
                            @break
                            @case('nl-NL')
                            <a class="dropdown-item" href="/en-NL/{{$path}}">English</a>
                            <a class="dropdown-item" href="/de-DE/{{$path}}">Deutsch</a>
                            @break
                            @case('de-DE')
                            <a class="dropdown-item" href="/en-NL/{{$path}}">English</a>
                            <a class="dropdown-item" href="/nl-NL/{{$path}}">Nederlands</a>
                            @break
                        @endswitch
                    </div>
                </li>
{{--                @endunless--}}
            </li>

            <livewire:navbar-notifications />

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->first_name ?? '' }} <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/dashboard">Dashboard</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        @lang('components/navbar.logout')
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>


        </ul>
    </div>
</nav>

<!-- End Navbar -->
