<x-layouts.app>
  <x-slot name="title">
    {{ $course->name }} | The Weaver School
  </x-slot>
  <x-slot name="description">
    {{ $course->name }} | The Weaver School
  </x-slot>
    <x-slot name="image">
        {{ $course->image }}
    </x-slot>
    <div class="bg-white" x-data="{ plan:{{ $course->plans->first()->id }} }">

        <main class="mx-auto px-4 pt-14 pb-24 sm:px-6 sm:pt-5 sm:pb-32 lg:max-w-7xl lg:px-8">
            <!-- Product -->
            <div class="lg:grid lg:grid-cols-6 lg:grid-rows-1 lg:gap-x-8 lg:gap-y-10 xl:gap-x-16">
                <!-- Product image/video -->
                <div class="lg:col-span-3 lg:row-end-1"
                x-data="{ selectedVideo: '0'}">
                    <div class="aspect-w-19 aspect-h-6 overflow-hidden rounded-lg bg-gray-100">
                        @if(count($course->promoVideos) > 0)
                            @foreach($course->promoVideos as $video)
                                <div x-cloak x-show="selectedVideo == {{ $loop->index }}"
                                     :class="{ 'pb-[56.25%]': selectedVideo == {{ $loop->index }}, 'pb-0': selectedVideo != {{ $loop->index }} }"
                                     class="relative">
                                    <iframe src="https://player.vimeo.com/video/{{ $video->url }}?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" frameborder="0"
                                            :class="{ 'w-full h-full': selectedVideo == {{ $loop->index }}, 'w-0 h-0': selectedVideo != {{ $loop->index }} }"
                                            class="absolute top-0 left-0"
                                            allow="autoplay; fullscreen; picture-in-picture" allowfullscreen
                                            title="{{ $course->name }} promo video"></iframe>
                                </div>
                            @endforeach
                            <div x-cloak x-show="selectedVideo == 'courseImage'">
                                <img src="{{ $course->image }}" alt="{{ $course->name }}" class="object-cover object-center">
                            </div>
                        @else
                            <img src="{{ $course->image }}" alt="{{ $course->name }}" class="object-cover object-center">
                        @endif
                    </div>
                    <!-- Tab menu for thumbnail images on smallest screens -->
                    @if(count($course->promoVideos) > 0)
                        <div class="mx-auto mt-6 w-full max-w-2xl sm:hidden">
                            <div class="grid grid-cols-4 gap-6" aria-orientation="horizontal" role="tablist">
                                @foreach($thumbnails as $thumbnail)
                                    <button @click="selectedVideo = {{ $loop->index }}" id="tabs-1-tab-1" class="relative
                                flex h-24 cursor-pointer items-center justify-center rounded-md bg-white text-sm font-medium
                                uppercase text-gray-900 hover:bg-gray-50"
                                            :class="selectedVideo == {{ $loop->index }} ? 'outline-none ring ring-opacity-50 ring-offset-4' : ''"
                                            aria-controls="tabs-1-panel-1" role="tab" type="button">
                                        <span class="sr-only">Angled view</span>
                                        <span class="absolute inset-0 overflow-hidden rounded-md">
                                            <img src="{{ $thumbnail }}"
                                                 alt="" class="h-full w-full object-cover object-center">
                                        </span>
                                        <!-- Selected: "ring-indigo-500", Not Selected: "ring-transparent" -->
                                        <span class="ring-transparent pointer-events-none absolute inset-0 rounded-md ring-2
                                    ring-offset-2" aria-hidden="true"></span>
                                    </button>
                                @endforeach
                                    <button @click="selectedVideo = 'courseImage' " id="tabs-1-tab-1" class="relative
                                flex h-24 cursor-pointer items-center justify-center rounded-md bg-white text-sm font-medium
                                uppercase text-gray-900 hover:bg-gray-50"
                                            :class="selectedVideo == 'courseImage' ? 'outline-none ring ring-opacity-50 ring-offset-4' : ''"
                                            aria-controls="tabs-1-panel-1" role="tab" type="button">
                                        <span class="sr-only">Angled view</span>
                                        <span class="absolute inset-0 overflow-hidden rounded-md">
                                            <img src="{{ $course->image }}"
                                                 alt="{{ $course->name }}"
                                                 class="h-full w-full object-cover object-center">
                                        </span>
                                        <!-- Selected: "ring-indigo-500", Not Selected: "ring-transparent" -->
                                        <span class="ring-transparent pointer-events-none absolute inset-0 rounded-md ring-2
                                    ring-offset-2" aria-hidden="true"></span>
                                    </button>
                            </div>
                        </div>

                    <!-- Tab menu for thumbnail images on small screens and up -->
                        <div class="mx-auto mt-6 hidden w-full max-w-2xl sm:block lg:max-w-none">
                            <div class="grid grid-cols-4 gap-6" aria-orientation="horizontal" role="tablist">
                                @foreach($thumbnails as $thumbnail)
                                    <button @click="selectedVideo = {{ $loop->index }}" id="tabs-1-tab-1" class="relative
                                    flex h-24 cursor-pointer items-center justify-center rounded-md bg-white text-sm font-medium
                                    uppercase text-gray-900 hover:bg-gray-50"
                                            :class="selectedVideo == {{ $loop->index }} ? 'outline-none ring ring-opacity-50 ring-offset-4' : ''"
                                            aria-controls="tabs-1-panel-1" role="tab" type="button">
                                        <span class="sr-only">Angled view</span>
                                        <span class="absolute inset-0 overflow-hidden rounded-md">
                                            <img src="{{ $thumbnail }}"
                                                 alt="" class="h-full w-full object-cover object-center">
                                        </span>
                                        <!-- Selected: "ring-indigo-500", Not Selected: "ring-transparent" -->
                                        <span class="ring-transparent pointer-events-none absolute inset-0 rounded-md ring-2
                                        ring-offset-2" aria-hidden="true"></span>
                                    </button>
                                @endforeach
                                    <button @click="selectedVideo = 'courseImage'" id="tabs-1-tab-1" class="relative
                                    flex h-24 cursor-pointer items-center justify-center rounded-md bg-white text-sm font-medium
                                    uppercase text-gray-900 hover:bg-gray-50"
                                            :class="selectedVideo == 'courseImage' ? 'outline-none ring ring-opacity-50 ring-offset-4' : ''"
                                            aria-controls="tabs-1-panel-1" role="tab" type="button">
                                        <span class="sr-only">Angled view</span>
                                        <span class="absolute inset-0 overflow-hidden rounded-md">
                                            <img src="{{ $course->image }}"
                                                 alt="{{ $course->image }}" class="h-full w-full object-cover object-center">
                                        </span>
                                        <!-- Selected: "ring-indigo-500", Not Selected: "ring-transparent" -->
                                        <span class="ring-transparent pointer-events-none absolute inset-0 rounded-md ring-2
                                        ring-offset-2" aria-hidden="true"></span>
                                    </button>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Product details -->
                <div class="mx-auto mt-14 max-w-2xl sm:mt-16 lg:col-span-3 lg:row-span-2 lg:row-end-2 lg:mt-0 lg:max-w-none">
                    <div class="lg:max-w-lg lg:self-end">
                        <nav aria-label="Breadcrumb">
                            <ol role="list" class="flex items-center space-x-2">
                                <li>
                                    <div class="flex items-center text-sm">
                                        <a href="/{{ session('locale') }}/{{ strtolower($course->subcategory->name) }}/courses/online"
                                           class="font-medium text-gray-500 hover:text-gray-900">
                                            {{ $course->subcategory->name }}
                                        </a>
                                        {{-- <svg viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="ml-2 h-5 w-5 flex-shrink-0 text-gray-300">
                                            <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                                        </svg> --}}
                                    </div>
                                </li>
                            </ol>
                        </nav>

                        <div class="mt-1">
                            <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">
                                {{ $course->name }}
                            </h1>
                        </div>

                        <section aria-labelledby="information-heading" class="mt-2">
                            <h2 id="information-heading" class="sr-only">Course information</h2>

                            @if(count($course->testimonials) > 0)
                            <div class="flex items-center">
                                <div>
                                    <h3 class="sr-only">Reviews</h3>
                                    <div class="flex items-center">
                                        <!--
                                          Heroicon name: mini/star

                                          Active: "text-yellow-400", Default: "text-gray-300"
                                        -->
                                        <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83
                                            4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691
                                            1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637
                                            3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                                        </svg>

                                        <!-- Heroicon name: mini/star -->
                                        <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83
                                            4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691
                                            1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637
                                            3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                                        </svg>

                                        <!-- Heroicon name: mini/star -->
                                        <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83
                                            4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691
                                            1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637
                                            3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                                        </svg>

                                        <!-- Heroicon name: mini/star -->
                                        <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83
                                            4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106
                                            4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207
                                            1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                            clip-rule="evenodd" />
                                        </svg>

                                        <!-- Heroicon name: mini/star -->
                                        <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83
                                            4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691
                                            1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637
                                            3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="ml-2">
                                            ({{ count($course->testimonials) }})
                                        </span>
                                    </div>
                                    <p class="sr-only">
                                        5 out of 5 stars
                                    </p>
                                </div>
                            </div>
                            @endif

                            <div class="mt-2">
                                <p class="text-xl text-gray-600">{{ $course->about }}</p>
                            </div>
                        </section>
                    </div>

                    <form>
                             <div class="sm:flex sm:justify-between sm:mt-4">
                            <!-- Size selector -->
                            <fieldset>
                                <legend class="block text-base font-medium text-gray-700 mb-2">Choose your plan:</legend>
                                <div class="mt-1 grid gap-4 {{ count($course->plans) > 1 ? 'sm:grid-cols-' . count($course->plans) : 'sm:grid-cols-1' }}">
                                    @foreach($course->plans as $plan)
                                        <!-- Active: "ring-2 ring-blue-500" -->
                                        <div @click="plan = {{ $plan->id }}"
                                             class="relative block cursor-pointer rounded-lg pt-4 px-4 pb-2 mr-2 focus:outline-none"
                                             :class="plan === {{ $plan->id }} ? 'ring-2 ring-blue-400 bg-gray-50 shadow-sm'
                                             : 'border border-gray-300' ">
                                            <input type="radio" name="size-choice" value="18L" class="sr-only"
                                                   aria-labelledby="size-choice-0-label" aria-describedby="size-choice-0-description">
                                            @if($plan->discounted_total_price)
                                            <span class="ml-1 mt-1 text-4xl font-bold text-gray-900 tracking-tight">
                                                <span class="mr-4">@lang('currency.symbol'){{ $plan->discounted_total_price }}</span><strike class="text-blue-400"><span class="text-black">@lang('currency.symbol'){{ $plan->total_price }}</span></strike>
                                            </span>
                                            @else
                                                <span class="ml-1 mt-1 text-4xl font-bold text-gray-900 tracking-tight">
                                               @lang('currency.symbol'){{ $plan->total_price }}
                                            </span>
                                            @endif
                                            <span class="text-2xl font-bold text-gray-900 tracking-tight">
                                                @if($plan->type === 'recurring')/mo @endif</span>
                                            <p id="size-choice-0-label" class="text-md font-medium text-gray-900 mt-1 mb-0">
                                                {{ $plan->name }}
                                            </p>
                                            <p id="size-choice-0-description" class="mt-1 text-base text-gray-600">
                                                {{ $plan->description }}
                                            </p>
                                            <!--
                                              Active: "border", Not Active: "border-2"
                                              Checked: "border-blue-500", Not Checked: "border-transparent"
                                            -->
                                            <div class="pointer-events-none absolute -inset-px rounded-lg border-2" aria-hidden="true"></div>
                                        </div>
                                    @endforeach
                                </div>
                            </fieldset>
                        </div>

                        <div class="mt-5">
                            @guest
                                <a x-bind:href="'/register?course_id=' + {{ $course->id }} + '&plan_id=' + plan"
                                   role="button" id="register-button" class="flex w-full items-center justify-center
                                   rounded-md border border-transparent bg-blue-400 py-3 px-8 text-2xl font-extrabold
                                   text-white hover:bg-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-400
                                   focus:ring-offset-2 focus:ring-offset-gray-50">Try FREE for 7 days</a>
                            @endguest
                            @auth
                                <a x-bind:href="'/{{ session('locale') }}/registrations/confirm?course_id=' + {{ $course->id }} + '&plan_id=' + plan"
                                   role="button" id="register-button" class="flex w-full items-center justify-center
                                   rounded-md border border-transparent bg-blue-400 py-3 px-8 text-2xl font-extrabold
                                   text-white hover:bg-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-400
                                   focus:ring-offset-2 focus:ring-offset-gray-50">Try FREE for 7 days</a>
                            @endauth
                        </div>
                    </form>

                    <div class="mt-4 border-t border-gray-200">
                        <div class="sm:flex mt-5 mb-4">
                            <div class="sm:flex-shrink-0">
                                <div class="flow-root">
                                    <img class="h-20 w-24" src="https://tailwindui.com/img/ecommerce/icons/icon-warranty-light.svg"
                                         alt="online language courses 100% money back guarantee">
                                </div>
                            </div>
                            <div class="mt-3 sm:ml-3 sm:mt-0">
                                <h3 class="text-lg font-medium text-gray-900">100% money-back guarantee</h3>
                                <p class="mt-2 text-lg text-gray-500">Get 100% of your money back if you're not happy
                                    with your course.</p>
                            </div>
                        </div>

                        @if($course->features)
                        <div class="bg-gray-100 rounded-xl p-4 shadow-sm">
                            <h3 class="text-2xl font-medium text-gray-900">Course Highlights</h3>
                            <div class="prose prose-sm mt-2 text-gray-600">
    {{--                            <ul role="list" class="list-disc ml-2">--}}
                                    @foreach($course->features as $feature)
                                    <div class="text-lg font-semibold leading-7 text-gray-900">{{ $feature->name  }}</div>
                                            <div class="text-base text-gray-600 mb-4">{{ $feature->description }}</div>
                                    @endforeach
    {{--                            </ul>--}}
                            </div>
                        </div>
                        @endif
                        @if($course->id == 1501)
                        <div class="bg-black rounded-xl p-4 shadow-sm mt-5">
                            <h3 class="text-2xl font-medium text-blue-300">Free Bonus Materials</h3>
                            <div class="prose prose-sm mt-2 text-white">
                                    <div class="text-lg font-semibold leading-7">Course eBook <s>$29</s></div>
                                    <div class="text-base mb-4">Get the full course as an eBook in case you prefer that
                                        format.</div>
                                    <div class="text-lg font-semibold leading-7">Course Audiobook <s>$19</s></div>
                                    <div class="text-base mb-4">Get the audio from the entire course that you can listen
                                        to while on the move.</div>
                                    <div class="text-lg font-semibold leading-7">IELTS AI Essay Grader <s>$9/mo</s></div>
                                    <div class="text-base mb-4">Get free access to the premium version of my AI IELTS Essay
                                        Grader tool to get AI generated band scores and feedback on your practice essays.</div>
                            </div>
                        </div>
                        @endif
                    </div>

                    <div class="mt-10 border-t border-gray-200 pt-10">
                        <h3 class="text-sm font-medium text-gray-900">Share</h3>
                        <ul role="list" class="mt-4 flex items-center space-x-6">
                            <li>
                                <a target="_blank" href="http://www.facebook.com/share.php?u={{ url()->current() }}"
                                   class="flex h-6 w-6 items-center justify-center text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">Share on Facebook</span>
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M20 10c0-5.523-4.477-10-10-10S0 4.477 0 10c0 4.991
                                        3.657 9.128 8.438 9.878v-6.987h-2.54V10h2.54V7.797c0-2.506 1.492-3.89 3.777-3.89
                                        1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V10h2.773l-.443
                                        2.89h-2.33v6.988C16.343 19.128 20 14.991 20 10z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/theweaverschool/" class="flex h-6 w-6 items-center
                                justify-center text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">Share on Instagram</span>
                                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049
                                        1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416
                                        1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049
                                        1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772
                                        1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643
                                        0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153
                                        4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902
                                        4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901
                                        2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058
                                        1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748
                                        1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597
                                        0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097
                                        0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12
                                        6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100
                                        6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                              clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a target="_blank"
                                   href="https://twitter.com/intent/tweet?text=Check%20out%20this%20course:%20{{ $course->name }},%20from%20the%20Weaver%20School!&&url={{ url()->current() }}"
                                   class="flex h-6 w-6 items-center justify-center text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">Share on Twitter</span>
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                        <path d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348
                                        8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224
                                        8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287
                                        4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292
                                        4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010
                                        16.407a11.616 11.616 0 006.29 1.84" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Adding benefits section -->
                @if($course->id == 4001)
                <div class="mx-auto mt-16 mb-3 w-full max-w-2xl lg:col-span-3 lg:mt-0 lg:max-w-none">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                        Become the traveler you've always wanted to be instead of just another tourist</h2>
                    <div class="text-base mb-2 font-normal leading-7 text-gray-600">
                        Why do you need to learn some Thai before you travel in Thailand?</div>
                    <dl class="mt-4 max-w-xl space-y-6 text-base leading-7 text-gray-300 lg:max-w-none">
                        <div>
                            <dt class="text-2xl font-semibold leading-7 text-gray-900">
                                Don’t miss out on amazing local Thai food
                            </dt>
                            <dd class="text-xl mt-1 leading-7 text-gray-600">
                                Master the names of local dishes in Thai to enjoy mouthwatering street food and customize
                                your orders like a local.</dd>
                        </div>
                        <div>
                            <dt class="text-2xl font-semibold leading-7 text-gray-900">
                                Discover hidden gems recommended by locals
                            </dt>
                            <dd class="text-xl mt-1 leading-7 text-gray-600">
                                Speak a few phrases, and friendly locals will recommend hidden gems for unforgettable
                                experiences off the beaten path.</dd>
                        </div>
                        <div>
                            <dt class="text-2xl font-semibold leading-7 text-gray-900">
                                Never get lost again
                            </dt>
                            <dd class="text-xl mt-1 leading-7 text-gray-600">
                                Learn essential directions in Thai to stay on track, even when technology fails you.
                            </dd>
                        </div>
                        <div>
                            <dt class="text-2xl font-semibold leading-7 text-gray-900">
                                Be a respectful traveler
                            </dt>
                            <dd class="text-xl mt-1 leading-7 text-gray-600">
                                Embrace Thai culture, avoid unintentional offenses, and build meaningful connections
                                with the locals.</dd>
                        </div>
                        <div>
                            <dt class="text-2xl font-semibold leading-7 text-gray-900">
                                Bargain like a pro and avoid tourist prices
                            </dt>
                            <dd class="text-xl mt-1 leading-7 text-gray-600">
                                Negotiate in Thai and save big at markets, escaping tourist prices and scoring unique deals.
                            </dd>
                        </div>
                        <div>
                            <dt class="text-2xl font-semibold leading-7 text-gray-900">
                                Don't get stuck in difficult situations
                            </dt>
                            <dd class="text-xl mt-1 leading-7 text-gray-600">
                                Learn basic Thai to communicate with taxi and bus drivers and navigate effortlessly,
                                ensuring you reach your destinations on time.
                            </dd>
                        </div>
                @elseif($course->id == 1501)
                    <div class="mx-auto mt-16 mb-3 w-full max-w-2xl lg:col-span-3 lg:mt-0 lg:max-w-none">
                        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                            Pass your IELTS Writing Section
                        </h2>
                        <div class="text-base mb-2 font-normal leading-7 text-gray-600">
                            Why do you need this course?
                        </div>
                        <div class="mt-4 max-w-xl space-y-6 text-base leading-7 text-gray-300 lg:max-w-none">
                            <div>
                                <dt class="text-2xl font-semibold leading-7 text-gray-900">
                                    Don’t retake the IELTS exam
                                </dt>
                                <dd class="text-xl mt-1 leading-7 text-gray-600">Many students end up retaking the IELTS
                                    exam only because they didn't get a high enough score on the Writing section. Take
                                    this course and make sure you get the score you need the first time.</dd>
                            </div>
                            <div>
                                <dt class="text-2xl font-semibold leading-7 text-gray-900">
                                    Don't run out of time writing your essay
                                </dt>
                                <dd class="text-xl mt-1 leading-7 text-gray-600">Many students have the problem of running
                                    out of time when writing their essay because they haven't prepared correctly and don't
                                    have a good plan. This course will teach you how to prepare correctly and give you a
                                    clear plan for your essays.</dd>
                            </div>
                            <div>
                                <dt class="text-2xl font-semibold leading-7 text-gray-900">
                                    Don't stare at a blank page
                                </dt>
                                <dd class="text-xl mt-1 leading-7 text-gray-600">If you haven't learned the academic essay
                                    framework I teach in this course, you might end up just staring at a blank page for 5
                                 minutes not sure what to write. Learn this framework and have a plan to start writing as
                                 soon as you see your writing topic.</dd>
                            </div>
                            <div>
                                <dt class="text-2xl font-semibold leading-7 text-gray-900">
                                    Don't settle for just a 6
                                </dt>
                                <dd class="text-xl mt-1 leading-7 text-gray-600">You can do better than just a 6. Take this
                                 course and learn how you can improve your score to at least a 7 even without improving
                                your general English skills.</dd>
                            </div>
                        </div>
                @endif
                <!-- End of benefits section -->

                <div x-data="{ tab: 'syllabus' }" class="mx-auto mt-16 w-full max-w-2xl lg:col-span-3 lg:max-w-none">

                        <div class="border-b border-gray-200">
                            <div class="-mb-px flex space-x-4" aria-orientation="horizontal" role="tablist">
                                <button @click=" tab = 'syllabus' " id="tab-syllabus"
                                        class="focus:outline-none border-transparent text-gray-700 hover:text-gray-800
                                        hover:border-gray-300 whitespace-nowrap border-b-2 py-3 px-3 text-sm font-medium"
                                        :class="tab === 'syllabus' ? 'bg-gray-100 text-gray-700' : 'border-transparent text-gray-700 hover:text-gray-800 hover:border-gray-100' "
                                        aria-controls="tab-panel-syllabus" role="tab" type="button">Lessons</button>
                                @if($course->faqs)
                                <button @click=" tab = 'faq' " id="tab-faq" class="focus:outline-none border-transparent
                                text-gray-700 hover:text-gray-800 hover:border-gray-300 whitespace-nowrap border-b-2 py-3 px-3 text-sm font-medium"
                                        :class="tab === 'faq' ? 'bg-gray-100 text-gray-700' : 'border-transparent text-gray-700 hover:text-gray-800 hover:border-gray-100' "
                                        aria-controls="tab-panel-faq" role="tab" type="button">
                                    FAQ
                                </button>
                                @endif
                                @if($course->testimonials)
                                <button @click=" tab = 'reviews' " id="tab-reviews"
                                        class="focus:outline-none border-transparent text-gray-700 hover:text-gray-800
                                        hover:border-gray-300 whitespace-nowrap border-b-2 py-3 px-3 text-sm font-medium"
                                        :class="tab === 'reviews' ? 'bg-gray-100 text-gray-700' : 'border-transparent text-gray-700 hover:text-gray-800 hover:border-gray-100' "
                                        aria-controls="tab-panel-reviews" role="tab" type="button">
                                    Reviews @if($course->testimonials) ({{ count($course->testimonials) }}) @endif
                                </button>
                                @endif
                            </div>
                        </div>

                         <!-- 'Syllabus' panel, show/hide based on tab state -->
                        <div x-cloak x-show="tab === 'syllabus' " id="tab-panel-syllabus" class="text-gray-500"
                             aria-labelledby="tab-faq" role="tabpanel" tabindex="1">
                            <h3 class="sr-only">Syllabus</h3>
                            <dl>
                                @foreach($course->lessons as $lesson)
                                    <dt class="mt-10 font-lg font-semibold text-gray-900">{{ $lesson->title }}</dt>
                                    <dd class="prose prose-lg mt-2 max-w-none text-black">
                                        <p>{{ $lesson->description }}</p>
                                    </dd>
                                @endforeach
                            </dl>
                        </div>


                        <!-- 'FAQ' panel, show/hide based on tab state -->
                        <div x-cloak x-show="tab === 'faq' " id="tab-panel-faq" class="text-gray-500"
                             aria-labelledby="tab-faq" role="tabpanel" tabindex="2">
                            <h3 class="sr-only">Frequently Asked Questions</h3>
                            <dl>
                                @foreach($course->faqs as $faq)
                                    <dt class="mt-10 font-lg font-semibold text-gray-900">{{ $faq->question }}</dt>
                                    <dd class="prose prose-lg mt-2 max-w-none text-black">
                                        <div class="">{{ $faq->answer }}</div>
                                    </dd>
                                @endforeach
                            </dl>
                        </div>

                        <!-- 'Customer Reviews' panel, show/hide based on tab state -->
                        <div x-cloak x-show="tab === 'reviews' " id="tab-panel-reviews" class="-mb-10"
                             aria-labelledby="tab-reviews" role="tabpanel" tabindex="0">
                            <h3 class="sr-only">Student Reviews</h3>
                            @if(count($course->testimonials) < 1)
                                <p class="mt-3">This course doesn't have any reviews yet. You could be the first one! 😊</p>
                            @else
                            <!-- Testimonials loop -->
                            <livewire:course-testimonial.index :courseId="$course->id" />
                            <!-- End testimonials loop -->
                            @endif
                        </div>

                </div>
            </div>

            <!-- Related products -->
{{--            <div class="mx-auto mt-24 max-w-2xl sm:mt-32 lg:max-w-none">--}}
{{--                <div class="flex items-center justify-between space-x-4">--}}
{{--                    <h2 class="text-lg font-medium text-gray-900">Customers also viewed</h2>--}}
{{--                    <a href="#" class="whitespace-nowrap text-sm font-medium text-blue-600 hover:text-blue-500">--}}
{{--                        View all--}}
{{--                        <span aria-hidden="true"> &rarr;</span>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <div class="mt-6 grid grid-cols-1 gap-x-8 gap-y-8 sm:grid-cols-2 sm:gap-y-10 lg:grid-cols-4">--}}
{{--                    <div class="group relative">--}}
{{--                        <div class="aspect-w-4 aspect-h-3 overflow-hidden rounded-lg bg-gray-100">--}}
{{--                            <img src="https://tailwindui.com/img/ecommerce-images/product-page-05-related-product-01.jpg" alt="Payment application dashboard screenshot with transaction table, financial highlights, and main clients on colorful purple background." class="object-cover object-center">--}}
{{--                            <div class="flex items-end p-4 opacity-0 group-hover:opacity-100" aria-hidden="true">--}}
{{--                                <div class="w-full rounded-md bg-white bg-opacity-75 py-2 px-4 text-center text-sm font-medium text-gray-900 backdrop-blur backdrop-filter">View Product</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="mt-4 flex items-center justify-between space-x-8 text-base font-medium text-gray-900">--}}
{{--                            <h3>--}}
{{--                                <a href="#">--}}
{{--                                    <span aria-hidden="true" class="absolute inset-0"></span>--}}
{{--                                    Fusion--}}
{{--                                </a>--}}
{{--                            </h3>--}}
{{--                            <p>$49</p>--}}
{{--                        </div>--}}
{{--                        <p class="mt-1 text-sm text-gray-500">UI Kit</p>--}}
{{--                    </div>--}}

