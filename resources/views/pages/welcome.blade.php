<x-layouts.app>
  <x-slot name="title">
    @lang('pages/welcome.title')
  </x-slot>
  <x-slot name="description">
    @lang('pages/welcome.meta')
  </x-slot>
    <x-layouts.guest>

    <div class="max-w-screen">
        <x-heroes.welcome />
    </div>

    <section id="secondary-features" aria-label="Features for simplifying everyday business tasks" class="pt-8 sm:pt-20 pb-14 sm:pb-20 sm:pt-16 lg:pb-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl md:text-center">
                <h2 class="text-3xl tracking-tight font-semibold text-slate-900 sm:text-5xl">Power up your<br> language learning...</h2>
                <p class="mt-5 sm:mb-5 text-2xl tracking-tight text-slate-700">No matter which method you choose to learn your target language, we've got AI-powered tools to help you <strong>reach fluency faster</strong>.</p>
            </div>
            <img class="w-2/3 h-auto mx-auto mt-16 mb-10 rounded-xl shadow-xl border border-gray-200" src="/images/flashcards/flashcard app and ai flashcard maker.jpg" alt="flashcard app and ai flashcard maker"></img>
    </section>

    <!-- Doesn't have to be complicated -->
    <div class="overflow-hidden bg-gray-900 py-12 sm:py-16">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-2">
                <div class="lg:pr-8 lg:pt-4">
                    <div class="lg:max-w-lg">
                        <h2 class="text-lg font-semibold leading-7 text-teal-300">Get more out of your language course...</h2>
                        <p class="mt-2 text-3xl font-bold tracking-tight text-white sm:text-5xl">Language learning on steroids</p>
                        <p class="mt-6 text-2xl leading-8 text-white">Speed up your progress to fluency with tools that help you learn your target language faster.</p>
                        <dl class="mt-10 max-w-xl space-y-8 text-base leading-7 text-white lg:max-w-none">
                            <div class="relative pl-9">
                                <dt class="inline-flex font-semibold text-white text-xl">
{{--                                    <svg class="left-1 top-1 mr-1 -mb-1 h-5 w-5 text-teal-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">--}}
{{--                                        <path fill-rule="evenodd" d="M5.5 17a4.5 4.5 0 01-1.44-8.765 4.5 4.5 0 018.302-3.046 3.5 3.5 0 014.504 4.272A4 4 0 0115 17H5.5zm3.75-2.75a.75.75 0 001.5 0V9.66l1.95 2.1a.75.75 0 101.1-1.02l-3.25-3.5a.75.75 0 00-1.1 0l-3.25 3.5a.75.75 0 101.1 1.02l1.95-2.1v4.59z" clip-rule="evenodd" />--}}
{{--                                    </svg>--}}
                                    Memorize vocabulary.
                                </dt>
                                <dd class="inline text-xl">The most important step in learning any new language is learning
                                    new vocabulary. Our online flashcards tool helps you memorize vocabulary words faster using neuroscience based technology.</dd>
                            </div>
                            <div class="relative pl-9">
                                <dt class="inline-flex font-semibold text-white text-xl">
{{--                                    <svg class="left-1 top-1 mr-1 h-5 w-5 text-teal-400" viewBox="0 0 20 20"--}}
{{--                                         fill="currentColor" aria-hidden="true">--}}
{{--                                        <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2--}}
{{--                                        0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0--}}
{{--                                        10-6 0V9h6z" clip-rule="evenodd" />--}}
{{--                                    </svg>--}}
                                    Pronounce words correctly.
                                </dt>
                                <dd class="inline text-xl">Your flashcards will include human-sounding pronunciation examples that will help you sound like a native speaker.</dd>
                            </div>
                            <div class="relative pl-9">
                                <dt class="inline-flex font-semibold text-white text-xl">
{{--                                    <svg class="left-1 top-1 mr-1 h-5 w-5 text-teal-400" viewBox="0 0 20 20" --}}
{{--                                         fill="currentColor" aria-hidden="true">--}}
{{--                                        <path d="M4.632 3.533A2 2 0 016.577 2h6.846a2 2 0 011.945 1.533l1.976 8.234A3.489 --}}
{{--                                        3.489 0 0016 11.5H4c-.476 0-.93.095-1.344.267l1.976-8.234z" />--}}
{{--                                        <path fill-rule="evenodd" d="M4 13a2 2 0 100 4h12a2 2 0 100-4H4zm11.24 2a.75.75 --}}
{{--                                        0 01.75-.75H16a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75h-.01a.75.75 0 01-.75-.75V15zm-2.25-.75a.75.75 --}}
{{--                                        0 00-.75.75v.01c0 .414.336.75.75.75H13a.75.75 0 00.75-.75V15a.75.75 0 00-.75-.75h-.01z" --}}
{{--                                              clip-rule="evenodd" />--}}
{{--                                    </svg>--}}
                                    Study consistently.
                                </dt>
                                <dd class="inline text-xl">Get spaced repetition reminders that tell you when to study so you don't forget your new words.</dd>
                            </div>
                        </dl>
                    </div>
                </div>
                <img src="{{ asset('/images/flashcards/flashcard maker image creation ai.png') }}" alt="ai powered flashcard creation" class="my-auto rounded-xl shadow-xl ring-1 ring-gray-400/10 md:-ml-4 lg:-ml-0">
            </div>
        </div>
    </div>
    <!-- Doesn't have to be complicated end -->

    <!-- There's a better way -->
    <div class="overflow-hidden bg-white py-12 sm:py-16">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-2">
                <div class="lg:pr-8 lg:pt-4">
                    <div class="lg:max-w-lg">
                        <h2 class="text-lg font-semibold leading-7 text-teal-500">There's a better way...</h2>
                        <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl">
                            Use the power of AI to save time and learn more</p>
                        <p class="mt-6 text-2xl leading-8 text-gray-900">
                            AI-enhanced tools can save you hours you would normally spend creating flashcards, organizing notes, looking up translations, and searching for word explanations.</p>
                        <dl class="mt-10 max-w-xl space-y-8 text-base leading-7 lg:max-w-none">
                            <div class="relative pl-9">
                                <dt class="inline-flex font-semibold text-gray-900 text-xl">
                                    {{--                                    <svg class="left-1 top-1 mr-1 -mb-1 h-5 w-5 text-teal-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">--}}
                                    {{--                                        <path fill-rule="evenodd" d="M5.5 17a4.5 4.5 0 01-1.44-8.765 4.5 4.5 0 018.302-3.046 3.5 3.5 0 014.504 4.272A4 4 0 0115 17H5.5zm3.75-2.75a.75.75 0 001.5 0V9.66l1.95 2.1a.75.75 0 101.1-1.02l-3.25-3.5a.75.75 0 00-1.1 0l-3.25 3.5a.75.75 0 101.1 1.02l1.95-2.1v4.59z" clip-rule="evenodd" />--}}
                                    {{--                                    </svg>--}}
                                    Upload your lesson PDF.
                                </dt>
                                <dd class="inline text-xl">Taking a language course with PDF textbook? Easily upload a chapter of your textbook to let our AI 
                                automatically create flashcards for all of the vocabulary words you need to learn.</dd>
                            </div>
                            <div class="relative pl-9">
                                <dt class="inline-flex font-semibold text-gray-900 text-xl">
                                    {{--                                    <svg class="left-1 top-1 mr-1 h-5 w-5 text-teal-400" viewBox="0 0 20 20"--}}
                                    {{--                                         fill="currentColor" aria-hidden="true">--}}
                                    {{--                                        <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2--}}
                                    {{--                                        0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0--}}
                                    {{--                                        10-6 0V9h6z" clip-rule="evenodd" />--}}
                                    {{--                                    </svg>--}}
                                    Learn from a topic.
                                </dt>
                                <dd class="inline text-xl">Simply choose a topic you want to learn vocabulary about and our AI will create flashcards to help 
                                you learn the words you need around that topic.</dd>
                            </div>
                            <div class="relative pl-9">
                                <dt class="inline-flex font-semibold text-gray-900 text-xl">
                                    {{--                                    <svg class="left-1 top-1 mr-1 h-5 w-5 text-teal-400" viewBox="0 0 20 20" --}}
                                    {{--                                         fill="currentColor" aria-hidden="true">--}}
                                    {{--                                        <path d="M4.632 3.533A2 2 0 016.577 2h6.846a2 2 0 011.945 1.533l1.976 8.234A3.489 --}}
                                    {{--                                        3.489 0 0016 11.5H4c-.476 0-.93.095-1.344.267l1.976-8.234z" />--}}
                                    {{--                                        <path fill-rule="evenodd" d="M4 13a2 2 0 100 4h12a2 2 0 100-4H4zm11.24 2a.75.75 --}}
                                    {{--                                        0 01.75-.75H16a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75h-.01a.75.75 0 01-.75-.75V15zm-2.25-.75a.75.75 --}}
                                    {{--                                        0 00-.75.75v.01c0 .414.336.75.75.75H13a.75.75 0 00.75-.75V15a.75.75 0 00-.75-.75h-.01z" --}}
                                    {{--                                              clip-rule="evenodd" />--}}
                                    {{--                                    </svg>--}}
                                    Learn from real-life situations.
                                </dt>
                                <dd class="inline text-xl">Turn real-life situations into learning moments with our "Quick Notes" tool. Just type in the situation you encounter and 
                                let our AI create a teaching explanation and flashcards to help you learn it.</dd>
                            </div>                            
                        </dl>
                    </div>
                </div>
                <img src="{{ asset('/images/flashcards/create flashcards from a file with ai.png') }}" alt="create flashcards from pdf" class="my-auto rounded-xl shadow-xl ring-1 ring-gray-400/10 md:-ml-4 lg:-ml-0">
            </div>
        </div>
    </div>
    <!-- There's a better way end -->

    <!-- Here to help you on your journey start -->
    <div class="section bg-gray-900 text-white py-16">
        <div class="max-w-2xl mx-auto sm:px-6 lg:max-w-7xl px-12 lg:px-8 lg:grid lg:grid-cols-4 lg:gap-x-8">
            <div class="lg:col-span-2" style="">
                <div class="group relative">
                    <h2 class="text-4xl font-medium mb-5">I'm Lucas Weaver, and I'm here to help you on your language learning journey</h2>
                    <p class="text-2xl mb-4">As a long-time language learner and English teacher for over 8 years,
                        I fully understand the struggles of language learners.</p>
                    <p class="text-lg md:text-xl mb-4">Over the past 8 years I've studied Spanish, Dutch, Korean, Japanese, Mandarin,
                        Vietnamese, and Thai. While studying all of these languages, I always had to search all over
                        the internet and make my own combination of the best tools and information available to help me
                        learn what I actually
                        needed to know.</p>
                    <p class="text-lg md:text-xl mb-4">That's why I created the <span style="font-family: 'shelby', sans-serif;
                        font-weight: 400;
                        font-style: normal;">Weaver School</span> : a collection of AI-powered online language learning tools to help you speak the
                        language you need with confidence.</p>
                </div>
            </div>
            <div class="lg:col-span-2" style="">
                <div class="group relative">
                    <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
                        <img src="https://we-public.s3.eu-north-1.amazonaws.com/images/pages/lucas+weaver+founder+the+weaver+school.png"
                             alt="lucas weaver founder of the weaver school" class="w-full h-96
                             object-center object-cover rounded-xl mt-5 sm:mt-0">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End here to help you on your journey -->

    <!-- Testimonials block -->
    {{-- <div class="bg-teal-500 py-12 text-white">
        <div class="max-w-4xl mx-auto pb-0 py-5 sm:px-6 md:px-0 lg:max-w-7xl lg:px-0">
            <div class="text-3xl font-extrabold tracking-tight text-white sm:text-3xl text-center mb-5">What our students say...</div>
            <x-testimonials.carousel />
        </div>
    </div> --}}
    <!-- End testimonials block -->

    <!-- Pricing block -->
    <section id="pricing" aria-label="Pricing" class="bg-teal-400 py-16 sm:py-32 px-8 sm:px-0">
        <div class="md:text-center">
            <h2 class="text-3xl text-gray-900 sm:text-5xl font-semibold">
            <span class="relative">
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
            <p class="mt-4 text-xl">Try free for 7 days and then just $9 per month after that.</p>
        </div>
        <div class="sm:mt-16 grid max-w-2xl grid-cols-1 gap-y-10 mx-8 sm:mx-auto lg:-mx-8 lg:max-w-none lg:grid-cols-3
        xl:mx-0 xl:gap-x-8">
            <section class="md:col-span-1"></section>
            <section class="md:col-span-1 rounded-3xl px-6 sm:px-8 bg-white py-8 lg:order-none">
                <h3 class="mt-2 font-semibold text-xl text-gray-900">Weaver School Pro: Monthly</h3>
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
    <section id="get-started-today" class="relative overflow-hidden bg-gray-900 py-16">
        <img class="absolute top-1/2 left-1/2 max-w-none -translate-x-1/2 -translate-y-1/2" src="path_to_background_image.jpg"
             alt="" width="2347" height="1244" />
        <div class="relative">
            <div class="mx-auto max-w-xl text-center">
                <h2 class="font-semibold text-4xl tracking-tight text-white sm:text-5xl">Power up your<br> language learning</h2>
                <p class="mt-4 text-2xl tracking-tight text-white">It's never been easier to speak the language
                    you want. Don't wait, experience the power of AI now.</p>
                <a href="/register" class="inline-block px-8 py-4 mt-10 text-white font-semibold bg-teal-400 rounded-full
                hover:bg-teal-300 hover:text-white">Create your free account</a>
            </div>
        </div>
    </section>
    <!-- End call to action -->

{{--    @if (Auth::check())--}}
{{--      <x-cta.welcome.user>--}}
{{--      </x-cta.welcome.user>--}}
{{--    @else--}}
{{--      <x-cta.welcome.visitor>--}}
{{--      </x-cta.welcome.visitor>--}}
{{--    @endif--}}

</div>
    </x-layouts.guest>
</x-layouts.app>
