<x-layouts.lessons.show :course="$course" :lesson="$lesson" :registration="$registration">
<x-slot name="title">
    Flashcards
</x-slot>
<x-slot name="content">
    <!--  Make alpine data element that sets the current word to the first word in the list -->
    <div x-data="{
        word: 1,
        randomNumbers: @json($randomNumbers),
        pauseVisible: false,
        nextWord() {
            if(this.word < {{ $totalWords }}) {
                this.word = this.word + 1 }
            else {
                this.word = 1
            }
            if(this.randomNumbers.includes(this.word)) {
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
                this.word = {{ $totalWords }} }
        },
        }" class="px-5">

        <div x-cloak x-show="pauseVisible == true" x-transition.duration.250ms class="fixed top-0 left-0 bg-gray-700 w-screen h-screen absolute
        opacity-100 z-50 flex items-center text-center">
            <p class="text-white text-3xl font-extrabold text-center mx-auto">Please close your eyes and do nothing for 10 seconds.</p>
        </div>

        @foreach($lesson->vocabularyWords as $index => $word)
            <div x-data="{ showDefinition: false}" @click="showDefinition = !showDefinition " class="h-72 w-full
            rounded-xl bg-gray-700 shadow-lg text-white text-center mt-3 flex items-center justify-center"
             x-cloak x-show="word == {{ $loop->iteration }}">
                <div x-cloak x-show="showDefinition == false" class="">
                    <div class="text-4xl font-extrabold">{{ $word->word }}</div>
                </div>
                <div x-cloak x-show="showDefinition == true">
                    <div class="text-2xl font-bold px-5">{{ ucfirst($word->definition) }}</div>
                </div>
            </div>
        @endforeach

        <div class="w-full mt-3">
            <div class="text-center">
                <span @click="previousWord" class="mr-2 inline-flex" role="button">
                    <svg fill="bg-gray-700" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="white" class="w-12 h-12">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 9l-3 3m0 0l3 3m-3-3h7.5M21 12a9 9
                        0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                </span>
                <span @click="nextWord" class="ml-2 inline-flex" role="button">
                    <svg fill="bg-gray-700" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="white" class="w-12 h-12">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9
                        9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </span>
            </div>
        </div>
    </div>

</x-slot>
</x-layouts.lessons>
