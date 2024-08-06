<x-layouts.app>
    <x-slot name="title">
        @lang('flashcards/info.title')
    </x-slot>
    <x-slot name="description">
        @lang('flashcards/info.description')
    </x-slot>
<x-layouts.guest>
<main>
    <!-- hero -->
<div class="pt-20 pb-10 px-5 sm:px-0 text-center lg:pt-16">
    <h1 class="mx-auto max-w-4xl font-display text-5xl font-medium tracking-tight text-slate-900 sm:text-7xl">
        @lang('flashcards/info.hero_title')
    </h1>
    <p class="mx-auto mt-6 max-w-2xl text-2xl tracking-tight text-slate-700">
        @lang('flashcards/info.hero_subtitle')
    </p>
     <x-hero-video src="https://www.youtube.com/embed/15eencgAf2E?si=rwuOjEU2Z1O9-fD-" />
    {{-- <img class="w-1/2 h-auto mx-auto my-10 rounded-xl shadow-xl border border-gray-200" src="/images/flashcards/flashcard app and ai flashcard maker.jpg" alt="@lang('flashcards/info.hero_img_alt')"></img> --}}
    <div class="mt-10 flex justify-center gap-x-6">
        <a href="{{ route('flashcards.features.index', ['locale' => session('locale', 'en')])}}" role="button" class="bg-teal-200 hover:bg-teal-300 py-3 px-4 rounded-lg text-2xl font-semibold text-teal-900">@lang('flashcards/info.learn_more')</a>
        @guest
        <a href="/register" role="button" class="bg-teal-500 hover:bg-teal-700 py-3 px-4 rounded-lg text-2xl font-semibold text-white">@lang('flashcards/info.try_free')</a>
        @else
        <a href="/flashcards/sets" role="button" class="bg-teal-500 hover:bg-teal-700 py-3 px-4 rounded-lg text-2xl font-semibold text-white">@lang('flashcards/info.try_now')</a>
        @endguest    
    </div>
