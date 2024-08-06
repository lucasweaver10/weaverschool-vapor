<div class="sm:grid sm:grid-cols-8 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
    <label for="image" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Choose Author Image</label>

    <div class="mt-1 sm:col-span-3 sm:mt-0 text-sm font-medium">
        <input type="file" id="image" wire:model.live="image" class="mr-2">
    </div>
    @error('image')
    <span class="text-red-500">{{ $message }}</span>
    @enderror

    <div class="mt-1 sm:col-span-3 sm:mt-0">
        <div wire:loading.remove="store" class="flex justify-end">
            <button wire:click.prevent="store" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm
            text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2
            focus:ring-blue-500">Upload</button>
        </div>

        <svg wire:loading="store" class="mr-3 fill-current" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M12,1A11,11,0,1,0,23,12,11,11,0,0,0,12,1Zm0,19a8,8,0,1,1,8-8A8,8,0,0,1,12,20Z" opacity=".25"/>
            <path d="M10.14,1.16a11,11,0,0,0-9,8.92A1.59,1.59,0,0,0,2.46,12,1.52,1.52,0,0,0,4.11,10.7a8,8,0,0,1,6.66-6.61A1.42,1.42,0,0,0,12,2.69h0A1.57,1.57,0,0,0,10.14,1.16Z">
                <animateTransform attributeName="transform" type="rotate" dur="0.75s" values="0 12 12;360 12 12" repeatCount="indefinite"/></path>
        </svg>
    </div>
    <x-alerts.success />
</div>
