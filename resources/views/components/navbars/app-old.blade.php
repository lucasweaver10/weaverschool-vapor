@php
  $locale = session('locale', 'en');
  $url = request()->path();
  if($locale !== 'en')
        {
        $path = substr("$url", 6);
        }
    else
        {
        $path = substr("$url", 3);
        }
@endphp
<header x-data="{ languagesOpen: false, coursesOpen: false, toolsOpen: false, subcategory: 'English', showMobileMenu: false }">
    <nav class="mx-auto flex max-w-7xl items-center justify-between px-6 py-2 lg:px-8" aria-label="Global">
        <div class="flex items-center">
            <a class="-m-1.5 p-1.5" href="/{{session('locale')}}">
                <img src="{{config('app.logo')}}" width="165" height="165" class="d-inline-block align-top mt-1 mr-4"
                     alt="The Weaver School logo">
            </a>
        <div class="hidden lg:flex">
            <div class="relative">
            <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
                <button @click=" coursesOpen = ! coursesOpen" type="button" class="group bg-white rounded-md inline-flex
                items-center focus:outline-none" aria-expanded="false">
                <span><a class="text-lg font-semibold leading-6 text-gray-900 ml-4">
                        @lang('components/navbar.courses')</a></span>
                <!--
                Heroicon name: solid/chevron-down

                Item active: "text-gray-600", Item inactive: "text-gray-400"
                -->
                <svg class="text-black md:ml-n2 mr-3 h-5 w-5 group-hover:text-gray-500"
                     viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4
                    4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
                </button>
            <!--
              'Courses flyout menu, show/hide based on flyout menu state.

              Entering: "transition ease-out duration-200"
                From: "opacity-0 translate-y-1"
                To: "opacity-100 translate-y-0"
              Leaving: "transition ease-in duration-150"
                From: "opacity-100 translate-y-0"
                To: "opacity-0 translate-y-1"
            -->
            <div x-cloak x-show=" coursesOpen === true " @click.away=" coursesOpen = false " class="absolute z-20 -ml-4 mt-3 transform px-2 w-full sm:px-0
            lg:ml-0">
                <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden sm:w-full">
                    <div class="relative grid bg-white grid-cols-1">
                        <div class="col py-6 px-4 w-full">
                            <a href="/{{session('locale')}}/english/courses/online" @click=" subcategory = 'English'" class="unstyled pl-4 py-3 flex items-start rounded-lg
                            hover:bg-gray-100">
                                <!-- Heroicon name: outline/desktop-computer -->

                                <div class="">
                                    <p class="font-semibold text-gray-900 text-base">
                                        @lang('components/navbar.english')
                                    </p>
                                </div>
                            </a>

                            <a href="/{{session('locale')}}/thai/courses/online" @click=" subcategory = 'Thai'" class="unstyled pl-4 py-3 flex items-start rounded-lg
                            hover:bg-gray-100">
                                <!-- Heroicon name: outline/desktop-computer -->

                                <div class="">
                                    <p class="font-semibold text-gray-900 text-base">
                                        Thai
                                    </p>
                                </div>
                            </a>

