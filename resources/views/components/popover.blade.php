<div x-data="{ popoverVisible: false }" class="group relative inline-block">
    <svg xmlns="http://www.w3.org/2000/svg" @click="popoverVisible = !popoverVisible" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mb-1 inline-flex cursor-pointer">
    <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
    </svg>
    <!-- Popover element -->
    <div x-cloak x-show="popoverVisible" class="opacity-0 group-hover:opacity-100 absolute left-full top-0 ml-2 w-48 p-2 bg-white shadow-lg border border-gray-300 rounded-md z-10 transition-opacity duration-300 ease-in-out">
        <p class="text-gray-700 text-sm">{{ $text }}</p>
    </div>
</div>