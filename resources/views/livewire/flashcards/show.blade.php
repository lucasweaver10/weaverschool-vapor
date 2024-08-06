<div>
    <div x-cloak x-show="imageMode == false" role="button" x-data="{ showDefinition: false, showExample: false}" @click="showDefinition = !showDefinition"
         class="bg-gray-800 shadow-lg shadow-gray-600/200 relative flex rounded-md border-dashed border-2 border-teal-600 h-96 w-80 items-center justify-center text-white text-center text-lg">
        <div x-cloak x-show="showDefinition == false" class="">
            <div class="mb-4 px-4 text-4xl font-medium">{{ $flashcard->term }}</div>
            <div x-cloak x-show="romanized" class="px-4 text-md font-medium">@if($flashcard->romanized_term){{ $flashcard->romanized_term }}@endif</div>
        </div>
        <div x-cloak x-show="showDefinition == true" class="">
            <div class="px-4 text-2xl font-medium">{{ $flashcard->definition }}</div>
        </div>
        @if($flashcard->example)
        <button @click.stop="showExample = !showExample" class="absolute bottom-3 right-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-7 h-7">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </button>
        <div x-cloak x-show="showExample" @click.away="showExample = !showExample" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" 
        class="absolute w-64 p-5 bg-gray-600 border border-1 border-gray-500 shadow-lg rounded-lg text-gray-100 text-2xl z-50">
            <p>{{ $flashcard->example }}</p>            
        </div>
        @endif
    </div>
    <div x-cloak x-show="imageMode == true" role="button" x-data="{ showImage: true, showExample: false}" @click="showImage = !showImage "
         class="bg-gray-800 relative flex rounded-md border-dashed border-2 border-teal-600 h-96 w-80 py-4 px-4 items-center justify-center text-white text-center text-lg">
        <div x-show="showImage == true" class="mx-4">
            <img class="rounded-md" src="{{ $flashcard->image_url }}" style="max-height: 60%;">
        </div>
        <div x-cloak x-show="showImage == false" class="">
            <div class="px-4 text-4xl font-medium">{{ $flashcard->term }}</div>
            <div x-cloak x-show="romanized" class="px-4 text-small font-medium">@if($flashcard->romanized_term){{ $flashcard->romanized_term }}@endif</div>
            @if($flashcard->example)
            <button @click.stop="showExample = !showExample" class="absolute bottom-3 right-2 text-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </button>
            @endif
        </div>
        <div x-cloak x-show="showExample" @click.away="showExample = !showExample" 
        x-transition:enter="transition ease-out duration-200" 
        x-transition:enter-start="transform opacity-0 scale-95" 
        x-transition:enter-end="transform opacity-100 scale-100" 
        x-transition:leave="transition ease-in duration-150" 
        x-transition:leave-start="transform opacity-100 scale-100" 
        x-transition:leave-end="transform opacity-0 scale-95" 
        class="absolute w-64 p-4 bg-gray-700 shadow-lg rounded-lg text-gray-100 text-2xl z-50">
            <p>{{ $flashcard->example }}</p>            
        </div>
    </div>
    @if($flashcard->audio_url)
        <div class="absolute mt-12 left-1/2 transform -translate-x-1/2">
            <audio id="wordAudio{{ $flashcard->id }}" src="{{ $flashcard->audio_url }}" preload="none"></audio>
            <span class="text-white">
                <button onclick="document.getElementById('wordAudio{{ $flashcard->id }}').play()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width=".5" stroke="currentColor" class="w-12 h-12">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 010 12.728M16.463
                        8.288a5.25 5.25 0 010 7.424M6.75 8.25l4.72-4.72a.75.75 0 011.28.53v15.88a.75.75 0
                        01-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.01 9.01 0 012.25 12c0-.83.112-1.633.322-2.396C2.806
                        8.756 3.63 8.25 4.51 8.25H6.75z" />
                    </svg>
                </button>
            </span>
        </div>
    @endif
    <!-- Mark learned Check mark icon -->
    <div role="button" wire:click="markAsLearned({{ $flashcard->id }})" class="absolute items-center float-right ml-72 mr-8 mt-32">
        @if(optional($flashcard->userFlashcardProgress)->status == 'learned')
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#0d9488" class="size-7 text-white">
                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
            </svg>
         @else
            <svg fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="text-white w-7 h-7">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        @endif
    </div>
</div>
