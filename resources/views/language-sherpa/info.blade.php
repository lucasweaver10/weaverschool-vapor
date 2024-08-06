<x-layouts.app title="Online English courses | The Weaver School">
    <x-slot name="title">
        Flashcard tool with neural replay | The Weaver School
    </x-slot>
    <x-slot name="description">
        Flashcard tool that uses neural replay to help you learn vocabulary 10X faster.
    </x-slot>
    <script src="https://cdn.tailwindcss.com"></script>
<main>
    <!-- hero -->
<div class="pt-20 pb-16 text-center lg:pt-32">
    <h1 class="mx-auto max-w-4xl font-display text-5xl font-medium tracking-tight text-slate-900 sm:text-7xl">
        Learn vocabulary
        <span class="relative whitespace-nowrap text-blue-400">
            <svg
                aria-hidden="true"
                viewBox="0 0 418 42"
                class="absolute top-2/3 left-0 h-[0.58em] w-full fill-blue-200/70"
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
            <span class="relative">10X faster</span>
        </span>
        with neural replay flashcards
    </h1>
    <p class="mx-auto mt-6 max-w-2xl text-2xl tracking-tight text-slate-700">
        Unlock the neuroscience phenomenon of <a href="https://www.sciencedirect.com/science/article/pii/S2211124721005398" target="_blank">
            neural replay</a> to increase your learning speed by 10X (or more) using our flashcard app.
    </p>
    <div class="mt-10 flex justify-center gap-x-6">
        <a href="/register" role="button" class="bg-blue-400 py-3 px-4 rounded-full text-2xl font-semibold text-white">Try free</a>
{{--        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn outline">--}}
{{--            <svg--}}
{{--                aria-hidden="true"--}}
{{--                class="h-3 w-3 flex-none fill-blue-600 group-active:fill-current"--}}
{{--            >--}}
{{--                <path d="m9.997 6.91-7.583 3.447A1 1 0 0 1 1 9.447V2.553a1 1 0 0 1 1.414-.91L9.997 5.09c.782.355.782 1.465 0 1.82Z" />--}}
{{--            </svg>--}}
{{--            <span class="ml-3">Watch video</span>--}}
{{--        </a>--}}
    </div>
</div>
<!-- End hero -->

    <!-- Primary features -->
    <section id="features" aria-label="Features for running your books" class="relative overflow-hidden bg-black pt-20 pb-28 sm:py-32">
{{--        <img class="absolute top-1/2 left-1/2 max-w-none translate-x-[-44%] translate-y-[-42%]" src="path_to_background_image.jpg" alt="" width="2245" height="1636" />--}}
        <div class="relative" x-data="{ tab: 'pauses' }">
            <div class="max-w-2xl md:mx-auto md:text-center xl:max-w-none">
                <h2 class="font-display text-3xl tracking-tight text-white sm:text-4xl md:text-5xl">Everything you need to memorize new vocabulary words FAST</h2>
{{--                <p class="mt-6 text-lg tracking-tight text-blue-100">Well everything you need if you aren’t that picky about minor details like tax compliance.</p>--}}
            </div>
            <div class="text-white mt-16 grid grid-cols-1 items-center gap-y-2 pt-10 sm:gap-y-6 md:mt-20 lg:grid-cols-12 lg:pt-0">
                <!-- Replace the following loop with actual tab elements -->
                <!-- Start Loop -->
                <div class="-mx-4 flex overflow-x-auto pb-4 sm:mx-0 sm:overflow-visible sm:pb-0 lg:col-span-5">
                    <div class="relative z-10 flex gap-x-4 whitespace-nowrap px-4 sm:mx-auto sm:px-0 lg:mx-0 lg:block lg:gap-x-0 lg:gap-y-1 lg:whitespace-normal">
                        <div @click="tab = 'pauses' " role="button" class="group relative py-3 px-4 mb-4 lg:rounded-xl lg:p-6"
                             :class="tab === 'pauses' ? 'bg-white text-gray-900' : 'text-white' ">
                            <div class="z-20">
                                <div class="font-display font-bold text-2xl focus:outline-none">Random 10-second pauses</div>
                                <p class="mt-2 hidden text-xl lg:block">Neural replay relies on using random 10-second pauses during your
                                 learning sessions to allow your brain to rapidly replay the previous repetitions it just performed.
                                </p>
                            </div>
                        </div>
                        <div @click="tab = 'memory' " role="button" class="group relative py-3 px-4 mb-4 lg:rounded-xl lg:p-6"
                             :class="tab === 'memory' ? 'bg-white text-gray-900' : 'text-white' ">
                            <div class="font-display font-bold text-2xl focus:outline-none">Increased memory formation</div>
                            <p class="mt-2 hidden text-xl lg:block">The result is a process similar to sleep in which your brain is able to encode
                             information at a much faster rate that leads to much faster memory formation.
                            </p>
                        </div>
                    </div>
                    <!-- Add more feature tabs as needed -->
                </div>
                <div class="lg:col-span-7">
                    <div class="relative sm:px-6 lg:hidden">
                        <div class="absolute -inset-x-4 top-[-6.5rem] bottom-[-4.25rem] bg-white/10 ring-1 ring-inset ring-white/10 sm:inset-x-0 sm:rounded-t-xl"></div>
                        <p class="relative mx-auto max-w-2xl text-base text-white sm:text-center">Neural replay relies on using random 10-second pauses during your
                            learning sessions to allow your brain to rapidly replay the previous repetitions it just performed.</p>
                    </div>
                    <div x-show="tab === 'pauses' " class="mt-10 w-[45rem] overflow-hidden rounded-xl bg-slate-50 shadow-xl shadow-blue-900/20 sm:w-auto lg:mt-0 lg:w-[67.8125rem]">
                        <img class="w-full" src="/images/flashcards/neural replay feature image white.jpg" alt="" />
                    </div>
                    <div class="relative sm:px-6 lg:hidden">
                        <div class="absolute -inset-x-4 top-[-6.5rem] bottom-[-4.25rem] bg-white/10 ring-1 ring-inset ring-white/10 sm:inset-x-0 sm:rounded-t-xl"></div>
                        <p class="relative mx-auto max-w-2xl text-base text-white sm:text-center">The result is a process similar to sleep in which your brain is able to encode
                            information at a much faster rate that leads to much faster memory formation.</p>
                    </div>
                    <div x-show="tab === 'memory' " class="mt-10 w-[45rem] overflow-hidden rounded-xl bg-slate-50 shadow-xl shadow-blue-900/20 sm:w-auto lg:mt-0 lg:w-[67.8125rem]">
                        <img class="w-full" src="/images/flashcards/memory formation image.jpg" alt="" />
                    </div>
                    <!-- Add more feature panels as needed -->
                </div>
                <!-- End Loop -->
            </div>
        </div>
    </section>
<!-- End primary features -->
<!-- Secondary features -->
    <section id="secondary-features" aria-label="Features for simplifying everyday business tasks" class="pt-20 pb-14 sm:pb-20 sm:pt-32 lg:pb-32">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl md:text-center">
                <h2 class="font-display text-3xl tracking-tight text-slate-900 sm:text-5xl">Tools to help your brain learn</h2>
                <p class="mt-4 text-xl tracking-tight text-slate-700">Help your brain process and encode information
                 to memorize and learn new words faster.</p>
            </div>
            <!-- Mobile Features -->
    {{--        <div class="-mx-4 mt-20 flex flex-col gap-y-10 overflow-hidden px-4 sm:-mx-6 sm:px-6 lg:hidden">--}}
    {{--            <!-- Replace the following loop with actual feature content -->--}}
    {{--            <!-- Start Loop -->--}}
    {{--            <div>--}}
    {{--                <div class="w-9 rounded-lg bg-blue-600">--}}
    {{--                    <!-- Replace this part with the actual icon content -->--}}
    {{--                </div>--}}
    {{--                <h3 class="mt-6 text-sm font-medium text-blue-600">Feature 1</h3>--}}
    {{--                <p class="mt-2 font-display text-xl text-slate-900">Feature 1 summary.</p>--}}
    {{--                <p class="mt-4 text-sm text-slate-600">Feature 1 description.</p>--}}
    {{--                <div class="relative mt-10 pb-10">--}}
    {{--                    <div class="absolute -inset-x-4 bottom-0 top-8 bg-slate-200 sm:-inset-x-6"></div>--}}
    {{--                    <div class="relative mx-auto w-[52.75rem] overflow-hidden rounded-xl bg-white shadow-lg shadow-slate-900/5 ring-1 ring-slate-500/10">--}}
    {{--                        <!-- Replace this part with the actual image content -->--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <!-- Add more features as needed -->--}}
    {{--            <!-- End Loop -->--}}
    {{--        </div>--}}
            <!-- Desktop Features -->
            <div x-data="{ tab: 'image' }" class="hidden lg:mt-20 lg:block">
                <!-- Replace the following loop with actual feature content -->
                <div class="grid grid-cols-3 gap-x-8">
                <!-- Start Loop -->
                    <div @click="tab = 'image' " role="button" class="relative">
                        <div class="w-9 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg>
                        </div>
                        <h3 class="mt-6 text-sm font-medium text-slate-600">
                            <button class="[&:not(:focus-visible)]:focus:outline-none">
                                <span class="absolute inset-0"></span>
                                Image Mode
                            </button>
                        </h3>
                        <p class="mt-2 font-display text-2xl text-slate-900 hover:font-bold" :class="tab === 'image' ? 'font-bold' : '' ">Choose to study with images first to learn without translation.</p>
                        <p class="mt-4 text-lg text-slate-600">Image mode allows you to study new words with images of their meanings
                            without relying on translations. This helps you remember words better later when speaking.</p>
                    </div>
                    <div @click="tab = 'context' " role="button" class="relative">
                        <div class="w-9 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.06 12.06 0 01-4.5 0m3.75 2.383a14.406 14.406 0 01-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 10-7.517 0c.85.493 1.509 1.333 1.509 2.316V18" />
                            </svg>

                        </div>
                        <h3 class="mt-6 text-sm font-medium text-slate-600">
                            <button class="[&:not(:focus-visible)]:focus:outline-none">
                                <span class="absolute inset-0"></span>
                                Add Context
                            </button>
                        </h3>
                        <p class="mt-2 font-display text-2xl text-slate-900" :class="tab === 'context' ? 'font-bold' : '' ">Add examples to terms for context.</p>
                        <p class="mt-4 text-lg text-slate-600">The context field in each flashcard allows you to add an example
                            sentence or memory trick to each term to help you remember it better later.</p>
                    </div>
                    <div @click="tab = 'definition' " role="button" class="relative">
                        <div class="w-9 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                            </svg>
                        </div>
                        <h3 class="mt-6 text-sm font-medium text-slate-600">
                            <button class="[&:not(:focus-visible)]:focus:outline-none">
                                <span class="absolute inset-0"></span>
                                Definition Mode
                            </button>
                        </h3>
                        <p class="mt-2 font-display text-2xl text-slate-900" :class="tab === 'definition' ? 'font-bold' : '' ">Toggle between definition or term first.</p>
                        <p class="mt-4 text-lg text-slate-600">Choose whether you want to study the word or definition first and
                         easily switch between both modes.</p>
                    </div>
                <!-- Add more features as needed -->
                <!-- End Loop -->
                </div>
                <!-- Feature Panels -->
                <div class="relative mt-20 overflow-hidden rounded-3xl bg-slate-200 px-14 py-16 xl:px-16">
                    <div class="-mx-5 flex">
                        <!-- Replace the following loop with actual feature image content -->
                        <!-- Start Loop -->
                        <div x-show="tab === 'image' " class="px-5 transition duration-500 ease-in-out [&:not(:focus-visible)]:focus:outline-none">
                            <div class="overflow-hidden rounded-xl bg-white shadow-lg shadow-slate-900/5 ring-1 ring-slate-500/10">
                                <!-- Replace this part with the actual image content -->
                                <img src="/images/flashcards/image mode feature.jpg">
                            </div>
                        </div>
                        <!-- Add more feature panels as needed -->
                        <div x-show="tab === 'context' " x-cloak class="px-5 transition duration-500 ease-in-out [&:not(:focus-visible)]:focus:outline-none">
                            <div class="overflow-hidden rounded-xl bg-white shadow-lg shadow-slate-900/5 ring-1 ring-slate-500/10">
                                <!-- Replace this part with the actual image content -->
                                <img src="/images/flashcards/flashcard creation feature image.jpg">
                            </div>
                        </div>
                        <div x-show="tab === 'definition' " x-cloak class="px-5 transition duration-500 ease-in-out [&:not(:focus-visible)]:focus:outline-none">
                            <div class="overflow-hidden rounded-xl bg-white shadow-lg shadow-slate-900/5 ring-1 ring-slate-500/10">
                                <!-- Replace this part with the actual image content -->
                                <img src="/images/flashcards/definition mode feature.jpg">
                            </div>
                        </div>
                        <!-- End Loop -->
                    </div>
                    <div class="pointer-events-none absolute inset-0 rounded-4xl ring-1 ring-inset ring-slate-900/10"></div>
                </div>
            </div>
        </div>
    </section>
<!-- End secondary features -->
    <!-- Call to action -->
    <section id="get-started-today" class="relative overflow-hidden bg-blue-400 py-32">
        <img class="absolute top-1/2 left-1/2 max-w-none -translate-x-1/2 -translate-y-1/2" src="path_to_background_image.jpg" alt="" width="2347" height="1244" />
        <div class="relative">
            <div class="mx-auto max-w-lg text-center">
                <h2 class="font-display text-4xl tracking-tight text-white sm:text-4xl">Start learning faster now</h2>
                <p class="mt-4 text-2xl tracking-tight text-white">Don't waste valuable time. Learn more vocabulary words in less time so you can progress faster.</p>
                <a href="/register" class="inline-block px-8 py-4 mt-10 text-gray-900 font-semibold bg-white rounded-full hover:bg-blue-700">Try it free</a>
            </div>
        </div>
    </section>
<!-- End call to action -->
    <!-- Pricing block -->
    <section id="pricing" aria-label="Pricing" class="bg-black py-20 sm:py-32">
        <div class="md:text-center">
            <h2 class="font-display text-3xl tracking-tight text-white sm:text-5xl">
            <span class="relative whitespace-nowrap">
                <svg aria-hidden="true" viewBox="0 0 281 40" class="absolute top-1/2 left-0 h-[1em] w-full fill-blue-400">
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
                for the year.
            </h2>
            <p class="mt-4 text-xl text-white">Try free for 7 days and then just $9 for the year after that.</p>
        </div>
        <div class="-mx-4 mt-16 grid max-w-2xl grid-cols-1 gap-y-10 sm:mx-auto lg:-mx-8 lg:max-w-none lg:grid-cols-3
        xl:mx-0 xl:gap-x-8">
            <section class="md:col-span-1"></section>
            <section class="md:col-span-1 rounded-3xl px-6 sm:px-8 bg-white py-8 lg:order-none">
                <h3 class="mt-2 font-display text-lg text-gray-900">Annual</h3>
                <p class="mt-2 mb-4 text-base text-gray-900">Just one payment of $9 and you'll get worry-free access to all
                    features for the rest of the year, no matter how many new features we release.</p>
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
                    <!-- Additional list items go here -->
                </ul>
                <a href="/register" class="mt-8 inline-block px-6 py-3 bg-blue-400 text-white font-medium rounded-full
                hover:bg-blue-500" aria-label="Get started with the Starter plan for $9">Try for free</a>
            </section>
            <section class="col-span-1"></section>
            <!-- Additional plan sections go here -->
        </div>
    </section>
    <!-- End pricing block -->
    <!-- FAQ block -->
    <section id="faq" aria-labelledby="faq-title" class="relative overflow-hidden bg-slate-50 py-20 sm:py-32">
{{--        <img class="absolute top-0 left-1/2 max-w-none translate-x-[-30%] -translate-y-1/4" src="background-image.jpg"
alt="" width="1558" height="946" />--}}
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
                            <h3 class="font-display text-lg leading-7 text-slate-900">Is this the same "neural replay"
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
                            <h3 class="font-display text-lg leading-7 text-slate-900">Are there any limits to the $9 yearly plan?</h3>
                            <p class="mt-4 text-sm text-slate-700">Nope. Create as many flashcard sets and cards as you want.</p>
                        </li>
                        <!-- Additional FAQ items for the second column go here -->
                    </ul>
                </li>
                <li>
                    <ul role="list" class="flex flex-col gap-y-8">
                        <li>
                            <h3 class="font-display text-lg leading-7 text-slate-900">What if I don't like the flashcard
                                tool?</h3>
                            <p class="mt-4 text-sm text-slate-700">Cancel anytime in the first 7 days and you won't be
                                charged. After that I offer 100% refunds, no questions asked within the first 30 days of
                                starting the trial.</p>
                        </li>
                        <!-- Additional FAQ items for the third column go here -->
                    </ul>
                </li>
            </ul>
        </div>
    </section>
    <!-- End FAQ block -->
</main>
</x-layouts.app>
