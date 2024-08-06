<div>
        @unless(auth()->user()->hasSubscriptionLevel(auth()->id(), 'premium'))  
        <section class="flex bg-teal-900 py-6 px-5 mt-4 mb-8 rounded-lg">
            <div class="text-center text-white mx-auto">
                <span class="text-xl font-semibold sm:mr-8 mb-4 sm:mb-0">Unlock all features by upgrading to Premium</span>
                <a href="{{ route('trial-subscription-checkout', ['type' => 'premium', 'id' => '7001']) }}" 
                    class="block sm:inline-flex bg-teal-400 hover:bg-teal-500 text-teal-900 hover:text-teal-100 font-bold py-1 px-4 mt-6 sm:mt-0 rounded">
                    Start Trial
                </a>                                
            </div>
        </section>
    @endunless
</div>