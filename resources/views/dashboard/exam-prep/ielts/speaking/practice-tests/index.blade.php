<x-layouts.app>
    <x-slot name="title">
        IELTS Speaking Practice Tests | {{ config('app.name') }}
    </x-slot>
    <x-dashboard.index>
        <x-slot name="title">
            IELTS Speaking Practice Tests
        </x-slot>
        <div>   

    <!-- Enhanced Subscription Section -->        
    @unless(auth()->user()->hasSubscriptionLevel(auth()->id(), 'pro'))
        <section class="flex bg-teal-700 py-12 px-5 mt-8 mb-8 rounded-lg">
            <div class="text-center text-white mx-auto">
                <p class="text-xl font-semibold mb-4">You have {{ max(0, 1 - count(auth()->user()->speakingPracticeTestSubmissions ?? [])) }} trial submission left.</p>
                <p class="text-3xl md:text-4xl font-semibold mb-6 text-teal-100">Subscribe to Weaver School Pro</p>
                <p class="text-xl mb-12 sm:px-8">Submit 20 Essays and 5 Speaking Tests for @lang('currency.symbol'){{ $pro->prices->where('billing_period', 'Monthly')->first()->localized_amount }} per month.</p>                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 justify-center items-center">                    
                    <div class="col-span-2">
                        {{-- <a href="{{ route('trial-subscription-checkout', ['type' => 'pro', 'id' => '5001']) }}" class="bg-teal-200 hover:bg-gray-200 text-teal-900 text-2xl font-bold py-2 px-6 rounded">Try Pro for Free</a> --}}
                        <x-buttons.subscriptions.start-pro
                            text="Unlock Pro"                    
                            class="bg-teal-200 hover:bg-teal-300 text-teal-900 font-bold py-2 px-6 rounded"
                        />
                        {{-- <x-buttons.subscriptions.trial-pro 
                            text="Try Pro for Free"
                            class="bg-teal-200 hover:bg-gray-200 text-teal-900 text-2xl font-bold py-2 px-6 rounded"
                        /> --}}
                    </div>
                </div>
            </div>
        </section>
    @endunless       
                       
    <div class="min-h-screen flex flex-col items-center px-4 py-10">        
        <div class="flex flex-wrap justify-center mx-auto max-w-6xl">
            @foreach($tests as $test)
                <div class="bg-gray-800 hover:bg-gray-700 rounded-lg overflow-hidden shadow-lg my-4 w-full sm:w-80 md:w-96 mx-2 transition duration-300 ease-in-out transform hover:scale-105">
                    <div class="flex flex-col">
                        <div class="p-5 flex flex-col justify-between">
                            <h2 class="text-2xl font-bold text-teal-400 mb-4">{{ $test->title }}</h2>
                            <p class="text-gray-200 mb-6">{{ $test->description }}</p>
                            <a href="{{ route('dashboard.exam-prep.ielts.speaking.practice-tests.submit', ['locale' => session('locale', 'en'), 'id' => $test->id]) }}" class="px-4 py-2 mx-auto bg-teal-500 text-white font-semibold rounded-lg hover:bg-teal-600 transition ease-in-out duration-150">Take Test</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    <x-alerts.success />
    <x-alerts.error />    

        </div>
    </x-dashboard.index>
</x-layouts.app>
