<div>
    <form id="payment-form">
        <div id="payment-element">
            <!-- Elements will create form elements here -->
        </div>
        <div class="mt-12 float-right">
            <button wire:loading.attr="disabled" type="submit"
                    class="w-full rounded-lg border border-transparent bg-blue-400 py-3 px-5 font-medium text-white shadow-sm
                                       hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2
                                       focus:ring-offset-gray-50
                                       sm:order-last sm:w-auto">
                                    <span wire:loading wire:target="handleIntent" class="mr-2">
                                        <img src="{{ asset('images/loading.gif') }}" alt="Loading" class="w-5 h-5">
                                    </span>
                <span wire:loading.remove>
                                        Add payment method
                                    </span>
            </button>
        </div>
        <div id="error-message">
            <!-- Display error message to your customers here -->
        </div>
    </form>
    <script type="text/javascript">
        const options = {
            clientSecret: '{{ $this->clientSecret }}',

            // Fully customizable with appearance API.
            appearance: {
                theme: 'stripe',
                variables: {
                    colorPrimary: '#0570de',
                    colorBackground: '#ffffff',
                    colorText: '#000000',
                    colorDanger: '#df1b41',
                    spacingUnit: '4px',
                    borderRadius: '4px',
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
                            Livewire.dispatch('handleIntent', setupIntent);
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
