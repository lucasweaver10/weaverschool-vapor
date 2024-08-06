<div class="fixed inset-0 overflow-auto z-50" x-cloak x-show="subscriptionOverlayVisible == true">
    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript">        
        const stripe = Stripe('{{ config('services.stripe.key') }}');
    </script>
    <div class="lg:fixed left-0 top-0 hidden h-screen w-1/2 bg-black lg:block" aria-hidden="true"></div>
    <div class="lg:fixed right-0 top-0 hidden h-screen w-1/2 bg-white lg:block" aria-hidden="true"></div>
    <div class="hidden lg:block fixed fixed-top top-0 left-0 ml-2 p-4">
        <a href="/{{ session('locale') }}">
            <img src="{{config('app.logo_dark')}}" alt="the Weaver School logo" class="h-10 w-auto">
        </a>
    </div>


    <div class="relative mx-auto grid max-w-7xl grid-cols-1 gap-x-16 lg:grid-cols-2 lg:px-8 lg:pt-16">
        <section aria-labelledby="payment-and-shipping-heading" class="bg-black py-16 lg:col-start-1 lg:row-start-1 lg:mx-auto
        lg:w-full lg:max-w-lg lg:pb-24 lg:pt-0">
            <div class="mx-auto max-w-2xl px-12 lg:max-w-none lg:px-0">
                <h2 id="payment-heading" class="text-xl font-medium text-white mt-5">Payment information</h2>
                <div class="mt-10 pt-6 mx-auto sm:flex sm:items-center sm:justify-between">
                    <div class="w-full">                    
                        <form id="payment-form">
                            <div wire:ignore id="payment-element">
                                <!-- Elements will create form elements here -->
                            </div>
                            <div class="mt-12 float-right">
                                <button wire:loading.attr="disabled"
                                        class="w-full rounded-lg border border-transparent bg-teal-400 py-3 px-5 font-medium text-white shadow-sm
                                       hover:bg-teal-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2
                                       focus:ring-offset-gray-50
                                       sm:order-last sm:w-auto">
                                    <span wire:loading class="mr-2">
                                        <img src="{{ asset('images/loading.gif') }}" alt="Loading" class="w-5 h-5">
                                    </span>
                                    <span wire:loading.remove>
                                        Upgrade
                                    </span>
                                </button>
                            </div>
                            <div id="error-message" class="text-white text-2xl mt-2">
                                <!-- Display error message to your customers here -->
                            </div>
                        </form>
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
                                        Livewire.dispatch('handle-subscription', {setupIntent});
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
        <section aria-labelledby="summary-heading" class="bg-white py-12 md:px-10 lg:col-start-2
        lg:row-start-1 lg:mx-auto lg:w-full lg:max-w-lg lg:bg-transparent lg:px-0 lg:pb-24 lg:pt-0">
            <div class="mx-auto max-w-2xl px-12 lg:max-w-none lg:px-0">
                <button @click="subscriptionOverlayVisible = false" class="absolute top-5 right-5 bg-red-500 px-3 rounded-lg text-white">
                    X
                </button>
                <h2 id="summary-heading" class="text-xl font-medium text-gray-900 mt-5">Subscription summary</h2>
                <ul role="list" class="divide-y mt-10 divide-gray-200 text-2xl font-medium text-gray-900">
                    <li class="flex items-start space-x-4 py-6">
                        <img src="{{ $this->product->image ?? '' }}" alt="" class="h-20 w-20 flex-none rounded-md object-cover
                        object-center">
                        <div class="flex-auto space-y-3">
                            <div class="text-3xl">{{ $this->product->name }}</div>
                            <p class="text-gray-700 text-xl">{{ $this->product->description }}</p>
                            <p class="text-gray-500 text-base mt-3"><em>Monthly access</em></p>
                            <p class="text-gray-500 text-sm pt-5 font-light">Your payment method will be charged automatically.
                                You can cancel your subscription with one click at any time.</p>
                        </div>
                        <p class="flex-none text-2xl font-medium">
                            @lang('currency.symbol'){{ $this->product->prices->where('type', 'Recurring')->first()->localized_amount ?? 'No price available' }}</p>
                    </li>
                    <!-- More products... -->
                </ul>

                <div class="flex items-center justify-between border-t border-gray-200 pt-6">
                    <dt class="text-4xl font-bold">Total due today</dt>
                    <dd class="text-4xl font-bold">@lang('currency.symbol'){{ $this->product->prices->where('type', 'Recurring')->first()->localized_amount ?? 'No price available'}}</dd>
                </div>
            </div>
        </section>

    </div>

    <x-alerts.success />
    <x-alerts.error />
</div>
