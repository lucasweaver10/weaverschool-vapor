<div x-data="{ open: false}" 
     x-init="() => {
         let chatBubble = $refs.chatBubble;         
     }"     
     class="fixed bottom-4 right-4">
    <div x-show="!open" @click="open = true" class="cursor-pointer bg-teal-500 p-4 rounded-full text-white shadow-lg">
        <span class="text-white">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path fill-rule="evenodd" d="M5.337 21.718a6.707 6.707 0 0 1-.533-.074.75.75 0 0 1-.44-1.223 3.73 3.73 0 0 0 .814-1.686c.023-.115-.022-.317-.254-.543C3.274 16.587 2.25 14.41 2.25 12c0-5.03 4.428-9 9.75-9s9.75 3.97 9.75 9c0 5.03-4.428 9-9.75 9-.833 0-1.643-.097-2.417-.279a6.721 6.721 0 0 1-4.246.997Z" clip-rule="evenodd" />
            </svg>
        </span>
    </div>

    <div x-cloak x-show="open" x-ref="chatBubble"
         class="bg-gray-200 p-8 rounded-lg shadow-lg max-w-sm w-full">
        <button @click="open = false" class="absolute top-2 right-2 text-gray-500">&times;</button>
        <form wire:submit.prevent="sendMessage">
            <div class="mb-4">
                <div class="text-xl font-bold mb-2">Message Me Directly</div>
                <span class="text-lg">Something broken? Have a feature request? Tell me anything.</span>
            </div>            
            <div class="mb-4">
                <label for="subject" class="block text-base text-gray-700 font-bold">Subject*</label>
                <input type="text" id="subject" wire:model="subject" class="w-full mt-1 p-2 border border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="message" class="block text-base text-gray-700 font-bold">Message*</label>
                <textarea id="message" wire:model="message" class="w-full mt-1 p-2 border border-gray-300 rounded-md"></textarea>
            </div>
            <div class="flex justify-end">
                <button wire:loading.remove type="submit" class="bg-teal-500 font-bold text-white px-4 py-2 rounded-md hover:bg-teal-600">Send</button>
                <span x-cloak wire:loading><img class="h-5 w-5" src="{{ asset('/images/loading.gif') }}" wire:loading wire:target="sendMessage" alt="Loading..."></span>
            </div>
            @if ($successMessage)
                <div class="mt-4 text-green-500">{{ $successMessage }}</div>
            @endif
        </form>
    </div>
</div>
