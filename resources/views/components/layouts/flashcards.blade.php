<x-layouts.app>
<x-slot name="title">{{ $title }}</x-slot>
<x-slot name="description">{{ $description ?? '' }}</x-slot>
<div x-data="{ subscriptionOverlayVisible: false, mobileMenuOpen: false }">
    <x-dashboard.show.nav />
    <div class="w-full min-h-screen bg-gray-900">
        <div class="container mx-auto pt-8 pb-4 px-4 sm:pt-12 sm:pb-6 sm:px-6">
            {{ $slot }}
        </div>
    </div>
</div>
</x-layouts.app>
