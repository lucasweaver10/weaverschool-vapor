<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top">
  <button href="/" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

<a class="navbar-brand" href="/">
  <img src="/images/logos/The Weaver School logo full.png" width="65" height="65" class="d-inline-block align-top" alt="The Weaver School logo">
</a>

<div class="collapse navbar-collapse" id="navbarNav">
  <ul class="nav navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="/admin">Admin</a>
   </li>
   <li class="nav-item">
    <a class="nav-link" href="/admin/students">Students</a>
 </li>
    <li class="nav-item">
      <a class="nav-link" href="/admin/registrations">Registrations</a>
   </li>
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="/groups">Groups</a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="/groups">All Groups</a>
      <a class="dropdown-item" href="/groups/create">New Group</a>
    </div>
   </li>
   <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="/courses">Courses</a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="/courses">All Courses</a>
      <a class="dropdown-item" href="/courses/create">New Course</a>
    </div>
   </li>
    <li class="nav-item">
        <a class="nav-link" href="/payments">Payments</a>
     </li>
  </ul>
  <ul class="navbar-nav ml-auto nav-cta">
   <!-- Authentication Links -->
   @guest
   <li class="nav-item">
       <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
   </li>
   @if (Route::has('register'))
       <li class="nav-item">
           <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
       </li>
   @endif
@else
   <li class="nav-item dropdown">
       <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
           {{ Auth::user()->name }} <span class="caret"></span>
       </a>

       <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

        <a class="dropdown-item" href="/dashboard">Dashboard</a>

        <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
               {{ __('Logout') }}
           </a>

           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
               @csrf
           </form>

      </div>

   </li>
@endguest
  </ul>
</div>
</nav>
<!-- End Navbar -->
