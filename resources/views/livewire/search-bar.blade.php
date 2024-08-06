<div x-data="{ searchModalVisible: false}">
    <!-- Search button -->
    <button @click="searchModalVisible = true; $nextTick(() => { $refs.input.focus(); });" class="text-teal-300">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
        </svg>
    </button>
    <!-- Search modal -->
    <div x-cloak x-show="searchModalVisible" @keydown.escape="searchModalVisible = false" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!-- Background backdrop -->
        <div class="fixed inset-0 bg-slate-900/25 backdrop-blur transition-opacity opacity-100" aria-hidden="true"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <!-- Modal panel -->
            <div class="relative w-full max-w-lg transform px-4 transition-all opacity-100 scale-100">
                <div class="overflow-hidden rounded-lg bg-white shadow-md">
                    <div class="relative">
                        <input id="searchInput" x-ref="input" @click.away="searchModalVisible = false" wire:model="query" wire:keydown.enter="handleQuery" @keydown.enter="searchModalVisible = false" class="block w-full appearance-none bg-transparent py-4 pl-4 pr-12 text-xl text-slate-900 placeholder:text-slate-600 focus:outline-none sm:text-sm sm:leading-6" type="combobox" placeholder="Search for a set" aria-label="Search for a set" />
                        <button wire:click="handleQuery" class="absolute right-0 top-0 h-full px-4 bg-teal-500 text-white flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-700" aria-label="Search">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>