{{--                            <a href="/{{session('locale')}}/dutch/private-lessons/online" @click=" subcategory = 'Dutch'" class="unstyled pl-4 py-3 flex items-start rounded-lg--}}
{{--                            hover:bg-gray-100">--}}
{{--                                <!-- Heroicon name: outline/cursor-click -->--}}
{{--                                <div class="">--}}
{{--                                    <p class="text-base font-medium text-gray-900">--}}
{{--                                        @lang('components/navbar.dutch')--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </a>--}}
                        </div>

{{--                        <div class="col-span-2 py-6 px-6">--}}
{{--                            <div x-cloak x-show="subcategory === 'English' ">--}}
{{--                                <div class="border-b border-gray-300 mb-4">--}}
{{--                                    <h4 class="text-xl font-extrabold">@lang('components/navbar.english_courses')</h4>--}}
{{--                                </div>--}}
{{--                                <a href="/{{session('locale')}}/english/courses/online" class="unstyled -m-3 p-3 my-3 flex--}}
{{--                                items-start rounded-lg hover:bg-gray-50">--}}
{{--                                    <!-- Heroicon name: outline/desktop-computer -->--}}
{{--                                    <div>--}}
{{--                                    <svg class="flex-shrink-0 h-6 w-6 text-blue-400" fill="none" viewBox="0 0 24 24"--}}
{{--                                         stroke="currentColor">--}}
{{--                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75--}}
{{--                                        17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2--}}
{{--                                        2v10a2 2 0 002 2z" />--}}
{{--                                    </svg>--}}
{{--                                    </div>--}}
{{--                                    <div class="ml-4">--}}
{{--                                        <p class="text-base font-medium text-gray-900">--}}
{{--                                            Online English Courses--}}
{{--                                        </p>--}}
{{--                                        <p class="mt-1 text-sm text-gray-500">--}}
{{--                                            Online English courses that help you reach fluency fast.--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                                <a href="/{{session('locale')}}/english/private-lessons/online" class="unstyled -m-3 p-3--}}
{{--                                flex items-start rounded-lg hover:bg-gray-50">--}}
{{--                                    <!-- Heroicon name: outline/desktop-computer -->--}}
{{--                                    <div>--}}
{{--                                        <svg class="flex-shrink-0 h-6 w-6 text-blue-400" fill="none" viewBox="0 0 24 24"--}}
{{--                                             stroke="currentColor">--}}
{{--                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75--}}
{{--                                            17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0--}}
{{--                                            00-2 2v10a2 2 0 002 2z" />--}}
{{--                                        </svg>--}}
{{--                                    </div>--}}
{{--                                    <div class="ml-4">--}}
{{--                                        <p class="text-base font-medium text-gray-900">--}}
{{--                                            Online Private English Lessons--}}
{{--                                        </p>--}}
{{--                                        <p class="mt-1 text-sm text-gray-500">--}}
{{--                                            Private one-to-one English lessons at the time and day of your choice.--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </div>--}}

{{--                            <div x-cloak x-show="subcategory === 'Thai' ">--}}
{{--                                <div class="border-b border-gray-300 mb-4">--}}
{{--                                    <h4 class="text-xl font-extrabold">Thai Courses</h4>--}}
{{--                                </div>--}}
{{--                                <a href="/{{session('locale')}}/thai/courses/online" class="unstyled -m-3 p-3 flex--}}
{{--                                items-start rounded-lg hover:bg-gray-50">--}}
{{--                                    <!-- Heroicon name: outline/desktop-computer -->--}}
{{--                                    <div>--}}
{{--                                        <svg class="flex-shrink-0 h-6 w-6 text-blue-400" fill="none" viewBox="0 0 24 24"--}}
{{--                                             stroke="currentColor">--}}
{{--                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75--}}
{{--                                            17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0--}}
{{--                                            00-2 2v10a2 2 0 002 2z" />--}}
{{--                                        </svg>--}}
{{--                                    </div>--}}
{{--                                    <div class="ml-4">--}}
{{--                                        <p class="text-base font-medium text-gray-900">--}}
{{--                                            Online Thai Courses--}}
{{--                                        </p>--}}
{{--                                        <p class="mt-1 text-sm text-gray-500">--}}
{{--                                            Online Thai courses that teach you the Thai you need to travel in Thailand.--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </div>--}}

{{--                            <div x-cloak x-show="subcategory === 'Dutch' ">--}}
{{--                                <div class="border-b border-gray-300 mb-4">--}}
{{--                                    <h4 class="text-xl font-extrabold">@lang('components/navbar.dutch_courses')</h4>--}}
{{--                                </div>--}}
{{--                                <a href="/{{session('locale')}}/dutch/private-lessons/private-online-dutch-lessons"--}}
{{--                                   class="unstyled -m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">--}}
{{--                                    <!-- Heroicon name: outline/desktop-computer -->--}}
{{--                                    <div>--}}
{{--                                        <svg class="flex-shrink-0 h-6 w-6 text-blue-400" fill="none" viewBox="0 0 24 24"--}}
{{--                                             stroke="currentColor">--}}
{{--                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75--}}
{{--                                            17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0--}}
{{--                                            00-2 2v10a2 2 0 002 2z" />--}}
{{--                                        </svg>--}}
{{--                                    </div>--}}
{{--                                    <div class="ml-4">--}}
{{--                                        <p class="text-base font-medium text-gray-900">--}}
{{--                                            Online Private Lessons--}}
{{--                                        </p>--}}
{{--                                        <p class="mt-1 text-sm text-gray-500">--}}
{{--                                            Private one-to-one lessons with one of our expert teachers at the time and--}}
{{--                                            day of your choice.--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </div>--}}

{{--                        </div>--}}

                        </div>
                    </div>
                </div>
            </div>

            <div class="relative">
                <button @click=" toolsOpen = ! toolsOpen" type="button" class="inline-flex items-center gap-x-1 text-sm
                font-semibold leading-6 text-gray-900 mr-3" aria-expanded="false">
                    <span><a class="text-lg font-semibold leading-6 text-gray-900">
                        Tools</a></span>
                    <svg class="text-black md:ml-n2 h-5 w-5 group-hover:text-gray-500"
                         viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4
                    4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>

                <!--
                  Flyout menu, show/hide based on flyout menu state.

                  Entering: "transition ease-out duration-200"
                    From: "opacity-0 translate-y-1"
                    To: "opacity-100 translate-y-0"
                  Leaving: "transition ease-in duration-150"
                    From: "opacity-100 translate-y-0"
                    To: "opacity-0 translate-y-1"
                -->
                <div x-cloak x-show="toolsOpen == true" @click.away=" toolsOpen = false" class="absolute z-20 -ml-4 mt-3 transform px-2 w-screen sm:px-0
                    lg:ml-0">
                    <div class="w-screen max-w-sm flex-auto rounded-3xl bg-white p-4 text-base leading-6 shadow-lg">
                        <div class="relative rounded-lg p-4 hover:bg-gray-50">
                            <a href="/flashcards" class="font-semibold text-gray-900">
                                Flashcards
                                <span class="absolute inset-0"></span>
                            </a>
                            <p class="mt-1 text-gray-600">Learn 10x faster with neural replay technology.</p>
                        </div>
                        <div class="relative rounded-lg p-4 hover:bg-gray-50">
                            <a href="/{{ session('locale') }}/tools/ielts-essay-ai-grader" class="font-semibold text-gray-900">
                                AI IELTS Essay Grader
                                <span class="absolute inset-0"></span>
                            </a>
                            <p class="mt-1 text-gray-600">Let AI grade your IELTS essay and give you personalized feedback.</p>
                        </div>
                        <div class="relative rounded-lg p-4 hover:bg-gray-50">
                            <a href="/{{ session('locale') }}/tools/c1-advanced-essay-ai-grader" class="font-semibold text-gray-900">
                                AI CAE Essay Grader
                                <span class="absolute inset-0"></span>
                            </a>
                            <p class="mt-1 text-gray-600">Let AI grade your C1 Advanced essay and give you personalized feedback.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative">
{{--                <a href="/{{ session('locale') }}/about" class="text-lg font-semibold leading-6 text-gray-900 mr-3">--}}
{{--                    @lang('components/navbar.about')</a>--}}
                <a href="/blog" class="text-lg font-semibold leading-6 text-gray-900 mr-2">
                    @lang('components/navbar.blog')</a>
            </div>
        </div>
        </div>
        <div class="flex lg:hidden">
        <button @click="showMobileMenu = true" type="button" class="-m-2.5 inline-flex items-center justify-center
        rounded-md p-2.5 text-gray-700">
            <span class="sr-only">Open main menu</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                 aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>
        </div>
        <div class="hidden lg:flex items-center">
            @guest
                <div class="relative">
                    <a class="text-lg font-semibold leading-6 text-gray-900" href="/{{ session('locale') }}/contact">
                        @lang('components/navbar.contact')</a>
                    <a class="text-lg font-semibold leading-6 text-gray-900 mx-2" href="{{ route('login') }}">
                        @lang('components/navbar.login')</a>
                </div>
                    @if (Route::has('register'))
                    <form class="form-inline">

                        <a class="w-full flex items-center justify-center px-3 ml-3 border border-transparent text-base
                        font-medium rounded-md text-white bg-blue-400 hover:bg-blue-300 py-3 md:text-md md:px-3
                        button_slide slide_right sliding_button
                        ml-lg-3" id="navbar-create-account-button"
                           onclick="fathom.trackGoal('CLICKED-NAVBAR-CREATE-ACCOUNT-BUTTON', 0);"
                        role="button" href="{{ route('register') }}">@lang('components/navbar.register')</a>

                    </form>
                    @endif
            @else
                    <a id="navbarDropdown" class="font-bold text-lg mr-4 dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" v-pre>
                        {{ Auth::user()->first_name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu text-lg font-bold dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="mr-2" href="/dashboard">Dashboard</a>
                        <a class="" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            @lang('components/navbar.logout')
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
            @endguest
        </div>
    </nav>
    <!-- Mobile menu, show/hide based on menu open state. -->
    <div x-cloak x-show="showMobileMenu" class="lg:hidden" role="dialog" aria-modal="true">
        <!-- Background backdrop, show/hide based on slide-over state. -->
        <div class="fixed inset-0 "></div>
        <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1
        sm:ring-gray-900/10">
        <div class="flex items-center justify-between">
            <a href="/" class="-m-1.5 p-1.5">
            <span class="sr-only">The Weaver School</span>
            <img src="{{config('app.logo')}}" width="165" height="165" class="mt-1 sm:hidden" alt="The Weaver School logo">
            </a>
            <button @click="showMobileMenu = false" type="button" class="rounded-md p-3 text-gray-700">
            <span class="sr-only">Close menu</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
            </button>
        </div>
        <div class="mt-6 flow-root">
            <div class="-my-6 divide-y divide-gray-500/10">
            <div class="space-y-2 py-6">
                <a href="/{{ session('locale') }}/english/courses/online" class="-mx-3 block rounded-lg px-3 py-2 text-base
                font-semibold leading-7 text-gray-900 hover:bg-gray-50">Online English Courses</a>
                <a href="/{{ session('locale') }}/thai/courses/online" class="-mx-3 block rounded-lg px-3 py-2 text-base
                font-semibold leading-7 text-gray-900 hover:bg-gray-50">Online Thai Courses</a>
                <a href="/{{ session('locale') }}/dutch/private-lessons/private-online-dutch-lessons" class="-mx-3 block
                rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">
                    Private Dutch Lessons</a>
                <a href="/flashcards" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold
                leading-7 text-gray-900 hover:bg-gray-50">Flashcards tool</a>
                <a href="/{{ session('locale') }}/about" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold
                leading-7 text-gray-900 hover:bg-gray-50">@lang('components/navbar.about')</a>
                <a href="/blog" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900
                hover:bg-gray-50">@lang('components/navbar.blog')</a>
            </div>
            <div class="py-6">
            @guest
                <a href="{{ route('login') }}" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7
                text-gray-900 hover:bg-gray-50">@lang('components/navbar.login')</a>
                <a href="{{ route('register') }}" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold
                leading-7 text-gray-900 hover:bg-gray-50">@lang('components/navbar.register')</a>
            @else
                <div class="nav-item dropdown">
                    <a id="navbarDropdown" class="font-bold dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                       aria-haspopup="true"
                        aria-expanded="false" v-pre>
                        {{ Auth::user()->first_name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/dashboard">Dashboard</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            @lang('components/navbar.logout')
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            @endif
            </div>
            </div>
        </div>
        </div>
    </div>
</header>
