<x-layouts.app title="Online English courses | The Weaver School">      
    <x-slot name="title">
        Learning Paths: Customized language learning powered by AI
    </x-slot>
    <x-slot name="description">
        Introducing Learning Paths: customized language learning powered by AI. Learn any topic you choose with vocabulary words, key phrases, grammar explanations, and flashcards created just for you.
    </x-slot>
<x-layouts.guest>
<main x-data="{ showModal: false, showMessage: false }">
    <!-- hero -->
<div class="dark:bg-gray-900 pt-20 pb-16 px-5 sm:px-0 text-center lg:pt-16">
    <h1 class="mx-auto max-w-4xl font-display text-5xl font-medium tracking-tight text-slate-900 dark:text-gray-100 sm:text-7xl">
        Follow your customized language
        <span class="relative whitespace-nowrap text-teal-500 dark:text-teal-300">
            <svg
                aria-hidden="true"
                viewBox="0 0 418 42"
                class="absolute top-2/3 left-0 h-[0.58em] w-full fill-teal-700/70"
                preserveAspectRatio="none"
            >
                <path d="M203.371.916c-26.013-2.078-76.686 1.963-124.73 9.946L67.3 12.749C35.421 18.062 18.2 21.766 6.004
                25.934 1.244 27.561.828 27.778.874 28.61c.07 1.214.828 1.121 9.595-1.176 9.072-2.377 17.15-3.92
                39.246-7.496C123.565 7.986 157.869 4.492 195.942 5.046c7.461.108 19.25 1.696 19.17 2.582-.107 1.183-7.874
                4.31-25.75 10.366-21.992 7.45-35.43 12.534-36.701 13.884-2.173 2.308-.202 4.407 4.442 4.734 2.654.187
                3.263.157 15.593-.78 35.401-2.686 57.944-3.488 88.365-3.143 46.327.526 75.721 2.23 130.788 7.584 19.787
                1.924 20.814 1.98 24.557 1.332l.066-.011c1.201-.203
                1.53-1.825.399-2.335-2.911-1.31-4.893-1.604-22.048-3.261-57.509-5.556-87.871-7.36-132.059-7.842-23.239-.254-33.617-.116-50.627.674-11.629.54-42.371
                2.494-46.696 2.967-2.359.259 8.133-3.625 26.504-9.81 23.239-7.825 27.934-10.149 28.304-14.005.417-4.348-3.529-6-16.878-7.066Z" />
            </svg>
            <span class="relative">learning path</span>
        </span>
        
    </h1>
    <p class="mx-auto mt-10 max-w-4xl text-2xl tracking-tight text-slate-700 dark:text-slate-200">
        Learn the words and phrases you need for any language topic you choose. Get your personalized learning path with vocabulary words, key phrases, grammar explanations, and flashcards created for you and ready to study in minutes.
    </p>
    <img class="w-2/3 sm:w-2/3 h-auto mx-auto my-16 rounded-xl shadow-xl border border-gray-700" src="/images/pages/learning-paths/language-learning-paths-index.jpg" alt="language learning paths for customized language learning">
    <div class="mt-10 flex justify-center gap-x-6 sm:gap-x-8">
        <a href="{{ route('learning-paths.explore.index', ['locale' => session('locale', 'en')])}}"
            class="max-w-2/3 bg-teal-500 hover:bg-teal-600 py-3 px-4 rounded-lg text-xl sm:text-2xl font-semibold text-white transform hover:scale-110 transition duration-150 ease-in-out">
            Explore Available Paths
        </a>
        <a href="{{ route('learning-paths.index', ['locale' => session('locale', 'en')])}}" role="button" class="bg-teal-200 max-w-2/3 hover:bg-teal-300 py-3 px-4 rounded-lg text-xl sm:text-2xl font-semibold text-teal-900 transform hover:scale-110 transition duration-150 ease-in-out">Try Now</a>
        @guest
        {{-- <a href="/register" role="button" class="bg-teal-500 hover:bg-teal-700 py-3 px-4 rounded-lg text-2xl font-semibold text-white">Try Free</a> --}}
        @else
        {{-- <a href="/flashcards/sets" role="button" class="bg-teal-500 hover:bg-teal-700 py-3 px-4 rounded-lg text-2xl font-semibold text-white">Try Now</a> --}}
        @endguest    
    </div>
</div>
<!-- End hero -->
    <!-- Google style block -->
