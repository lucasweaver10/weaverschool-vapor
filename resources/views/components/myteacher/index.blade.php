<div x-cloak x-data="{ showMobileMenu: false, @if(request()->is('myteacher/quizzes*')) quizzesDropdownOpen: true, @else quizzesDropdownOpen: false, @endif @if(request()->is('myteacher/assignments*')) assignmentsDropdownOpen: true, @else assignmentsDropdownOpen: false, @endif }">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <!--
      This example requires updating your template:

      ```
      <html class="h-full bg-gray-100">
      <body class="h-full">
      ```
    -->
    <div>
        <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
        <div x-cloak x-show="showMobileMenu" class="fixed inset-0 flex z-40 md:hidden" role="dialog" aria-modal="true">
            <!--
              Off-canvas menu overlay, show/hide based on off-canvas menu state.

              Entering: "transition-opacity ease-linear duration-300"
                From: "opacity-0"
                To: "opacity-100"
              Leaving: "transition-opacity ease-linear duration-300"
                From: "opacity-100"
                To: "opacity-0"
            -->
            <div class="fixed inset-0 bg-gray-600 bg-opacity-75" aria-hidden="true"></div>

            <!--
              Off-canvas menu, show/hide based on off-canvas menu state.

              Entering: "transition ease-in-out duration-300 transform"
                From: "-translate-x-full"
                To: "translate-x-0"
              Leaving: "transition ease-in-out duration-300 transform"
                From: "translate-x-0"
                To: "-translate-x-full"
            -->
            <div x-cloak x-show="showMobileMenu" class="relative flex-1 flex flex-col max-w-xs w-full bg-gray-200">
                <!--
                  Close button, show/hide based on off-canvas menu state.

                  Entering: "ease-in-out duration-300"
                    From: "opacity-0"
                    To: "opacity-100"
                  Leaving: "ease-in-out duration-300"
                    From: "opacity-100"
                    To: "opacity-0"
                -->
                <div @click="showMobileMenu = false" class="absolute top-0 right-0 -mr-12 pt-2">
                    <button type="button" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                        <span class="sr-only">Close sidebar</span>
                        <!-- Heroicon name: outline/x -->
                        <svg class="h-6 w-6 text-black" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
                    <div class="flex-shrink-0 flex items-center px-4">
                        <img class="h-8 w-auto mx-auto" src="{{config('app.logo')}}" alt="Workflow">
                    </div>

                    <nav class="mt-5 px-2 space-y-1">
                        <!-- Current: "bg-blue-800 text-white", Default: "text-white hover:bg-blue-600 hover:bg-opacity-75" -->
                        <a href="/myteacher" class="unstyled hover:text-white hover:bg-blue-400 group flex items-center px-2 py-2 text-sm font-medium rounded-md @if(request()->is('myteacher')) bg-blue-400 text-white @else text-gray-600 @endif">
                            <!-- Heroicon name: outline/home -->
                            <svg class="mr-3 flex-shrink-0 h-6 w-6 text-blue-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Dashboard
                        </a>

                        <a href="/myteacher/students" class="unstyled hover:text-white hover:bg-blue-400 group flex items-center px-2 py-2 text-sm font-medium rounded-md @if(request()->is('myteacher/students')) bg-blue-400 text-white @else text-gray-600 @endif">
                            <!-- Heroicon name: outline/users -->
                            <svg class="mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            Students
                        </a>

                        <a href="/myteacher/courses" class="unstyled hover:text-white hover:bg-blue-400 group flex items-center px-2 py-2 text-sm font-medium rounded-md @if(request()->is('myteacher/courses')) bg-blue-400 text-white @else text-gray-600 @endif">
                            <!-- Heroicon name: outline/folder -->
                            <svg class="mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                            </svg>
                            Courses
                        </a>

                        <a href="/myteacher/quizzes" class="unstyled hover:text-white hover:bg-blue-400 group flex items-center px-2 py-2 text-sm font-medium rounded-md @if(request()->is('myteacher/courses')) bg-blue-400 text-white @else text-gray-600 @endif">
                            <!-- Heroicon name: outline/folder -->
                            <svg class="mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                            </svg>
                            Quizzes
                        </a>

                    </nav>
                </div>
                <div class="flex-shrink-0 flex p-4">
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();" class="unstyled flex-shrink-0 group block">
                        <div class="flex items-center">
                            <div>
                                <img class="inline-block h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            </div>
                            <div class="ml-3">
{{--                                <p class="text-base font-medium">{{ $user->first_name }}</p>--}}
                                <p class="text-sm font-medium group-hover:text-white">Logout</p>
                            </div>
                        </div>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>

            <div class="flex-shrink-0 w-14" aria-hidden="true">
                <!-- Force sidebar to shrink to fit close icon -->
            </div>
        </div>

        <!-- Static sidebar for desktop -->
        <div class="hidden md:flex md:w-64 md:flex-col md:fixed md:inset-y-0">
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div class="flex-1 flex flex-col min-h-0 bg-gray-200">
                <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
                    <div class="flex items-center flex-shrink-0 px-4">
                        <img class="h-12 w-auto mx-auto" src="{{config('app.logo')}}" alt="Workflow">
                    </div>
                    <nav class="mt-5 flex-1 px-2 space-y-1">
                        <!-- Current: "bg-blue-800 text-white", Default: "text-white hover:bg-blue-600 hover:bg-opacity-75" -->
                        <a href="/myteacher" class="unstyled hover:text-white hover:bg-blue-400 group flex items-center px-2 py-2 text-sm font-medium rounded-md @if(request()->is('myteacher')) bg-blue-400 text-white @else text-gray-600 @endif">
                            <!-- Heroicon name: outline/home -->
                            <svg class="mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Dashboard
                        </a>

                        <a href="/myteacher/students" class="unstyled @if(request()->is('myteacher/students')) bg-blue-400 text-white @else text-gray-600 @endif hover:text-white hover:bg-blue-400 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <!-- Heroicon name: outline/users -->
                            <svg class="mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            Students
                        </a>

                        <a href="/myteacher/courses" class="unstyled @if(request()->is('myteacher/courses')) bg-blue-400 text-white @else text-gray-600 @endif hover:text-white hover:bg-blue-400 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <!-- Heroicon name: outline/academic-cap -->
                            <svg class="mr-3 flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                            </svg>
                            Courses
                        </a>