{{--                    <!-- More products... -->--}}
{{--                </div>--}}
{{--            </div>--}}
        </main>

        <div>
            <x-carousels.teachers :subcategoryId="$course->subcategory->id" />
        </div>

        <section id="get-started-today" class="relative overflow-hidden bg-blue-400 py-16">
            <img class="absolute top-1/2 left-1/2 max-w-none -translate-x-1/2 -translate-y-1/2" src="path_to_background_image.jpg"
                 alt="" width="2347" height="1244" />
            <div class="relative">
                <div class="mx-auto max-w-3xl text-center">
                    <h2 class="font-display text-4xl tracking-tight text-white sm:text-5xl">Start your {{ $course->subcategory->name }} learning path now</h2>
                    <p class="mt-4 text-2xl tracking-tight text-white">It's never been easier for you to learn {{ $course->subcategory->name }}. Don't wait, start your FREE 7-day trial now.</p>
                    @guest
                        <a x-bind:href="'/register?course_id=' + {{ $course->id }} + '&plan_id=' + plan"
                           role="button" id="register-button" class="inline-block px-8 py-4 mt-10 text-gray-900
                           font-semibold bg-white rounded-full hover:bg-blue-600 hover:text-white">
                            Start my 7-day FREE trial
                        </a>
                    @endguest
                    @auth
                        <a x-bind:href="'/{{ session('locale') }}/registrations/confirm?course_id=' + {{ $course->id }} + '&plan_id=' + plan"
                           role="button" id="register-button" class="inline-block px-8 py-4 mt-10 text-gray-900
                           font-semibold bg-white rounded-full hover:bg-blue-600 hover:text-white">
                            Start my 7-day FREE trial
                        </a>
                    @endauth
                </div>
            </div>
        </section>

        @isset($course->audience)
            <section>
                <div class="mx-20 pt-5 pb-5">
                    <div class="font-bold text-3xl text-gray-900 mb-4">Who is this course for?</div>
                    <div class="text-black">
                        {!! $course->audience !!}
                    </div>
                </div>
            </section>
        @endisset


    </div>

</x-layouts.app>
