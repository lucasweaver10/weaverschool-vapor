<div class="fixed inset-0" x-cloak x-show="upgradeOpen == true">
    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript">
        // Set your publishable key: remember to change this to your live publishable key in production
        // See your keys here: https://dashboard.stripe.com/apikeys
        const stripe = Stripe('{{ env('STRIPE_KEY') }}');
    </script>
    <div class="fixed left-0 top-0 hidden h-screen w-1/2 bg-black lg:block" aria-hidden="true"></div>
    <div class="fixed right-0 top-0 hidden h-screen w-1/2 bg-white lg:block" aria-hidden="true"></div>
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
                        @endif
                        <form id="payment-form">
                            <div id="payment-element">
                                <!-- Elements will create form elements here -->
                            </div>
                            <div class="mt-12 float-right">
                                <button wire:loading.attr="disabled"
                                        class="w-full rounded-lg border border-transparent bg-teal-400 py-3 px-5 font-medium text-white shadow-sm
                                       hover:bg-teal-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2
                                       focus:ring-offset-gray-50
                                       sm:order-last sm:w-auto">
                                    <span wire:loading wire:target="register" class="mr-2">
                                        <img src="{{ asset('images/loading.gif') }}" alt="Loading" class="w-5 h-5">
                                    </span>
                                    <span wire:loading.remove>
                                        Upgrade
                                    </span>
                                </button>
                            </div>
                            <div id="error-message">
                                <!-- Display error message to your customers here -->
                            </div>
                        </form>
                    </div>
                </div>
                <script type="text/javascript">
                    const options = {
                        clientSecret: '{{ $this->clientSecret }}',

                        // Fully customizable with appearance API.
                        appearance: {
                            theme: 'stripe',
                            labels: 'floating',
                            variables: {
                                colorPrimary: '#0570de',
                                colorBackground: '#ffffff',
                                colorText: '#000000',
                                colorDanger: '#df1b41',
                                spacingUnit: '4px',
                                borderRadius: '4px',
                                colorTextSecondary: '#d1d5db',
                                // See all possible variables below
                            }
                        },
                    };
                    // Set up Stripe.js and Elements using the SetupIntent's client secret
                    const elements = stripe.elements(options);
                    // Create and mount the Payment Element
                    const paymentElement = elements.create('payment');
                    paymentElement.mount('#payment-element');
                </script>
                <script type="text/javascript">
                    const form = document.getElementById('payment-form');
                    form.addEventListener('submit', async (event) => {
                        event.preventDefault();
                        const {error} = await stripe.confirmSetup({
                            //`Elements` instance that was used to create the Payment Element
                            elements,
                            redirect: "if_required",
                            confirmParams: {
                                // This should be changed to this current url: to-do: change the below to the current url //
                                return_url: 'https://weaverschool.com/stripe/payments/thank-you',
                            }
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
                                        console.log = 'Success! Your payment method has been saved.';
                                        Livewire.dispatch('handleRegistration', setupIntent);
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
                <button @click="upgradeOpen = false" class="absolute top-5 right-5 bg-red-500 px-3 rounded-sm text-white">
                    X
                </button>
                <h2 id="summary-heading" class="text-xl font-medium text-gray-900">Subscription summary</h2>

                <ul role="list" class="divide-y mt-10 divide-gray-200 text-2xl font-medium text-gray-900">
                    <li class="flex items-start space-x-4 py-6">
                        <img src="" alt="" class="h-20 w-20 flex-none rounded-md object-cover
                        object-center">
                        <div class="flex-auto space-y-1">
                            <a href="/"
                               target="_blank" class="text-2xl"></a>
                            <p class="text-gray-700 text-xl"></p>
                            <p class="text-gray-500 text-base"><em>Lifetime access</em></p>
                            <p class="text-gray-500 text-sm pt-5 font-light">Your payment method will be charged automatically.
                                You can cancel your subscription with one click at any time.</p>
                        </div>
                        <p class="flex-none text-2xl font-medium">
                            @lang('currency.symbol')</p>
                    </li>

                    <!-- More products... -->
                </ul>

{{--                @if($plan->times > 1)--}}
{{--                    <dl class="hidden space-y-6 border-t border-gray-200 pt-6 text-sm font-medium text-gray-900 lg:block">--}}
{{--                        <div class="flex items-center justify-between">--}}
{{--                            <dt class="text-gray-600">Monthly amount</dt>--}}
{{--                            <dd>@lang('currency.symbol')</dd>--}}
{{--                        </div>--}}

{{--                        <div class="flex items-center justify-between">--}}
{{--                            <dt class="text-gray-600">Number of payments</dt>--}}
{{--                            <dd></dd>--}}
{{--                        </div>--}}

{{--                        <div class="flex items-center justify-between">--}}
{{--                            <dt class="text-gray-600">Total amount</dt>--}}
{{--                            <dd>@lang('currency.symbol')</dd>--}}
{{--                        </div>--}}
{{--                @endif--}}

                        <div class="flex items-center justify-between border-t border-gray-200 pt-6">
                            <dt class="text-4xl font-bold">Total due today</dt>
                            <dd class="text-4xl font-bold">@lang('currency.symbol')</dd>
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
                                <p class="mt-2 text-base text-gray-500">
                                    If you're not happy with your course get 100% of your money back.
                                </p>
                            </div>
                        </div>
                    </dl>

                    <div class="fixed inset-x-0 bottom-0 flex flex-col-reverse text-sm font-medium text-gray-900 lg:hidden">
                        <div class="relative z-10 border-t border-gray-200 bg-white px-4 sm:px-6">
                            <div class="mx-auto max-w-lg">
                                <button type="button" class="flex w-full items-center py-6 font-medium shadow-md" aria-expanded="false">
                                    <span class="mr-auto text-base">Total</span>
                                    <span class="mr-2 text-base">@lang('currency.symbol')</span>
                                    <svg class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M14.77 12.79a.75.75 0 01-1.06-.02L10 8.832 6.29
                                        12.77a.75.75 0 11-1.08-1.04l4.25-4.5a.75.75 0 011.08 0l4.25 4.5a.75.75 0 01-.02
                                        1.06z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
            </div>
        </section>

    </div>

    <x-alerts.success />
    <x-alerts.error />
</div>
