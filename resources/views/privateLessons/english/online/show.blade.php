<x-layouts.app>
    <x-slot name="title">
        {{ $course->name }} |
    </x-slot>
    <x-slot name="description">
        {{ $course->name }} | The Weaver School
    </x-slot>

    <!--
      This example requires some changes to your config:

      ```
      // tailwind.config.js
      module.exports = {
        // ...
        plugins: [
          // ...
          require('@tailwindcss/forms'),
          require('@tailwindcss/typography'),
          require('@tailwindcss/aspect-ratio'),
        ],
      }
      ```
    -->
    <div class="bg-white">

        <main class="mx-auto px-4 pt-14 pb-24 sm:px-6 sm:pt-5 sm:pb-32 lg:max-w-7xl lg:px-8">
            <!-- Product -->
            <div class="lg:grid lg:grid-cols-6 lg:grid-rows-1 lg:gap-x-8 lg:gap-y-10 xl:gap-x-16">
                <!-- Product image -->
                <div class="lg:col-span-3 lg:row-end-1">
                    <div class="aspect-w-4 aspect-h-3 overflow-hidden rounded-lg bg-gray-100">
                        <img src="{{ $course->image }}" alt="Sample of 30 icons with friendly and fun details in outline, filled, and brand color styles." class="object-cover object-center">
                    </div>
                </div>

                <!-- Product details -->
                <div class="mx-auto mt-14 max-w-2xl sm:mt-16 lg:col-span-3 lg:row-span-2 lg:row-end-2 lg:mt-0 lg:max-w-none">
                    <div class="lg:max-w-lg lg:self-end">
                        <nav aria-label="Breadcrumb">
                            <ol role="list" class="flex items-center space-x-2">
                                <!-- Commenting below out until I build the english/online index page -->
{{--                                <li>--}}
{{--                                    <div class="flex items-center text-sm">--}}
{{--                                        <a href="#" class="font-medium text-gray-500 hover:text-gray-900">Online English</a>--}}

{{--                                        <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="currentColor" aria-hidden="true" class="ml-2 h-5 w-5 flex-shrink-0 text-gray-300">--}}
{{--                                            <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />--}}
{{--                                        </svg>--}}
{{--                                    </div>--}}
{{--                                </li>--}}

                                <li>
                                    <div class="flex items-center text-sm">
                                        <a href="{{ route('private-english-lessons.index', ['locale' => session('locale')]) }}" class="font-medium text-gray-500 hover:text-gray-900">Online Private Lessons</a>
                                    </div>
                                </li>
                            </ol>
                        </nav>

                        <div class="mt-4">
                            <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $course->name }}</h1>
                        </div>

                        <section aria-labelledby="information-heading" class="mt-2">
                            <h2 id="information-heading" class="sr-only">Course information</h2>

{{--                            <div class="flex items-center">--}}
{{--                                <div>--}}
{{--                                    <h3 class="sr-only">Reviews</h3>--}}
{{--                                    <div class="flex items-center">--}}
{{--                                        <!----}}
{{--                                          Heroicon name: mini/star--}}

