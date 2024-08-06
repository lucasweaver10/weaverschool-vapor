<div class="z-50">
    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript">
        // Set your publishable key: remember to change this to your live publishable key in production
        // See your keys here: https://dashboard.stripe.com/apikeys
        const stripe = Stripe('{{ config('services.stripe.key') }}');
    </script>
    <div class="fixed left-0 top-0 h-screen w-1/2 bg-black hidden lg:block" aria-hidden="true"></div>
    <div class="fixed right-0 top-0 h-screen w-1/2 bg-white lg:block" aria-hidden="true"></div>
    <div class="hidden lg:block fixed fixed-top top-0 left-0 ml-2 p-4">
        <a href="/{{ session('locale') }}">
            <img src="{{config('app.logo_dark')}}" alt="the Weaver School logo" class="h-10 w-auto">
        </a>
    </div>


    <div class="relative mx-auto grid max-w-7xl grid-cols-1 gap-x-16 lg:grid-cols-2 lg:px-8 lg:pt-16">
        <section aria-labelledby="payment-and-shipping-heading" class="bg-black py-16 lg:col-start-1 lg:row-start-1 lg:mx-auto
        lg:w-full lg:max-w-lg lg:pb-24 lg:pt-0">
            <div class="mx-auto max-w-2xl px-12 lg:max-w-none lg:px-0">
                <h2 id="payment-heading" class="text-xl font-medium text-white">Payment information</h2>
                <div class="mt-10 pt-6 mx-auto sm:flex sm:items-center sm:justify-between">
                    <div class="w-full">
                        @if($user)
                            @if($plan->total_price == 0)
                                <div class="text-white">Enjoy your free course!</div>
                                <button wire:click="registerFreeCourse" wire:loading.attr="disabled" type="submit"
                                        class="mt-4 w-full rounded-lg border border-transparent bg-teal-400 py-3 px-5 font-medium text-white shadow-sm
                                               hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-700 focus:ring-offset-2
                                               focus:ring-offset-gray-50
                                               sm:order-last sm:w-auto">
                                    <span wire:loading wire:target="registerFreeCourse" class="mr-2">
                                        <img src="{{ asset('images/loading.gif') }}" alt="Loading" class="w-5 h-5">
                                    </span>
                                    <span wire:loading.remove>
                                        Start My FREE Course
                                    </span>
                                </button>
                            @elseif($user->subscribedToProduct(5001))
                                <div class="text-white text-2xl mb-4">This course is included in your <strong>Weaver School Pro</strong> subscription.</div>
                                <button wire:click="registerFreeCourse" wire:loading.attr="disabled" type="submit"
                                        class="mt-4 w-full rounded-lg border border-transparent bg-teal-400 py-3 px-5 font-medium text-white shadow-sm
                                            hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-700 focus:ring-offset-2
                                            focus:ring-offset-gray-50
                                            sm:order-last sm:w-auto">
                                    <span wire:loading wire:target="registerFreeCourse" class="mr-2">
                                        <img src="{{ asset('images/loading.gif') }}" alt="Loading" class="w-5 h-5">
                                    </span>
                                    <span wire:loading.remove>
                                        Register Now
                                    </span>
                                </button>
                            @else
                                <form id="payment-form">
                                    <div id="payment-element">
                                        <!-- Elements will create form elements here -->
                                    </div>
                                    <div class="mt-12 float-right">
                                        <button wire:loading.attr="disabled" type="submit"
                                                class="w-full rounded-lg border border-transparent bg-teal-400 py-3 px-5 font-medium text-white shadow-sm
                                               hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-700 focus:ring-offset-2
                                               focus:ring-offset-gray-50
                                               sm:order-last sm:w-auto">
                                            <span wire:loading class="mr-2 bg-white">
                                                <img src="{{ asset('images/loading.gif') }}" alt="Loading" class="w-5 h-5">
                                            </span>
                                            <span wire:loading.remove>
                                                Start My 7-day FREE Trial
                                            </span>
                                        </button>
                                    </div>
                                    <div id="error-message" class="text-white text-2xl mt-2">
                                        <!-- Display error message to your customers here -->
                                    </div>
                                </form>
                            @endif
                        @endif
                    </div>
                </div>
                <script type="text/javascript">
                    const options = {                        
                        mode: 'setup',
                        currency: '@lang('currency.code')',                                        
                        appearance: {
                            theme: 'night',                        
                            variables: {
                                colorPrimary: '#0570de',
                                colorBackground: '#ffffff',
                                colorText: '#000000',
                                colorDanger: '#df1b41',
                                spacingUnit: '4px',
                                borderRadius: '4px',
                                colorTextSecondary: '#d1d5db',                                                    
                                // See all possible variables below
                            },
                            rules: {
                                '.Label': {
                                    color: '#ffffff',
                                },   
                                '.Tab--selected': {
                                    backgroundColor: '#0d9488',
                                    border: '1px solid #14b8a6',
                                },                                     
                            }  
                        },
                    };                                    
                    const elements = stripe.elements(options);                    
                    const paymentElement = elements.create('payment');
                    paymentElement.mount('#payment-element');
                </script>
                <script type="text/javascript">
                    const form = document.getElementById('payment-form');
                    form.addEventListener('submit', async (event) => {
                        event.preventDefault();
                        // Trigger form validation and wallet collection
                        const {error: submitError} = await elements.submit();
                        if (submitError) {
                            handleError(submitError);
                            return;
                        }                
                        const clientSecret = '{{ $this->clientSecret }}';
                        const setupIntentId = clientSecret.split('_secret_')[0];                        
                        const {error} = await stripe.confirmSetup({
                            //`Elements` instance that was used to create the Payment Element
                            elements,
                            clientSecret,                    
                            confirmParams: {
                                // Send the user back to this current //                                
                                return_url: `${window.location.origin}${window.location.pathname}?setup_intent=${setupIntentId}`,
                           
                            },
                            redirect: "if_required"
                        });
                        if (error) {
                            // This point will only be reached if there is an immediate error when
                            // confirming the payment. Show error to your customer (for example, payment
                            // details incomplete)
                            const messageContainer = document.querySelector('#error-message');
                            messageContainer.textContent = error.message;
                        } else {
                            const clientSecret = '{{ $this->clientSecret }}';                            
                            // Retrieve the SetupIntent
                            stripe.retrieveSetupIntent(clientSecret).then(({setupIntent}) => {
                                const message = document.querySelector('#message')
                                // Inspect the SetupIntent `status` to indicate the status of the payment
                                // to your customer.
                                // Some payment methods will [immediately succeed or fail][0] upon
                                // confirmation, while others will first enter a `processing` state.
                                // [0]: https://stripe.com/docs/payments/payment-methods#payment-notification                                
                                switch (setupIntent.status) {                                    
                                    case 'succeeded': {                                    
                                        Livewire.dispatch('handle-registration', {setupIntent});
                                        break;
                                    }
                                    case 'processing': {                                        
                                        message.innerText = "Processing payment details. We'll update you when processing is complete.";
                                        break;
                                    }
                                    case 'requires_payment_method': {                                        
                                        message.innerText = 'Failed to process payment details. Please try another payment method.';
                                        // Redirect your user back to your payment page to attempt collecting
                                        // payment again
                                        break;
                                    }
                                }
                            });
                        }
                    });
                </script>
            </div>
        </section>
        <section aria-labelledby="summary-heading" class="py-12 md:px-10 lg:col-start-2
        lg:row-start-1 lg:mx-auto lg:w-full lg:max-w-lg lg:bg-transparent lg:px-0 lg:pb-24 lg:pt-0">
            <div class="mx-auto max-w-2xl px-12 lg:max-w-none lg:px-0">
                <h2 id="summary-heading" class="text-xl font-medium text-gray-900">Registration summary</h2>

                <ul role="list" class="divide-y mt-10 divide-gray-200 text-2xl font-medium text-gray-900">
                    <li class="flex items-start space-x-4 py-6">
                        <img src="{{ $course->image }}" alt="" class="h-20 w-20 flex-none rounded-md object-cover
                        object-center">
                        <div class="flex-auto space-y-1">
                            <a href="/{{ session('locale') }}/{{ lcfirst($course->subcategory->name) }}/courses/online/{{ $course->slug }}"
                               target="_blank" class="text-2xl">{{ $course->name }}</a>
                            <p class="text-gray-700 text-xl">{{ $plan->name }}</p>
                            <p class="text-gray-700 text-base"><em>Lifetime access</em></p>
                            <p class="text-gray-700 text-sm pt-5 font-light">Your payment method will be charged automatically after 7 days.
                             You can cancel your trial with one click at any time and can email me for a full refund if you
                             forget to cancel in time.</p>
                        </div>
                        <p class="flex-none text-2xl font-medium">
                            @lang('currency.symbol'){{ $plan->discounted_total_price ?? $plan->total_price }}</p>
                    </li>
                </ul>

                @if($plan->times > 1)
                <dl class="hidden space-y-6 border-t border-gray-200 pt-6 text-sm font-medium text-gray-900 lg:block">
                    <div class="flex items-center justify-between">
                        <dt class="text-gray-600">Monthly amount</dt>
                        <dd>@lang('currency.symbol'){{ $plan->monthly_price }}</dd>
                    </div>

                    <div class="flex items-center justify-between">
                        <dt class="text-gray-600">Number of payments</dt>
                        <dd>{{ $plan->times }}</dd>
                    </div>

                    <div class="flex items-center justify-between">
                        <dt class="text-gray-600">Total amount</dt>
                        <dd>@lang('currency.symbol'){{ $plan->total_price }}</dd>
                    </div>
                @endif

                    <div class="flex items-center justify-between border-t border-gray-200 pt-6">
                        <dt class="text-4xl font-bold">Total due today</dt>
                        <dd class="text-4xl font-bold">@lang('currency.symbol')0</dd>
                    </div>
                    <div class="flex mt-10 mb-4">
                        <div class="sm:flex-shrink-0 -mt-3 mr-3 sm:-mr-3">
                            <div class="flow-root">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width=".25"
                                        stroke="currentColor" class="w-20 h-20">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15
                                    9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745
                                    0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746
                                    0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39
                                    1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0
                                    0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0
                                    011.043 3.296A3.745 3.745 0 0121 12z" />
                                </svg>
                            </div>
                        </div>
                        <div class="mt-3 sm:ml-3 sm:mt-0">
                            <h3 class="text-md font-medium text-gray-900">100% money-back guarantee</h3>
                            <p class="mt-2 text-base text-gray-700">
                                If you're not happy with your course get 100% of your money back.
                            </p>
                        </div>
                    </div>
                </dl>                
            </div>
        </section>

    </div>

    <x-alerts.success />
    <x-alerts.error />
</div>
