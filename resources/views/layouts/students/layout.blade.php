<!DOCTYPE HTML>

<meta name="viewport" content="width=device-width, initial-scale=1">

<html lang = "en">

<head profile="http://weaverenglish.nl/profile">
<link rel="icon"
      type="image/png"
      href="/images/logos/The Weaver School favicon.png">

  <title>@yield('title', 'The Weaver School')</title>

  <meta charset = "UTF-8" />

  <meta name="description" content="@yield('meta', 'English courses in Rotterdam from The Weaver School.')"/>

@yield('schema', '')

<!-- GTM Head -->
@component ('components.gtm-head')
@endcomponent

<!-- CSS -->

<link rel="stylesheet" type"text/css" href="{{ mix('/css/app.css') }}">

<script src="https://cdn.jsdelivr.net/npm/vue@2.6.0"></script>

<script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">

<!-- FONTS -->

<link rel="stylesheet" href="https://use.typekit.net/qpq5ghp.css">

<!-- JS -->
@livewireStyles
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
</head>

<body>

<!-- GTM Body -->
@component ('components.gtm-body')
@endcomponent

<!-- Navbar -->
@component ('components.navbars.students')
@endcomponent

  @yield('content')
<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ mix('css/app.css') }}"></script>


<!-- Footer -->
@component ('components.admin.footer')
@endcomponent


@livewireScripts
</body>
</html>
