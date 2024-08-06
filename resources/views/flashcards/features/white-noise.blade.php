<x-layouts.app title="Online English courses | The Weaver School">      
    <x-slot name="title">
        Flashcard features: White noise player
    </x-slot>
    <x-slot name="description">
        The white noise player in our flashcard app enables better learning comprehension by enabling you to listen to white noise in the background while you learn new words studying flashcards.
    </x-slot>
<x-layouts.guest>
<main>
     <!-- Breadcrumb -->
    <div class="bg-white py-3 px-5 ml-5 mt-3">
        <a href="{{ route('flashcards.features.index', ['locale' => session('locale', 'en')])}}" class="text-teal-900 hover:text-teal-700 font-medium text-sm">← Back to Features</a>
    </div>
    
    <!-- hero -->
<div class="pt-20 pb-10 px-5 sm:px-0 text-center lg:pt-16">
    <h1 class="mx-auto max-w-4xl font-display text-5xl font-medium tracking-tight text-slate-900 sm:text-7xl">
        White noise player for flashcards            
    </h1>
    <div class="container sm:mx-auto px-8 text-left">
        <div class="flex flex-wrap md:flex-nowrap my-16 sm:my-16">
            <!-- Column 1 -->
            <div class="md:w-1/2 flex flex-col justify-center items-start sm:p-8">
                <span class="badge bg-teal-500 text-sm text-white font-bold py-2 px-3 rounded">WHITE NOISE</span>
                <h2 class="text-4xl font-bold mt-4">White noise player enables better learning comprehension</h2>
                <p class="mt-3">This flashcard feature improves your learning comprehension by enabling you to listen to white noise in the background while you learn new words studying flashcards, you can <strong>increase your long-term recall</strong> of the words.</p>
                <p class="mt-4">Due to a number of neuroscience factors, including a phenomenon called stochastic resonance (SR), <strong>white noise can improve word learning</strong> in healthy adults by increasing attention and improving memory formation.</p>
                <p class="mt-4">You can easily turn the white noise player in our flashcard app on and off in your settings.</p>
                <p class="mt-4">Read the studies <a href="https://www.nature.com/articles/s41598-017-13383-3">here</a>.</p>
                <div class="mt-4 flex justify-center gap-x-6">
                    @guest
                    <a href="/register" role="button" class="bg-teal-300 hover:bg-teal-400 text-black font-bold py-2 px-4 mt-4 rounded">Try Free</a>
                    @else
                    <a href="/flashcards/sets" role="button" class="bg-teal-300 hover:bg-teal-400 text-black font-bold py-2 px-4 mt-4 rounded">Try Now</a>
                    @endguest
                </div>
            </div>
            <!-- Column 2 -->
            <div class="order-last sm:order-first md:w-1/2 flex justify-center items-center py-8 sm:p-16">
                <img src="/images/flashcards/flashcards-white-noise-toggle.png" alt="Rounded Image" class="rounded-lg w-2/3 h-auto">
            </div>
        </div>
    </div>
    <div class="prose prose-2xl mx-auto p-5 text-left">
        <h2>Benefits of using White Noise while studying flashcards</h2>
        <p>Enhance your learning environment with the soothing power of white noise.</p>
        <p>Using white noise can significantly improve your learning comprehension. Here’s why:</p>
        <p>Distractions can derail your study sessions, but white noise helps mask disruptive sounds, allowing you to focus better. By maintaining a consistent auditory environment, white noise can help minimize the cognitive load on your brain, letting you devote more energy to learning.</p>
        <h3>How to use White Noise to boost your comprehension</h3>
        <p>Integrating white noise into your study routine can engage your auditory processing channels without overwhelming them, creating an ideal state for learning. This sound environment supports cognitive functions like memory and attention by reducing both sudden noises and too much silence, which can be equally distracting.</p>
        <p>Moreover, studies have shown that certain types of white noise can enhance synaptic plasticity, increasing your brain’s ability to learn new information quickly and retain it longer.</p>
        <p>With our tools, simply turn on white noise while studying your flashcards or during any learning session to see the difference it can make. Not only will it help in retaining information but also in maintaining a consistent study rhythm.</p>        
    </div>
    <div class="mt-10 flex justify-center gap-x-6">
        @guest
        <a href="/register" role="button" class="bg-teal-300 hover:bg-teal-400 text-black font-bold py-2 px-4 mt-4 rounded">Try Free</a>
        @else
        <a href="/flashcards/sets" role="button" class="bg-teal-300 hover:bg-teal-400 text-black font-bold py-2 px-4 mt-4 rounded">Try Now</a>
        @endguest
    </div>
</div>
<!-- End hero -->
    
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