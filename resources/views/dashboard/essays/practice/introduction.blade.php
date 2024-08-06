<x-layouts.app>
    <x-slot name="title">
        Practice Writing IELTS Introductions | {{ config('app.name') }}
    </x-slot>
    <x-dashboard.index>
        <x-slot name="title">
            Practice Writing Your Introduction
        </x-slot>
        <div x-data="{
            subscriptionOverlayVisible: false,
            productId: null,
            showOverlay(id) {
                this.productId = id;
                $dispatch('upgrade-clicked', {id: this.productId});
            }       
        }"
        x-on:overlay-opened.window="subscriptionOverlayVisible = true">          
        
        <!-- Enhanced Subscription Section -->        
        @unless(auth()->user()->subscribed('pro') || auth()->user()->subscribed('essays'))
        <section class="flex bg-teal-700 py-12 px-5 mt-8 mb-8 rounded-lg">
            <div class="text-center text-white mx-auto">
                <p class="text-3xl font-semibold mb-4">Unlock Unlimited Submissions for @lang('currency.symbol'){{ $product->prices->where('billing_period', 'Monthly')->first()->localized_amount }}/month</span></p>
                <p class="text-xl font-semibold mb-8">You have {{ max(0, 2 - count(auth()->user()->essaySubmissions ?? [])) }} trial submissions left.</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 justify-center items-center">
                    {{-- <div class="col-span-1"><a href="/subscription-checkout/essays/1003" class="bg-teal-300 hover:bg-teal-400 text-teal-700 font-bold py-2 px-6 rounded mb-10 sm:mb-0 mr-4 sm:mr-0">Get Access for One Year</a></div> --}}
                    <div class="col-span-2"><a href="/subscription-checkout/essays/1001" class="bg-teal-200 hover:bg-gray-200 text-teal-900 font-bold py-2 px-6 rounded">Get Monthly Access</a></div>
                </div>
            </div>
        </section>
        @endunless

    <section class="mt-4 pb-3 px-5 sm:px-12 md:px-18 lg:px-24">
        <div class="grid grid-cols-1">
            <div class="col-span-1">
                <div class="">                        
                    <p class="mt-5 mb-0">Practice writing your introduction, and learn how to rewrite exam questions using synonyms to score more points.</p>
                </div>
            </div>
        </div>
    </section>

    <livewire:essays.practice.introduction />
        
    {{-- <x-alerts.success />
    <x-alerts.error /> --}}
    @auth
        <livewire:overlays.subscriptions.create />
    @endauth

    </div>
    </x-dashboard.index>
</x-layouts.app>
