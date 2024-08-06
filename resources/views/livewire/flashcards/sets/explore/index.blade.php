<div x-data="{ mobileActionButtonOpen: false }">
    <header class="flex flex-col md:flex-row justify-between items-center w-full">
        <x-flashcards.sets.header.heading text="Explore All Flashcard Sets" />
        <div class="grid grid-cols-2 mb-8 sm:mb-0 sm:flex gap-x-4 items-center">
            <span class="mt-3 mr-1">
                @if($this->query === '')
                <livewire:search-bar />
                @else
                <button wire:click="clearQuery" class="text-teal-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </button>
                @endif
            </span>            
            <x-flashcards.sets.header.button text="Create Set" :route="route('flashcards.sets.create')" />
        </div>
    </header>

    <div wire:loading class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!-- Background backdrop -->
        <div class="fixed inset-0 bg-slate-900/25 backdrop-blur transition-opacity opacity-100" aria-hidden="true">        
            <div class="fixed inset-0 z-10 w-screen overflow-y-auto flex min-h-full items-center justify-center p-4 text-center sm:items-center sm:p-0">
                <!-- Modal panel -->
                <div class="flex justify-center items-center relative text-center w-full max-w-lg transform px-4 transition-all opacity-100 scale-100">
                    <img src="{{ asset('images/loading.gif') }}" alt="Loading" class="w-5 h-5">
                </div>
            </div>
        </div>
    </div>

    <x-banners.upgrades.pro :description="'Create 5 flashcard sets per month with AI images and audio with Weaver School Pro'" />    

    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="col-span-1">
            <a href="/flashcards/sets/create/topic">
                <div class="rounded-lg bg-teal-700 relative block w-full h-full p-12  hover:bg-teal-600 text-white shadow-lg transform transition duration-500 hover:scale-105">
                    <div class="justify-between items-center">
                        <span class="font-bold text-2xl text-white mb-2">Create from Topic</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="inline-flex text-amber-300 w-5 h-5 mb-3">
                            <path fill-rule="evenodd" d="M9 4.5a.75.75 0 0 1 .721.544l.813 2.846a3.75 3.75 0 0 0 2.576 2.576l2.846.813a.75.75 0 0 1 0 1.442l-2.846.813a3.75 3.75 0 0 0-2.576 2.576l-.813 2.846a.75.75 0 0 1-1.442 0l-.813-2.846a3.75 3.75 0 0 0-2.576-2.576l-2.846-.813a.75.75 0 0 1 0-1.442l2.846-.813A3.75 3.75 0 0 0 7.466 7.89l.813-2.846A.75.75 0 0 1 9 4.5ZM18 1.5a.75.75 0 0 1 .728.568l.258 1.036c.236.94.97 1.674 1.91 1.91l1.036.258a.75.75 0 0 1 0 1.456l-1.036.258c-.94.236-1.674.97-1.91 1.91l-.258 1.036a.75.75 0 0 1-1.456 0l-.258-1.036a2.625 2.625 0 0 0-1.91-1.91l-1.036-.258a.75.75 0 0 1 0-1.456l1.036-.258a2.625 2.625 0 0 0 1.91-1.91l.258-1.036A.75.75 0 0 1 18 1.5ZM16.5 15a.75.75 0 0 1 .712.513l.394 1.183c.15.447.5.799.948.948l1.183.395a.75.75 0 0 1 0 1.422l-1.183.395c-.447.15-.799.5-.948.948l-.395 1.183a.75.75 0 0 1-1.422 0l-.395-1.183a1.5 1.5 0 0 0-.948-.948l-1.183-.395a.75.75 0 0 1 0-1.422l1.183-.395c.447-.15.799-.5.948-.948l.395-1.183A.75.75 0 0 1 16.5 15Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <p class="text-white text-left">Just give us a topic and let our AI create a flashcard set for you.</p>
                </div>
            </a>
        </div>
        <div class="col-span-1">
            <a href="/flashcards/sets/create/file">
                <div class="rounded-lg bg-teal-700 relative block w-full h-full p-12  hover:bg-teal-600 text-white shadow-lg transform transition duration-500 hover:scale-105">
                    <div class="justify-between items-center">
                        <span class="font-bold text-2xl text-white mb-2">Create from File</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="inline-flex text-amber-300 w-5 h-5 mb-3">
                            <path fill-rule="evenodd" d="M9 4.5a.75.75 0 0 1 .721.544l.813 2.846a3.75 3.75 0 0 0 2.576 2.576l2.846.813a.75.75 0 0 1 0 1.442l-2.846.813a3.75 3.75 0 0 0-2.576 2.576l-.813 2.846a.75.75 0 0 1-1.442 0l-.813-2.846a3.75 3.75 0 0 0-2.576-2.576l-2.846-.813a.75.75 0 0 1 0-1.442l2.846-.813A3.75 3.75 0 0 0 7.466 7.89l.813-2.846A.75.75 0 0 1 9 4.5ZM18 1.5a.75.75 0 0 1 .728.568l.258 1.036c.236.94.97 1.674 1.91 1.91l1.036.258a.75.75 0 0 1 0 1.456l-1.036.258c-.94.236-1.674.97-1.91 1.91l-.258 1.036a.75.75 0 0 1-1.456 0l-.258-1.036a2.625 2.625 0 0 0-1.91-1.91l-1.036-.258a.75.75 0 0 1 0-1.456l1.036-.258a2.625 2.625 0 0 0 1.91-1.91l.258-1.036A.75.75 0 0 1 18 1.5ZM16.5 15a.75.75 0 0 1 .712.513l.394 1.183c.15.447.5.799.948.948l1.183.395a.75.75 0 0 1 0 1.422l-1.183.395c-.447.15-.799.5-.948.948l-.395 1.183a.75.75 0 0 1-1.422 0l-.395-1.183a1.5 1.5 0 0 0-.948-.948l-1.183-.395a.75.75 0 0 1 0-1.422l1.183-.395c.447-.15.799-.5.948-.948l.395-1.183A.75.75 0 0 1 16.5 15Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <p class="text-white">Upload a file with text (pdf or image) and let our AI create a flashcard set for you.</p>
                </div>
            </a>
        </div>
        <div class="col-span-1">
            <a href="/flashcards/sets/create/youtube">
                <div class="rounded-lg bg-teal-700 relative block w-full h-full p-12  hover:bg-teal-600 text-white shadow-lg transform transition duration-500 hover:scale-105">
                    <div class="justify-between items-center">
                        <span class="font-bold text-2xl text-white mb-2">Create from YouTube</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="inline-flex text-amber-300 w-5 h-5 mb-3">
                            <path fill-rule="evenodd" d="M9 4.5a.75.75 0 0 1 .721.544l.813 2.846a3.75 3.75 0 0 0 2.576 2.576l2.846.813a.75.75 0 0 1 0 1.442l-2.846.813a3.75 3.75 0 0 0-2.576 2.576l-.813 2.846a.75.75 0 0 1-1.442 0l-.813-2.846a3.75 3.75 0 0 0-2.576-2.576l-2.846-.813a.75.75 0 0 1 0-1.442l2.846-.813A3.75 3.75 0 0 0 7.466 7.89l.813-2.846A.75.75 0 0 1 9 4.5ZM18 1.5a.75.75 0 0 1 .728.568l.258 1.036c.236.94.97 1.674 1.91 1.91l1.036.258a.75.75 0 0 1 0 1.456l-1.036.258c-.94.236-1.674.97-1.91 1.91l-.258 1.036a.75.75 0 0 1-1.456 0l-.258-1.036a2.625 2.625 0 0 0-1.91-1.91l-1.036-.258a.75.75 0 0 1 0-1.456l1.036-.258a2.625 2.625 0 0 0 1.91-1.91l.258-1.036A.75.75 0 0 1 18 1.5ZM16.5 15a.75.75 0 0 1 .712.513l.394 1.183c.15.447.5.799.948.948l1.183.395a.75.75 0 0 1 0 1.422l-1.183.395c-.447.15-.799.5-.948.948l-.395 1.183a.75.75 0 0 1-1.422 0l-.395-1.183a1.5 1.5 0 0 0-.948-.948l-1.183-.395a.75.75 0 0 1 0-1.422l1.183-.395c.447-.15.799-.5.948-.948l.395-1.183A.75.75 0 0 1 16.5 15Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <p class="text-white">Paste in a YouTube video URL and get flashcards with images, voice examples, and more.</p>
                </div>
            </a>
        </div>
        {{-- <div class="col-span-1">
            <a href="/flashcards/sets/create/list">
                <div class="rounded-lg bg-teal-700 relative block w-full h-full p-12  hover:bg-teal-600 text-white shadow-lg transform transition duration-500 hover:scale-105">
                    <div class="flex justify-between items-center">
                        <h3 class="font-bold text-2xl text-white mb-2">Create from List</h3>
                    </div>
                    <p class="text-white">Paste in a list of words and definitions and we'll convert it into flashcards for you.</p>
                </div>
            </a>
        </div> --}}
        <div class="col-span-1">
            <a href="/flashcards/sets/create">
                <button type="button" class="relative block w-full h-full rounded-lg border-2 border-dashed border-gray-400 p-12 text-center hover:border-gray-600 hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2">
                    <svg class="mx-auto h-12 w-12 text-teal-500" stroke="currentColor" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.429 9.75 2.25 12l4.179 2.25m0-4.5 5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0 4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0-5.571 3-5.571-3" />
                    </svg>
                    <span class="mt-2 block text-sm font-semibold text-teal-500 hover:text-teal-700">+ Create a new set</span>
                </button>
            </a>
        </div>

        @forelse($this->flashcardSets as $set)
        <div wire:key="{{ $set->id }}" class="bg-gray-800 hover:bg-gray-600 rounded-lg overflow-hidden shadow-lg shadow-gray-600/200 flex flex-col h-full transition duration-300 ease-in-out transform hover:scale-105">
            <div class="flex-grow">
                @if($set->flashcards->first() && $set->flashcards->first()->image_url)
                <div class="relative w-full h-48 rounded-t-lg overflow-hidden">
                    <img src="{{ $set->flashcards->first()->image_url }}" alt="{{ $set->title }}" class="lazy w-full h-full object-cover">
                    <div class="absolute top-0 left-0 w-full h-full bg-teal-800 bg-opacity-25"></div>
                </div>
                @else
                <div class="w-full h-48 rounded-t-lg bg-teal-700 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-white shadow-sm">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>
                </div>
                @endif
                <div class="p-4">
                    <a href="/flashcards/sets/{{ $set->id }}">
                        <h2 class="text-2xl font-semibold text-teal-400">{{ $set->title }}</h2>
                    </a>
                    <p class="text-gray-200">{{ $set->description }}</p>
                </div>
            </div>
            <!-- Button Container -->
            <div class="flex justify-between items-center p-4">
                <!-- Edit Button -->
                <a role="button" href="{{ route('flashcards.sets.explore.show', ['locale' => session('locale', 'en'), 'id' => $set->id]) }}" class="py-2 text-teal-300 hover:text-teal-100 font-bold text-lg rounded-lg">
                    View
                </a>
                @guest
                <a href="{{ route('flashcards.index', ['id' => $set->id ]) }}" class="py-2 px-4 bg-teal-500 hover:bg-teal-400 text-white font-bold rounded-lg">
                    Study
                </a>
                @else
                <livewire:flashcards.manage-set-from-explore :set="$set"/>
                @endguest
                
                {{-- @if(!auth()->user()->hasFlashcardsAccess())
                <!-- Free user study button -->
                <a href="{{ route('subscription-checkout', ['pro', 5001])}}" class="py-2 px-4 bg-teal-500 hover:bg-teal-400 text-white font-bold rounded-lg">
                    Study
                </a>
                @else
                <!-- Study Button -->
                <a href="/flashcards/sets/{{ $set->id }}/study" class="py-2 px-4 bg-teal-500 hover:bg-teal-400 text-white font-bold rounded-lg">
                    Study
                </a>
                @endif --}}
            </div>
        </div>
        @empty
        {{-- <p>You have no flashcard sets yet.</p> --}}
        @endforelse
        
    </div>
    <div class="mt-24 mb-5">
    <!-- Pagination links -->
    {{ $flashcardSets->links() }}
    </div>
</div>