</div>
<!-- End hero -->
    <!-- Google style block -->
    <div class="container sm:mx-auto px-8">
        <div class="flex flex-wrap md:flex-nowrap my-16 sm:my-16">
            <!-- Column 1 -->
            <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-8">
                <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">@lang('flashcards/info.create_from_topic_badge')</span>
                <h2 class="text-4xl font-bold mt-4">@lang('flashcards/info.create_from_topic_title')</h2>
                <p class="mt-3">@lang('flashcards/info.create_from_topic_desc1')</p>                
            </div>
            <!-- Column 2 -->
            <div class="md:w-1/2 flex justify-center items-center mx-auto py-8 sm:py-0 sm:p-16">
                <img src="https://we-public.s3.eu-north-1.amazonaws.com/images/blog/content-images/create_flashcards_from_topic_1719122682.jpg" alt="@lang('flashcards/info.create_from_topic_img_alt')" class="rounded-lg max-w-full h-auto">                
            </div>
        </div>
        <div class="flex flex-wrap md:flex-nowrap my-16 sm:my-16">
            <!-- Column 1 -->
            <div class="order-last sm:order-first md:w-1/2 flex justify-center items-center py-8 sm:py-0 sm:p-8">
                <img src="https://we-public.s3.eu-north-1.amazonaws.com/images/blog/content-images/search+through+flashcards.jpg" alt="@lang('flashcards/info.search_through_img_alt')" class="rounded-lg max-w-full h-auto">                
            </div>
            <!-- Column 2 -->        
            <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-16">
                <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">@lang('flashcards/info.search_through_badge')</span>
                <h2 class="text-4xl font-bold mt-4">@lang('flashcards/info.search_through_title')</h2>
                <p class="mt-3">@lang('flashcards/info.search_through_desc1')</p>                
            </div>
        </div>
        <div class="flex flex-wrap md:flex-nowrap my-16 sm:my-16">
            <!-- Column 1 -->
            <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-8">
                <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">@lang('flashcards/info.use_files_badge')</span>
                <h2 class="text-4xl font-bold mt-4">@lang('flashcards/info.use_files_title')</h2>
                <p class="mt-3">@lang('flashcards/info.use_files_desc1')</p>
                <p class="mt-4">@lang('flashcards/info.use_files_desc2')</p>
            </div>
            <!-- Column 2 -->
            <div class="md:w-1/2 flex justify-center items-center mx-auto py-8 sm:py-0 sm:p-16">
                <img src="/images/flashcards/create flashcards from a file with ai.png" alt="@lang('flashcards/info.use_files_img_alt')" class="rounded-lg max-w-full h-auto">                
            </div>
        </div>
        <div class="flex flex-wrap md:flex-nowrap my-16 sm:my-16">
            <!-- Column 1 -->
            <div class="order-last sm:order-first md:w-1/2 flex justify-center items-center py-8 sm:py-0 sm:p-8">
                <img src="https://we-public.s3.eu-north-1.amazonaws.com/images/blog/content-images/view_all_flashcards_1719127959.jpg" alt="@lang('flashcards/info.ai_image_creation_img_alt')" class="rounded-lg max-w-full h-auto">                
            </div>
            <!-- Column 2 -->        
            <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-16">
                <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">@lang('flashcards/info.ai_image_creation_badge')</span>
                <h2 class="text-4xl font-bold mt-4">@lang('flashcards/info.ai_image_creation_title')</h2>
                <p class="mt-3">@lang('flashcards/info.ai_image_creation_desc1')</p>
                <p class="mt-4">@lang('flashcards/info.ai_image_creation_desc2')</p>
            </div>
        </div>
        <div class="flex flex-wrap md:flex-nowrap my-16 sm:my-16">
            <!-- Column 1 -->                    
            <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-8">
                <span class="badge bg-teal-500 text-sm font-bold text-white py-2 px-3 rounded">@lang('flashcards/info.adding_sound_badge')</span>
                <h2 class="text-4xl font-bold mt-4">@lang('flashcards/info.adding_sound_title')
                    <audio id="ai-voice-audio" src="/audio/add ai audio to flashcards.mp3" preload="none"></audio>    
                        <button onclick="document.getElementById('ai-voice-audio').play()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 010 12.728M16.463
                                8.288a5.25 5.25 0 010 7.424M6.75 8.25l4.72-4.72a.75.75 0 011.28.53v15.88a.75.75 0
                                01-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.01 9.01 0 012.25 12c0-.83.112-1.633.322-2.396C2.806
                                8.756 3.63 8.25 4.51 8.25H6.75z" />
                            </svg>
                        </button>                    
                </h2>                
                <p class="mt-3">@lang('flashcards/info.adding_sound_desc1')</p>
                <p class="mt-4">@lang('flashcards/info.adding_sound_desc2')</p>
                <p class="mt-4">@lang('flashcards/info.adding_sound_desc3')</p>
                <p class="mt-4"><a target="_blank" href="https://www.academypublication.com/issues/past/tpls/vol01/10/07.pdf">@lang('flashcards/info.adding_sound_desc4')</a></p>
            </div>
            <!-- Column 2 -->            
            <div class="md:w-1/2 flex justify-center items-center py-8 sm:py-0  sm:p-16">
                <img src="/images/flashcards/flashcards add audio.png" alt="@lang('flashcards/info.adding_sound_img_alt')" class="rounded-lg max-w-full h-auto">
            </div>
        </div>
        <div class="flex flex-wrap md:flex-nowrap my-16 sm:my-16">
            <!-- Column 1 -->
            <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-8">
                <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">@lang('flashcards/info.learn_faster_badge')</span>
                <h2 class="text-4xl font-bold mt-4">@lang('flashcards/info.learn_faster_title')</h2>
                <p class="mt-3">@lang('flashcards/info.learn_faster_desc1')</p>
                <p class="mt-4">@lang('flashcards/info.learn_faster_desc2')</p>
                <p class="mt-4">@lang('flashcards/info.learn_faster_desc3')</p>
                <p class="mt-4"><a target="_blank" href="https://www.sciencedirect.com/science/article/pii/S2211124721005398">@lang('flashcards/info.learn_faster_desc4')</a></p>
            </div>
            <!-- Column 2 -->
            <div class="order-last sm:order-first md:w-1/2 flex justify-center items-center py-8 sm:py-0 sm:p-16">
                <img src="/images/flashcards/flashcards-neural-replay-pause.png" alt="@lang('flashcards/info.learn_faster_img_alt')" class="rounded-lg max-w-full h-auto">
            </div>
        </div>
        <div class="flex flex-wrap md:flex-nowrap my-16 sm:my-16">
            <!-- Column 1 -->
            <div class="order-2 sm:order-1 md:w-1/2 flex justify-center items-center py-8 sm:py-0 sm:p-16">
                <img src="/images/flashcards/flashcards-image-mode-off.png" alt="@lang('flashcards/info.image_mode_img_alt')" class="rounded-lg w-2/3 h-auto">
            </div>
            <!-- Column 2 -->
            <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-8">
                <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">@lang('flashcards/info.image_mode_badge')</span>
                <h2 class="text-4xl font-bold mt-4">@lang('flashcards/info.image_mode_title')</h2>
                <p class="mt-3">@lang('flashcards/info.image_mode_desc1')</p>
                <p class="mt-4">@lang('flashcards/info.image_mode_desc2')</p>
                <p class="mt-4">@lang('flashcards/info.image_mode_desc3')</p>
                <p class="mt-4"><a target="_blank" href="https://www.researchgate.net/publication/343927917_The_Role_of_Images_in_the_Teaching_and_Learning_of_English_Practices_Issues_and_Possibilities">@lang('flashcards/info.image_mode_desc4')</a></p>
            </div>
        </div>
        <div class="flex flex-wrap md:flex-nowrap my-16 sm:my-16">
            <!-- Column 1 -->
            <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-8">
                <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">@lang('flashcards/info.white_noise_badge')</span>
                <h2 class="text-4xl font-bold mt-4">@lang('flashcards/info.white_noise_title')</h2>
                <p class="mt-3">@lang('flashcards/info.white_noise_desc1')</p>
                <p class="mt-4">@lang('flashcards/info.white_noise_desc2')</p>
                <p class="mt-4">@lang('flashcards/info.white_noise_desc3')</p>
                <p class="mt-4"><a href="https://www.nature.com/articles/s41598-017-13383-3">@lang('flashcards/info.white_noise_desc4')</a></p>
            </div>
            <!-- Column 2 -->
            <div class="order-last sm:order-first md:w-1/2 flex justify-center items-center py-8 sm:p-16">
                <img src="/images/flashcards/flashcards-white-noise-toggle.png" alt="@lang('flashcards/info.white_noise_img_alt')" class="rounded-lg w-2/3 h-auto">
            </div>
        </div>
        <div class="flex flex-wrap md:flex-nowrap my-16 sm:my-16">
            <!-- Column 1 -->
            <div class="order-2 sm:order-1 md:w-1/2 flex justify-center items-center py-8 sm:py-0 sm:p-16">
                <img src="/images/flashcards/flashcards-image-mode-off.png" alt="@lang('flashcards/info.spaced_repetition_img_alt')" class="rounded-lg w-2/3 h-auto">
            </div>
            <!-- Column 2 -->
            <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-8">
                <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">@lang('flashcards/info.spaced_repetition_badge')</span>
                <h2 class="text-4xl font-bold mt-4">@lang('flashcards/info.spaced_repetition_title')</h2>
                <p class="mt-3">@lang('flashcards/info.spaced_repetition_desc1')</p>
                <p class="mt-4">@lang('flashcards/info.spaced_repetition_desc2')</p>
                <p class="mt-4">@lang('flashcards/info.spaced_repetition_desc3')</p>
                <p class="mt-4"><a target="_blank" href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC8759977/">@lang('flashcards/info.spaced_repetition_desc4')</a></p>
            </div>
        </div>
        
        <div class="flex flex-wrap md:flex-nowrap my-16 sm:my-16">
            <!-- Column 1 -->
            <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-8">
                <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">@lang('flashcards/info.from_youtube_badge')</span>
                <h2 class="text-4xl font-bold mt-4">@lang('flashcards/info.from_youtube_title')</h2>
                <p class="mt-3">@lang('flashcards/info.from_youtube_desc1')</p>
                <p class="mt-4">@lang('flashcards/info.from_youtube_desc2')</p>
            </div>
            <!-- Column 2 -->        
            <div class="order-last sm:order-first md:w-1/2 flex justify-center items-center py-8 sm:p-16">
                <img src="https://we-public.s3.eu-north-1.amazonaws.com/images/blog/content-images/form_to_make_flashcards_from_youtube_video_1720699870.jpg" alt="@lang('flashcards/info.from_youtube_img_alt')" class="rounded-lg max-w-full h-auto">
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
                <span class="relative">@lang('flashcards/info.pricing_title')</span>
            </span>
                @lang('flashcards/info.pricing_subtitle')
            </h2>
        </div>
        <div class="sm:mt-16 grid max-w-2xl grid-cols-1 gap-y-10 mx-8 sm:mx-auto lg:-mx-8 lg:max-w-none lg:grid-cols-3
        xl:mx-0 xl:gap-x-8">
            <section class="md:col-span-1"></section>
            <section class="md:col-span-1 rounded-3xl px-6 sm:px-8 bg-white py-8 lg:order-none">
                <h3 class="mt-2 font-display text-lg text-gray-900">@lang('flashcards/info.pricing_monthly')</h3>
                <p class="mt-2 mb-4 text-base text-gray-900">@lang('flashcards/info.pricing_monthly_desc')</p>
                <p class="order-first font-display text-5xl font-light tracking-tight text-gray-900">$8.99</p>
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
                        <span class="ml-4">@lang('flashcards/info.pricing_unlimited_access')</span>
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
                        <span class="ml-4">@lang('flashcards/info.pricing_create_flashcards')</span>
                    </li>
                    <!-- Additional list items go here -->
                </ul>
                @guest
                <a href="/register" class="mt-8 inline-block px-6 py-3 bg-teal-300 text-gray-900 hover:text-white font-medium rounded-full
                hover:bg-teal-500" aria-label="Get started with the Starter plan for $9">@lang('flashcards/info.pricing_try_free')</a>
                @else
                <a href="/flashcards/sets" class="mt-8 inline-block px-6 py-3 bg-teal-300 text-gray-900 hover:text-white font-medium rounded-full
                hover:bg-teal-500" aria-label="Get started with the Starter plan for $9">@lang('flashcards/info.pricing_try_now')</a>
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
                    <h2 class="font-bold text-4xl tracking-tight text-white sm:text-4xl">@lang('flashcards/info.cta_title')</h2>
                    <p class="mt-4 text-2xl tracking-tight text-white">@lang('flashcards/info.cta_subtitle')</p>
                    @guest
                    <a href="/register" class="inline-block px-8 py-4 mt-10 text-gray-900 font-semibold bg-white rounded-full hover:bg-teal-300">@lang('flashcards/info.cta_try_free')</a>
                    @else
                    <a href="/flashcards/sets" class="inline-block px-8 py-4 mt-10 text-gray-900 font-semibold bg-white rounded-full hover:bg-teal-300">@lang('flashcards/info.cta_get_started')</a>
                    @endguest
                </div>
            </div>
        </section>
    <!-- End call to action -->

    <!-- FAQ block -->
    <section id="faq" aria-labelledby="faq-title" class="relative overflow-hidden bg-slate-50 py-20 px-8 sm:px-16 sm:py-32">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative">
            <div class="mx-0 max-w-2xl lg:mx-0">
                <h2 id="faq-title" class="font-display text-3xl tracking-tight text-slate-900 sm:text-4xl">@lang('flashcards/info.faq_title')</h2>
                <p class="mt-4 text-lg tracking-tight text-slate-700">@lang('flashcards/info.faq_subtitle')</p>
            </div>
            <ul role="list" class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-8 lg:max-w-none lg:grid-cols-3">
                <li>
                    <ul role="list" class="flex flex-col gap-y-8">
                        <li>
                            <h3 class="font-display font-bold text-lg leading-7 text-slate-900">@lang('flashcards/info.faq_question1')</h3>
                            <p class="mt-4 text-sm text-slate-700">@lang('flashcards/info.faq_answer1')</p>
                        </li>
                        <!-- Additional FAQ items for the first column go here -->
                    </ul>
                </li>
                <li>
                    <ul role="list" class="flex flex-col gap-y-8">
                        <li>
                            <h3 class="font-display font-bold text-lg leading-7 text-slate-900">@lang('flashcards/info.faq_question2')</h3>
                            <p class="mt-4 text-sm text-slate-700">@lang('flashcards/info.faq_answer2')</p>
                        </li>
                        <!-- Additional FAQ items for the second column go here -->
                    </ul>
                </li>
                <li>
                    <ul role="list" class="flex flex-col gap-y-8">
                        <li>
                            <h3 class="font-display font-bold text-lg leading-7 text-slate-900">@lang('flashcards/info.faq_question3')</h3>
                            <p class="mt-4 text-sm text-slate-700">@lang('flashcards/info.faq_answer3')</p>
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
