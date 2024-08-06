<div>
    @guest
    @else
    @unless(auth()->user()->hasSubscriptionLevel(auth()->id(), 'pro')) 
        <section class="flex bg-teal-900 py-4 px-3 sm:py-6 sm:px-5 mb-8 rounded-lg">
            <!-- Reduced padding for smaller devices -->
            <div class="text-center text-white mx-auto flex flex-col sm:flex-row items-center">
                <span class="text-lg sm:text-xl font-semibold mb-4 sm:mb-0 sm:mr-8">{{ $description }}</span>
                <!-- Adjusted text size for smaller screens -->
                <x-buttons.subscriptions.start-pro
                    text="Unlock Pro"                    
                    class="bg-teal-200 hover:bg-teal-300 text-teal-900 font-bold py-2 px-4 sm:px-6 rounded"                    
                />
            </div>
        </section>
    @endunless
    @endguest
</div>
