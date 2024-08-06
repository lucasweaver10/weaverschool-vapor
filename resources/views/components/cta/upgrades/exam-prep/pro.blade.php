<div>
    <div class="text-teal-900 max-w-xs mx-auto py-4 rounded-lg text-xl font-semibold mb-5">You have {{ max(0, 2 - count(auth()->user()->essaySubmissions ?? [])) }} trial submissions left...</div>
    <section class="bg-teal-900 pt-8 pb-8 px-8 mt-8 mb-8 rounded-lg">
        <div class="text-center text-white">            
            <p class="text-3xl md:text-3xl font-semibold mb-8 text-teal-100">Subscribe to Weaver School Pro</p>
            <p class="text-lg font-bold mb-12">Submit <em>20 Essays and 5 Speaking Tests</em> for @lang('currency.symbol'){{ $pro->prices->where('billing_period', 'Monthly')->first()->localized_amount }} per month. <br>Or, start with Basic and get <em>10 essays per month</em> for @lang('currency.symbol'){{ $basic->prices->where('billing_period', 'Monthly')->first()->localized_amount }}.</p>                    
            <div class="grid grid-cols-1 sm:grid-cols-2 justify-center items-center sm:px-8">                        
                <a target="_blank" href="{{ route('dashboard.subscriptions.trials.create', ['locale' => session('locale', 'en'), 'type' => 'basic', 'id' => '3001']) }}" class="bg-teal-400 hover:bg-teal-500 text-white font-bold py-2 px-6 rounded mb-4 sm:mb-0 sm:mr-4">Try Basic</a>                                
                <x-buttons.subscriptions.trial-pro
                    text="Try Pro"
                    class="bg-teal-200 hover:bg-teal-300 text-teal-900 font-bold py-2 px-6 rounded"
                />
            </div>
        </div>
    </section>
</div>