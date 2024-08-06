<x-guest-layout>
<x-slot name="title">
        Create API Token | The Weaver School
</x-slot>    
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <p class="lead text-center mb-4">Create Your API Token</p>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div class="flex justify-center w-full">
            <form method="POST" action="{{ url('/token/create') }}" id="api-token-creation-form" class="text-center">
                @csrf
                <x-button class="mx-auto">
                    {{ __('Create API Token
                    ') }}
                </x-button>
                <x-honeypot />
            </form>
        </div>
    </x-auth-card>
    <x-alerts.error />
</x-guest-layout>
