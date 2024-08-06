<x-layouts.app>      
    <x-slot name="title">
        Explore Learning Paths: Customized language Learning Paths powered by AI
    </x-slot>
    <x-slot name="description">
        Explore our available Learning Paths: customized language learning paths powered by AI. Learn to speak about any topic you choose in just two weeks.
    </x-slot>
<x-layouts.guest>
<main x-data="{ showModal: false, showMessage: false}">
    <!-- hero -->
<div class="dark:bg-gray-900 pt-20 pb-18 px-5 sm:px-0 text-center lg:pt-16">
    <h1 class="mx-auto max-w-4xl font-display text-5xl font-medium tracking-tight text-slate-900 dark:text-gray-100 sm:text-7xl">
        Explore our language
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
            <span class="relative">learning paths</span>
        </span>
        
    </h1>
    <p class="mx-auto sm:px-24 mt-10 max-w-4xl text-2xl tracking-tight text-slate-700 dark:text-slate-200">
        Choose from our available Learning Paths to learn to speak about any topic in your target language in just two weeks.
        Simply choose an existing path, or customize one for your native language, and you can start learning within minutes.
    </p>
    <div x-data="{ targetLanguageSlug: '{{ $languages->first()->slug }}' }" class="pt-10 pb-4 flex">
        <div class="mx-auto items-center justify-center">
            <div class="col-span-1">
                <label for="target-language" class="block text-white text-base font-bold mr-2 mb-4">Choose your target language:</label>       
                <select x-model="targetLanguageSlug" id="target_language" class="mb-8 px-4 py-2 w-full rounded-md bg-gray-900 border border-gray-600 
                text-white text-xl text-center focus:outline-none focus:ring-2 focus:ring-teal-400">
                    @foreach($languages as $language)
                    <option value="{{ $language->slug }}">{{ $language->name }}</option>
                    @endforeach                        
                </select>
                <a x-bind:href="'/{{ session('locale', 'en')}}/learning-paths/explore/' + targetLanguageSlug" class="w-full px-3 py-2 rounded-lg bg-teal-500 text-white font-semibold hover:bg-teal-600 transition ease-in-out duration-150">
                Explore
                </a>
            </div>                        
        </div>
    </div>
