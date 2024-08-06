<x-layouts.app>
    <x-slot name="title">
        Payments | {{ config('app.name') }}
    </x-slot>
    <x-dashboard.index>
        <x-slot name="title">
            Payments
        </x-slot>
        <x-dashboard.payments :user="$user" :registrations="$registrations" :subscriptions="$subscriptions" />
    </x-dashboard.index>
</x-layouts.app>
