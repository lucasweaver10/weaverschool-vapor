<x-layouts.app>
  <x-slot name="title">
    Learn phrase
  </x-slot>
  <x-slot name="description">
    Learn this phrase.
  </x-slot>
<x-layouts.dashboard.show>

    <div class="bg-gray-900 min-h-screen flex flex-col items-center px-10 sm:px-5 pt-5 pb-12">
        <div class="w-full max-w-4xl mb-8">
            <h1 class="text-4xl font-bold text-teal-300 mb-4">
                {{ $phrase->getTranslation('phrase', $path->pivot->target_locale) }} @unless(!$phrase->getTranslation('romanized_phrase', $path->pivot->target_locale))({{ $phrase->getTranslation('romanized_phrase', $path->pivot->target_locale)}})@endunless
            </h1>
            <x-flashcards.sets.header.back-link text="Back" route="{{ route('learning-paths.show', ['locale' => session('locale'), 'learningPathId' => $path->id])}}#phrase-{{ $phrase->id}}" />
        </div>
        <div class="w-full max-w-4xl">
            <div class="grid grid-cols-2 prose prose-2xl dark:prose-invert text-gray-100 mb-8">
                <div class="col-span-2 sm:col-span-1 order-2 sm:order-1 sm:pr-16">
                    <p class="text-teal-500 mb-2 text-lg font-bold">Phrase:</p>
                    <p>{{ $phrase->getTranslation('phrase', $path->pivot->target_locale) }} @unless(!$phrase->getTranslation('romanized_phrase', $path->pivot->target_locale))({{ $phrase->getTranslation('romanized_phrase', $path->pivot->target_locale)}})@endunless
                        @unless(!$phrase->getPhraseAudioUrl($path->pivot->target_locale, $path->pivot->voice_gender))
                        <audio id="phraseAudio{{ $phrase->id }}" src="{{ $phrase->getPhraseAudioUrl($path->pivot->target_locale, $path->pivot->voice_gender) }}" preload="true"></audio>
                        <button onclick="document.getElementById('phraseAudio{{ $phrase->id }}').play()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-white inline-flex mb-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 0 1 0 12.728M16.463 8.288a5.25 5.25 0 0 1 0 7.424M6.75 8.25l4.72-4.72a.75.75 0 0 1 1.28.53v15.88a.75.75 0 0 1-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.009 9.009 0 0 1 2.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75Z" />
                            </svg>
                        </button>
                        @endunless 
                    </p>
                    <p class="text-teal-500 mb-2 text-lg font-bold">Translation:</p>
                    <p>{{ $phrase->getTranslation('phrase', $path->pivot->native_locale) }}</p>
                    <p class="text-teal-500 mb-2 mt-4 text-lg font-bold">Example:</p>
                    <p>{{ $phrase->getTranslation('example', $path->pivot->target_locale) }}
                        @unless(!$phrase->getExampleAudioUrl($path->pivot->target_locale, $path->pivot->voice_gender))
                        <audio id="exampleAudio{{ $phrase->id }}" src="{{ $phrase->getExampleAudioUrl($path->pivot->target_locale, $path->pivot->voice_gender) }}" preload="true"></audio>
                        <button onclick="document.getElementById('exampleAudio{{ $phrase->id }}').play()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-white inline-flex mb-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 0 1 0 12.728M16.463 8.288a5.25 5.25 0 0 1 0 7.424M6.75 8.25l4.72-4.72a.75.75 0 0 1 1.28.53v15.88a.75.75 0 0 1-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.009 9.009 0 0 1 2.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75Z" />
                            </svg>
                        </button>
                        @endunless 
                    </p>
                </div>
                <div class="col-span-2 sm:col-span-1 order-1 sm:order-2">
                    @unless(!$phrase->getMedia('images')->first())
                        <img class="lazy mx-auto mt-5 sm:mb-12 w-56 sm:w-full h-auto rounded-md shadow-md" data-src="{{ $phrase->getMedia('images')->first()->getUrl('medium') ?? $phrase->image_url }}" alt="{{ $phrase->getTranslation('phrase', $path->pivot->target_locale) }}">
                    @endunless
                </div>
            </div>
            

            <!-- Storybook Introduction -->
            {{-- <p class="text-white text-center mt-4 mb-4">
                Let's learn about "<span class="text-teal-400">{{ $phrase->getTranslation('phrase', $path->pivot->target_locale) }}</span>" and see how it's used.
            </p> --}}

            <!-- Definition and Explanation Section -->
            <div class="prose prose-2xl dark:prose-invert text-gray-100 mb-8">                
                <p class="text-teal-500 mb-2 mt-4 text-lg font-bold">Explanation:</p>
                <p class="prose prose-2xl text-gray-100">{!! Str::of($phrase->getExplanation($path->pivot->target_locale, $path->pivot->native_locale))->markdown() !!}</p>
            </div>
            
            <!-- Practice Section - To be Implemented -->
            <!-- <div class="practice-section mb-8">
                <h3 class="text-xl font-semibold text-teal-500 mb-4">Practice:</h3>
                
                <!-- Interactive Input for Practice -->
                <!-- <textarea class="w-full bg-gray-800 text-white rounded-lg p-4 mt-2"></textarea>
                <button class="mt-4 px-4 py-2 bg-teal-500 text-white rounded-lg hover:bg-teal-600">Submit</button>
            </div> -->

            <!-- Navigation Buttons -->
            <div class="flex justify-between mt-24">
                @if($prevPhrase)
                    <a href="{{ route('learning-paths.phrases.show', ['locale' => session('locale'), 'learningPathId' => $path->id, 'phraseId' => $prevPhrase->id ?? $phrase->Id]) }}" class="bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded">
                        Previous
                    </a>
                @endif
                @if($nextPhrase)
                    <a href="{{ route('learning-paths.phrases.show', ['locale' => session('locale'), 'learningPathId' => $path->id, 'phraseId' => $nextPhrase->id ?? $phrase->Id]) }}" class="bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded">
                        Next
                    </a>
                @endif
            </div>
        </div>
    </div>


</x-layouts.dashboard.show>
</x-layouts.app>