</div>
<!-- End hero -->
 
 <!-- Loop through existing learning paths -->
    <div class="dark:bg-gray-900 py-5">
    @foreach ($paths as $path)
    <!-- Neumorphism Card for Single Learning Path with Image -->
    <div x-data="{ showStudy{{ $path->id }}Modal: false, showStudy{{ $path->id }}Message: false }">
    <div class="relative bg-gray-800 hover:bg-gray-700 rounded-lg overflow-hidden shadow-lg my-10 w-full max-w-4xl mx-auto transition duration-300 ease-in-out transform hover:scale-105">                    
        <div class="flex flex-col sm:flex-row">
            <!-- Image on the left -->
            <div class="w-full sm:w-1/3">
                @php
                    $vocabularyWord = $path->vocabularyWords->first();
                    if ($vocabularyWord && $vocabularyWord->getMedia('images')->first()) {
                        $imageUrl = $vocabularyWord->getMedia('images')->first()->getUrl('medium');
                    } else {
                        $imageUrl = asset('images/weaver_school_learning_path_fallback_image.webp');
                    }
                @endphp
                <img data-src="{{ $imageUrl }}"
                    alt="{{ $path->getTranslation('title', session('locale', 'en')) }}"
                    class="lazy object-cover w-full h-full rounded-l-lg">
            </div>
            <!-- Content on the right -->
            <div class="flex-1 p-5 flex flex-col justify-between">
                <div>
                    <a href="{{ route('learning-paths.explore.show', ['locale' => session('locale', 'en'), 'languageSlug' => $path->targetLanguage->slug, 'pathSlug' => $path->slug ])}}">
                        <h2 class="text-3xl font-bold text-teal-400 mb-4">{{ $path->getTranslation('title', session('locale', 'en')) }}</h2>
                    </a>                    
                    <p class="text-gray-200 mb-8">{{ $path->getTranslation('description', session('locale', 'en')) }}</p>
                </div>            
                <div class="flex justify-between"> <!-- Align button to the end of the flex container -->                    
                    <button role="button" @click="showStudy{{ $path->id }}Modal = true" class="px-3 py-2 rounded-lg bg-teal-500 text-white font-semibold hover:bg-teal-600 transition ease-in-out duration-150">Learn</button>
                    <a href="{{ route('learning-paths.explore.show', ['locale' => session('locale', 'en'), 'languageSlug' => $path->targetLanguage->slug, 'pathSlug' => $path->slug ])}}" class="px-3 py-2 rounded-lg bg-violet-600 text-white font-semibold hover:bg-violet-700 transition ease-in-out duration-150">Preview</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Attach Learning Path Modal -->
    <!-- Modal -->
    <div>
        <div x-cloak x-show="showStudy{{ $path->id }}Modal" class="fixed inset-0 bg-gray-600 bg-opacity-90 z-50 overflow-y-auto h-full w-full" x-on:click.away="showStudyModal = false">
            <div class="relative top-20 mx-auto py-5 px-4 border border-gray-800 w-3/4 sm:w-1/2 shadow-lg rounded-md bg-gray-900">
                <!-- Close Button -->
                <div class="flex justify-end">
                    <button @click="showStudy{{ $path->id }}Modal = false" class="text-gray-400 hover:text-gray-500">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <!-- Logo -->
                <div class="flex justify-center">
                    <img src="{{ config('app.logo_dark')}}" alt="Your Logo" class="h-12"> <!-- Adjust the class 'h-16' to fit the size of your logo as needed -->
                </div>
                <div class="mt-3 text-center">
                    <h3 class="text-4xl leading-8 font-medium text-teal-400 mt-8">Study {{ $path->getTranslation('title', session('locale', 'en')) }}</h3>
                    <div class="mt-2 px-7 py-3">
                        <p class="text-2xl text-gray-100 mb-5 sm:mx-24">Choose your native language for your explanations.</p>
                        <form action="{{ route('learning-paths.explore.study-existing')}}" method="POST">
                            @csrf
                            <input type="hidden" name="learning_path_id" value="{{ $path->id }}">
                            <input type="hidden" name="target_language" value="{{ $path->targetLanguage->name }}">
                            <div class="mb-2 grid grid-cols-2 text-white gap-y-10">
                                <div class="col-span-2 sm:col-span-1 sm:mr-2">
                                <label for="native-language" class="block text-white text-base font-bold mb-2">Native Language:</label>
                                <input type="text" name="native_language" id="native-language" placeholder="Ex: English" 
                                    class="px-4 py-2 w-full rounded-md bg-gray-900 border border-gray-600 text-white text-xl text-center placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-teal-400">
                                    @error('native_language')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror              
                                </div>                                 
                                <div class="col-span-2 sm:col-span-1">
                                  <label for="native-language" class="block text-white text-base font-bold mb-2">Voice Gender:</label>
                                  <select name="voice_gender" id="voice_gender" class="px-4 py-2 w-full rounded-md bg-gray-900 border border-gray-600 text-white text-xl text-center focus:outline-none focus:ring-2 focus:ring-teal-400">
                                    <option value="FEMALE">Female</option>
                                    <option value="MALE">Male</option>    
                                  </select>
                                  @error('voice_gender')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                  @enderror

                                </div>
                            </div>                      
                            <button type="submit" class="mt-4 w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-teal-500 text-xl font-bold text-white hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                                Build Learning Path
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Confirmation Message -->
        <div x-cloak x-show="showStudy{{ $path->id }}Message" class="fixed inset-0 flex items-center justify-center">
            <div class="bg-teal-900 shadow-lg rounded-md p-12 sm:p-24 mx-4 sm:mx-auto">
                <p class="text-2xl text-gray-100">We're building your Learning Path. Check your <a href="{{ route('learning-paths.index', 'locale', session('locale', 'en'))}}">dashboard</a> for progress.</p>
                <button @click="show{{ $path->id }}Message = false" class="mt-3 w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-teal-400 text-lg font-medium text-gray-100 hover:bg-teal-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    Dismiss
                </button>
            </div>
        </div>
    </div> 
    </div>   
    @endforeach
    </div>

