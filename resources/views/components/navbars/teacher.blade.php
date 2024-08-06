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
    </ul>

    <ul class="navbar-nav ml-auto nav-cta">

      <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->first_name ?? '' }} <span class="caret"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/myteacher">MyTeacher</a>
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
