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
<header x-data="{ languagesOpen: false, coursesOpen: false, lessonsOpen: false, toolsOpen: false, userDropdownOpen: false, mobileUserDropdownOpen: false, subcategory: 'English', showMobileMenu: false }"
        class="bg-black text-white">
    <nav class="mx-auto flex max-w-7xl items-center justify-between px-6 py-3 lg:px-8" aria-label="Global">
        <div class="flex items-center">
            <a class="-m-1.5 p-1.5" href="/{{session('locale')}}">
                <img src="{{config('app.logo_dark')}}" width="165" height="165" class="d-inline-block align-top mt-1" alt="The Weaver School logo">
            </a>
        <div class="hidden lg:flex">
            <div class="relative">
            <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
                <button @click=" coursesOpen = ! coursesOpen" type="button" class="group inline-flex items-center focus:outline-none" aria-expanded="false">
                <span><a class="text-lg font-medium leading-6 text-white group-hover:text-teal-300 ml-8">@lang('components/navbar.courses')</a></span>
                <!--
                Heroicon name: solid/chevron-down

                Item active: "text-gray-600", Item inactive: "text-gray-400"
                -->
                <svg class="text-white md:ml-n2 mr-2 h-5 w-5 group-hover:text-teal-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
                </button>
            <!--
              'Courses flyout menu, show/hide based on flyout menu state.
            -->
                <div x-cloak x-show=" coursesOpen === true " @click.away=" coursesOpen = false" class="absolute z-20 -ml-4 mt-3 transform px-2 w-full sm:px-0 lg:ml-0">
                <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden sm:w-full">
                    <div class="relative grid bg-white grid-cols-1">
                        <div class="col py-6 px-4 w-full">
                            <a href="/{{session('locale')}}/english/courses/online" class="unstyled pl-4 py-3 flex items-start rounded-lg
                            hover:bg-gray-100">
                                <!-- Heroicon name: outline/desktop-computer -->
                                <div class="">
                                    <p class="font-semibold text-gray-900 text-base">
                                        @lang('components/navbar.english')
                                    </p>
                                </div>
                            </a>
                            <a href="/{{session('locale')}}/thai/courses/online" class="unstyled pl-4 py-3 flex items-start rounded-lg
                            hover:bg-gray-100">
                                <!-- Heroicon name: outline/desktop-computer -->
                                <div class="">
                                    <p class="font-semibold text-gray-900 text-base">
                                        Thai
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="relative">
                <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
                <button @click=" lessonsOpen = ! lessonsOpen" type="button" class="group inline-flex items-center focus:outline-none" aria-expanded="false">
                    <span><a class="text-lg font-medium leading-6 text-white group-hover:text-teal-300">Private Lessons</a></span>
                    <!--
                    Heroicon name: solid/chevron-down

                    Item active: "text-gray-600", Item inactive: "text-gray-400"
                    -->
                    <svg class="text-white md:ml-n2 mr-2 h-5 w-5 group-hover:text-teal-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <!--
                  'Lessons flyout menu, show/hide based on flyout menu state.
                -->
                <div x-cloak x-show=" lessonsOpen === true " @click.away=" lessonsOpen = false" class="absolute z-20 -ml-4 mt-3 transform px-2 w-full sm:px-0 lg:ml-0">
                    <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden sm:w-full">
                        <div class="relative grid bg-white grid-cols-1">
                            <div class="col py-6 px-4 w-full">
                                <a href="/{{session('locale')}}/english/private-lessons/request" class="unstyled pl-4 py-3 px-3 flex items-start rounded-lg
                                    hover:bg-gray-100">
                                    <!-- Heroicon name: outline/desktop-computer -->
                                    <div class="">
                                        <p class="font-semibold text-gray-900 text-base">
                                            @lang('components/navbar.english')
                                        </p>
                                    </div>
                                </a>
                                <a href="/{{session('locale')}}/thai/private-lessons/request" class="unstyled pl-4 py-3 px-3 flex items-start rounded-lg
                                    hover:bg-gray-100">
                                    <!-- Heroicon name: outline/desktop-computer -->
                                    <div class="">
                                        <p class="font-semibold text-gray-900 text-base">
                                            Thai
                                        </p>
                                    </div>
                                </a>
                                <a href="/{{session('locale')}}/vietnamese/private-lessons/request" class="unstyled pl-4 py-3 flex items-start rounded-lg
                                    hover:bg-gray-100">
                                    <!-- Heroicon name: outline/desktop-computer -->
                                    <div class="">
                                        <p class="font-semibold text-gray-900 text-base">
                                            Vietnamese
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative">
                <button @click=" toolsOpen = ! toolsOpen" type="button" class="group inline-flex items-center gap-x-1 text-sm
                font-medium leading-6 mr-3" aria-expanded="false">
                    <span><a class="text-lg medium leading-6 text-white group-hover:text-teal-300">
                        Tools</a></span>
                    <svg class="text-white md:ml-n2 h-5 w-5 group-hover:text-teal-300"
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
                        <div class="relative rounded-lg p-4 hover:bg-gray-200">
                            <a href="/flashcards" class="font-semibold text-gray-900">
                                Flashcards
                                <span class="absolute inset-0"></span>
                            </a>
                            <p class="mt-1 text-gray-600">Learn 10x faster with neural replay technology.</p>
                        </div>
                        <div class="relative rounded-lg p-4 hover:bg-gray-200">
                            <a href="/quick-notes/new" class="font-semibold text-gray-900">
                                Quick Notes
                                <span class="absolute inset-0"></span>
                            </a>
                            <p class="mt-1 text-gray-600">Write a quick note of what you want to learn and get AI generated flashcards to study.</p>
                        </div>
                        <div class="relative rounded-lg p-4 hover:bg-gray-200">
                            <a href="/{{ session('locale') }}/tools/ielts-essay-ai-grader" class="font-semibold text-gray-900">
                                AI IELTS Essay Checker
                                <span class="absolute inset-0"></span>
                            </a>
                            <p class="mt-1 text-gray-600">Let AI grade your IELTS essay and give you personalized feedback.</p>
                        </div>
                        <div class="relative rounded-lg p-4 hover:bg-gray-200">
                            <a href="/{{ session('locale') }}/tools/c1-advanced-essay-ai-grader" class="font-semibold text-gray-900">
                                AI C1 Advanced Essay Checker
                                <span class="absolute inset-0"></span>
                            </a>
                            <p class="mt-1 text-gray-600">Let AI grade your C1 Advanced essay and give you personalized feedback.</p>
                        </div>
                        <div class="relative rounded-lg p-4 hover:bg-gray-200">
                            <a href="/{{ session('locale') }}/tools/c2-proficiency-essay-checker" class="font-semibold text-gray-900">
                                AI C2 Proficiency Essay Checker
                                <span class="absolute inset-0"></span>
                            </a>
                            <p class="mt-1 text-gray-600">Let AI grade your C2 Proficiency essay and give you personalized feedback.</p>
                        </div>
                        <div class="relative rounded-lg p-4 hover:bg-gray-200">
                            <a href="/{{ session('locale') }}/tools/b2-first-essay-checker" class="font-semibold text-gray-900">
                                AI B2 First Essay Checker
                                <span class="absolute inset-0"></span>
                            </a>
                            <p class="mt-1 text-gray-600">Let AI grade your B2 First essay and give you personalized feedback.</p>
                        </div>
                        <div class="relative rounded-lg p-4 hover:bg-gray-200">
                            <a href="/{{ session('locale') }}/tools/pte-essay-checker" class="font-semibold text-gray-900">
                                AI PTE Essay Checker
                                <span class="absolute inset-0"></span>
                            </a>
                            <p class="mt-1 text-gray-600">Let AI grade your PTE essay and give you personalized feedback.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative">
{{--                <a href="/{{ session('locale') }}/about" class="text-lg font-medium leading-6 text-white hover:text-teal-300 mr-2">@lang('components/navbar.about')</a>--}}
                <a href="/blog" class="text-lg font-medium leading-6 text-white hover:text-teal-300 mr-2">@lang('components/navbar.blog')</a>
            </div>
        </div>
        </div>
        <div class="flex lg:hidden">
            <button @click="showMobileMenu = true" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-100">
                <span class="sr-only">Open main menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>

        <div class="hidden lg:flex items-center">
            @guest
                <div class="relative">
                    <a class="text-lg font-medium leading-6 text-white mx-2 hover:text-teal-300" href="{{ route('login') }}">@lang('components/navbar.login')</a>
                    <a class="text-lg font-medium leading-6 text-white mx-2 hover:text-teal-300" href="/{{ session('locale') }}/contact">@lang('components/navbar.contact')</a>

                </div>
                    @if (Route::has('register'))
                    <form class="form-inline">
                        <a class="text-lg font-medium leading-6 text-white mx-2 hover:text-teal-300" id="navbar-create-account-button"
                        role="button" href="{{ route('register') }}">
                            Register
                        </a>
                    </form>
                    @endif
            @else
                <div class="relative">
                    <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
                    <button @click=" userDropdownOpen = ! userDropdownOpen" type="button" class="group inline-flex items-center focus:outline-none" aria-expanded="false">
                        <span><a class="text-lg font-medium leading-6 text-white group-hover:text-teal-300 ml-8">{{ Auth::user()->first_name }}</a></span>
                        <!--
                        Heroicon name: solid/chevron-down

                        Item active: "text-gray-600", Item inactive: "text-gray-400"
                        -->
                        <svg class="text-white md:ml-n2 mr-2 h-5 w-5 group-hover:text-teal-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <!--
                      'User flyout menu, show/hide based on flyout menu state.
                    -->
                    <div x-cloak x-show=" userDropdownOpen === true " @click.away=" userDropdownOpen = false" class="absolute z-20 -ml-4 mt-3 transform px-2 w-36 sm:px-0 lg:ml-0">
                        <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden sm:w-full">
                            <div class="relative grid bg-white grid-cols-1">
                                <div class="col py-6 px-4 w-full">
                                    <a href="/dashboard" class="unstyled pl-4 py-3 flex items-start rounded-lg
                                hover:bg-gray-100">
                                        <div class="font-semibold text-gray-900 text-base">
                                            Dashboard
                                        </div>
                                    </a>
                                    <a href="{{ route('logout') }}" class="unstyled pl-4 py-3 flex items-start rounded-lg
                                        hover:bg-gray-100"
                                       onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        <div class="font-semibold text-gray-900 text-base">
                                            @lang('components/navbar.logout')
                                        </div>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endguest
        </div>

    </nav>
    <!-- Mobile menu, show/hide based on menu open state. -->
    <div x-cloak x-show="showMobileMenu" class="lg:hidden" role="dialog" aria-modal="true">
        <!-- Background backdrop, show/hide based on slide-over state. -->
        <div class="fixed inset-0 "></div>
        <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
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
                        @guest
                        <a href="/flashcards" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Flashcards</a>
                        @else
                         <a href="/flashcards/sets" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Flashcards</a>
                        @endif
                        <a href="/quick-notes/new" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Quick Notes</a> 
                        <a href="/{{ session('locale') }}/english/courses/online" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">English Courses</a>
                        <a href="/{{ session('locale') }}/thai/courses/online" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Thai Courses</a>
{{--                        <a href="/{{ session('locale') }}/vietnamese/courses/online" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Vietnamese Courses</a>--}}
                        <a href="/{{ session('locale') }}/tools/ielts-essay-ai-grader" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">AI IELTS Essay Grader</a>
                        <a href="/{{ session('locale') }}/about" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">@lang('components/navbar.about')</a>
                        <a href="/blog" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">@lang('components/navbar.blog')</a>
                    </div>
                    <div class="py-6">
                        @guest
                            <a href="{{ route('login') }}" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">@lang('components/navbar.login')</a>
                            <a href="{{ route('register') }}" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">@lang('components/navbar.register')</a>
                        @else
                            <div class="">
                                <button @click=" mobileUserDropdownOpen = ! mobileUserDropdownOpen" type="button" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50" role="button"
                                    aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name }}
                                    <svg class="text-gray-900 md:ml-n2 mr-2 h-5 w-5 inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <div x-cloak x-show="mobileUserDropdownOpen == true" class="">
                                    <a class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50" href="/dashboard">Dashboard</a>
                                    <a class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50" href="{{ route('logout') }}"
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
