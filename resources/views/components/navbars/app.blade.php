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
<header x-data="{ languagesOpen: false, coursesOpen: false, lessonsOpen: false, examPrepOpen: false, userDropdownOpen: false, mobileUserDropdownOpen: false, subcategory: 'English', showMobileMenu: false }"
        class="bg-gray-900 text-white">
    <nav class="mx-auto flex max-w-7xl items-center justify-between px-6 py-3 lg:px-8" aria-label="Global">
        <div class="flex items-center">
            <a class="-m-1.5 p-1.5" href="/{{session('locale')}}">
                <img src="{{config('app.logo_dark')}}" width="165" height="165" class="d-inline-block align-top mt-1" alt="The Weaver School logo">
            </a>

            <div class="hidden lg:flex">

                <div class="relative">
                    <a href="{{ route('flashcards.info', ['locale' => session('locale', 'en')])}}" class="ml-8 text-lg font-medium leading-6 text-white hover:text-teal-300 mr-2">Flashcards</a>
                </div>

                <div class="relative">
                    <a href="{{ route('learning-paths.info', ['locale' => session('locale', 'en')])}}" class="ml-8 text-lg font-medium leading-6 text-white hover:text-teal-300 mr-2">Learning Paths</a>
                </div>

                {{-- <div class="relative">
                    <a href="/quick-notes/new" class="ml-8 text-lg font-medium leading-6 text-white hover:text-teal-300 mr-2">Quick Notes</a>
                </div> --}}

                <div class="relative">
                    <button @click=" examPrepOpen = ! examPrepOpen" type="button" class="ml-8 group inline-flex items-center gap-x-1 text-sm
                    font-medium leading-6 mr-3" aria-expanded="false">
                        <span><a class="text-lg medium leading-6 text-white group-hover:text-teal-300">
                            Exam Prep</a></span>
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
                    <div x-cloak x-show="examPrepOpen == true" @click.away=" examPrepOpen = false" class="absolute z-20 -ml-4 mt-3 transform px-2 w-screen sm:px-0
                        lg:ml-0">
                        <div class="w-screen max-w-sm flex-auto rounded-3xl bg-white p-4 text-base leading-6 shadow-lg">                        
                            <div class="relative rounded-lg p-4 hover:bg-gray-200">
                                <a href="{{ route('exam-prep.ielts-coach.info', ['locale' => session('locale', 'en')]) }}" class="font-semibold text-gray-900">
                                    AI IELTS Coach
                                    <span class="absolute inset-0"></span>
                                </a>
                                <p class="mt-1 text-gray-600">Prepare for your IETLS exam with interactive AI tools and practice tests.</p>
                            </div>
                            <div class="relative rounded-lg p-4 hover:bg-gray-200">
                                <a href="{{ route('exam-prep.cambridge-coach.info', ['locale' => session('locale', 'en')]) }}" class="font-semibold text-gray-900">
                                    AI Cambridge Coach
                                    <span class="absolute inset-0"></span>
                                </a>
                                <p class="mt-1 text-gray-600">Prepare for your Cambridge exam with interactive AI tools and practice tests.</p>
                            </div>                             
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <a href="/blog" class="ml-4 text-lg font-medium leading-6 text-white hover:text-teal-300 mr-2">@lang('components/navbar.blog')</a>
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
                <div class="relative text-gray-300">
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
                    <div x-cloak x-show=" userDropdownOpen === true " @click.away=" userDropdownOpen = false"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute right-0 mt-2 w-48 bg-gray-700 text-gray-100 rounded-md shadow-lg z-50 overflow-hidden">
                        <div class="py-2">
                            <a href="{{ route('dashboard.index', ['locale' => session('locale', 'en')])}}" class="block px-4 py-2 hover:text-teal-300 font-bold text-sm sm:text-base">Dashboard</a>
                            <a href="/flashcards/sets" class="block px-4 py-2 hover:text-teal-300 font-bold text-sm sm:text-base">Flashcards</a>
                            <a href="{{ route('learning-paths.index', ['locale' => session('locale', 'en')])}}" class="block px-4 py-2  hover:text-teal-300 font-bold text-sm sm:text-base">Learning Paths</a>
                            <a href="/quick-notes" class="block px-4 py-2  hover:text-teal-300 font-bold text-sm sm:text-base">Quick Notes</a>   
                            <a href="{{ route('logout') }}" class="block px-4 py-2 hover:text-teal-300 font-bold text-sm sm:text-base"
                                 onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    <div class="font-semibold text-base">
                                        @lang('components/navbar.logout')
                                    </div>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
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
                        <a href="{{ route('learning-paths.info', ['locale' => session('locale', 'en')])}}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Learning Paths</a>
                        <a href="/quick-notes/new" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Quick Notes</a> 
                        {{-- <a href="/{{ session('locale') }}/english/courses/online" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">English Courses</a> --}}
                        {{-- <a href="/{{ session('locale') }}/thai/courses/online" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Thai Courses</a> --}}
{{--                        <a href="/{{ session('locale') }}/vietnamese/courses/online" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Vietnamese Courses</a>--}}
                        <a href="{{ route('exam-prep.ielts-coach.info', ['locale' => session('locale', 'en')]) }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">AI IELTS Coach</a>
                        <a href="{{ route('exam-prep.cambridge-coach.info', ['locale' => session('locale', 'en')]) }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">AI Cambridge Coach</a>
                        {{-- <a href="/{{ session('locale') }}/about" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">@lang('components/navbar.about')</a> --}}
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
