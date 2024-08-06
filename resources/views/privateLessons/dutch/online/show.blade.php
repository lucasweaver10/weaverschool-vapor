<x-layouts.app title="{{ $privateLesson->name }} | The Weaver School">
  <x-slot name="title">
    {{ $privateLesson->name }} | The Weaver School
  </x-slot>
  <x-slot name="description">
    {{ $privateLesson->name }} in Rotterdam at The Weaver School
  </x-slot>

    <x-heroes.privateLessons.dutch.online.show :privateLesson="$privateLesson" />

<div x-data="{ dropdownOneOpen: false, dropdownTwoOpen: false, dropdownThreeOpen: false, dropdownFourOpen: false,
    dropdownFiveOpen: false, dropdownSixOpen: false, dropdownSevenOpen: false, selectedTeacher: 0 }">
<div class="container-fluid bg-white">

    <div class="bg-gray-200 pb-5">
        <div class="max-w-2xl mx-auto pt-5 pb-0 sm:py-24 sm:px-6 md:px-0 lg:max-w-7xl lg:px-0">
            <div class="text-center text-black mb-5 lg:mx-64">
                <h2 class="text-3xl tracking-tight font-extrabold">@lang('privateLessons/dutch/online/show.become_fluent')</h2>
                <p class="text-2xl">{{ $privateLesson->about }}</p>
            </div>
        </div>
        <div class="max-w-2xl mx-auto sm:px-6 lg:max-w-7xl md:px-0 lg:px-8 lg:grid lg:grid-cols-3 lg:gap-x-8">

                <div class="lg:grid lg:grid-cols-1 lg:gap-y-8">
                    <div class="group relative">
                        <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
                            <img src="{{ asset('/images/online-lesson-4.jpg') }}" class="w-full h-full object-center object-cover"
                                 alt="private lessons The Weaver School">
                        </div>
                        <div class="text-black my-16 lg:my-8 px-8 sm:px-0">
                            <h3 class="text-3xl tracking-tight font-extrabold">@lang('privateLessons/dutch/online/show.grammar_title')</h3>
                            <p class="text-xl">
                                @lang('privateLessons/dutch/online/show.grammar_text')
                            </p>
                        </div>
                    </div>
                </div>

            <div class="lg:grid lg:grid-cols-1 lg:gap-y-8">
                <div class="group relative">
                    <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
                        <img src="{{ asset('/images/online-lesson-5.jpg') }}" class="w-full h-full object-center object-cover"
                             alt="private lessons The Weaver School">
                    </div>
                    <div class="text-black my-16 lg:my-8 px-8 sm:px-0">
                        <h3 class="text-3xl tracking-tight font-extrabold">@lang('privateLessons/dutch/online/show.vocabulary_title')</h3>
                        <p class="text-xl">
                            @lang('privateLessons/dutch/online/show.vocabulary_text')
                        </p>
                    </div>
                </div>
            </div>

            <div class="lg:grid lg:grid-cols-1 lg:gap-y-8">
                <div class="group relative">
                    <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
                        <img src="{{ asset('/images/online-lesson-3.jpg') }}" class="w-full h-full object-center object-cover"
                             alt="private lessons The Weaver School">
                    </div>
                    <div class="text-black my-16 lg:my-8 px-8 sm:px-0">
                        <h3 class="text-3xl tracking-tight font-extrabold"> @lang('privateLessons/dutch/online/show.speaking_title')</h3>
                        <p class="text-xl">
                            @lang('privateLessons/dutch/online/show.speaking_text')
                        </p>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <div class="max-w-2xl mx-auto py-5 px-8 sm:px-6 md:px-4 lg:px-8 lg:max-w-7xl  lg:grid lg:grid-cols-2 lg:gap-x-8">
        <div class="lg:grid lg:grid-cols-1 lg:gap-y-8">
            <div class="group relative">
                <h2 class="text-5xl tracking-tight font-extrabold mb-4">@lang('privateLessons/dutch/online/show.how_it_works_title')</h2>
                <p class="text-xl">@lang('privateLessons/dutch/online/show.hiw_1')</p>
                <p class="text-xl">@lang('privateLessons/dutch/online/show.hiw_2')</p>
                <p class="text-xl">@lang('privateLessons/dutch/online/show.hiw_3')</p>
                <p class="text-xl">@lang('privateLessons/dutch/online/show.hiw_4')</p>
                <p class="text-xl">@lang('privateLessons/dutch/online/show.hiw_5')</p>
                <p class="text-xl">@lang('privateLessons/dutch/online/show.hiw_6')</p>
                @if (Auth::check())--}}
                    <a href="/dashboard" class="unstyled w-1/2 mt-5 mb-5 sm:mb-0 flex items-center justify-center py-3 border border-transparent
                        text-base font-medium rounded-md text-white bg-blue-400 hover:bg-blue-300 md:py-4 md:text-lg">
                        @lang('privateLessons/dutch/online/show.create_account_button')
                    </a>
                @else
                    <a href="/register" class="unstyled w-1/2 mt-5 mb-5 sm:mb-0 flex items-center justify-center py-3 border border-transparent
                    text-base font-medium rounded-md text-white bg-blue-400 hover:bg-blue-300 md:py-4 md:text-lg">
                        @lang('privateLessons/dutch/online/show.dashboard_button')
                    </a>
                @endif
            </div>
        </div>
        <div class="lg:grid lg:grid-cols-1 lg:gap-y-8">
            <div class="aspect-w-1 aspect-h-7 rounded-lg overflow-hidden">
                <img src="{{ asset('/images/online_english_lessons_netherlands.jpg') }}" class="w-full h-full object-center object-cover"
                     alt="private lessons The Weaver School">
            </div>
        </div>
    </div>

    <div class="section bg-gray-200 pb-3">
        <div class="max-w-7xl pt-5 pb-3 sm:px-6 md:px-0 lg:max-w-7xl lg:px-0 mx-auto">
            <div class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-3xl text-center mb-3">@lang('privateLessons/dutch/online/show.our_teachers')</div>
        </div>

        <svg id="carousel-previous-teacher" x-show="selectedTeacher > 0" role="button" @click="selectedTeacher--" class="h-6 w-6 float-left ml-5 mt-24 sm:mt-36" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>

        <svg id="carousel-next-teacher" x-show="selectedTeacher < {{ count($teachers) - 1 }}" role="button" @click="selectedTeacher++" class="h-6 w-6 float-right mr-5 mt-24 sm:mt-36" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
        </svg>

        @foreach($teachers as $teacher)
            <div x-cloak x-show="selectedTeacher === {{ $loop->index }}" x-transition:enter.duration:3500ms class="grid items-center
                grid-cols-1 sm:px-12 lg:max-w-7xl md:px-20 lg:px-36 md:grid-cols-2 mb-5">

                <div class="sm:py-3 col-span-2 @if($loop->first) ml-5 @endif @if($loop->last) mr-5 @endif">
                    <div class="space-y-4 sm:grid sm:grid-cols-3 sm:items-start sm:gap-6 sm:space-y-0">
                        <div class="object-cover">
                            <img class="mx-auto h-40 w-40 rounded-full xl:w-56 xl:h-56 object-cover" src="{{ $teacher->image }}" alt="">
                        </div>
                        <div class="sm:col-span-2">
                            <div class="space-y-4">
                                <div class="text-lg leading-6 font-medium space-y-1">
                                    <div class="mb-3"><span class="text-6xl font-extrabold tracking-tight text-gray-900">{{ $teacher->first_name }}</span><span class="text-3xl font-bold text-gray-900 ml-3"> €{{ $teacher->gross_hourly_rate }}/@lang('privateLessons/dutch/online/show.hour')</span></div>
                                    @foreach($teacher->specialties as $specialty)<span class="inline-flex items-center px-3 py-1 mx-1 rounded-full text-sm font-medium bg-blue-400 text-white"> {{ $specialty->name }} </span>@endforeach
                                </div>
                                <div class="text-lg">
                                    <p class="text-gray-900">{{ $teacher->about }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @endforeach

    </div>

    <div class="bg-blue-400">
        <div class="pt-12 sm:pt-16 lg:pt-16">
            <div class="max-w-7xl mx-auto text-center px-4 sm:px-6 lg:px-8">
                <div class="max-w-3xl mx-auto space-y-2 lg:max-w-none">
                    <h2 class="text-lg leading-6 font-semibold text-white uppercase tracking-wider mb-4">@lang('privateLessons/dutch/online/show.pricing_title')</h2>
                    <p class="text-3xl font-extrabold text-white sm:text-4xl lg:text-5xl">@lang('privateLessons/dutch/online/show.pricing_subtitle')</p>
                    <p class="text-xl text-white">@lang('privateLessons/dutch/online/show.pricing_description')</p>
                </div>
            </div>
        </div>
        <div class="mt-8 pb-12 bg-gray-200 sm:mt-12 sm:pb-16 lg:mt-16 lg:pb-24">
            <div class="relative">
                <div class="absolute inset-0 h-3/4 bg-blue-400"></div>
                <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="max-w-md mx-auto space-y-4 lg:max-w-5xl lg:grid lg:grid-cols-2 lg:gap-5 lg:space-y-0">
                        <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                            <div class="px-6 py-8 bg-white sm:p-10 sm:pb-6">
                                <div>
                                    <h3 class="inline-flex px-4 py-1 rounded-full text-sm font-semibold tracking-wide uppercase bg-blue-100 text-blue-400" id="tier-standard">@lang('privateLessons/dutch/online/show.standard_badge')</h3>
                                </div>
                                <div class="mt-4 flex items-baseline text-6xl font-extrabold">
                                    @foreach($teachers as $teacher)
                                        <div x-cloak x-show="selectedTeacher === {{ $loop->index }}" x-transition:enter.duration:3500ms class="">
                                            €{{ $teacher->gross_hourly_rate * 12 }}
                                        </div>
                                    @endforeach

                                    {{--                                    @lang('privateLessons/dutch/online/show.standard_price')--}}
                                    <span class="ml-1 text-2xl font-medium text-gray-500"> @lang('privateLessons/dutch/online/show.total') </span>
                                </div>
                                <p class="mt-5 text-lg text-gray-500">@lang('privateLessons/dutch/online/show.standard_description')</p>
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
                                        <p class="ml-3 text-base text-gray-700">@lang('privateLessons/dutch/online/show.choose_teacher')</p>
                                    </li>
                                    <li class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <!-- Heroicon name: outline/check -->
                                            <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-base text-gray-700">@lang('privateLessons/dutch/online/show.choose_lessons')</p>
                                    </li>

                                    <li class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <!-- Heroicon name: outline/check -->
                                            <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-base text-gray-700">@lang('privateLessons/dutch/online/show.weekly_homework')</p>
                                    </li>

                                    <li class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <!-- Heroicon name: outline/check -->
                                            <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-base text-gray-700">@lang('privateLessons/dutch/online/show.weekly_quizzes')</p>
                                    </li>

                                    <li class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <!-- Heroicon name: outline/check -->
                                            <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-base text-gray-700">@lang('privateLessons/dutch/online/show.lesson_plan')</p>
                                    </li>
                                </ul>
                                <div class="rounded-md shadow">
                                    <a href="/register" class="flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-400 hover:bg-blue-500" aria-describedby="tier-standard"> @lang('privateLessons/dutch/online/show.get_started_button') </a>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                            <div class="px-6 py-8 bg-white sm:p-10 sm:pb-6">
                                <div>
                                    <h3 class="inline-flex px-4 py-1 rounded-full text-sm font-semibold tracking-wide uppercase bg-blue-100 text-blue-400" id="tier-standard">@lang('privateLessons/dutch/online/show.monthly_badge')</h3>
                                </div>
                                <div class="mt-4 flex items-baseline text-6xl font-extrabold">
                                    @foreach($teachers as $teacher)
                                        <div x-cloak x-show="selectedTeacher === {{ $loop->index }}" x-transition:enter.duration:3500ms class="">
                                            €{{ ($teacher->gross_hourly_rate * 12) / 3 }}
                                        </div>
                                    @endforeach
                                    {{--                                    @lang('privateLessons/dutch/online/show.monthly_price')--}}
                                    <span class="ml-1 text-2xl font-medium text-gray-500"> @lang('privateLessons/dutch/online/show.per_month') </span>
                                </div>
                                <p class="mt-5 text-lg text-gray-500">@lang('privateLessons/dutch/online/show.monthly_description')</p>
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
                                        <p class="ml-3 text-base text-gray-700">@lang('privateLessons/dutch/online/show.automatic_payments')</p>
                                    </li>

                                    <li class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <!-- Heroicon name: outline/check -->
                                            <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-base text-gray-700">@lang('privateLessons/dutch/online/show.total_payments')</p>
                                    </li>

                                    <li class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <!-- Heroicon name: outline/check -->
                                            <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-base text-gray-700">@lang('privateLessons/dutch/online/show.benefits')</p>
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
                                    <a href="/register" class="flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-400 hover:bg-blue-500" aria-describedby="tier-standard"> @lang('privateLessons/dutch/online/show.get_started_button') </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="bg-gray-200 pb-5 mb-5">
        <div class="max-w-2xl lg:mx-48 xl:mx-96 pb-0 py-5 sm:px-6 md:px-0 lg:max-w-7xl lg:px-0">
            <h1 class="text-5xl font-extrabold text-center mb-16">@lang('privateLessons/dutch/online/show.faq_title')</h1>
                <div class="mb-4 pb-4 border-b border-gray-300">
                    <button class="inline-flex mx-5 md:mx-80" @click=" dropdownOneOpen = ! dropdownOneOpen">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2 mt-1 font-bold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <h5 class="text-left text-3xl font-bold">@lang('privateLessons/dutch/online/show.faq_heading_1')</h5>
                    </button>
                    <p class="text-2xl mt-2 mx-5 md:mx-80" x-show="dropdownOneOpen">
                        @lang('privateLessons/dutch/online/show.faq_text_1')
                    </p>
                </div>
            <div class="mb-4 pb-4 border-b border-gray-300">
                <button class="inline-flex mx-5 md:mx-80" @click=" dropdownTwoOpen = ! dropdownTwoOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2 mt-1 font-bold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <h5 class="text-left text-3xl font-bold">@lang('privateLessons/dutch/online/show.faq_heading_2')</h5>
                </button>
                <p class="text-2xl mt-2 mx-5 md:mx-80" x-show="dropdownTwoOpen">
                    @lang('privateLessons/dutch/online/show.faq_text_2')
                </p>
            </div>
            <div class="mb-4 pb-4 border-b border-gray-300">
                <button class="inline-flex mx-5 md:mx-80" @click=" dropdownThreeOpen = ! dropdownThreeOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2 mt-1 font-bold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <h5 class="text-left text-3xl font-bold">@lang('privateLessons/dutch/online/show.faq_heading_3')</h5>
                </button>
                <p class="text-2xl mt-2 mx-5 md:mx-80" x-show="dropdownThreeOpen">
                    @lang('privateLessons/dutch/online/show.faq_text_3')
                </p>
            </div>
            <div class="mb-4 pb-4 border-b border-gray-300">
                <button class="inline-flex mx-5 md:mx-80" @click=" dropdownFourOpen = ! dropdownFourOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2 mt-1 font-bold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <h5 class="text-left text-3xl font-bold">@lang('privateLessons/dutch/online/show.faq_heading_4')</h5>
                </button>
                <p class="text-2xl mt-2 mx-5 md:mx-80" x-show="dropdownFourOpen">
                    @lang('privateLessons/dutch/online/show.faq_text_4')
                </p>
            </div>
            <div class="mb-4 pb-4 border-b border-gray-300">
                <button class="inline-flex mx-5 md:mx-80" @click=" dropdownFiveOpen = ! dropdownFiveOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2 mt-1 font-bold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <h5 class="text-left text-3xl font-bold">@lang('privateLessons/dutch/online/show.faq_heading_5')</h5>
                </button>
                <p class="text-2xl mt-2 mx-5 md:mx-80" x-show="dropdownFiveOpen">
                    @lang('privateLessons/dutch/online/show.faq_text_5')
                </p>
            </div>
            <div class="mb-4 pb-4 border-b border-gray-300">
                <button class="inline-flex mx-5 md:mx-80" @click=" dropdownSixOpen = ! dropdownSixOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2 mt-1 font-bold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <h5 class="text-left text-3xl font-bold">@lang('privateLessons/dutch/online/show.faq_heading_6')</h5>
                </button>
                <p class="text-2xl mt-2 mx-5 md:mx-80" x-show="dropdownSixOpen">
                    @lang('privateLessons/dutch/online/show.faq_text_6')
                </p>
            </div>
            <div class="mb-4 pb-4 border-b border-gray-300">
                <button class="inline-flex mx-5 md:mx-80" @click=" dropdownSevenOpen = ! dropdownSevenOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2 mt-1 font-bold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <h5 class="text-left text-3xl font-bold">@lang('privateLessons/dutch/online/show.faq_heading_7')</h5>
                </button>
                <p class="text-2xl mt-2 mx-5 md:mx-80" x-show="dropdownSevenOpen">
                    @lang('privateLessons/dutch/online/show.faq_text_7')
                </p>
            </div>
        </div>
    </div>

   <x-testimonials.dutch.testimonial />

    @if (Auth::check())
      <x-cta.dutch.user />
    @else
      <x-cta.dutch.visitor />
    @endif

</div>
</div>

</x-layouts.app>
