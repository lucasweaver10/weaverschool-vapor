<div>
    @if ( session('error') )
        <div x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 4000)"
            x-show="show"
            class="rounded-md bg-red-100 p-4 top-5 right-4 fixed z-40">
            <div class="flex">
                <div class="flex-shrink-0">                    
                    <svg fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="text-red-400 size-6 mt-1">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                    </svg>

                </div>
                <div class="ml-3">
                    <p class="text-2xl font-medium text-red-800">{{ session('error') }}</p>                                        
                </div>
            </div>
        </div>
    @endif

    <div x-cloak x-data="{ show: false, message: '' }" x-init="setTimeout(() => show = false, 4000)"
         x-show="show" class="rounded-md bg-red-50 p-4 top-5 fixed z-50 max-w-xs mx-auto left-0 right-0 sm:right-4 sm:left-auto" x-on:error.window="show = true, message = $event.detail.message, setTimeout(() => show = false, 4000)">        
        <div class="flex align-middle">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-red-400 align-middle" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="ml-3 flex-1">
                <p class="text-sm font-medium text-red-800" x-text="message"></p>
            </div>                    
        </div>
    </div>

</div>
