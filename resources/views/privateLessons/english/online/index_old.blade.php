<x-layouts.app title="Private English Lessons anywhere you need | The Weaver School">
    <x-slot name="title">
        Private Online English Lessons | The Weaver School
    </x-slot>
    <x-slot name="description">
        Private Online English lessons anywhere.
    </x-slot>

    <x-heroes.privateLessons.english.online.index />

    <div class="bg-white pb-5">
        <div class="max-w-2xl mx-auto pt-5 pb-0 sm:py-24 sm:px-6 md:px-0 lg:max-w-7xl lg:px-0">
            <div class="text-center text-black mb-5 lg:mx-64">
                <h2 class="text-5xl tracking-tight font-extrabold">@lang('privateLessons/english/online/index.become_fluent')</h2>
                {{-- <p class="text-2xl">@lang('privateLessons/english/online/index.subheading')</p> --}}
            </div>
        </div>
        <div class="max-w-2xl mx-auto sm:px-6 lg:max-w-7xl md:px-0 lg:px-8 lg:grid lg:grid-cols-3 lg:gap-x-8">

            <div class="lg:grid lg:grid-cols-1 lg:gap-y-8">
                <div class="group relative">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-auto w-12 h-12">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="text-black my-16 lg:my-4 px-8 sm:px-0">
                        <h3 class="text-3xl tracking-tight font-extrabold text-center">@lang('privateLessons/english/online/index.vocabulary_title')</h3>
                        <p class="text-xl text-center">
                            @lang('privateLessons/english/online/index.vocabulary_text')
                        </p>
                    </div>
                </div>
            </div>

            <div class="lg:grid lg:grid-cols-1 lg:gap-y-8">
                <div class="group relative">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-auto w-12 h-12">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="text-black mb-16 lg:my-4 px-8 sm:px-0">
                        <h3 class="text-3xl tracking-tight font-extrabold text-center"> @lang('privateLessons/english/online/index.speaking_title')</h3>
                        <p class="text-xl text-center">
                            @lang('privateLessons/english/online/index.speaking_text')
                        </p>
                    </div>
                </div>
            </div>

            <div class="lg:grid lg:grid-cols-1 lg:gap-y-8">
                <div class="group relative">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-auto w-12 h-12">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="text-black my-16 lg:my-4 px-8 sm:px-0">
                        <h3 class="text-3xl tracking-tight font-extrabold text-center">@lang('privateLessons/english/online/index.grammar_title')</h3>
                        <p class="text-xl text-center">
                            @lang('privateLessons/english/online/index.grammar_text')
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- How we do it -->

    <div class="max-w-2xl mx-auto py-5 px-8 sm:px-6 md:px-4 lg:px-8 lg:max-w-7xl  lg:grid lg:grid-cols-2 lg:gap-x-8">
        <div class="lg:grid lg:grid-cols-1 lg:gap-y-8">
            <div class="group relative">
                <h2 class="text-5xl tracking-tight font-extrabold mb-4">@lang('privateLessons/english/online/index.how_we_do_it_title')</h2>

                <div x-data="{ active: 1 }" class="mx-auto max-w-3xl w-full min-h-[16rem] space-y-4">
                    <div x-data="{
            id: 1,
            get expanded() {
                return this.active === this.id
            },
            set expanded(value) {
                this.active = value ? this.id : null
            },
        }" x-cloak role="region" class="rounded-lg bg-white shadow">
                        <h2>
                            <button
                                x-on:click="expanded = !expanded"
                                :aria-expanded="expanded"
                                class="flex w-full items-center justify-between px-6 py-4 text-xl font-bold focus:outline-none"
                            >
                                <span class="text-left">@lang('privateLessons/english/online/index.hwdi_1')</span>
                                <span x-show="expanded" aria-hidden="true" class="ml-4">&minus;</span>
                                <span x-show="!expanded" aria-hidden="true" class="ml-4">&plus;</span>
                            </button>
                        </h2>

                        <div x-show="expanded" x-collapse>
                            <div class="px-6 pb-4">@lang('privateLessons/english/online/index.hwdi_answer_1')</div>
                        </div>
                    </div>

                    <div x-data="{
            id: 2,
            get expanded() {
                return this.active === this.id
            },
            set expanded(value) {
                this.active = value ? this.id : null
            },
        }" role="region" class="rounded-lg bg-white shadow">
                        <h2>
                            <button
                                x-on:click="expanded = !expanded"
                                :aria-expanded="expanded"
                                class="flex w-full items-center justify-between px-6 py-4 text-xl font-bold focus:outline-none"
                            >
                                <span class="text-left">@lang('privateLessons/english/online/index.hwdi_2')</span>
                                <span x-show="expanded" aria-hidden="true" class="ml-4">&minus;</span>
                                <span x-show="!expanded" aria-hidden="true" class="ml-4">&plus;</span>
                            </button>
                        </h2>

                        <div x-show="expanded" x-collapse>
                            <div class="px-6 pb-4">@lang('privateLessons/english/online/index.hwdi_answer_2')</div>
                        </div>
                    </div>

                    <div x-data="{
          id: 3,
          get expanded() {
              return this.active === this.id
          },
          set expanded(value) {
              this.active = value ? this.id : null
          },
      }" role="region" class="rounded-lg bg-white shadow">
                        <h2>
                            <button
                                x-on:click="expanded = !expanded"
                                :aria-expanded="expanded"
                                class="flex w-full items-center justify-between px-6 py-4 text-xl font-bold focus:outline-none"
                            >
                                <span class="text-left">@lang('privateLessons/english/online/index.hwdi_3')</span>
                                <span x-show="expanded" aria-hidden="true" class="ml-4">&minus;</span>
                                <span x-show="!expanded" aria-hidden="true" class="ml-4">&plus;</span>
                            </button>
                        </h2>

                        <div x-show="expanded" x-collapse>
                            <div class="px-6 pb-4">@lang('privateLessons/english/online/index.hwdi_answer_3')</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:grid lg:grid-cols-1 lg:gap-y-8">
            <div class="aspect-w-1 aspect-h-7 rounded-lg overflow-hidden">
                <img src="{{ asset('/images/pages/online-language-lessons.jpg') }}" class="w-full h-full object-center object-cover"
                     alt="private lessons The Weaver School">
            </div>
        </div>
    </div>

    <!-- End How we do it -->

    <!-- What you'll get -->

    <div class="bg-gray-200 pb-5">
        <div class="max-w-2xl mx-auto py-5 px-8 sm:px-6 md:px-4 lg:px-8 lg:max-w-7xl  lg:grid lg:grid-cols-2 lg:gap-x-8">
            <div class="lg:grid lg:grid-cols-1 lg:gap-y-8">
                <img src="{{ asset('/images/pages/speaking-english-confidently.jpeg') }}" class="w-full h-full rounded-lg object-center object-cover"
                     alt="private lessons The Weaver School">
            </div>
            <div class="lg:grid lg:grid-cols-1 lg:gap-y-8">
                <div class="group relative">
                    <h2 class="text-5xl tracking-tight font-extrabold mb-4">@lang('privateLessons/english/online/index.what_you_get')</h2>
                    <div x-data="{ active: 1 }" class="mx-auto max-w-3xl w-full min-h-[16rem] space-y-4">
                        <div x-data="{
                id: 1,
                get expanded() {
                    return this.active === this.id
                },
                set expanded(value) {
                    this.active = value ? this.id : null
                },
            }" x-cloak role="region" class="rounded-lg bg-gray-100 shadow">
                            <h2>
                                <button
                                    x-on:click="expanded = !expanded"
                                    :aria-expanded="expanded"
                                    class="flex w-full items-center justify-between px-6 py-4 text-xl font-bold focus:outline-none"
                                >
                                    <span class="text-left">@lang('privateLessons/english/online/index.blended_learning_title')</span>
                                    <span x-show="expanded" aria-hidden="true" class="ml-4">&minus;</span>
                                    <span x-show="!expanded" aria-hidden="true" class="ml-4">&plus;</span>
                                </button>
                            </h2>

                            <div x-show="expanded" x-collapse>
                                <div class="px-6 pb-4">@lang('privateLessons/english/online/index.blended_learning_text')</div>
                            </div>
                        </div>

                        <div x-data="{
                id: 2,
                get expanded() {
                    return this.active === this.id
                },
                set expanded(value) {
                    this.active = value ? this.id : null
                },
            }" role="region" class="rounded-lg bg-gray-100 shadow">
                            <h2>
                                <button
                                    x-on:click="expanded = !expanded"
                                    :aria-expanded="expanded"
                                    class="flex w-full items-center justify-between px-6 py-4 text-xl font-bold focus:outline-none"
                                >
                                    <span class="text-left">@lang('privateLessons/english/online/index.more_speaking_title')</span>
                                    <span x-show="expanded" aria-hidden="true" class="ml-4">&minus;</span>
                                    <span x-show="!expanded" aria-hidden="true" class="ml-4">&plus;</span>
                                </button>
                            </h2>

                            <div x-show="expanded" x-collapse>
                                <div class="px-6 pb-4">@lang('privateLessons/english/online/index.more_speaking_text')</div>
                            </div>
                        </div>

                        <div x-data="{
              id: 3,
              get expanded() {
                  return this.active === this.id
              },
              set expanded(value) {
                  this.active = value ? this.id : null
              },
          }" role="region" class="rounded-lg bg-gray-100 shadow">
                            <h2>
                                <button
                                    x-on:click="expanded = !expanded"
                                    :aria-expanded="expanded"
                                    class="flex w-full items-center justify-between px-6 py-4 text-xl font-bold focus:outline-none"
                                >
                                    <span class="text-left">@lang('privateLessons/english/online/index.regular_testing_title')</span>
                                    <span x-show="expanded" aria-hidden="true" class="ml-4">&minus;</span>
                                    <span x-show="!expanded" aria-hidden="true" class="ml-4">&plus;</span>
                                </button>
                            </h2>

                            <div x-show="expanded" x-collapse>
                                <div class="px-6 pb-4">@lang('privateLessons/english/online/index.regular_testing_text')</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- End What you'll get -->

    <!-- Start Our Teachers -->

    <x-carousels.teachers />

    <!-- End our teachers -->

    <!-- Our reviews -->
    <div class="bg-blue-400 p-3 text-white">
        <div class="max-w-4xl mx-auto pb-0 py-5 sm:px-6 md:px-0 lg:max-w-7xl lg:px-0">
            <div class="text-3xl font-extrabold tracking-tight text-white sm:text-3xl text-center mb-5">What our students say...</div>
            <x-testimonials.carousel />
        </div>
    </div>
    <!-- End our reviews -->


    <livewire:course-grid-index :courses="$courses"/>

    <!-- How it works -->

    <div class="max-w-2xl mx-auto py-5 px-8 sm:px-6 md:px-4 lg:px-8 lg:max-w-7xl  lg:grid lg:grid-cols-2 lg:gap-x-8">
        <div class="lg:grid lg:grid-cols-1 lg:gap-y-8">
            <div class="group relative">
                <h2 class="text-5xl tracking-tight font-extrabold mb-4">@lang('privateLessons/english/online/index.how_it_works_title')</h2>
                <p class="text-xl">@lang('privateLessons/english/online/index.hiw_1')</p>
                <p class="text-xl">@lang('privateLessons/english/online/index.hiw_2')</p>
                <p class="text-xl">@lang('privateLessons/english/online/index.hiw_3')</p>
                <p class="text-xl">@lang('privateLessons/english/online/index.hiw_4')</p>
                {{--<div class="max-w-2xl mx-auto py-5 px-8 sm:px-6 md:px-4 lg:px-8 lg:max-w-7xl  lg:grid lg:grid-cols-2 lg:gap-x-8">--}}
                    {{--  <div class="lg:grid lg:grid-cols-1 lg:gap-y-8">--}}
                        {{--      <div class="group relative">--}}
                            {{--          <h2 class="text-5xl tracking-tight font-extrabold mb-4">@lang('privateLessons/english/online/index.how_it_works_title')</h2>--}}
                            {{--          <p class="text-xl">@lang('privateLessons/english/online/index.hiw_1')</p>--}}
                            {{--          <p class="text-xl">@lang('privateLessons/english/online/index.hiw_2')</p>--}}
                            {{--          <p class="text-xl">@lang('privateLessons/english/online/index.hiw_3')</p>--}}
                            {{--          <p class="text-xl">@lang('privateLessons/english/online/index.hiw_4')</p>--}}
                            {{--          <p class="text-xl">@lang('privateLessons/english/online/index.hiw_5')</p>--}}
                            {{--          <p class="text-xl">@lang('privateLessons/english/online/index.hiw_6')</p>--}}
                            @if (Auth::check())
                            <a href="/dashboard" id="how-it-works-view-dashboard-button" class="unstyled w-1/2 mt-5 mb-5 sm:mb-0 flex items-center justify-center py-3 border border-transparent
                  text-base font-medium rounded-md text-white bg-blue-400 hover:bg-blue-300 md:py-4 md:text-lg">
                                @lang('privateLessons/english/online/index.dashboard_button')
                            </a>
                            @else
                            <a href="/register" id="how-it-works-create-account-button" onclick="fathom.trackGoal('CLICKED-HOW-IT-WORKS-CREATE-ACCOUNT-BUTTON', 0);" class="unstyled w-1/2 mt-5 mb-5 sm:mb-0 flex items-center justify-center py-3 border border-transparent
              text-base font-medium rounded-md text-white bg-blue-400 hover:bg-blue-300 md:py-4 md:text-lg">
                                @lang('privateLessons/english/online/index.create_account_button')
                            </a>
                            @endif
                        </div>
                    </div>
                    <div class="lg:grid lg:grid-cols-1 lg:gap-y-8">
                        <div class="aspect-w-1 aspect-h-7 rounded-lg overflow-hidden">
                            <img src="{{ asset('/images/online-language-learning-2023.jpeg') }}" class="w-full h-full object-center object-cover"
                                 alt="private lessons The Weaver School">
                        </div>
                    </div>
                </div>
                {{--          @if (Auth::check())--}}
                {{--              <a href="/dashboard" id="how-it-works-view-dashboard-button" class="unstyled w-1/2 mt-5 mb-5 sm:mb-0 flex items-center justify-center py-3 border border-transparent--}}
{{--                  text-base font-medium rounded-md text-white bg-blue-400 hover:bg-blue-300 md:py-4 md:text-lg">--}}
                    {{--                  @lang('privateLessons/english/online/index.dashboard_button')--}}
                    {{--              </a>--}}
                {{--          @else--}}
                {{--              <a href="/register" id="how-it-works-create-account-button" onclick="fathom.trackGoal('CLICKED-HOW-IT-WORKS-CREATE-ACCOUNT-BUTTON', 0);" class="unstyled w-1/2 mt-5 mb-5 sm:mb-0 flex items-center justify-center py-3 border border-transparent--}}
{{--              text-base font-medium rounded-md text-white bg-blue-400 hover:bg-blue-300 md:py-4 md:text-lg">--}}
                    {{--                  @lang('privateLessons/english/online/index.create_account_button')--}}
                    {{--              </a>--}}
                {{--          @endif--}}
                {{--      </div>--}}
            {{--  </div>--}}
        {{--  <div class="lg:grid lg:grid-cols-1 lg:gap-y-8">--}}
            {{--      <div class="aspect-w-1 aspect-h-7 rounded-lg overflow-hidden">--}}
                {{--          <img src="{{ asset('/images/online-language-learning-2023.jpeg') }}" class="w-full h-full object-center object-cover"--}}
                                   {{--               alt="private lessons The Weaver School">--}}
                {{--      </div>--}}
            {{--  </div>--}}
        {{--</div>--}}

    <!-- End how it works -->

    <!-- Pricing Block -->
    <div class="bg-blue-400">
        <div class="pt-12 sm:pt-16 lg:pt-16">
            <div class="max-w-7xl mx-auto text-center px-4 sm:px-6 lg:px-8">
                <div class="max-w-3xl mx-auto space-y-2 lg:max-w-none">
                    <h2 class="text-lg leading-6 font-semibold text-white uppercase tracking-wider mb-4">@lang('privateLessons/english/online/index.pricing_title')</h2>
                    <p class="text-3xl font-extrabold text-white sm:text-4xl lg:text-5xl">@lang('privateLessons/english/online/index.pricing_subtitle')</p>
                    <p class="text-xl text-white">@lang('privateLessons/english/online/index.pricing_description')</p>
                </div>
            </div>
        </div>
        <div class="mt-8 pb-12 bg-gray-200 sm:mt-12 sm:pb-16 lg:mt-16 lg:pb-24">
            <div class="relative">
                <div class="absolute inset-0 h-3/4 bg-blue-400"></div>
                <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="max-w-md mx-auto space-y-4 lg:max-w-5xl lg:grid lg:grid-cols-3 lg:gap-5 lg:space-y-0">
                        <!-- Start option 1 -->
                        <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                            <div class="px-6 py-8 bg-white sm:p-10 sm:pb-6">
                                <div>
                                    <h3 class="inline-flex px-4 py-1 rounded-full text-sm font-semibold tracking-wide uppercase bg-blue-100 text-blue-400" id="tier-standard">@lang('privateLessons/english/online/index.standard_badge')</h3>
                                </div>
                                <div class="mt-4 flex items-baseline text-6xl font-extrabold">
                                    @lang('privateLessons/english/online/index.standard_price')
                                    <span class="ml-1 text-2xl font-medium text-gray-500"> @lang('privateLessons/english/online/index.per_month') </span>
                                </div>
                                <p class="mt-5 text-lg text-gray-500">@lang('privateLessons/english/online/index.standard_description')</p>
                            </div>
                            <div class="flex-1 flex flex-col justify-between px-6 pt-6 pb-8 bg-gray-50 space-y-6 sm:p-10 sm:pt-6">
                                <ul role="list" class="space-y-4">
                                    <li class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <!-- Heroicon name: outline/check -->
                                            <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-base text-gray-700">@lang('privateLessons/english/online/index.choose_teacher')</p>
                                    </li>
                                    <li class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <!-- Heroicon name: outline/check -->
                                            <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-base text-gray-700">@lang('privateLessons/english/online/index.choose_lessons')</p>
                                    </li>

                                    <li class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <!-- Heroicon name: outline/check -->
                                            <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-base text-gray-700">@lang('privateLessons/english/online/index.weekly_homework')</p>
                                    </li>

                                    <li class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <!-- Heroicon name: outline/check -->
                                            <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-base text-gray-700">@lang('privateLessons/english/online/index.weekly_quizzes')</p>
                                    </li>

                                    <li class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <!-- Heroicon name: outline/check -->
                                            <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-base text-gray-700">@lang('privateLessons/english/online/index.monthly_tests')</p>
                                    </li>

                                    <li class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <!-- Heroicon name: outline/check -->
                                            <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-base text-gray-700">@lang('privateLessons/english/online/index.flashcards')</p>
                                    </li>

                                    <li class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <!-- Heroicon name: outline/check -->
                                            <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-base text-gray-700">@lang('privateLessons/english/online/index.lesson_plan')</p>
                                    </li>

                                    {{--                                    <li class="flex items-start">--}}
                                        {{--                                        <div class="flex-shrink-0">--}}
                                            {{--                                            <!-- Heroicon name: outline/check -->--}}
                                            {{--                                            <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">--}}
                                                {{--                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />--}}
                                                {{--                                            </svg>--}}
                                            {{--                                        </div>--}}
                                        {{--                                        <p class="ml-3 text-base text-gray-700">Itaque cupiditate adipisci quibusdam</p>--}}
                                        {{--                                    </li>--}}
                                </ul>
                                <div class="rounded-md shadow">
                                    <a href="/register?course_id=2101" class="flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-400 hover:bg-blue-500" aria-describedby="tier-standard"> @lang('privateLessons/english/online/index.get_started_button') </a>
                                    <a href="/register" class="flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-400 hover:bg-blue-500" aria-describedby="tier-standard"> @lang('privateLessons/english/online/index.get_started_button') </a>
                                </div>
                            </div>
                        </div>
                        <!-- End option 1 -->

                        <!-- Start option 2 -->
                        <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                            <div class="px-6 py-8 bg-white sm:p-10 sm:pb-6">
                                <div>
                                    <h3 class="inline-flex px-4 py-1 rounded-full text-sm font-semibold tracking-wide uppercase bg-gray-200 text-gray-600" id="tier-standard">@lang('privateLessons/english/online/index.intensive_badge')</h3>
                                </div>
                                <div class="mt-4 flex items-baseline text-6xl font-extrabold">
                                    @lang('privateLessons/english/online/index.intensive_price')
                                    <span class="ml-1 text-2xl font-medium text-gray-500"> @lang('privateLessons/english/online/index.per_month') </span>
                                </div>
                                <p class="mt-5 text-lg text-gray-500">@lang('privateLessons/english/online/index.intensive_description')</p>
                            </div>
                            <div class="flex-1 flex flex-col justify-between px-6 pt-6 pb-8 bg-gray-50 space-y-6 sm:p-10 sm:pt-6">
                                <ul role="list" class="space-y-4">
                                    <li class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <!-- Heroicon name: outline/check -->
                                            <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-base text-gray-700">@lang('privateLessons/english/online/index.choose_teacher_intensive')</p>
                                    </li>
                                    <li class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <!-- Heroicon name: outline/check -->
                                            <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-base text-gray-700">@lang('privateLessons/english/online/index.choose_lessons')</p>
                                    </li>

                                    <li class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <!-- Heroicon name: outline/check -->
                                            <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-base text-gray-700">@lang('privateLessons/english/online/index.weekly_homework')</p>
                                    </li>

                                    <li class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <!-- Heroicon name: outline/check -->
                                            <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-base text-gray-700">@lang('privateLessons/english/online/index.weekly_quizzes')</p>
                                    </li>

                                    <li class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <!-- Heroicon name: outline/check -->
                                            <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-base text-gray-700">@lang('privateLessons/english/online/index.monthly_tests')</p>
                                    </li>

                                    <li class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <!-- Heroicon name: outline/check -->
                                            <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-base text-gray-700">@lang('privateLessons/english/online/index.flashcards')</p>
                                    </li>

                                    <li class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <!-- Heroicon name: outline/check -->
                                            <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-base text-gray-700">@lang('privateLessons/english/online/index.lesson_plan')</p>
                                    </li>
                                </ul>
                                <div class="rounded-md shadow">
                                    <a href="/register" class="flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-400 hover:bg-blue-500" aria-describedby="tier-standard"> @lang('privateLessons/english/online/index.get_started_button') </a>
                                </div>
                            </div>
                        </div>
                        <!-- End option 2 -->

                        <!-- Option 3 -->
                        <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                            <div class="px-6 py-8 bg-white sm:p-10 sm:pb-6">
                                <div>
                                    <h3 class="inline-flex px-4 py-1 rounded-full text-sm font-semibold tracking-wide uppercase bg-yellow-200 text-yellow-600" id="tier-standard">@lang('privateLessons/english/online/index.premium_badge')</h3>
                                </div>
                                <div class="mt-4 flex items-baseline text-6xl font-extrabold">
                                    @lang('privateLessons/english/online/index.premium_price')
                                    <span class="ml-1 text-2xl font-medium text-gray-500"> @lang('privateLessons/english/online/index.per_month') </span>
                                </div>
                                <p class="mt-5 text-lg text-gray-500">@lang('privateLessons/english/online/index.premium_description')</p>
                            </div>
                            <div class="flex-1 flex flex-col justify-between px-6 pt-6 pb-8 bg-gray-50 space-y-6 sm:p-10 sm:pt-6">
                                <ul role="list" class="space-y-4">
                                    <li class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <!-- Heroicon name: outline/check -->
                                            <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-base text-gray-700">@lang('privateLessons/english/online/index.choose_teacher_premium')</p>
                                    </li>
                                    <li class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <!-- Heroicon name: outline/check -->
                                            <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-base text-gray-700">@lang('privateLessons/english/online/index.choose_lessons')</p>
                                    </li>

                                    <li class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <!-- Heroicon name: outline/check -->
                                            <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-base text-gray-700">@lang('privateLessons/english/online/index.weekly_homework')</p>
                                    </li>

                                    <li class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <!-- Heroicon name: outline/check -->
                                            <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-base text-gray-700">@lang('privateLessons/english/online/index.weekly_quizzes')</p>
                                    </li>

                                    <li class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <!-- Heroicon name: outline/check -->
                                            <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-base text-gray-700">@lang('privateLessons/english/online/index.monthly_tests')</p>
                                    </li>

                                    <li class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <!-- Heroicon name: outline/check -->
                                            <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-base text-gray-700">@lang('privateLessons/english/online/index.flashcards')</p>
                                    </li>

                                    <li class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <!-- Heroicon name: outline/check -->
                                            <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-base text-gray-700">@lang('privateLessons/english/online/index.lesson_plan')</p>
                                    </li>

                                    <li class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <!-- Heroicon name: outline/check -->
                                            <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-base text-gray-700">@lang('privateLessons/english/online/index.private_coaching')</p>
                                    </li>

                                </ul>
                                <div class="rounded-md shadow">
                                    <a href="/register" class="flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-400 hover:bg-blue-500" aria-describedby="tier-standard"> @lang('privateLessons/english/online/index.get_started_button') </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End option 3 -->
                </div>

            </div>
        </div>
        <!-- Discount block

         <div class="mt-4 relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 lg:mt-5">
            <div class="max-w-md mx-auto lg:max-w-5xl">
              <div class="rounded-lg bg-gray-100 px-6 py-8 sm:p-10 lg:flex lg:items-center">
                     <div class="flex-1">
                         <div>
                             <h3 class="inline-flex px-4 py-1 rounded-full text-sm font-semibold tracking-wide uppercase bg-white text-gray-800">Discounted</h3>
                         </div>
                         <div class="mt-4 text-lg text-gray-600">Get full access to all of standard license features for solo projects that make less than $20k gross revenue for <span class="font-semibold text-gray-900">$29</span>.</div>
                     </div>
                     <div class="mt-6 rounded-md shadow lg:mt-0 lg:ml-10 lg:flex-shrink-0">
                         <a href="#" class="flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-gray-900 bg-white hover:bg-gray-50"> Buy Discounted License </a>
                     </div>
                 </div>
             </div>
         </div>
        -->
    </div>
    </div>

    <!-- End pricing block -->

    <!-- FAQ -->
    <div x-data="{ dropdownOneOpen: false, dropdownTwoOpen: false, dropdownThreeOpen: false, dropdownFourOpen: false,
    dropdownFiveOpen: false, dropdownSixOpen: false, dropdownSevenOpen: false}" class="bg-gray-200 pb-5">
        <div class="max-w-2xl lg:mx-48 xl:mx-96 pb-0 py-5 sm:px-6 md:px-0 lg:max-w-7xl lg:px-0">
            <h1 class="text-5xl font-extrabold text-center mb-16">@lang('privateLessons/english/online/index.faq_title')</h1>
            <div class="mb-4 pb-4 border-b border-gray-300">
                <button id="faq-course-materials-toggle" class="inline-flex mx-5 md:mx-80 focus:outline-none" @click=" dropdownOneOpen = ! dropdownOneOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2 mt-1 font-bold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <h5 class="text-left text-3xl font-bold">@lang('privateLessons/english/online/index.faq_heading_1')</h5>
                </button>
                <p class="text-2xl mt-2 mx-5 md:mx-80" x-show="dropdownOneOpen">
                    @lang('privateLessons/english/online/index.faq_text_1')
                </p>
            </div>
            <div class="mb-4 pb-4 border-b border-gray-300">
                <button id="faq-time-needed-toggle" class="inline-flex mx-5 md:mx-80 focus:outline-none" @click=" dropdownTwoOpen = ! dropdownTwoOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2 mt-1 font-bold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <h5 class="text-left text-3xl font-bold">@lang('privateLessons/english/online/index.faq_heading_2')</h5>
                </button>
                <p class="text-2xl mt-2 mx-5 md:mx-80" x-show="dropdownTwoOpen">
                    @lang('privateLessons/english/online/index.faq_text_2')
                </p>
            </div>
            <div class="mb-4 pb-4 border-b border-gray-300">
                <button id="faq-reschedule-lessons-toggle" class="inline-flex mx-5 md:mx-80 focus:outline-none" @click=" dropdownThreeOpen = ! dropdownThreeOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2 mt-1 font-bold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <h5 class="text-left text-3xl font-bold">@lang('privateLessons/english/online/index.faq_heading_3')</h5>
                </button>
                <p class="text-2xl mt-2 mx-5 md:mx-80" x-show="dropdownThreeOpen">
                    @lang('privateLessons/english/online/index.faq_text_3')
                </p>
            </div>
            <div class="mb-4 pb-4 border-b border-gray-300">
                <button id="faq-downloads-needed-toggle" class="inline-flex mx-5 md:mx-80 focus:outline-none" @click=" dropdownFourOpen = ! dropdownFourOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2 mt-1 font-bold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <h5 class="text-left text-3xl font-bold">@lang('privateLessons/english/online/index.faq_heading_4')</h5>
                </button>
                <p class="text-2xl mt-2 mx-5 md:mx-80" x-show="dropdownFourOpen">
                    @lang('privateLessons/english/online/index.faq_text_4')
                </p>
            </div>
            <div class="mb-4 pb-4 border-b border-gray-300">
                <button id="faq-hours-to-fluency-toggle" class="inline-flex mx-5 md:mx-80 focus:outline-none" @click=" dropdownFiveOpen = ! dropdownFiveOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2 mt-1 font-bold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <h5 class="text-left text-3xl font-bold">@lang('privateLessons/english/online/index.faq_heading_5')</h5>
                </button>
                <p class="text-2xl mt-2 mx-5 md:mx-80" x-show="dropdownFiveOpen">
                    @lang('privateLessons/english/online/index.faq_text_5')
                </p>
            </div>
            <div class="mb-4 pb-4 border-b border-gray-300">
                <button id="faq-time-for-homework-toggle" class="inline-flex mx-5 md:mx-80 focus:outline-none" @click=" dropdownSixOpen = ! dropdownSixOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2 mt-1 font-bold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <h5 class="text-left text-3xl font-bold">@lang('privateLessons/english/online/index.faq_heading_6')</h5>
                </button>
                <p class="text-2xl mt-2 mx-5 md:mx-80" x-show="dropdownSixOpen">
                    @lang('privateLessons/english/online/index.faq_text_6')
                </p>
            </div>
            <div class="mb-4 pb-4 border-b border-gray-300">
                <button id="faq-company-payment-toggle" class="inline-flex mx-5 md:mx-80 focus:outline-none" @click=" dropdownSevenOpen = ! dropdownSevenOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2 mt-1 font-bold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <h5 class="text-left text-3xl font-bold">@lang('privateLessons/english/online/index.faq_heading_7')</h5>
                </button>
                <p class="text-2xl mt-2 mx-5 md:mx-80" x-show="dropdownSevenOpen">
                    @lang('privateLessons/english/online/index.faq_text_7')
                </p>
            </div>
        </div>
    </div>

    <!-- End FAQ -->

    <!-- Courses index block -->

    {{--<div class="bg-blue-400">--}}
        {{--  <div class="max-w-2xl mx-auto pt-5 pb-0 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-0">--}}
            {{--      <div class="text-center text-white mb-5 mx-8g lg:mx-60">--}}
                {{--          <h2>@lang('privateLessons/english/online/index.private_online_title')</h2>--}}
                {{--          <p class="text-xl">@lang('privateLessons/english/online/index.private_online_text')</p>--}}
                {{--      </div>--}}
            {{--          <div class="max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:gap-x-8">--}}
                {{--              @foreach($privateLessons as $privateLesson)--}}
                {{--            <div class="lg:grid lg:grid-cols-1 lg:gap-y-8">--}}
                    {{--              <div class="group relative">--}}
                        {{--                <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">--}}
                            {{--                  <img src="{{ asset($privateLesson->image) }}" class="w-full h-full object-center object-cover" alt="private lessons The Weaver School">--}}
                            {{--                </div>--}}
                        {{--                <div class="text-white mt-4 px-8 sm:px-0">--}}
                            {{--                  <h3 class="">{{ $privateLesson->name }}</h3>--}}
                            {{--                  <p class="">{{ $privateLesson->about }}</p>--}}
                            {{--                  <a href="{{$privateLesson->slug}}" class="btn btn-lg btn-light mb-5">@lang('privateLessons/english/online/index.private_lessons_button')</a>--}}
                            {{--                </div>--}}
                        {{--              </div>--}}
                    {{--            </div>--}}
                {{--              @endforeach--}}

                {{--      </div>--}}
            {{--  </div>--}}
        {{--</div>--}}

    <!-- End courses index block -->


    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-lg-3 col-sm-12">
                <h2>@lang('privateLessons/english/online/index.why_weaver_title')</h2>
                <p class="lead">@lang('privateLessons/english/online/index.why_weaver_text')</p>
            </div>
            <div class="col-lg-9 col-sm-12">
                <div class="max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:gap-x-8">
                    <div class="lg:grid lg:grid-cols-1 lg:gap-y-8">
                        <div class="group relative">
                            <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
                                <img src="{{ asset('/images/pages/private-online-english-lessons.jpeg') }}" class="w-full h-full object-center object-cover" alt="private lessons The Weaver School">
                            </div>
                            <div class="mt-4">
                                <h3 class="">@lang('privateLessons/english/online/index.flexible_schedules_title')</h3>
                                <p class="">@lang('privateLessons/english/online/index.flexible_schedules_text')</p>
                            </div>
                        </div>
                    </div>
                    <div class="lg:grid lg:grid-cols-1 lg:gap-y-8">
                        <div class="group relative">
                            <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
                                <img src="{{ asset('/images/online_english_lessons_netherlands.jpg') }}" class="w-full h-full object-center object-cover" alt="ielts courses rotterdam">
                            </div>
                            <div class="mt-4">
                                <h3 class="card-title">@lang('privateLessons/english/online/index.expert_teachers_title')</h3>
                                <p class="card-text">@lang('privateLessons/english/online/index.expert_teachers_text')</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (Auth::check())
    <x-cta.user />
    @else
    <x-cta.visitor />
    @endif

    </div>



    {{-- @foreach($privateLessons as $privateLesson)
    <div class="col-lg-4 col-md-10 col-sm-10 no-gutters my-3">
        <div class="card">
            <div class="card-top">
            </div>
            <img src="{{ $privateLesson->image }}" class="card-img-top" alt="The Weaver School general english course in rotterdam">
            <div class="card-body text-center">
                <h4 class="card-title">{{ $privateLesson->name }}</h4>
                <hr>
                <p class="card-text">{{ $privateLesson->description }}</p>

            </div>
            <div class="card-footer">
                <a href="/private-lessons/{{ $privateLesson->id }}" class="btn btn-lg btn-primary btn-block">Learn more</a>
            </div>
        </div>
    </div>
    @endforeach --}}


</x-layouts.app>

