<x-layouts.app title="Online English courses | The Weaver School">      
    <x-slot name="title">
        Flashcard features
    </x-slot>
    <x-slot name="description">
        All the AI powered flashcard featues available in our flashcards tool.
    </x-slot>
<x-layouts.guest>
<main>
    <!-- Breadcrumb -->
    <div class="bg-white py-3 px-5 ml-5 mt-3">
        <a href="{{ route('flashcards.info', ['locale' => session('locale', 'en')])}}" class="text-teal-900 hover:text-teal-700 font-medium text-sm">← Back to Overview</a>
    </div>
    <!-- hero -->
<div class="pt-20 pb-10 px-5 sm:px-0 text-center lg:pt-16">
    <h1 class="mx-auto max-w-4xl font-display text-5xl font-medium tracking-tight text-slate-900 sm:text-7xl">
        Flashcard features that help you
        <span class="relative whitespace-nowrap text-teal-500">
            <svg
                aria-hidden="true"
                viewBox="0 0 418 42"
                class="absolute top-2/3 left-0 h-[0.58em] w-full fill-teal-200/70"
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
            <span class="relative">learn faster</span>
        </span>        
    </h1>
    <p class="mx-auto mt-6 max-w-2xl text-2xl tracking-tight text-slate-700">
        Read the explanation of all of our AI-powered flashcard features.
    </p>
    <img class="w-1/2 h-auto mx-auto my-10 rounded-xl shadow-xl border border-gray-200" src="/images/flashcards/flashcard app and ai flashcard maker.jpg" alt="flashcard app and ai flashcard maker"></img>
    <div class="mt-10 flex justify-center gap-x-6">
        <a href="{{ route('flashcards.sets.explore.index', ['locale' => session('locale', 'en')])}}" role="button" class="bg-teal-200 hover:bg-teal-300 py-3 px-4 rounded-lg text-2xl font-semibold text-teal-900">Explore Sets</a>
        @guest
        <a href="/register" role="button" class="bg-teal-500 hover:bg-teal-700 py-3 px-4 rounded-lg text-2xl font-semibold text-white">Try free</a>
        @else
        <a href="/flashcards/sets" role="button" class="bg-teal-500 hover:bg-teal-700 py-3 px-4 rounded-lg text-2xl font-semibold text-white">Try now</a>
        @endguest
    </div>
