<x-layouts.app>
    <x-slot name="title">
        Update your payment method | {{ config('app.name') }}
    </x-slot>
    <x-dashboard.index :user="$user" >
        <x-slot name="title">
            Update your payment method
        </x-slot>
{{--        <livewire:dashboard.registrations.store-stripe :user="$user" :course="$course" :plan="$plan"/>--}}
        <x-stripe-scripts publishableKey="{{ env('STRIPE_KEY') }}"></x-stripe-scripts>
        <div class="mt-12">
            <livewire:dashboard.payments.methods.create :user="$user" />
        </div>
    </x-dashboard.index>
    <x-alerts.success />
</x-layouts.app>
