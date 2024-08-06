<div class="sm:grid sm:grid-cols-8 sm:items-center justify-center align-middle sm:gap-4 sm:pt-5">
    <div class="sm:col-span-8 mb-5">
        <label for="image" class="block text-sm font-medium text-gray-700 leading-6">Upload Image</label>
    </div>

    <div class="mt-1 sm:col-span-4 sm:mt-0 text-sm font-medium text-gray-700">
        <input type="file" id="image" wire:model.live="image" class="">
    </div>
    @error('image')
    <span class="text-red-500">{{ $message }}</span>
    @enderror

    <div class="mt-1 sm:col-span-4 sm:mt-0">
        <div wire:loading.remove="store" class="flex justify-end align-top">
            <button wire:click.prevent="store" class="bg-teal-300 hover:bg-teal-400 text-black font-bold py-2 px-4 rounded">
            Upload</button>
        </div>

        <svg wire:loading="store" class="mr-3 fill-current justify-end" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M12,1A11,11,0,1,0,23,12,11,11,0,0,0,12,1Zm0,19a8,8,0,1,1,8-8A8,8,0,0,1,12,20Z" opacity=".25"/>
            <path d="M10.14,1.16a11,11,0,0,0-9,8.92A1.59,1.59,0,0,0,2.46,12,1.52,1.52,0,0,0,4.11,10.7a8,8,0,0,1,6.66-6.61A1.42,1.42,0,0,0,12,2.69h0A1.57,1.57,0,0,0,10.14,1.16Z">
                <animateTransform attributeName="transform" type="rotate" dur="0.75s" values="0 12 12;360 12 12" repeatCount="indefinite"/></path>
        </svg>
    </div>
    <x-alerts.success />
</div>
