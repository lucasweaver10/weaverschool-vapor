@unless(request()->routeIs('dashboard.*'))
    <x-navbars.app-dark />
@endunless

{{ $slot }}

@unless(request()->routeIs('dashboard.*'))
<x-footer>
</x-footer>
@endunless
