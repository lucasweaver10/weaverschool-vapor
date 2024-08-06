<div class="" x-cloak x-data="{ loading: $wire.entangle('loading').live }">
    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript">        
        const stripe = Stripe('{{ config('services.stripe.key') }}');
    </script>
    <div class="lg:fixed left-0 top-0 hidden h-screen w-1/2 bg-gray-900 lg:block" aria-hidden="true"></div>
    <div class="lg:fixed right-0 top-0 hidden h-screen w-1/2 bg-white lg:block" aria-hidden="true"></div>
    <div class="hidden lg:block fixed fixed-top top-0 left-0 ml-2 p-4">
        <a href="/{{ session('locale') }}">
            <img src="{{config('app.logo_dark')}}" alt="the Weaver School logo" class="h-10 w-auto">
        </a>
    </div>


    <div class="relative mx-auto grid max-w-7xl grid-cols-1 gap-x-16 lg:grid-cols-2 lg:px-8 lg:pt-16">
        <section aria-labelledby="payment-and-shipping-heading" class="bg-gray-900 pt-6 lg:pt-0 pb-10 lg:pb-0 lg:col-start-1 lg:row-start-1 lg:mx-auto
        lg:w-full lg:max-w-lg">
            <div class="mx-auto max-w-2xl px-8 lg:max-w-none lg:px-0">
                <h2 id="payment-heading" class="text-xl font-medium text-white mt-5">Payment information</h2>
                <div class="mt-4 lg:mt-10 pt-4 lg:pt-6 mx-auto sm:flex sm:items-center sm:justify-between">
                    <div class="w-full">                    
                        <form id="payment-form">
                            <div wire:ignore id="payment-element">
                                <!-- Elements will create form elements here -->
                            </div>
                            <a target="_blank" href="https://stripe.com"><span class="text-white text-sm flex pt-8"><span class="mr-1">Powered by </span><svg class="mt-1" focusable="false" width="33" height="15" role="img" aria-labelledby="stripe-title"><title id="stripe-title">Stripe</title><g fill="currentColor" fill-rule="evenodd"><path d="M32.956 7.925c0-2.313-1.12-4.138-3.261-4.138-2.15 0-3.451 1.825-3.451 4.12 0 2.719 1.535 4.092 3.74 4.092 1.075 0 1.888-.244 2.502-.587V9.605c-.614.307-1.319.497-2.213.497-.876 0-1.653-.307-1.753-1.373h4.418c0-.118.018-.588.018-.804zm-4.463-.859c0-1.02.624-1.445 1.193-1.445.55 0 1.138.424 1.138 1.445h-2.33zM22.756 3.787c-.885 0-1.454.415-1.77.704l-.118-.56H18.88v10.535l2.259-.48.009-2.556c.325.235.804.57 1.6.57 1.616 0 3.089-1.302 3.089-4.166-.01-2.62-1.5-4.047-3.08-4.047zm-.542 6.225c-.533 0-.85-.19-1.066-.425l-.009-3.352c.235-.262.56-.443 1.075-.443.822 0 1.391.922 1.391 2.105 0 1.211-.56 2.115-1.39 2.115zM18.04 2.766V.932l-2.268.479v1.843zM15.772 3.94h2.268v7.905h-2.268zM13.342 4.609l-.144-.669h-1.952v7.906h2.259V6.488c.533-.696 1.436-.57 1.716-.47V3.94c-.289-.108-1.346-.307-1.879.669zM8.825 1.98l-2.205.47-.009 7.236c0 1.337 1.003 2.322 2.34 2.322.741 0 1.283-.135 1.581-.298V9.876c-.289.117-1.716.533-1.716-.804V5.865h1.716V3.94H8.816l.009-1.96zM2.718 6.235c0-.352.289-.488.767-.488.687 0 1.554.208 2.241.578V4.202a5.958 5.958 0 0 0-2.24-.415c-1.835 0-3.054.957-3.054 2.557 0 2.493 3.433 2.096 3.433 3.17 0 .416-.361.552-.867.552-.75 0-1.708-.307-2.467-.723v2.15c.84.362 1.69.515 2.467.515 1.879 0 3.17-.93 3.17-2.548-.008-2.692-3.45-2.213-3.45-3.225z"></path></g></svg></span></a>
                            <div class="mt-12 float-right">
                                <button wire:loading.attr="disabled"
                                        class="w-full rounded-lg border border-transparent bg-teal-400 py-3 px-5 font-medium text-white shadow-sm
                                               hover:bg-teal-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2
                                               focus:ring-offset-gray-50 sm:order-last sm:w-auto relative flex items-center justify-center">
                                    <span wire:loading class="absolute inset-0 flex items-center justify-center">
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
                        currency: 'usd',
                        payment_method_types: ['card'],                         
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
                    document.addEventListener('livewire:init', function () {
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
                                // This point will only be reached if there is an immediate error when confirming the payment. Show error to your customer (for example, payment details incomplete)                                
                                const messageContainer = document.querySelector('#error-message');
                                messageContainer.textContent = error.message;
                            } else {
                                // Retrieve the SetupIntent
                                const clientSecret = '{{ $this->clientSecret }}';   
                                stripe.retrieveSetupIntent(clientSecret).then(({setupIntent}) => {
                                    const message = document.querySelector('#message');                    
                                    // Inspect the SetupIntent `status` to indicate the status of the payment to your customer.
                                    // Some payment methods will immediately succeed or fail upon confirmation, while others will first enter a `processing` state.
                                    switch (setupIntent.status) {
                                        case 'succeeded': {   
                                            // Trigger backend subscription creation method
                                            Livewire.dispatch('subscription-initiated', {setupIntent: setupIntent});                                                                                 
                                            break;
                                        }
                                        case 'processing': {
                                            Livewire.dispatch('setup-intent-returned-pending');
                                            message.innerText = "Processing payment details. We'll update you when processing is complete.";
                                            break;
                                        }
                                        case 'requires_payment_method': {
                                            Livewire.dispatch('setup-intent-returned-pending');                                            
                                            message.innerText = 'Failed to process payment details. Please try another payment method.';
                                            // Redirect your user back to your payment page to attempt collecting payment again
                                            break;
                                        }
                                    }
                                });
                            }
                        });
                    });
                </script>                
            </div>
        </section>
        <section aria-labelledby="summary-heading" class="bg-white pt-6 pb-8 lg:pt-0 lg:pb-24 md:px-10 lg:col-start-2
        lg:row-start-1 lg:mx-auto lg:w-full lg:max-w-lg lg:bg-transparent lg:px-0">
            <div class="mx-auto max-w-2xl px-8 lg:max-w-none lg:px-0">
                <h2 id="summary-heading" class="text-xl font-medium text-gray-900 mt-5">Subscription summary</h2>
                <ul role="list" class="divide-y mt-6 divide-gray-200 text-2xl font-medium text-gray-900">
                    <li class="flex items-start sm:space-x-4 sm:py-6">
                        <div class="grid grid-cols-1 sm:grid-cols-3">                            
                            <div class="col-span-1 sm:col-span-2">
                                <div class="flex-auto space-y-3 sm:pl-4">
                                    <div class="text-3xl">{{ $this->product->name }}</div>
                                    <p class="text-gray-700 text-lg my-8">{{ $this->product->description }}</p>
                                    <p class="text-gray-500 text-base"><em>Monthly access</em></p>                            
                                </div>
                            </div>
                            <div class="col-span-1 text-right">
                                <p class="flex-none mt-2 sm:mt-0 text-3xl sm:text-4xl font-medium">@lang('currency.symbol'){{ $this->product->prices->where('type', 'Recurring')->first()->localized_amount ?? 'No price available' }}</p>
                            </div>
                        </div>
                    </li>
                    <!-- More products... -->
                </ul>
                {{-- <p class="text-gray-500 text-sm mt-6 pb-5 font-light">
                </p> --}}
                <label class="inline-flex items-center">
                    <input type="checkbox" class="form-checkbox accent-black text-black" checked>
                    <span class="ml-4 text-gray-500 text-sm mt-6 pb-5 font-light">By subscribing to the Weaver School you are agreeing to all of their <a target="_blank" href="{{ route('general-terms', ['locale' => session('locale', 'en')]) }}">terms and conditions</a>. 
                    A temporary hold will be placed on the payment method you provide to validate your payment method.
                    </span>
                </label>

                <div class="flex items-center justify-between border-t border-gray-200 pt-6">
                    <dt class="text-2xl sm:text-3xl font-bold">Total due today</dt>
                    <dd class="text-5xl font-bold">@lang('currency.symbol')0.00</dd>
                </div>
            </div>
        </section>        
    </div>

    <x-alerts.success />
    {{-- <x-alerts.error /> --}}
</div>
