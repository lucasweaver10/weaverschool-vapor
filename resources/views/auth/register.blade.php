<x-guest-layout>
<x-slot name="title">
        Register | The Weaver School
</x-slot>
    <script>
        fbq('track', 'InitiateCheckout');
    </script>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <p class="lead text-center">Create your free account</p>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" id="new-user-registration-form">
            @csrf

            <x-honeypot />

            <!-- Hidden input for referral program -->
            <input type="hidden" name="referral_code" value="{{ session('referralCode' ?? '') }}">

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <div class="ml-auto">
                    <x-button class="ml-4">
                        {{ __('Create Account') }}
                    </x-button>
                </div>
            </div>

        </form>
    </x-auth-card>
    <x-alerts.error />
</x-guest-layout>
