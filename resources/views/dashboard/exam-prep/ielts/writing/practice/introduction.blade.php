<x-layouts.app>
    <x-slot name="title">
        Practice Writing IELTS Introductions | {{ config('app.name') }}
    </x-slot>
    <x-dashboard.index>
        <x-slot name="title">
            Practice Writing Your Introduction
        </x-slot>
        <div>          
        
        <!-- Enhanced Subscription Section -->        
        @unless(auth()->user()->hasSubscriptionLevel(auth()->id(), 'essays'))
        <x-cta.upgrades.exam-prep.pro />
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
        
    <x-alerts.success />
    <x-alerts.error />    

    </div>
    </x-dashboard.index>
</x-layouts.app>