</div>
<!-- End hero -->
    <!-- Google style block -->
    <div class="container sm:mx-auto px-8">
        <div class="flex flex-wrap md:flex-nowrap my-16 sm:my-16">
            <!-- Column 1 -->
            <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-8">
                <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">USE FILES</span>
                <h2 class="text-4xl font-bold mt-4">Create flashcards from a file (PDF, image, doc, and more) using AI</h2>
                <p class="mt-3"><strong>Upload a pdf, doc, image, or screenshot</strong> of some text you want to learn vocabulary from, and our AI flashcard maker will
                create flashcards for all the relevant vocabulary words for you autoatically.
                </p>
                <p class="mt-4"><strong>Just upload your file and let our AI do all the work for you</strong>.</p>
                <a href="{{ route('flashcards.features.create-from-file', ['locale' => session('locale', 'en')])}}" role="button" class="bg-white border-2 border-teal-500 hover:bg-teal-200 py-3 px-4 mt-5 rounded-lg text-2xl font-semibold text-teal-900">Learn More</a>
            </div>
            <!-- Column 2 -->
            <div class="md:w-1/2 flex justify-center items-center mx-auto py-8 sm:py-0 sm:p-16">
                <img src="/images/flashcards/create flashcards from a file with ai.png" alt="Rounded Image" class="rounded-lg max-w-full h-auto">                
            </div>
        </div>
        <div class="flex flex-wrap md:flex-nowrap my-16 sm:my-16">
            <!-- Column 1 -->
            <div class="order-last sm:order-first md:w-1/2 flex justify-center items-center py-8 sm:py-0 sm:p-8">
                <img src="/images/flashcards/flashcard maker image creation ai.png" alt="Rounded Image" class="rounded-lg max-w-full h-auto">                
            </div>
            <!-- Column 2 -->        
            <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-16">
                <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">AI IMAGE CREATION</span>
                <h2 class="text-4xl font-bold mt-4">Create AI images for your flashcards in seconds</h2>
                <p class="mt-3">Add images to your flashcards with the literal <strong>click of a button</strong> using our <strong>AI image creation tool</strong>.</p>
                </p>
                <p class="mt-4">A picture's worth a thousand words, and it will help you <strong>learn vocabulary words faster</strong> too.</p>
                <a href="{{ route('flashcards.features.image-creation', ['locale' => session('locale', 'en')])}}" role="button" class="bg-white border-2 border-teal-500 hover:bg-teal-200 py-3 px-4 mt-5 rounded-lg text-2xl font-semibold text-teal-900">Learn More</a>
            </div>
        </div>
        <div class="flex flex-wrap md:flex-nowrap my-16 sm:my-16">
            <!-- Column 1 -->                    
            <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-8">
                <span class="badge bg-teal-500 text-sm font-bold text-white py-2 px-3 rounded">ADDING SOUND</span>
                <h2 class="text-4xl font-bold mt-4">Add voice pronunciation examples to each word using realistic native-sounding AI voices
                    <audio id="ai-voice-audio" src="/audio/add ai audio to flashcards.mp3" preload="none"></audio>    
                        {{-- <button onclick="document.getElementById('wordAudio{{ $flashcard->id }}').play()">                 --}}
                        <button onclick="document.getElementById('ai-voice-audio').play()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 010 12.728M16.463
                                8.288a5.25 5.25 0 010 7.424M6.75 8.25l4.72-4.72a.75.75 0 011.28.53v15.88a.75.75 0
                                01-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.01 9.01 0 012.25 12c0-.83.112-1.633.322-2.396C2.806
                                8.756 3.63 8.25 4.51 8.25H6.75z" />
                            </svg>
                        </button>                    
                </h2>                
                <p class="mt-3">Choose from male or female natural-sounding AI voices in 22 languages so you can <strong>listen to how your vocabulary words are pronounced</strong> rather than just reading them.</p>
                <p class="mt-4">Hearing the words instead of just reading them <strong>activates more parts of the brain</strong> and adds more context to the words.</p>
                <p class="mt-4">Secondly, if you're more of an audial learner than a visual one, you can pair the audio with image mode in our flashcard app for a fully interactive experience.</p>
                <p class="mt-4">Read the studies <a target="_blank" href="https://www.academypublication.com/issues/past/tpls/vol01/10/07.pdf">here</a>.</p>
                <a href="{{ route('flashcards.features.voice-pronunciation', ['locale' => session('locale', 'en')])}}" role="button" class="bg-white border-2 border-teal-500 hover:bg-teal-200 py-3 px-4 mt-5 rounded-lg text-2xl font-semibold text-teal-900">Learn More</a>
            </div>
            <!-- Column 2 -->            
            <div class="md:w-1/2 flex justify-center items-center py-8 sm:py-0  sm:p-16">
                <img src="/images/flashcards/flashcards add audio.png" alt="Rounded Image" class="rounded-lg max-w-full h-auto">
            </div>
        </div>
        <div class="flex flex-wrap md:flex-nowrap my-16 sm:my-16">
            <!-- Column 1 -->
            <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-8">
                <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">LEARN FASTER</span>
                <h2 class="text-4xl font-bold mt-4">Forced random breaks unlocking the "neural replay" phenomenon</h2>
                <p class="mt-3">The <strong>"neural replay phenomenon"</strong> refers to the process where the brain replays past learning repetitions after a learning session is finished.</p>
                    <p class="mt-4">This phenomenon usually happens while you sleep during the rapid eye movement (REM) phase, but it can also happen while you're awake.</p>
                    <p class="mt-4">By taking <strong>random 10-second pauses</strong> while studying flashcards in our flashcard app, you allow your brain to replay the flashcards you have already studied, but at a much faster rate, helping you learn words and information faster.</p>
                <p class="mt-4">Read the studies <a target="_blank" href="https://www.sciencedirect.com/science/article/pii/S2211124721005398">here</a>.</p>
                <a href="{{ route('flashcards.features.neural-replay', ['locale' => session('locale', 'en')])}}" role="button" class="bg-white border-2 border-teal-500 hover:bg-teal-200 py-3 px-4 mt-5 rounded-lg text-2xl font-semibold text-teal-900">Learn More</a>
            </div>
            <!-- Column 2 -->
            <div class="order-last sm:order-first md:w-1/2 flex justify-center items-center py-8 sm:py-0 sm:p-16">
                <img src="/images/flashcards/flashcards-neural-replay-pause.png" alt="Rounded Image" class="rounded-lg max-w-full h-auto">
            </div>
        </div>
        <div class="flex flex-wrap md:flex-nowrap my-16 sm:my-16">
            <!-- Column 1 -->
            <div class="order-2 sm:order-1 md:w-1/2 flex justify-center items-center py-8 sm:py-0 sm:p-16">
                <img src="/images/flashcards/flashcards-settings-panel.png" alt="Rounded Image" class="rounded-lg w-2/3 h-auto">
            </div>
            <!-- Column 2 -->
            <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-8">
                <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">IMAGE MODE</span>
                <h2 class="text-4xl font-bold mt-4">Image mode to help you build your neural network in your target language & stop translating</h2>
                <p class="mt-3">When learning new words you want to <strong>stop using translations</strong> as soon as possible.</p>
                <p class="mt-4">By using image mode, you allow your brain to <strong>connect the word in your target language</strong> to the actual meaning of the word instead of the translation.</p>
                <p class="mt-4">You can easily toggle between image and text mode in your flashcard app settings bar.</p>
                <p class="mt-4">Read the science <a target="_blank" href="https://www.researchgate.net/publication/343927917_The_Role_of_Images_in_the_Teaching_and_Learning_of_English_Practices_Issues_and_Possibilities">here</a>.</p>
                <a href="{{ route('flashcards.features.image-mode', ['locale' => session('locale', 'en')])}}" role="button" class="bg-white border-2 border-teal-500 hover:bg-teal-200 py-3 px-4 mt-5 rounded-lg text-2xl font-semibold text-teal-900">Learn More</a>
            </div>
        </div>
        <div class="flex flex-wrap md:flex-nowrap my-16 sm:my-16">
            <!-- Column 1 -->
            <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-8">
                <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">WHITE NOISE</span>
                <h2 class="text-4xl font-bold mt-4">White noise player enables better learning comprehension</h2>
                <p class="mt-3">This flashcard feature improves your learning comprehension by enabling you to listen to white noise in the background while you learn new words studying flashcards, you can <strong>increase your long-term recall</strong> of the words.</p>
                <p class="mt-4">Due to a number of neuroscience factors, including a phenomenon called stochastic resonance (SR), <strong>white noise can improve word learning</strong> in healthy adults by increasing attention and improving memory formation.</p>
                <p class="mt-4">You can easily turn the white noise player in our flashcard app on and off in your settings.</p>
                <p class="mt-4">Read the studies <a href="https://www.nature.com/articles/s41598-017-13383-3">here</a>.</p>
                <a href="{{ route('flashcards.features.white-noise', ['locale' => session('locale', 'en')])}}" role="button" class="bg-white border-2 border-teal-500 hover:bg-teal-200 py-3 px-4 mt-5 rounded-lg text-2xl font-semibold text-teal-900">Learn More</a>
            </div>
            <!-- Column 2 -->
            <div class="order-last sm:order-first md:w-1/2 flex justify-center items-center py-8 sm:p-16">
                <img src="/images/flashcards/flashcards-white-noise-toggle.png" alt="Rounded Image" class="rounded-lg w-2/3 h-auto">
            </div>
        </div>
        <div class="flex flex-wrap md:flex-nowrap my-16 sm:my-16">
            <!-- Column 1 -->
            <div class="order-2 sm:order-1 md:w-1/2 flex justify-center items-center py-8 sm:py-0 sm:p-16">
                <img src="/images/flashcards/flashcards-image-mode-off.png" alt="Rounded Image" class="rounded-lg w-2/3 h-auto">
            </div>
            <!-- Column 2 -->
            <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-8">
                <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">SPACED REPETITION</span>
                <h2 class="text-4xl font-bold mt-4">Spaced repetition reminders tell you when to study a word again so you won't forget it</h2>
                <p class="mt-3">When trying to learn new vocabulary, it's important to <strong>review your words at regular intervals</strong>.</p>
                <p class="mt-4">As you're studying your words, this feature lets you mark a flashcard as "learned", so you'll
                    get a reminder when you need to review the word to <strong>make sure you don't forget it</strong>.</p>
                <p class="mt-4">After you've completed all your reviews, your flashcard will be updated to "mastered."</p>
                <p class="mt-4">Read the studies <a target="_blank" href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC8759977/">here</a> about spaced repetition.</p>
                <a href="{{ route('flashcards.features.spaced-repetition', ['locale' => session('locale', 'en')])}}" role="button" class="bg-white border-2 border-teal-500 hover:bg-teal-200 py-3 px-4 mt-5 rounded-lg text-2xl font-semibold text-teal-900">Learn More</a>
            </div>
        </div>
        
        <div class="flex flex-wrap md:flex-nowrap my-16 sm:my-16">
            <!-- Column 1 -->
            <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-8">
                <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">WORD LISTS</span>
                <h2 class="text-4xl font-bold mt-4">Create flashcards from an entire list of words all at once</h2>
                <p class="mt-3">This feature lets you create new flashcards from your full list of vocabulary words all at once by simply pasting them into a text box and clicking "Add".</p>
                <p class="mt-4">All you need is a list of words and their definitions or translations our AI flashcard maker will do the rest.</p>
            </div>
            <!-- Column 2 -->        
            <div class="order-last sm:order-first md:w-1/2 flex justify-center items-center py-8 sm:p-16">
                <img src="/images/flashcards/add flashcards from list of words.png" alt="Rounded Image" class="rounded-lg max-w-full h-auto">
            </div>
        </div>

        <div class="flex flex-wrap md:flex-nowrap my-16 sm:my-16">
            <!-- Column 1 -->
            <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-8">
                <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">FROM A TOPIC</span>
                <h2 class="text-4xl font-bold mt-4">Create flashcards from a topic you want to learn</h2>
                <p class="mt-3">This feature allows you to enter a language learning topic you want to learn about and our AI will create a flashcard set from the topic.</p>           
                <a href="{{ route('flashcards.features.create-from-topic', ['locale' => session('locale', 'en')])}}" role="button" class="bg-white border-2 border-teal-500 hover:bg-teal-200 py-3 px-4 mt-5 rounded-lg text-2xl font-semibold text-teal-900">Learn More</a>
            </div>
            <!-- Column 2 -->
            <div class="md:w-1/2 flex justify-center items-center mx-auto py-8 sm:py-0 sm:p-16">
                <img src="/images/flashcards/flashcard features add from a topic.jpg" alt="Rounded Image" class="rounded-lg max-w-full h-auto">                
            </div>
        </div>
        
    </div>
    <!-- End google style block -->

    <!-- Pricing block -->
    <section id="pricing" aria-label="Pricing" class="bg-black py-16 sm:py-32 px-8 sm:px-0">
        <div class="md:text-center">
            <h2 class="font-display text-3xl tracking-tight text-white sm:text-5xl">
            <span class="relative whitespace-nowrap">
                <svg aria-hidden="true" viewBox="0 0 281 40" class="absolute top-1/2 left-0 h-[1em] w-full fill-teal-400">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M240.172 22.994c-8.007 1.246-15.477 2.23-31.26
                    4.114-18.506 2.21-26.323 2.977-34.487 3.386-2.971.149-3.727.324-6.566 1.523-15.124 6.388-43.775 9.404-69.425
                    7.31-26.207-2.14-50.986-7.103-78-15.624C10.912 20.7.988 16.143.734 14.657c-.066-.381.043-.344 1.324.456
                    10.423 6.506 49.649 16.322 77.8 19.468 23.708 2.65 38.249 2.95 55.821 1.156 9.407-.962 24.451-3.773
                    25.101-4.692.074-.104.053-.155-.058-.135-1.062.195-13.863-.271-18.848-.687-16.681-1.389-28.722-4.345-38.142-9.364-15.294-8.15-7.298-19.232 14.802-20.514
                    16.095-.934 32.793 1.517 47.423 6.96 13.524 5.033 17.942 12.326 11.463 18.922l-.859.874.697-.006c2.681-.026 15.304-1.302 29.208-2.953
                    25.845-3.07 35.659-4.519 54.027-7.978 9.863-1.858 11.021-2.048 13.055-2.145a61.901 61.901 0 0 0 4.506-.417c1.891-.259
                    2.151-.267 1.543-.047-.402.145-2.33.913-4.285 1.707-4.635 1.882-5.202 2.07-8.736 2.903-3.414.805-19.773
                    3.797-26.404 4.829Zm40.321-9.93c.1-.066.231-.085.29-.041.059.043-.024.096-.183.119-.177.024-.219-.007-.107-.079ZM172.299 26.22c9.364-6.058
                    5.161-12.039-12.304-17.51-11.656-3.653-23.145-5.47-35.243-5.576-22.552-.198-33.577 7.462-21.321 14.814 12.012 7.205 32.994
                    10.557 61.531 9.831 4.563-.116 5.372-.288 7.337-1.559Z" />
                </svg>
                <span class="relative">Simple pricing,</span>
            </span>$9
                per month.
            </h2>
            <p class="mt-4 text-xl text-white">Try free for 7 days and then just $9 per month after that.</p>
        </div>
        <div class="sm:mt-16 grid max-w-2xl grid-cols-1 gap-y-10 mx-8 sm:mx-auto lg:-mx-8 lg:max-w-none lg:grid-cols-3
        xl:mx-0 xl:gap-x-8">
            <section class="md:col-span-1"></section>
            <section class="md:col-span-1 rounded-3xl px-6 sm:px-8 bg-white py-8 lg:order-none">
                <h3 class="mt-2 font-display text-lg text-gray-900">Monthly</h3>
                <p class="mt-2 mb-4 text-base text-gray-900">$9/mo and you'll get worry-free access to all
                    features for the next 12 months no matter how many new features I release.</p>
                <p class="order-first font-display text-5xl font-light tracking-tight text-gray-900">$9</p>
                <ul role="list" class="order-last mt-10 flex flex-col gap-y-3 text-sm text-gray-900">
                    <li class="flex">
                        <svg aria-hidden="true" class="h-6 w-6 flex-none fill-current stroke-current text-gray-900">
                            <path d="M9.307 12.248a.75.75 0 1 0-1.114 1.004l1.114-1.004ZM11 15.25l-.557.502a.75.75 0 0
                            0 1.15-.043L11 15.25Zm4.844-5.041a.75.75 0 0 0-1.188-.918l1.188.918Zm-7.651 3.043 2.25 2.5
                            1.114-1.004-2.25-2.5-1.114 1.004Zm3.4 2.457 4.25-5.5-1.187-.918-4.25 5.5 1.188.918Z"
                                  stroke-width="0"></path>
                            <circle cx="12" cy="12" r="8.25" fill="none" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></circle>
                        </svg>
                        <span class="ml-4">Unlimited access to all features</span>
                    </li>
                    <li class="flex">
                        <svg aria-hidden="true" class="h-6 w-6 flex-none fill-current stroke-current text-gray-900">
                            <path d="M9.307 12.248a.75.75 0 1 0-1.114 1.004l1.114-1.004ZM11 15.25l-.557.502a.75.75 0 0
                            0 1.15-.043L11 15.25Zm4.844-5.041a.75.75 0 0 0-1.188-.918l1.188.918Zm-7.651 3.043 2.25 2.5
                            1.114-1.004-2.25-2.5-1.114 1.004Zm3.4 2.457 4.25-5.5-1.187-.918-4.25 5.5 1.188.918Z"
                                  stroke-width="0"></path>
                            <circle cx="12" cy="12" r="8.25" fill="none" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></circle>
                        </svg>
                        <span class="ml-4">Create as many flashcard sets and flashcards as you want</span>
                    </li>
                    <!-- Additional list items go here -->
                </ul>
                @guest
                <a href="/register" class="mt-8 inline-block px-6 py-3 bg-teal-300 text-gray-900 hover:text-white font-medium rounded-full
                hover:bg-teal-500" aria-label="Get started with the Starter plan for $9">Try for free</a>
                @else
                <a href="/flashcards/sets" class="mt-8 inline-block px-6 py-3 bg-teal-300 text-gray-900 hover:text-white font-medium rounded-full
                hover:bg-teal-500" aria-label="Get started with the Starter plan for $9">Try now</a>
                @endguest
            </section>
            <section class="col-span-1"></section>
            <!-- Additional plan sections go here -->
        </div>
    </section>
    <!-- End pricing block -->
    
    <!-- Call to action -->
        <section id="get-started-today" class="relative overflow-hidden bg-teal-500 py-32">
            <img class="absolute top-1/2 left-1/2 max-w-none -translate-x-1/2 -translate-y-1/2" src="path_to_background_image.jpg" alt="" width="2347" height="1244" />
            <div class="relative">
                <div class="mx-auto max-w-lg text-center">
                    <h2 class="font-bold text-4xl tracking-tight text-white sm:text-4xl">Start learning faster now</h2>
                    <p class="mt-4 text-2xl tracking-tight text-white">Don't waste valuable time. Learn more vocabulary words in less time so you can progress faster.</p>
                    @guest
                    <a href="/register" class="inline-block px-8 py-4 mt-10 text-gray-900 font-semibold bg-white rounded-full hover:bg-teal-300">Try it free</a>
                    @else
                    <a href="/flashcards/sets" class="inline-block px-8 py-4 mt-10 text-gray-900 font-semibold bg-white rounded-full hover:bg-teal-300">Get started</a>
                    @endguest
                </div>
            </div>
        </section>
    <!-- End call to action -->

    <!-- FAQ block -->
    <section id="faq" aria-labelledby="faq-title" class="relative overflow-hidden bg-slate-50 py-20 px-8 sm:px-16 sm:py-32">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative">
            <div class="mx-0 max-w-2xl lg:mx-0">
                <h2 id="faq-title" class="font-display text-3xl tracking-tight text-slate-900 sm:text-4xl">Frequently
                    asked questions</h2>
                <p class="mt-4 text-lg tracking-tight text-slate-700">If you can’t find what you’re looking for, email
                    me and I'll get back to you ASAP.</p>
            </div>
            <ul role="list" class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-8 lg:max-w-none lg:grid-cols-3">
                <li>
                    <ul role="list" class="flex flex-col gap-y-8">
                        <li>
                            <h3 class="font-display font-bold text-lg leading-7 text-slate-900">Is this the same "neural replay"
                                Dr. Andrew Huberman discusses on his podcast?</h3>
                            <p class="mt-4 text-sm text-slate-700">Yes! His explanation of neural replay on his podcast
                                inspired me to research the topic further and eventually build this tool.</p>
                        </li>
                        <!-- Additional FAQ items for the first column go here -->
                    </ul>
                </li>
                <li>
                    <ul role="list" class="flex flex-col gap-y-8">
                        <li>
                            <h3 class="font-display font-bold text-lg leading-7 text-slate-900">Are there any limits to the $9 monthly plan?</h3>
                            <p class="mt-4 text-sm text-slate-700">Nope. Create as many flashcard sets and cards as you want.</p>
                        </li>
                        <!-- Additional FAQ items for the second column go here -->
                    </ul>
                </li>
                <li>
                    <ul role="list" class="flex flex-col gap-y-8">
                        <li>
                            <h3 class="font-display font-bold text-lg leading-7 text-slate-900">What if I don't like the flashcard
                                tool?</h3>
                            <p class="mt-4 text-sm text-slate-700">You can try it free for 7 days with no credit card required, so you'll have plenty of time to see if you like it.</p>
                        </li>
                        <!-- Additional FAQ items for the third column go here -->
                    </ul>
                </li>
            </ul>
        </div>
    </section>
    <!-- End FAQ block -->
</main>
</x-layouts.guest>
</x-layouts.app>