<div class="dark:bg-gray-200">
    <div class="container sm:mx-auto px-8">
        <div class="flex flex-wrap md:flex-nowrap py-16 sm:py-16">
            <!-- Column 1 -->
            <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-8">
                <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">CUSTOMIZED BY AI</span>
                <h2 class="text-4xl font-bold mt-4">Let our AI create a learning path for you in minutes</h2>
                <p class="mt-3"><strong>Choose your own language learning topic</strong> and our AI will
                give you all the relevant vocabulary words and key phrases you need to know for that topic.
                </p>
                <p class="mt-4"><strong>Every word and phrase includes</strong> an audio pronounciaton example, an illustrative image, and a grammar explanation.</p>
            </div>
            <!-- Column 2 -->
            <div class="md:w-1/2 flex justify-center items-center mx-auto py-8 sm:py-0 sm:p-16">
                <img src="/images/pages/learning-paths/language-learning-paths-intro-to-speaking-thai.jpg" alt="ai learning path creation" class="rounded-lg max-w-full h-auto">                
            </div>
        </div>
        <div class="flex flex-wrap md:flex-nowrap my-16 sm:my-16">
            <!-- Column 1 -->
            <div class="order-last sm:order-first md:w-1/2 flex justify-center items-center py-8 sm:py-0 sm:p-16">
                <img src="/images/pages/learning-paths/learning-path-vocabulary-word.jpg" alt="Rounded Image" class="rounded-lg max-w-full h-auto">                
            </div>
            <!-- Column 2 -->        
            <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-16">
                <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">KEY VOCABULARY</span>
                <h2 class="text-4xl font-bold mt-4">Learn only the relevant vocabulary you need</h2>
                <p class="mt-3">Instead of following a pre-made course with words you may or may not need, study only the vocabulary <strong>relevant to the language learning topic you want to learn</strong>.                
                </p>
                {{-- <p class="mt-4">Hear how each word is pronounced, see it in an example sentence, and read an in-depth explanation so you can <strong>fully grasp the meaning of the word</strong>.</p> --}}
            </div>
        </div>
        <div class="flex flex-wrap md:flex-nowrap my-16 sm:my-16">
            <!-- Column 1 -->                    
            <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-8">
                <span class="badge bg-teal-500 text-sm font-bold text-white py-2 px-3 rounded">GO IN DEPTH</span>
                <h2 class="text-4xl font-bold mt-4">Learn vocabulary words & phrases in-depth                                  
                </h2>                
                <p class="mt-3">Study each word and phrase in your path individually so you can <strong>understand and master them all</strong>.</p>
                <p class="mt-4">Hear how each word is pronounced, see it in an example sentence, and read an in-depth explanation so you can <strong>fully grasp its meaning</strong>.</p>                
            </div>
            <!-- Column 2 -->            
            <div class="md:w-1/2 flex justify-center items-center py-8 sm:py-0 sm:p-16">
                <img src="/images/pages/learning-paths/learning-path-word-explanation-preview.jpg" alt="Rounded Image" class="rounded-lg max-w-full h-auto">
            </div>
        </div>
        <div class="flex flex-wrap md:flex-nowrap my-16 sm:my-16">
            <!-- Column 1 -->
            <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-8">
                <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">KEY PHRASES</span>
                <h2 class="text-4xl font-bold mt-4">Put it together with key phrases</h2>
                <p class="mt-3">Start speaking your target language faster by learning <strong>key phrases</strong> that will help you <strong>become conversational in no time</strong>.</p>                    
            </div>
            <!-- Column 2 -->
            <div class="order-last sm:order-first md:w-1/2 flex justify-center items-center py-8 sm:py-0 sm:p-16">
                <img src="/images/pages/learning-paths/learning-path-key-phrases-studying.jpg" alt="Rounded Image" class="rounded-lg max-w-full h-auto">
            </div>
        </div>
        <div class="flex flex-wrap md:flex-nowrap my-16 sm:my-16">
            <!-- Column 1 -->
            <div class="order-2 sm:order-1 md:w-1/2 flex justify-center items-center py-8 sm:py-0 sm:p-16">
                <img src="/images/flashcards/flashcard maker image creation ai.png" alt="Rounded Image" class="rounded-lg max-w-full h-auto">
            </div>
            <!-- Column 2 -->
            <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-8">
                <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">FLASHCARDS INCLUDED</span>
                <h2 class="text-4xl font-bold mt-4">Get an entire set of flashcards with each learning path</h2>
                <p class="mt-3">For each learning path you create our AI will create an <strong>entire set of flashcards including every word and phrase in your path</strong>.</p>
                <p class="mt-4">Every flashcard includes an image, voice pronounciation example, and multiple study modes.</p>                                                            
            </div>
        </div>
        <div class="flex flex-wrap md:flex-nowrap my-16 sm:my-16">
            <!-- Column 1 -->
            <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-8">
                <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">CULTURAL UNDERSTANDING</span>
                <h2 class="text-4xl font-bold mt-4">Cultural notes for full understanding</h2>
                <p class="mt-3">You can't learn a country's language <strong>without learning about its culture</strong>.</p>
                <p class="mt-4">Because of this, <strong>your learning path will also include Cultural Notes</strong>: short notes that explain certain <strong>important cultural concepts</strong> you need to understand for your chosen language topic.</p>                
            </div>
            <!-- Column 2 -->
            <div class="order-last sm:order-first md:w-1/2 flex justify-center items-center py-8 sm:p-16">
                <img src="/images/pages/learning-paths/learning-paths-cultural-notes.jpg" alt="Rounded Image" class="rounded-lg max-w-full h-auto">
            </div>
        </div>
        <div class="flex flex-wrap md:flex-nowrap my-16 sm:my-16">
            <!-- Column 1 -->
            <div class="order-2 sm:order-1 md:w-1/2 flex justify-center items-center py-8 sm:py-0 sm:p-16">
                <img src="/images/pages/learning-paths/language-learning-paths-key-phrases.jpg" alt="Rounded Image" class="rounded-lg max-w-full h-auto">
            </div>
            <!-- Column 2 -->
            <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-8">
                <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">ROMANIZED SPELLINGS</span>
                <h2 class="text-4xl font-bold mt-4">Use the most advanced Romanized spellings for a head start</h2>
                <p class="mt-3">Learning a new language is extra challenging when you have to <strong>learn a brand new alphabet.</strong></p>
                <p class="mt-4">For languages with non-latin alphabets, you'll get the <strong>most phonetically-friendly romanized spelling</strong>
                    of every word included in your learning path so you can learn your target language without learning it's alphabet.</p>                    
            </div>
        </div>
        
        <div class="flex flex-wrap md:flex-nowrap py-16 sm:py-16">
            <!-- Column 1 -->
            <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-8">
                <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">LANGUAGE AVAILABILITY</span>
                <h2 class="text-4xl font-bold mt-4">Available in all languages</h2>
                <p class="mt-3">Audio creation is <strong>available for 22 languages</strong> (and counting), while text content creation is <strong>available in all languages</strong>.</p>                
            </div>
            <!-- Column 2 -->        
            <div class="order-last sm:order-first md:w-1/2 flex justify-center items-center py-8 sm:p-16">
                <img src="/images/pages/learning-paths/learning-path-vocabulary-image.jpg" alt="Rounded Image" class="rounded-lg max-w-full h-auto">
            </div>
        </div>
        
    </div>
