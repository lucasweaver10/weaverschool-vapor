 <!-- Modal -->
<div>
    <div x-cloak x-show="showModal" class="fixed inset-0 bg-gray-600 bg-opacity-90 overflow-y-auto h-full w-full" x-on:click.away="showModal = false">
        <div class="relative top-20 mx-auto py-5 px-4 border border-gray-800 w-3/4 sm:w-1/2 shadow-lg rounded-md bg-gray-900">
            <!-- Close Button -->
            <div class="flex justify-end">
                <button @click="showModal = false" class="text-gray-400 hover:text-gray-500">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <!-- Logo -->
            <div class="flex justify-center">
                <img src="{{ config('app.logo_dark')}}" alt="Your Logo" class="h-12"> <!-- Adjust the class 'h-16' to fit the size of your logo as needed -->
            </div>
                
            <div class="mt-3 text-center">
                <h3 class="text-4xl leading-8 font-medium text-teal-400 mt-8">Get early access to Learning Paths</h3>
                <div class="mt-2 px-7 py-3">
                    <p class="text-xl text-gray-100 mb-5 sm:mx-24">Join our beta testing program to get 50% off and early access to our new Learning Paths product.</p>
                    <form action="{{ route('beta-optin-subscribers.store')}}" method="POST">
                        @csrf
                        <input type="email" name="email" placeholder="Your email" required class="text-lg mt-3 px-4 py-2 border rounded-md w-full"/>
                        <input type="hidden" name="product_id" value="7001">
                        <button type="submit" class="mt-4 w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-teal-500 text-xl font-bold text-white hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                            Join Waiting List
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirmation Message -->
    <div x-cloak x-show="showMessage" class="fixed inset-0 flex items-center justify-center">
        <div class="bg-teal-900 shadow-lg rounded-md p-12 sm:p-24 mx-4 sm:mx-auto">
            <p class="text-2xl text-gray-100">Thank you for your interest. We'll email you soon!</p>
            <button @click="showMessage = false" class="mt-3 w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-teal-400 text-lg font-medium text-gray-100 hover:bg-teal-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                Dismiss
            </button>
        </div>
    </div>
</div>    