{{--                                          Active: "text-yellow-400", Default: "text-gray-300"--}}
{{--                                        -->--}}
{{--                                        <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">--}}
{{--                                            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />--}}
{{--                                        </svg>--}}

{{--                                        <!-- Heroicon name: mini/star -->--}}
{{--                                        <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">--}}
{{--                                            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />--}}
{{--                                        </svg>--}}

{{--                                        <!-- Heroicon name: mini/star -->--}}
{{--                                        <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">--}}
{{--                                            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />--}}
{{--                                        </svg>--}}

{{--                                        <!-- Heroicon name: mini/star -->--}}
{{--                                        <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">--}}
{{--                                            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />--}}
{{--                                        </svg>--}}

{{--                                        <!-- Heroicon name: mini/star -->--}}
{{--                                        <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">--}}
{{--                                            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />--}}
{{--                                        </svg>--}}
{{--                                    </div>--}}
{{--                                    <p class="sr-only">5 out of 5 stars</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <div class="mt-4 space-y-6">
                                <p class="text-xl text-gray-500">{{ $course->about }}</p>
                            </div>
                        </section>
                    </div>
                @if($plans !== null)
                    <form x-data="{ plan: {{ $plans->first()->id }} }">
                        <div class="sm:flex sm:justify-between">
                            <!-- Size selector -->
                            <fieldset>
                                <legend class="block text-sm font-medium text-gray-700">Plans</legend>
                                <div class="mt-1 grid grid-cols-1 gap-4 sm:grid-cols-3">
                                    @foreach($plans as $plan)
                                    <!-- Active: "ring-2 ring-blue-500" -->
                                    <div @click="plan = {{ $plan->id }}" class="relative block cursor-pointer rounded-lg p-4 focus:outline-none" :class="plan === {{ $plan->id }} ? 'ring-2 ring-blue-500' : 'border border-gray-300' ">
                                        <input type="radio" name="size-choice" value="18L" class="sr-only" aria-labelledby="size-choice-0-label" aria-describedby="size-choice-0-description">
                                        <p id="size-choice-0-label" class="text-md font-medium text-gray-900 mb-0">{{ $plan->name }}</p>
                                        <p id="size-choice-0-label" class="text-base font-medium text-gray-900 mt-0">€{{ $plan->monthly_price }}/mo</p>
                                        <p id="size-choice-0-description" class="mt-1 text-base text-gray-500">{{ $plan->description }}</p>
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
                        {{--                        <div class="mt-4">--}}
                        {{--                            <a href="#" class="group inline-flex text-sm text-gray-500 hover:text-gray-700">--}}
                        {{--                                <span>What size should I buy?</span>--}}
                        {{--                                <!-- Heroicon name: mini/question-mark-circle -->--}}
                        {{--                                <svg class="ml-2 h-5 w-5 flex-shrink-0 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">--}}
                        {{--                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zM8.94 6.94a.75.75 0 11-1.061-1.061 3 3 0 112.871 5.026v.345a.75.75 0 01-1.5 0v-.5c0-.72.57-1.172 1.081-1.287A1.5 1.5 0 108.94 6.94zM10 15a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />--}}
                        {{--                                </svg>--}}
                        {{--                            </a>--}}
                        {{--                        </div>--}}
                        <div class="mt-8">
                            @guest
                                <a href="/register?course_id={{ $course->id }}" role="button" class="flex w-full items-center justify-center rounded-md border border-transparent bg-blue-400 py-3 px-8 text-base font-medium text-white hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 focus:ring-offset-gray-50">Register</a>
                            @endguest
                            @auth
                                <a x-bind:href="'/{{ session('locale') }}/dashboard/registrations/confirm?course_id=' + {{ $course->id }} + '&plan_id=' + plan" role="button" class="flex w-full items-center justify-center rounded-md border border-transparent bg-blue-400 py-3 px-8 text-base font-medium text-white hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 focus:ring-offset-gray-50">Register</a>
                            @endauth
                        </div>
                        {{--                        <div class="mt-6 text-center">--}}
                        {{--                            <a href="#" class="group inline-flex text-base font-medium">--}}
                        {{--                                <!-- Heroicon name: outline/shield-check -->--}}
                        {{--                                <svg class="mr-2 h-6 w-6 flex-shrink-0 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">--}}
                        {{--                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />--}}
                        {{--                                </svg>--}}
                        {{--                                <span class="text-gray-500 hover:text-gray-700">Lifetime Guarantee</span>--}}
                        {{--                            </a>--}}
                        {{--                        </div>--}}
                    </form>
                @endif

                    {{--                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-2">--}}
                    {{--                        <button type="button" class="flex w-full items-center justify-center rounded-md border border-transparent bg-blue-400 py-3 px-8 text-base font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-50">Register</button>--}}
                    {{--                        <button type="button" class="flex w-full items-center justify-center rounded-md border border-transparent bg-blue-50 py-3 px-8 text-base font-medium text-blue-900 hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-800 focus:ring-offset-2 focus:ring-offset-gray-50">Preview</button>--}}
                    {{--                    </div>--}}

                    <div class="mt-10 border-t border-gray-200 pt-10">
                        <h3 class="text-sm font-medium text-gray-900">Highlights</h3>
                        <div class="prose prose-sm mt-4 text-gray-500">
                            <ul role="list" class="list-disc ml-2">
                                <li>12 online one-hour speaking-focused live one-to-one lessons</li>

                                <li>12 online one-hour pre-recorded grammar & vocabulary video lessons</li>

                                <li>2 hours of homework per week</li>

                                <li>1 weekly graded quiz with instant feedback</li>

                                <li>1 graded test every 4 weeks with teacher feedback</li>

                                <li>New flashcards for all new vocabulary each week</li>

                                <li>Personalized lesson plan</li>
                            </ul>
                        </div>
                    </div>

                    {{--                    <div class="mt-10 border-t border-gray-200 pt-10">--}}
                    {{--                        <h3 class="text-sm font-medium text-gray-900">License</h3>--}}
                    {{--                        <p class="mt-4 text-sm text-gray-500">For personal and professional use. You cannot resell or redistribute these icons in their original or modified state. <a href="#" class="font-medium text-blue-600 hover:text-blue-500">Read full license</a></p>--}}
                    {{--                    </div>--}}

                    <div class="mt-10 border-t border-gray-200 pt-10">
                        <h3 class="text-sm font-medium text-gray-900">Share</h3>
                        <ul role="list" class="mt-4 flex items-center space-x-6">
                            <li>
                                <a href="http://www.facebook.com/share.php?{{ url()->current() }}" target="_blank" class="flex h-6 w-6 items-center justify-center text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">Share on Facebook</span>
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M20 10c0-5.523-4.477-10-10-10S0 4.477 0 10c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V10h2.54V7.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V10h2.773l-.443 2.89h-2.33v6.988C16.343 19.128 20 14.991 20 10z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex h-6 w-6 items-center justify-center text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">Share on Instagram</span>
                                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.LinkedIn.com/shareArticle?mini=true&url={{ url()->current() }}&title=The+Weaver+School&summary=&source={{ url()->current() }}" class="flex h-5 w-5 items-center justify-center text-gray-400 hover:text-gray-500" target="_blank">
                                    <span class="sr-only">Share on LinkedIn</span>
                                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" src="https://platform.twitter.com/widgets.js" target="_blank" class="flex h-6 w-6 items-center justify-center text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">Share on Twitter</span>
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                        <path d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div x-data="{ tab: 'reviews' }" class="mx-auto mt-16 w-full max-w-2xl lg:col-span-3 lg:mt-0 lg:max-w-none">
                    <div>
                        <div class="border-b border-gray-200">
                            <div class="-mb-px flex space-x-8" aria-orientation="horizontal" role="tablist">
                                <!-- Selected: "border-blue-600 text-blue-600", Not Selected: "border-transparent text-gray-700 hover:text-gray-800 hover:border-gray-300" -->
                                <button @click="tab = 'reviews'" id="tab-reviews" class="focus:outline-none border-transparent text-gray-700 hover:text-gray-800 hover:border-gray-300 whitespace-nowrap border-b-2 py-6 text-sm font-medium" :class="tab === 'reviews' ? 'border-blue-400 text-blue-400' : 'border-transparent text-gray-700 hover:text-gray-800 hover:border-gray-300' " aria-controls="tab-panel-reviews" role="tab" type="button">Customer Reviews</button>
                                <button @click="tab = 'faq'" id="tab-faq" class="focus:outline-none border-transparent text-gray-700 hover:text-gray-800 hover:border-gray-300 whitespace-nowrap border-b-2 py-6 text-sm font-medium" :class="tab === 'faq' ? 'border-blue-400 text-blue-400' : 'border-transparent text-gray-700 hover:text-gray-800 hover:border-gray-300' " aria-controls="tab-panel-faq" role="tab" type="button">FAQ</button>
                            </div>
                        </div>

                        <!-- 'Customer Reviews' panel, show/hide based on tab state -->
                        <div x-show="tab === 'reviews'" id="tab-panel-reviews" class="-mb-10" aria-labelledby="tab-reviews" role="tabpanel" tabindex="0">
                            <h3 class="sr-only">Customer Reviews</h3>

                            <!-- Testimonials loop -->
                            <livewire:course-testimonial.index :courseId="$course->id" />
                            <!-- End testimonials loop -->
                        </div>

                        <!-- 'FAQ' panel, show/hide based on tab state -->
                        <div x-show="tab === 'faq'" id="tab-panel-faq" class="text-sm text-gray-500" aria-labelledby="tab-faq" role="tabpanel" tabindex="0">
                            <h3 class="sr-only">Frequently Asked Questions</h3>

                            <dl>
                                @if($course->faqs)
                                @foreach($course->faqs as $faq)
                                    <dt class="mt-10 font-medium text-gray-900">{{ $faq->question }}</dt>
                                    <dd class="prose prose-sm mt-2 max-w-none text-gray-500">
                                        <p>{{ $faq->answer }}</p>
                                    </dd>
                                @endforeach
                                @endif
                            </dl>
                        </div>

                        <!-- 'License' panel, show/hide based on tab state -->
                        {{--                        <div id="tab-panel-license" class="pt-10" aria-labelledby="tab-license" role="tabpanel" tabindex="0">--}}
                        {{--                            <h3 class="sr-only">License</h3>--}}

                        {{--                            <div class="prose prose-sm max-w-none text-gray-500">--}}
                        {{--                                <h4>Overview</h4>--}}

                        {{--                                <p>For personal and professional use. You cannot resell or redistribute these icons in their original or modified state.</p>--}}

                        {{--                                <ul role="list">--}}
                        {{--                                    <li>You're allowed to use the icons in unlimited projects.</li>--}}
                        {{--                                    <li>Attribution is not required to use the icons.</li>--}}
                        {{--                                </ul>--}}

                        {{--                                <h4>What you can do with it</h4>--}}

                        {{--                                <ul role="list">--}}
                        {{--                                    <li>Use them freely in your personal and professional work.</li>--}}
                        {{--                                    <li>Make them your own. Change the colors to suit your project or brand.</li>--}}
                        {{--                                </ul>--}}

                        {{--                                <h4>What you can't do with it</h4>--}}

                        {{--                                <ul role="list">--}}
                        {{--                                    <li>Don't be greedy. Selling or distributing these icons in their original or modified state is prohibited.</li>--}}
                        {{--                                    <li>Don't be evil. These icons cannot be used on websites or applications that promote illegal or immoral beliefs or activities.</li>--}}
                        {{--                                </ul>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
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


    </div>

</x-layouts.app>
