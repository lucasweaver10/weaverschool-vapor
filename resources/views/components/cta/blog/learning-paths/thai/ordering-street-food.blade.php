<div>
<!-- Full-Width CTA for Learning Path with Carousel of Vocabulary Words -->
@php $path = App\Models\LearningPath::with('vocabularyWords')->find(5); @endphp
            
<div class="bg-gray-800 mx-auto sm:mx-4 text-center pt-5 sm:pb-10 px-0 sm:px-10 mt-4 sm:mt-0 mb-10 sm:mb-0 not-prose rounded-lg">
    <div class="text-4xl font-bold text-slate-100 mt-5 mb-6">
        Introducing Learning Paths: Customized language learning powered by AI
    </div>
    <p class="text-gray-200 text-xl mb-8 max-w-2xl px-2 mx-auto">
        Learn the words and phrases you need for any language topic you choose. Get vocabulary words, key phrases, grammar explanations, and flashcards created for you in minutes.
    </p>

    <!-- Neumorphism Card for Single Learning Path with Image -->
    <div class="bg-gray-700 hover:bg-gray-600 rounded-lg shadow-lg w-full max-w-4xl mx-auto">
        <div class="flex flex-col sm:flex-row"> <!-- Set a fixed height for the flex container -->
            <!-- Image on the left -->
            <div class="w-full sm:w-1/3">
                <img src="{{ $path->vocabularyWords->first()->image_url ?? asset('images/weaver_school_learning_path_fallback_image.webp') }}" 
                alt="{{ $path->title }}" 
                class="object-cover w-full h-full sm:rounded-l-lg mb-2 sm:mb-0">
            </div>
            <!-- Content on the right -->
            <div x-data="{ activeWord: 0, words: {{ $path->vocabularyWords->take(5)->pluck('id') }}, interval: null }"
                 x-init="interval = setInterval(() => { activeWord = activeWord < words.length - 1 ? activeWord + 1 : 0; }, 2500);"
                 x-on:mouseenter="clearInterval(interval)"
                 x-on:mouseleave="interval = setInterval(() => { activeWord = activeWord < words.length - 1 ? activeWord + 1 : 0; }, 2500);"
                 class="flex-1 px-5 pt-5 pb-10 flex flex-col justify-between relative">
                <div class="mx-auto">
                    <div class="text-3xl font-bold text-teal-400 sm:mb-4 sm:px-4">{{ $path->title }}</div>
                    <div class="relative overflow-hidden mb-4" style="height: 200px;">
                        @foreach ($path->vocabularyWords->take(5) as $index => $word)
                            <div x-cloak x-show="words[activeWord] === {{ $word->id }}"
                                 x-transition:enter="transition-transform duration-500"
                                 x-transition:enter-start="transform translate-x-full"
                                 x-transition:enter-end="transform translate-x-0"
                                 x-transition:leave="transition-transform duration-500"
                                 x-transition:leave-start="transform translate-x-0"
                                 x-transition:leave-end="transform -translate-x-full"
                                 class="absolute inset-0 flex flex-row items-center justify-between sm:mt-10 sm:px-12 mx-auto"
                                 style="will-change: transform;">
                                <div class="font-bold flex items-start text-gray-100">
                                    {{ $word->getTranslation('word', 'th-TH') }}
                                    @unless(!$word->getTranslation('romanized_word', 'th-TH'))
                                        ({{ $word->getTranslation('romanized_word', 'th-TH') }})
                                    @endunless
                                    @unless(!$word->getWordAudioUrl('th-TH', 'FEMALE'))
                                        <audio id="wordAudio{{ $word->id }}" src="{{ $word->getWordAudioUrl('th-TH', 'FEMALE') }}" preload="true"></audio>                                                                                
                                        <button onclick="document.getElementById('wordAudio{{ $word->id }}').play()">                                                                                
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white ml-2 mt-2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 0 1 0 12.728M16.463 8.288a5.25 5.25 0 0 1 0 7.424M6.75 8.25l4.72-4.72a.75.75 0 0 1 1.28.53v15.88a.75.75 0 0 1-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.009 9.009 0 0 1 2.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75Z" />
                                            </svg>
                                        </button>
                                    @endunless
                                </div>
                                <div class="">
                                    <img src="{{ $word->image_url }}" alt="" class="ml-2 h-24 w-auto rounded">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a href="{{ route('learning-paths.info', ['locale' => session('locale', 'en')])}}" 
                        class="px-3 py-2 rounded-lg bg-teal-500 text-white text-lg font-semibold hover:bg-teal-600 transition ease-in-out duration-150">
                        Join Waiting List
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>