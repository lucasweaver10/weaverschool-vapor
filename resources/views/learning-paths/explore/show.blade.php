    <x-layouts.app>      
        <x-slot name="title">
            {{ $path->getTranslation('title', session('locale', 'en')) }}
        </x-slot>
        <x-slot name="description">
            {{ $path->getTranslation('description', session('locale', 'en')) }}
        </x-slot>
    <x-layouts.guest>

    <div class="bg-gray-900 min-h-screen flex flex-col items-center p-4">
        <div class="w-full max-w-4xl mb-12">
            <h1 class="text-3xl sm:text-4xl font-bold text-gray-100 mb-8">{{ $path->getTranslation('title', session('locale', 'en')) }}</h1>
            <x-flashcards.sets.header.back-link text="Back" route="{{ route('learning-paths.explore.index', ['locale' => session('locale', 'en')]) }}" />    
        </div>       

        <div class="w-full max-w-4xl mt-8 pb-8">
            <!-- Vocabulary Words Section -->
            <div x-data="{ open: !window.location.hash.includes('phrase-') && !window.location.hash.includes('note-') }" class="mb-4">
                <button @click="open = !open" class="flex justify-between items-center w-full text-teal-500 hover:text-teal-300 mb-8">
                    <h2 class="text-2xl font-semibold">Vocabulary Words ({{ count($path->vocabularyWords)}})</h2>
                    <span class="flex items-center">
                        <svg x-cloak x-show="!open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 mb-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                        <svg x-cloak x-show="open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 mb-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                        </svg>
                    </span>
                </button>

                <div x-cloak x-show="open" 
                x-transition:enter="transition ease-out duration-300" 
                x-transition:enter-start="opacity-0 transform scale-y-0 origin-top" 
                x-transition:enter-end="opacity-100 transform scale-y-100" 
                x-transition:leave="transition ease-in duration-300" 
                x-transition:leave-start="opacity-100 transform scale-y-100" 
                x-transition:leave-end="opacity-0 transform scale-y-0">
                    @foreach ($path->vocabularyWords as $word)
                        <div id="word-{{ $word->id }}" class="bg-gray-800 hover:bg-gray-600 rounded-lg overflow-hidden shadow-lg shadow-gray-600/200 mb-6 p-8 transition duration-300 ease-in-out">
                            <h2 class="text-2xl font-bold text-white text-center mb-4">{{ $word->getTranslation('word', $path->target_locale) }} @unless(!$word->getTranslation('romanized_word', $path->target_locale))({{ $word->getTranslation('romanized_word', $path->target_locale) }})@endunless                           
                                @unless(!$word->getWordAudioUrl($path->target_locale, 'FEMALE') && !$word->getWordAudioUrl($path->target_locale, 'MALE'))
                                <audio id="wordAudio{{ $word->id }}" src="{{ $word->getWordAudioUrl($path->target_locale, 'FEMALE') ?: $word->getWordAudioUrl($path->target_locale, 'MALE') }}" preload="true"></audio>
                                <button onclick="document.getElementById('wordAudio{{ $word->id }}').play()">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-white inline-flex mb-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 0 1 0 12.728M16.463 8.288a5.25 5.25 0 0 1 0 7.424M6.75 8.25l4.72-4.72a.75.75 0 0 1 1.28.53v15.88a.75.75 0 0 1-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.009 9.009 0 0 1 2.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75Z" />
                                    </svg>
                                </button>
                                @endunless  
                            </h2>                                                    
                            @unless(!$word->getMedia('images')->first())
                                <img class="mx-auto my-8 w-32 sm:w-48 md:w-64 lg:w-80 h-auto rounded-md" src="{{ $word->getMedia('images')->first()->getUrl('small') ?? $word->image_url }}" alt="{{ $word->getTranslation('word', $path->target_locale) }}">
                            @endunless
                            <div class="flex justify-center">                    
                                <a href="{{ route('learning-paths.index', ['locale' => session('locale', 'en')]) }}" 
                                class="mt-4 bg-teal-500 hover:bg-teal-400 text-white text-xl font-bold py-1 px-3 rounded focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                    Learn
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


            <!-- Key Phrases Section -->
            <div x-data="{ open: false }" x-init="open = window.location.hash.includes('phrase-') && window.location.hash.substring(1).startsWith('phrase-')" class="mb-10">
                <button @click="open = !open" class="flex justify-between items-center w-full text-teal-500 hover:text-teal-300 mb-8">
                    <h2 class="text-2xl font-semibold">Key Phrases ({{ count($path->keyPhrases)}})</h2>
                    <span class="flex items-center">
                        <svg x-cloak x-show="!open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 mb-3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                        <svg x-cloak x-show="open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 mb-3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                        </svg>
                    </span>
                </button>

                <div x-cloak x-show="open" 
                     x-transition:enter="transition ease-out duration-300" 
                     x-transition:enter-start="opacity-0 transform scale-y-0 origin-top" 
                     x-transition:enter-end="opacity-100 transform scale-y-100" 
                     x-transition:leave="transition ease-in duration-300" 
                     x-transition:leave-start="opacity-100 transform scale-y-100" 
                     x-transition:leave-end="opacity-0 transform scale-y-0">
                    @foreach ($path->keyPhrases as $phrase)
                        <div id="phrase-{{ $phrase->id }}" class="bg-gray-800 hover:bg-gray-600 rounded-lg overflow-hidden shadow-lg shadow-gray-800/600 mb-6 p-8">
                            <h2 class="text-2xl font-bold text-white text-center mb-4">{{ $phrase->getTranslation('phrase',  $path->target_locale) }} @unless(!$phrase->getTranslation('romanized_phrase',  $path->target_locale))({{ $phrase->getTranslation('romanized_phrase',  $path->target_locale) }})@endunless                                
                                @unless(!$phrase->getPhraseAudioUrl($path->target_locale, 'FEMALE') && !$phrase->getPhraseAudioUrl($path->target_locale, 'MALE'))                                
                                <audio id="phraseAudio{{ $phrase->id }}" src="{{ $phrase->getPhraseAudioUrl($path->target_locale, 'FEMALE') ?: $phrase->getPhraseAudioUrl($path->target_locale, 'MALE') }}" preload="true"></audio>
                                <button onclick="document.getElementById('phraseAudio{{ $phrase->id }}').play()">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-white inline-flex mb-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 0 1 0 12.728M16.463 8.288a5.25 5.25 0 0 1 0 7.424M6.75 8.25l4.72-4.72a.75.75 0 0 1 1.28.53v15.88a.75.75 0 0 1-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.009 9.009 0 0 1 2.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75Z" />
                                    </svg>
                                </button>
                                @endunless  
                            </h2>
                            @unless(!$phrase->getMedia('images')->first())
                                <img class="mx-auto my-8 w-32 sm:w-48 md:w-64 lg:w-80 h-auto rounded-md" src="{{ $phrase->getMedia('images')->first()->getUrl('small') ?? $phrase->image_url }}" alt="{{ $phrase->getTranslation('phrase', $path->target_locale) }}">
                            @endunless                        
                            <div class="flex justify-center">
                            
                                <a href="{{ route('learning-paths.index', ['locale' => session('locale', 'en')]) }}" 
                                    class="mt-4 bg-teal-500 hover:bg-teal-400 text-white text-xl font-bold py-1 px-3 rounded focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                    Learn
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


            <!-- Cultural Notes Section -->
            <div x-data="{ open: false }" x-init="open = window.location.hash.includes('note-') && window.location.hash.substring(1).startsWith('note-')" class="mb-4">
                <button @click="open = !open" class="flex justify-between items-center w-full text-teal-500 hover:text-teal-300 mb-8">
                    <h2 class="text-2xl font-semibold mb-8">Cultural Notes ({{ count($path->culturalNotes) }})</h2>
                    <span class="flex items-center">
                        <svg x-cloak x-show="!open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 mb-3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                        <svg x-cloak x-show="open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 mb-3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                        </svg>
                    </span>
                </button>

                <div x-cloak x-show="open" 
                     x-transition:enter="transition ease-out duration-300" 
                     x-transition:enter-start="opacity-0 transform scale-y-0 origin-top" 
                     x-transition:enter-end="opacity-100 transform scale-y-100" 
                     x-transition:leave="transition ease-in duration-300" 
                     x-transition:leave-start="opacity-100 transform scale-y-100" 
                     x-transition:leave-end="opacity-0 transform scale-y-0">
                    @foreach ($path->culturalNotes as $note)
                        <div id="note-{{ $note->id }}" class="bg-gray-800 rounded-lg overflow-hidden shadow-lg shadow-gray-800/600 mb-6 p-8">
                            <h2 class="text-2xl font-bold text-white text-center mb-4">{{ $note->getTranslation('title',  'en-US') }}</h2>
                            {{-- <div class="text-gray-200 mt-2">{!! Str::limit(Str::of($note->getTranslation('content',  'en'))->markdown(), 150, '...') !!}</div> --}}
                            <div class="flex justify-center">
                                    <a href="{{ route('learning-paths.index', ['locale' => session('locale', 'en')]) }}" 
                                    class="mt-4 bg-teal-500 hover:bg-teal-400 text-white text-xl font-bold py-1 px-3 rounded focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                    Learn
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div> 

</x-layouts.guest>
</x-layouts.app>