</div>
    <!-- End google style block -->

<!-- Cta -->
<div class="dark:bg-gray-900 pt-20 pb-16 px-5 sm:px-0 text-center lg:pt-16">
    <h1 class="mx-auto max-w-4xl font-display text-5xl font-medium tracking-tight text-slate-900 dark:text-gray-100 sm:text-7xl">
        Start your personalized learning path
        <span class="relative whitespace-nowrap text-teal-500 dark:text-teal-300">
            <svg
                aria-hidden="true"
                viewBox="0 0 418 42"
                class="absolute top-2/3 left-0 h-[0.58em] w-full fill-teal-700/70"
                preserveAspectRatio="none"
            >
                <!-- SVG Path -->
            </svg>
            <span class="relative">right now!</span>
        </span>
    </h1>
    <p class="mx-auto mt-10 mb-12 max-w-3xl text-2xl tracking-tight text-slate-700 dark:text-gray-200">
        Learn how to speak about any topic in your target language in less than 2 weeks.
    </p>    
        
    <a href="{{ route('learning-paths.index', ['locale' => session('locale', 'en') ]) }}" role="button" class="bg-teal-500 hover:bg-teal-600 py-3 px-4 rounded-lg text-2xl font-semibold text-white shadow-lg">
        Try Now
    </a>

   
</div>
<!-- End cta -->

</main>
</x-layouts.guest>
</x-layouts.app>
