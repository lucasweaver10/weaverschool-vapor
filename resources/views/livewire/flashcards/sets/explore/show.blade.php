<div>
    <!-- Header Section -->
        <header x-data="{ mobileActionButtonOpen: false }" class="flex flex-col md:flex-row justify-between items-center w-full">        
            <x-flashcards.sets.header.heading text="{{ $this->flashcardSet->title }}" />
            <div class="w-full md:w-auto">
                <nav class="flex justify-between items-center flex-wrap">
                    <div class="relative inline-block items-center">                   
                        <x-flashcards.sets.header.menu-button />
                        <x-flashcards.sets.header.menu flashcardSetId="{{ $this->flashcardSet->id }}" />                    
                    </div>
                    <span class="mt-3 mr-6">
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
                    @guest                    
                    <!-- Study Button -->
                    <x-flashcards.sets.header.button text="Study" :route="route('flashcards.index', ['id' => $this->flashcardSet->id ])" />                                                       
                    @else
                    <livewire:flashcards.manage-set-from-explore :set="$this->flashcardSet"/>
                    @endguest
                </nav>
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

        <!-- Flashcard List Section -->
        <section class="mt-10">
            @isset($this->flashcards)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" style="font-family: 'proxima-nova', sans-serif;">
                    <a href="/flashcards/{{ $this->flashcardSet->id }}/create">
                        <button type="button" class="relative block w-full h-full rounded-lg border-2 border-dashed border-gray-400 p-12 text-center hover:border-gray-600 hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">        
                            <svg class="mx-auto h-12 w-12 text-teal-500" stroke="currentColor" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 8.25V6a2.25 2.25 0 0 0-2.25-2.25H6A2.25 2.25 0 0 0 3.75 6v8.25A2.25 2.25 0 0 0 6 16.5h2.25m8.25-8.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-7.5A2.25 2.25 0 0 1 8.25 18v-1.5m8.25-8.25h-6a2.25 2.25 0 0 0-2.25 2.25v6" />
                            </svg>    
                            <span class="mt-2 block text-sm font-semibold text-teal-700 hover:text-teal-900">+ Create a new flashcard</span>
                        </button>
                    </a>
                    @foreach($this->flashcards as $flashcard)
                        <div wire:key="{{ $flashcard->id }}" class="bg-gray-800 hover:bg-gray-700 flex flex-col rounded-lg shadow-lg overflow-hidden transition duration-300 ease-in-out transform hover:scale-105">
                            <!-- Image Display -->
                            @if($flashcard->image_url)
                                <img data-src="{{ $flashcard->image_url }}" alt="{{ $flashcard->term }}" class="lazy w-full h-48 object-cover rounded-t-lg">
                            @else
                                <div class="w-full h-48 bg-teal-800 flex items-center justify-center">
                                    <span class="text-teal-100">No Image Available</span>
                                </div>
                            @endif

                            <!-- Content Section -->
                            <div class="flex flex-col justify-between flex-grow">
                                <div class="p-5">
                                    <div class="flex justify-between items-center">
                                        <span class="flex">
                                            <div class="flex-grow">
                                                <a href="/flashcards/{{ $this->flashcardSet->id }}/{{ $flashcard->id }}/edit">
                                                    <h3 class="text-teal-400 text-2xl font-semibold">
                                                        {{ $flashcard->term }} 
                                                        @if($flashcard->romanized_term)
                                                            ({{ $flashcard->romanized_term }})
                                                        @endif
                                                    </h3>
                                                </a>
                                            </div>
                                            @if($flashcard->audio_url)
                                                <audio id="wordAudio{{ $flashcard->id }}" src="{{ $flashcard->audio_url }}" preload="none"></audio>
                                                <button class="text-gray-100" onclick="document.getElementById('wordAudio{{ $flashcard->id }}').play()">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="mt-1 ml-2 w-4 h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 0 1 0 12.728M16.463 8.288a5.25 5.25 0 0 1 0 7.424M6.75 8.25l4.72-4.72a.75.75 0 0 1 1.28.53v15.88a.75.75 0 0 1-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.009 9.009 0 0 1 2.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75Z" />
                                                    </svg>
                                                </button>
                                            @endif
                                        </span>                                   
                                    </div>
                                    <p class="text-gray-200 mt-2">{{ $flashcard->definition }}</p>
                                    @if($flashcard->example)<p class="text-gray-200 mt-2 text-xs">"{{ $flashcard->example }}"</p>@endif
                                </div>                            
                            </div>
                        </div>
                    @endforeach
                </div>
            @endisset
        </section>
    <x-alerts.success />
    <x-alerts.error />
</div>
