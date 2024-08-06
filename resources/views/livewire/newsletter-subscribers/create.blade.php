<div x-data="{ subscribed: $wire.entangle('subscribed') }" 
class="px-6 py-4 bg-gray-300 dark:bg-gray-800 rounded-md">
    <div class="mb-8 text-gray-700 dark:text-gray-200 font-bold">
        Get my monthly newsletter full of language learning tips straight to your inbox...
    </div>
    <div x-show="!subscribed" class="mb-2 grid grid-cols-2">
        <div class="col-span-2">
            <label for="email" class="block text-gray-700 dark:text-gray-100 text-base font-bold mb-2">Email*</label>
            <input type="email" wire:model='email' id="email" placeholder="username@email.com" 
                class="px-4 py-2 w-full rounded-md bg-gray-900 border border-gray-600
                text-xl text-center text-gray-700 dark:text-gray-100 placeholder-gray-300 dark:placeholder-gray-400 focus:outline-none focus:ring-2 
                focus:ring-teal-400">
                @error('email')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror              
        </div>
        <div class="col-span-2">
            <button wire:click='subscribeToNewsletter' role="button"
                class="mt-4 w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2
                 bg-teal-500 text-xl font-bold text-white hover:bg-teal-600 focus:outline-none focus:ring-2 
                 focus:ring-offset-2 focus:ring-teal-500">
                Subscribe
            </button>
        </div>
    </div> 
    <div x-cloak x-show="subscribed" class="">
        <div class="text-gray-700 dark:text-gray-200">Status:</div>
        <div class="my-4 text-3xl text-center font-bold text-yellow-300 dark:text-yellow-400 flex items-center justify-center gap-x-2">
            SUBSCRIBER 
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-flex w-8 h-8">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
            </svg>
        </div>
    </div>                                
                            
    {{-- @if($post->product_id)
        <!-- Insert blade component with $productId as a variable -->
        <x-blog.sidebar.ctas.flashcards-app :productId="$post->product_id"/>
    @endif --}}
</div>