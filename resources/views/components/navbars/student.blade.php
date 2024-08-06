@php $locale = App::getLocale(); @endphp
@php
    $url = request()->path();
    $path = substr("$url", 6);
@endphp
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <button href="/{{$locale}}" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  <a class="navbar-brand" href="/{{$locale}}">
    <img src="{{config('app.logo')}}" width="165" height="165" class="d-inline-block align-top" alt="The Weaver School logo">
  </a>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="nav navbar-nav">
      {{-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="/courses">@lang('components/navbar.courses')</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/online-courses">@lang('components/navbar.online_courses')</a>
            <a class="dropdown-item" href="/courses">@lang('components/navbar.in_person_courses')</a>
            <a class="dropdown-item" href="/courses/1201">@lang('components/navbar.ielts_prep')</a>
            <a class="dropdown-item" href="/courses/1401">@lang('components/navbar.corporate_lessons')</a>
          </div>
      </li> --}}
{{--      <li class="nav-item">--}}
{{--        <a class="nav-link" href="/private-lessons">@lang('components/navbar.private_lessons')</a>--}}
{{--      </li>--}}
      <li class="nav-item">
        <a class="nav-link" href="/teachers">@lang('components/navbar.teachers')</a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="/{{$locale}}/about">@lang('components/navbar.about')</a>
      </li>
{{--      <li class="nav-item">--}}
{{--        <a class="nav-link" href="/{{$locale}}/pricing">@lang('components/navbar.pricing')</a>--}}
{{--      </li>--}}
{{--      <li class="nav-item">--}}
{{--        <a class="nav-link" href="/blog">@lang('components/navbar.blog')</a>--}}
{{--       </li>--}}
    </ul>

    <ul class="navbar-nav ml-auto nav-cta">
        @unless ( $locale !== 'en-NL' and $locale !== 'nl-NL')
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="/courses">
                    @switch($locale)
                        @case('en-NL')
                        English
                        @break
                        @case('nl-NL')
                        Nederlands
                        @break
                    @endswitch
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @switch($locale)
                        @case('en-NL')
                        <a class="dropdown-item" href="/nl-NL/{{$path}}">Nederlands</a>
                        @break
                        @case('nl-NL')
                        <a class="dropdown-item" href="/en-NL/{{$path}}">English</a>
                        @break
                    @endswitch
                </div>
            </li>
        @endunless
     <!-- Authentication Links -->
     @guest
      <li class="nav-item">
      <a class="nav-link" href="/{{$locale}}/contact">@lang('components/navbar.contact')</a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="{{ route('login') }}">@lang('components/navbar.login')</a>
      </li>
     @if (Route::has('register'))
     <form class="form-inline">
      <li class="nav-item">
        <a class="btn btn-lg btn-primary button_slide slide_right sliding_button ml-lg-3" role="button" href="{{ route('register') }}">@lang('components/navbar.register')</a>
      </li>
     </form>
     @endif
 @else
     <div class="dropdown">
         <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
             {{ Auth::user()->first_name }} <span class="caret"></span>
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
     </div>

 @endguest

    </ul>
  </div>
</nav>

<!-- End Navbar -->
