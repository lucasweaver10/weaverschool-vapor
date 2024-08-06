<x-layouts.app>
    <x-slot name="title">
        View your payment method | {{ config('app.name') }}
    </x-slot>
    <x-dashboard.index :user="$user" >
        <x-slot name="title">
            Your payment method
        </x-slot>
        <x-stripe-scripts publishableKey="{{ env('STRIPE_KEY') }}"></x-stripe-scripts>
        <div class="mt-12">
            <p class="mb-12">{{ ucfirst($user->pm_type) }} ending in {{ $user->pm_last_four }}</p>
            <a href="{{ route('dashboard.payments.methods.create', ['locale' => session('locale')]) }}"
                class="w-full rounded-lg border border-transparent bg-blue-400 mt-5 py-3 px-3 font-medium text-white shadow-sm
                   hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2
                   focus:ring-offset-gray-50
                   sm:order-last sm:w-auto">
                    Update payment method
            </a>
        </div>
    </x-dashboard.index>
    <x-alerts.success />
</x-layouts.app>
