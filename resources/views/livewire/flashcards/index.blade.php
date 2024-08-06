<div x-data="{
    init() { console.log('Alpine component initialized'); },
    word: $wire.entangle('word').live,
    totalWords: $wire.entangle('totalWords').live,
    randomNumbers: @json($this->randomNumbers),
    pauseVisible: false,
    settingsOpen: false,
    imageMode: false,
    romanized: $wire.entangle('romanized'),
    neuralReplayMode: $wire.entangle('neuralReplayMode'),
    whiteNoise: $wire.entangle('whiteNoise'),
    learnedCardsIncluded: $wire.entangle('learnedCardsIncluded').live,
    nextWord() {
            if(this.word < this.totalWords) {
            this.word = this.word + 1
             }
        else {
            this.word = 1
        }
        if(this.randomNumbers.includes(this.word) && this.neuralReplayMode) {
              this.pauseVisible = true;
              setTimeout(() => {
                this.pauseVisible = false;
              }, 10000);
        }
    },
    previousWord() {
        if(this.word > 1) {
            this.word = this.word - 1 }
        else {
            this.word = this.totalWords }
    },
    }"
    >
    <div x-cloak x-show="pauseVisible == true" x-transition.duration.250ms class="fixed top-0 left-0 bg-gray-900 w-screen h-screen
    opacity-100 z-50 flex items-center">
        <p class="text-white text-3xl font-extrabold text-center px-5 mx-auto">Please close your eyes and do nothing for 10 seconds.</p>
    </div>
    <div class="bg-gray-900 min-h-screen min-w-screen pt-3 px-5 flex justify-center">
        <div>
            <div x-cloak class="text-gray-200 mb-6 sm:mb-12">
                <div role="button" @click="settingsOpen = !settingsOpen" class="flex items-center justify-end">
                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9h16.5m-16.5 6.75h16.5" />
                    </svg>
                </div>
                <div x-cloak x-show="settingsOpen == true" @click.away="if (settingsOpen) settingsOpen = false" class="top-28 right-8 z-50 absolute bg-white dark:bg-gray-800 border border-1 border-gray-700 p-5 text-gray-900 dark:text-gray-100 shadow-lg rounded-lg">
                    <div class="my-2 flex">
                        <span class="mr-4">Image mode</span>
                        <div class="ml-auto">
                            <button @click="imageMode = !imageMode" type="button"
                                    :class="{ 'bg-teal-600': imageMode, 'bg-gray-200': !imageMode }"
                                    class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out" role="switch" aria-checked="false">
                                <span class="sr-only">Use setting</span>
                                <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                                <span :class="{ 'translate-x-5': imageMode, 'translate-x-0': !imageMode }"
                                    class="pointer-events-none relative inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out">
                                <!-- Enabled: "opacity-0 duration-100 ease-out", Not Enabled: "opacity-100 duration-200 ease-in" -->
                                    <span :class="{ 'opacity-0 duration-100 ease-out': imageMode, 'opacity-100 duration-200 ease-in': !imageMode }"
                                        class="opacity-100 duration-200 ease-in absolute inset-0 flex h-full w-full items-center justify-center transition-opacity" aria-hidden="true">
                                      <svg class="h-3 w-3 text-gray-400" fill="none" viewBox="0 0 12 12">
                                        <path d="M4 8l2-2m0 0l2-2M6 6L4 4m2 2l2 2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                      </svg>
                                    </span>
                                    <!-- Enabled: "opacity-100 duration-200 ease-in", Not Enabled: "opacity-0 duration-100 ease-out" -->
                                    <span :class="{ 'opacity-100 duration-200 ease-in': imageMode, 'opacity-0 duration-100 ease-out': !imageMode }"
                                        class="opacity-0 duration-100 ease-out absolute inset-0 flex h-full w-full items-center justify-center transition-opacity" aria-hidden="true">
                                      <svg class="h-3 w-3 text-teal-600" fill="currentColor" viewBox="0 0 12 12">
                                        <path d="M3.707 5.293a1 1 0 00-1.414 1.414l1.414-1.414zM5 8l-.707.707a1 1 0 001.414 0L5 8zm4.707-3.293a1 1 0 00-1.414-1.414l1.414 1.414zm-7.414 2l2 2 1.414-1.414-2-2-1.414 1.414zm3.414 2l4-4-1.414-1.414-4 4 1.414 1.414z" />
                                      </svg>
                                    </span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="my-2 flex">
                        <span class="mr-4">Show romanized</span>
                        <div class="ml-auto">
                            <button @click="romanized = !romanized" type="button"
                                    :class="{ 'bg-teal-600': romanized, 'bg-gray-200': !romanized }"
                                    class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out" role="switch" aria-checked="false">
                                <span class="sr-only">Use setting</span>
                                <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                                <span :class="{ 'translate-x-5': romanized, 'translate-x-0': !romanized }"
                                    class="pointer-events-none relative inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out">
                                <!-- Enabled: "opacity-0 duration-100 ease-out", Not Enabled: "opacity-100 duration-200 ease-in" -->
                                    <span :class="{ 'opacity-0 duration-100 ease-out': romanized, 'opacity-100 duration-200 ease-in': !romanized }"
                                        class="opacity-100 duration-200 ease-in absolute inset-0 flex h-full w-full items-center justify-center transition-opacity" aria-hidden="true">
                                      <svg class="h-3 w-3 text-gray-400" fill="none" viewBox="0 0 12 12">
                                        <path d="M4 8l2-2m0 0l2-2M6 6L4 4m2 2l2 2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                      </svg>
                                    </span>
                                    <!-- Enabled: "opacity-100 duration-200 ease-in", Not Enabled: "opacity-0 duration-100 ease-out" -->
                                    <span :class="{ 'opacity-100 duration-200 ease-in': romanized, 'opacity-0 duration-100 ease-out': !romanized }"
                                        class="opacity-0 duration-100 ease-out absolute inset-0 flex h-full w-full items-center justify-center transition-opacity" aria-hidden="true">
                                      <svg class="h-3 w-3 text-teal-600" fill="currentColor" viewBox="0 0 12 12">
                                        <path d="M3.707 5.293a1 1 0 00-1.414 1.414l1.414-1.414zM5 8l-.707.707a1 1 0 001.414 0L5 8zm4.707-3.293a1 1 0 00-1.414-1.414l1.414 1.414zm-7.414 2l2 2 1.414-1.414-2-2-1.414 1.414zm3.414 2l4-4-1.414-1.414-4 4 1.414 1.414z" />
                                      </svg>
                                    </span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="my-2 flex">
                        <span class="mr-4">Neural replay</span>
                        <div class="ml-auto">
                            <button @click="neuralReplayMode = !neuralReplayMode" type="button"
                                    :class="{ 'bg-teal-600': neuralReplayMode, 'bg-gray-200': !neuralReplayMode }"
                                    class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out" role="switch" aria-checked="false">
                                <span class="sr-only">Use setting</span>
                                <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                                <span :class="{ 'translate-x-5': neuralReplayMode, 'translate-x-0': !neuralReplayMode }"
                                      class="pointer-events-none relative inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out">
                                <!-- Enabled: "opacity-0 duration-100 ease-out", Not Enabled: "opacity-100 duration-200 ease-in" -->
                                    <span :class="{ 'opacity-0 duration-100 ease-out': neuralReplayMode, 'opacity-100 duration-200 ease-in': !neuralReplayMode }"
                                          class="opacity-100 duration-200 ease-in absolute inset-0 flex h-full w-full items-center justify-center transition-opacity" aria-hidden="true">
                                      <svg class="h-3 w-3 text-gray-400" fill="none" viewBox="0 0 12 12">
                                        <path d="M4 8l2-2m0 0l2-2M6 6L4 4m2 2l2 2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                      </svg>
                                    </span>
                                    <!-- Enabled: "opacity-100 duration-200 ease-in", Not Enabled: "opacity-0 duration-100 ease-out" -->
                                    <span :class="{ 'opacity-100 duration-200 ease-in': neuralReplayMode, 'opacity-0 duration-100 ease-out': !neuralReplayMode }"
                                          class="opacity-0 duration-100 ease-out absolute inset-0 flex h-full w-full items-center justify-center transition-opacity" aria-hidden="true">
                                      <svg class="h-3 w-3 text-teal-600" fill="currentColor" viewBox="0 0 12 12">
                                        <path d="M3.707 5.293a1 1 0 00-1.414 1.414l1.414-1.414zM5 8l-.707.707a1 1 0 001.414 0L5 8zm4.707-3.293a1 1 0 00-1.414-1.414l1.414 1.414zm-7.414 2l2 2 1.414-1.414-2-2-1.414 1.414zm3.414 2l4-4-1.414-1.414-4 4 1.414 1.414z" />
                                      </svg>
                                    </span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="my-2 flex">
                        <span class="mr-4">White noise</span>
                        <div class="ml-auto">
                            <button @click="whiteNoise = !whiteNoise" type="button"
                                    :class="{ 'bg-teal-600': whiteNoise, 'bg-gray-200': !whiteNoise }"
                                    class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out" role="switch" aria-checked="false">
                                <span class="sr-only">Use setting</span>
                                <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                                <span :class="{ 'translate-x-5': whiteNoise, 'translate-x-0': !whiteNoise }"
                                      class="pointer-events-none relative inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out">
                                <!-- Enabled: "opacity-0 duration-100 ease-out", Not Enabled: "opacity-100 duration-200 ease-in" -->
                                    <span :class="{ 'opacity-0 duration-100 ease-out': whiteNoise, 'opacity-100 duration-200 ease-in': !whiteNoise }"
                                          class="opacity-100 duration-200 ease-in absolute inset-0 flex h-full w-full items-center justify-center transition-opacity" aria-hidden="true">
                                      <svg class="h-3 w-3 text-gray-400" fill="none" viewBox="0 0 12 12">
                                        <path d="M4 8l2-2m0 0l2-2M6 6L4 4m2 2l2 2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                      </svg>
                                    </span>
                                    <!-- Enabled: "opacity-100 duration-200 ease-in", Not Enabled: "opacity-0 duration-100 ease-out" -->
                                    <span :class="{ 'opacity-100 duration-200 ease-in': whiteNoise, 'opacity-0 duration-100 ease-out': !whiteNoise }"
                                          class="opacity-0 duration-100 ease-out absolute inset-0 flex h-full w-full items-center justify-center transition-opacity" aria-hidden="true">
                                      <svg class="h-3 w-3 text-teal-600" fill="currentColor" viewBox="0 0 12 12">
                                        <path d="M3.707 5.293a1 1 0 00-1.414 1.414l1.414-1.414zM5 8l-.707.707a1 1 0 001.414 0L5 8zm4.707-3.293a1 1 0 00-1.414-1.414l1.414 1.414zm-7.414 2l2 2 1.414-1.414-2-2-1.414 1.414zm3.414 2l4-4-1.414-1.414-4 4 1.414 1.414z" />
                                      </svg>
                                    </span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="my-2 flex">
                        <span class="mr-4">Include learned</span>
                        <div class="ml-auto">
                            <button wire:click="includeLearnedCards" type="button"
                                    :class="{ 'bg-teal-600': learnedCardsIncluded, 'bg-gray-200': !learnedCardsIncluded }"
                                    class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out" role="switch" aria-checked="false">
                                <span class="sr-only">Use setting</span>
                                <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                                <span :class="{ 'translate-x-5': learnedCardsIncluded, 'translate-x-0': !learnedCardsIncluded }"
                                      class="pointer-events-none relative inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out">
                                <!-- Enabled: "opacity-0 duration-100 ease-out", Not Enabled: "opacity-100 duration-200 ease-in" -->
                                    <span :class="{ 'opacity-0 duration-100 ease-out': learnedCardsIncluded, 'opacity-100 duration-200 ease-in': !learnedCardsIncluded }"
                                          class="opacity-100 duration-200 ease-in absolute inset-0 flex h-full w-full items-center justify-center transition-opacity" aria-hidden="true">
                                      <svg class="h-3 w-3 text-gray-400" fill="none" viewBox="0 0 12 12">
                                        <path d="M4 8l2-2m0 0l2-2M6 6L4 4m2 2l2 2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                      </svg>
                                    </span>
                                    <!-- Enabled: "opacity-100 duration-200 ease-in", Not Enabled: "opacity-0 duration-100 ease-out" -->
                                    <span :class="{ 'opacity-100 duration-200 ease-in': learnedCardsIncluded, 'opacity-0 duration-100 ease-out': !learnedCardsIncluded }"
                                          class="opacity-0 duration-100 ease-out absolute inset-0 flex h-full w-full items-center justify-center transition-opacity" aria-hidden="true">
                                      <svg class="h-3 w-3 text-teal-600" fill="currentColor" viewBox="0 0 12 12">
                                        <path d="M3.707 5.293a1 1 0 00-1.414 1.414l1.414-1.414zM5 8l-.707.707a1 1 0 001.414 0L5 8zm4.707-3.293a1 1 0 00-1.414-1.414l1.414 1.414zm-7.414 2l2 2 1.414-1.414-2-2-1.414 1.414zm3.414 2l4-4-1.414-1.414-4 4 1.414 1.414z" />
                                      </svg>
                                    </span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            @if($this->flashcards->filter(function ($flashcard) { return in_array($flashcard->status, ['learning', 'reviewing', null]);})->count() < 1 && !$this->learnedCardsIncluded)
                <div class="flex rounded-md border-dashed border-2 border-white h-96 w-80 items-center justify-center text-white text-center text-lg">
                    <div class="px-4 text-2xl font-medium">
                        You have learned all the flashcards in this set. Change your settings to "Include learned" to
                        study all of your flashcards in this set.</div>
                </div>
            @else
                @foreach($this->flashcards as $flashcard)                
                    <div x-cloak x-show="word == '{{ $loop->iteration }}'" wire:key="flashcard-{{ now() . '-' . $flashcard->id }}">                        
                        <livewire:flashcards.show :$flashcard key="flashcard-{{ now() . '-' . $flashcard->id }}"/>
                        @if($flashcard->target_locale || $flashcard->set->target_locale)  
                        <div x-data="{ showPopover: false, popoverCount: 0 }" class="fixed bottom-0 left-1/2 transform -translate-x-1/2 mb-4 ml-2">
                            <!-- Popover element -->
                            <div x-cloak x-show="showPopover && popoverCount <= 2" 
                                x-transition:enter="transition-opacity duration-300 ease-in-out" 
                                x-transition:enter-start="opacity-0" 
                                x-transition:enter-end="opacity-100" 
                                x-transition:leave="transition-opacity duration-300 ease-in-out" 
                                x-transition:leave-start="opacity-100" 
                                x-transition:leave-end="opacity-0" 
                                class="absolute left-full top-0 w-48 p-2 bg-white shadow-lg border border-gray-300 rounded-md z-10">
                                    <p class="text-gray-700 text-sm">Speak the word on the flashcard and test your pronunciation</p>
                            </div>
                            <span @mouseover="if (popoverCount < 2) { showPopover = true; popoverCount++; }" @mouseleave="showPopover = false" class="ml-1">
                                <livewire:speech-analyzer :identifier="$flashcard->id" key="flashcard-{{ now() . '-speech-' . $flashcard->id }}"/>
                            </span>                            
                        </div>
                        @endif
                    </div>                    
                @endforeach
            @endif
            <div x-cloak class="flex flex-col w-full">
                <div class="mt-8 mb-8 w-full" id="card-arrows">
                    <span @click="previousWord" role="button" class="float-left text-teal-500">
                        {{-- <img class="h-20 w-20" src="/images/icons/previous-button.svg"></img> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-16">
                          <path fill-rule="evenodd" d="M11.03 3.97a.75.75 0 0 1 0 1.06l-6.22 6.22H21a.75.75 0 0 1 0 1.5H4.81l6.22 6.22a.75.75 0 1 1-1.06 1.06l-7.5-7.5a.75.75 0 0 1 0-1.06l7.5-7.5a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    <span @click="nextWord" class="float-right text-teal-500" role="button">
                        {{-- <img class="h-20 w-20" src="/images/icons/next-button.svg"></img> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-16">
                          <path fill-rule="evenodd" d="M12.97 3.97a.75.75 0 0 1 1.06 0l7.5 7.5a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 1 1-1.06-1.06l6.22-6.22H3a.75.75 0 0 1 0-1.5h16.19l-6.22-6.22a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </div>
                <div class="flex flex-col w-full relative mt-14">
                    <!-- Container for both the back link and the check mark, aligned horizontally -->
                    <div class="flex justify-between items-center h-12 px-4 absolute bottom-5">
                        <!-- Back to set link -->
                        @if (Str::contains(url()->current(), 'dashboard'))
                            <a href="{{ url()->previous() }}" class="text-white text-sm flex items-center">
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="text-white w-7 h-7">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </a>
                        @else
                            <a href="/flashcards/sets/{{ $flashcardSetId }}" class="text-white text-sm flex items-center">
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="text-white w-7 h-7">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>

                <div x-cloak x-show="whiteNoise" class="my-8 bg-gray-100 rounded-lg">
                    <audio controls class="w-full rounded-sm" id="whiteNoise">
                        <source src="/audio/WeaverSchool-WhiteNoise-1-60min.mp3"  type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                    <script>
                        var audio = document.getElementById("whiteNoise");
                        audio.volume = 0.01;
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