<!-- Cta -->
<div class="dark:bg-gray-900 pt-20 pb-16 px-5 sm:px-0 text-center lg:pt-16">
    <h1 class="mx-auto max-w-4xl font-display text-5xl font-medium tracking-tight text-slate-900 dark:text-gray-100 sm:text-7xl">
        Get early access...
        <span class="relative whitespace-nowrap text-teal-500 dark:text-teal-300">
            <svg
                aria-hidden="true"
                viewBox="0 0 418 42"
                class="absolute top-2/3 left-0 h-[0.58em] w-full fill-teal-700/70"
                preserveAspectRatio="none"
            >
                <!-- SVG Path -->
            </svg>
            <span class="relative">Become a Beta Tester</span>
        </span>
    </h1>
    <p class="mx-auto mt-10 mb-12 max-w-3xl text-2xl tracking-tight text-slate-700 dark:text-gray-200">
        Get early access and 50% off for one year by testing our new Learning Path product before the public release. Sign up for our beta testing program now.
    </p>    
    <!-- Modal Trigger -->
    
    <button @click="showModal = true" role="button" class="bg-teal-500 hover:bg-teal-600 py-3 px-4 rounded-lg text-2xl font-semibold text-white shadow-lg">
        Join Waiting List
    </button>

    <!-- Modal -->
    <div>
        <div x-cloak x-show="showModal" class="fixed inset-0 bg-gray-600 bg-opacity-90 overflow-y-auto h-full w-full" x-on:click.away="showModal = false">
            <div class="relative top-20 mx-auto py-5 px-4 border border-gray-800 w-3/4 sm:w-1/2 shadow-lg rounded-md bg-gray-900">
                <!-- Close Button -->
                <div class="flex justify-end">
                    <button @click="showModal = false" class="text-gray-400 hover:text-gray-500">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <!-- Logo -->
                <div class="flex justify-center">
                    <img src="{{ config('app.logo_dark')}}" alt="Your Logo" class="h-12"> <!-- Adjust the class 'h-16' to fit the size of your logo as needed -->
                </div>
                <div class="mt-3 text-center">
                    <h3 class="text-4xl leading-8 font-medium text-teal-400 mt-8">Get early access to Learning Paths</h3>
                    <div class="mt-2 px-7 py-3">
                        <p class="text-xl text-gray-100 mb-5 sm:mx-24">Join our beta testing program to get 50% off and early access to our new Learning Paths product.</p>
                        <form action="{{ route('beta-optin-subscribers.store')}}" method="POST">
                            @csrf
                            <input type="email" name="email" placeholder="Your email" required class="text-lg mt-3 px-4 py-2 border rounded-md w-full"/>
                            <input type="hidden" name="product_id" value="7001">
                            <button type="submit" class="mt-4 w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-teal-500 text-xl font-bold text-white hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                                Join Waiting List
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Confirmation Message -->
        <div x-cloak x-show="showMessage" class="fixed inset-0 flex items-center justify-center">
            <div class="bg-teal-900 shadow-lg rounded-md p-12 sm:p-24 mx-4 sm:mx-auto">
                <p class="text-2xl text-gray-100">Thank you for your interest. We'll email you soon!</p>
                <button @click="showMessage = false" class="mt-3 w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-teal-400 text-lg font-medium text-gray-100 hover:bg-teal-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    Dismiss
                </button>
            </div>
        </div>
    </div>    

</div>
<!-- End cta -->
<x-alerts.success />
<x-alerts.error />

</main>
</x-layouts.guest>
</x-layouts.app>
