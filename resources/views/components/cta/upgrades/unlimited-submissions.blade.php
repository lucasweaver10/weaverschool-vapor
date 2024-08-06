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