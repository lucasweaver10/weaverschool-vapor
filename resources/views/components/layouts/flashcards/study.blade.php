<x-layouts.app>
<x-slot name="title">Study Flashcards</x-slot>
<x-dashboard.show.nav />
    {{ $slot }}
    @unless(auth()->user()->hasFlashcardsAccess())
        <x-banners.flashcards-upgrade />
        {{-- <livewire:overlays.subscriptions.create :productId="2001"/> --}}
    @endunless
</x-layouts.app>