{{--                        <a href="/myteacher/quizzes" class="unstyled @if(request()->is('myteacher/quizzes')) bg-blue-400 text-white @else text-gray-400 @endif hover:text-white hover:bg-blue-400 group flex items-center px-2 py-2 text-sm font-medium rounded-md">--}}
{{--                            <!-- Heroicon name: outline/question-mark-circle -->--}}
{{--                            <svg class="mr-3 flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />--}}
{{--                            </svg>--}}
{{--                            Quizzes--}}
{{--                        </a>--}}

                        <div class="space-y-1">
                            <!-- Current: "bg-gray-100 text-gray-900", Default: "bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
                            <button @click="quizzesDropdownOpen = !quizzesDropdownOpen" type="button" class="unstyled text-gray-900 text-left hover:text-white hover:bg-blue-400 group flex items-center px-2 py-2 text-sm font-medium rounded-md w-full focus:outline-none" aria-controls="sub-menu-5" aria-expanded="false">
                                <!-- Heroicon name: outline/question-mark-circle -->
                                <svg class="mr-3 flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="flex-1"> Quizzes </span>
                                <!-- Expanded: "text-gray-400 rotate-90", Collapsed: "text-gray-300" -->
                                <svg x-show="!quizzesDropdownOpen" class="text-gray-900 ml-3 flex-shrink-0 h-5 w-5 transform group-hover:text-white transition-colors ease-in-out duration-150" viewBox="0 0 20 20" aria-hidden="true">
                                    <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                </svg>
                                <svg x-cloak x-show="quizzesDropdownOpen" class="text-gray-900 ml-3 flex-shrink-0 h-5 w-5 transform rotate-90 group-hover:text-white transition-colors ease-in-out duration-150" viewBox="0 0 20 20" aria-hidden="true">
                                    <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                </svg>
                            </button>
                            <!-- Expandable link section, show/hide based on state. -->
                            <div x-cloak x-show="quizzesDropdownOpen" class="space-y-1" id="sub-menu-5">
                                <a href="/myteacher/quizzes" class="unstyled @if(request()->is('myteacher/quizzes')) bg-blue-400 text-white @else text-gray-400 @endif hover:text-white hover:bg-blue-400 group flex items-center pl-11 py-2 text-sm font-medium rounded-md"> All Quizzes </a>

                                <a href="/myteacher/quizzes/create" class="unstyled @if(request()->is('myteacher/quizzes/create')) bg-blue-400 text-white @else text-gray-400 @endif hover:text-white hover:bg-blue-400 group flex items-center pl-11 py-2 text-sm font-medium rounded-md"> New Quiz </a>

                                <a href="/myteacher/quizzes/assign" class="unstyled @if(request()->is('myteacher/quizzes/assign')) bg-blue-400 text-white @else text-gray-400 @endif hover:text-white hover:bg-blue-400 group flex items-center pl-11 py-2 text-sm font-medium rounded-md"> Assign Quiz </a>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <!-- Current: "bg-gray-100 text-gray-900", Default: "bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
                            <button @click="assignmentsDropdownOpen = !assignmentsDropdownOpen" type="button" class="unstyled text-gray-900 text-left hover:text-white hover:bg-blue-400 group flex items-center px-2 py-2 text-sm font-medium rounded-md w-full focus:outline-none" aria-controls="sub-menu-5" aria-expanded="false">
                                <!-- Heroicon name:  clipboard-outline -->
                                <svg class="mr-3 flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                </svg>
                                <span class="flex-1"> Assignments </span>
                                <!-- Expanded: "text-gray-400 rotate-90", Collapsed: "text-gray-300" -->
                                <svg x-show="!assignmentsDropdownOpen" class="text-gray-900 ml-3 flex-shrink-0 h-5 w-5 transform group-hover:text-white transition-colors ease-in-out duration-150" viewBox="0 0 20 20" aria-hidden="true">
                                    <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                </svg>
                                <svg x-cloak x-show="assignmentsDropdownOpen" class="text-gray-900 ml-3 flex-shrink-0 h-5 w-5 transform rotate-90 group-hover:text-white transition-colors ease-in-out duration-150" viewBox="0 0 20 20" aria-hidden="true">
                                    <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                </svg>
                            </button>
                            <!-- Expandable link section, show/hide based on state. -->
                            <div x-cloak x-show="assignmentsDropdownOpen" class="space-y-1" id="sub-menu-5">
                                <a href="/myteacher/assignments" class="unstyled @if(request()->is('myteacher/assignments')) bg-blue-400 text-white @else text-gray-400 @endif hover:text-white hover:bg-blue-400 group flex items-center pl-11 py-2 text-sm font-medium rounded-md"> All Assignments </a>

                                <a href="/myteacher/assignments/create" class="unstyled @if(request()->is('myteacher/assignments/create')) bg-blue-400 text-white @else text-gray-400 @endif hover:text-white hover:bg-blue-400 group flex items-center pl-11 py-2 text-sm font-medium rounded-md"> Create Assignment </a>

{{--                                <a href="/myteacher/assignments/assign" class="unstyled @if(request()->is('myteacher/assignments/assign')) bg-blue-400 text-white @else text-gray-400 @endif hover:text-white hover:bg-blue-400 group flex items-center pl-11 py-2 text-sm font-medium rounded-md"> Assign Assignment </a>--}}
                            </div>
                        </div>

                    </nav>
                </div>
                <div class="flex-shrink-0 flex p-4 border-t border-gray-300">
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();" class="unstyled flex-shrink-0 w-full group block">
                        <div class="flex items-center">
                            <div>
                                <img class="inline-block h-9 w-9 rounded-full" src="{{ Auth::user()->teacher->image ?? '' }}" alt="">
                            </div>
                            <div class="ml-3">
                                <div class="text-sm font-medium text-gray-900">{{ Auth::user()->first_name ?? '' }} {{ Auth::user()->last_name ?? '' }}</div>
                                <div class="text-xs font-medium text-gray-900">Logout</div>
                            </div>
                        </div>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>

        <div class="md:pl-64 flex flex-col flex-1 h-screen">
            <div class="sticky top-0 z-10 md:hidden pl-1 pt-1 sm:pl-3 sm:pt-3">
                <button @click="showMobileMenu = true" type="button" class="-ml-0.5 -mt-0.5 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
                    <span class="sr-only">Open sidebar</span>
                    <!-- Heroicon name: outline/menu -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
            <div class="flex-1">
                <div class="pl-8 p-6">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                        <h1 class="text-3xl font-semibold text-gray-900 mt-4 mb-4">{{ $title ?? '' }}</h1>
                    </div>
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                        {{ $slot ?? '' }}
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
