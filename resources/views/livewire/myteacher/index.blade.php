<div x-data="{ isOpen: false, showMobileMenu: false, tab: @entangle('tab').live, content: @entangle('content').live, }">
    <div class="bg-gray-100 flex">
        <!-- Start sidebar -->
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
                <div class="relative flex-1 flex flex-col max-w-xs w-full bg-blue-400">
                    <!--
                      Close button, show/hide based on off-canvas menu state.

                      Entering: "ease-in-out duration-300"
                        From: "opacity-0"
                        To: "opacity-100"
                      Leaving: "ease-in-out duration-300"
                        From: "opacity-100"
                        To: "opacity-0"
                    -->
                    <div class="absolute top-0 right-0 -mr-12 pt-2">
                        <button @click="showMobileMenu = false" type="button" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                            <span class="sr-only">Close sidebar</span>
                            <!-- Heroicon name: outline/x -->
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
                        <div class="flex-shrink-0 flex items-center px-4">
                            <img class="h-8 w-auto" src="{{config('app.logo')}}" alt="The Weaver School">
                        </div>
                        <nav class="mt-5 px-2 space-y-1">
                            <!-- Current: "bg-blue-800 text-white", Default: "text-white hover:bg-blue-600 hover:bg-opacity-75" -->
                            <a href="#" class="bg-blue-800 text-white group flex items-center px-2 py-2 text-base font-medium rounded-md">
                                <!-- Heroicon name: outline/home -->
                                <svg class="mr-4 flex-shrink-0 h-6 w-6 text-blue-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                Dashboard
                            </a>

                            <a href="#" class="text-white hover:bg-blue-600 hover:bg-opacity-75 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                                <!-- Heroicon name: outline/users -->
                                <svg class="mr-4 flex-shrink-0 h-6 w-6 text-blue-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                Team
                            </a>

                            <a href="#" class="text-white hover:bg-blue-600 hover:bg-opacity-75 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                                <!-- Heroicon name: outline/folder -->
                                <svg class="mr-4 flex-shrink-0 h-6 w-6 text-blue-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                </svg>
                                Projects
                            </a>

                            <a href="#" class="text-white hover:bg-blue-600 hover:bg-opacity-75 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                                <!-- Heroicon name: outline/calendar -->
                                <svg class="mr-4 flex-shrink-0 h-6 w-6 text-blue-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Calendar
                            </a>

                            <a href="#" class="text-white hover:bg-blue-600 hover:bg-opacity-75 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                                <!-- Heroicon name: outline/inbox -->
                                <svg class="mr-4 flex-shrink-0 h-6 w-6 text-blue-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                </svg>
                                Documents
                            </a>

                            <a href="#" class="text-white hover:bg-blue-600 hover:bg-opacity-75 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                                <!-- Heroicon name: outline/chart-bar -->
                                <svg class="mr-4 flex-shrink-0 h-6 w-6 text-blue-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                                Reports
                            </a>
                        </nav>
                    </div>
                    <div class="flex-shrink-0 flex border-t border-blue-800 p-4">
                        <a href="#" class="flex-shrink-0 group block">
                            <div class="flex items-center">
                                <div>
                                    <img class="inline-block h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                </div>
                                <div class="ml-3">
                                    <p class="text-base font-medium text-white">Tom Cook</p>
                                    <p class="text-sm font-medium text-blue-200 group-hover:text-white">View profile</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="flex-shrink-0 w-14" aria-hidden="true">
                    <!-- Force sidebar to shrink to fit close icon -->
                </div>
            </div>


            <!-- Mobile Menu -->
        {{--  <div class="absolute w-full z-10 top-0 inset-x-0 p-2 transition transform origin-top-right pb-5 sm:hidden mb-2">--}}
        {{--    <div class="ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">--}}
        {{--      <div class="pt-3 pb-6 px-5">--}}
        {{--        <div class="flex items-center justify-between">--}}
        {{--          <div>--}}
        {{--            <a href="/">--}}
        {{--              <img class="h-10 mx-auto" src="/images/logos/The Weaver School logo full.png"/>--}}
        {{--            </a>--}}
        {{--          </div>--}}
        {{--          <div class="-mr-2 -my-2 md:hidden">--}}
        {{--            <button @click="showMobileMenu = ! showMobileMenu" type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100" aria-expanded="false">--}}
        {{--              <span class="sr-only">Open menu</span>--}}
        {{--              <!-- Heroicon name: outline/menu -->--}}
        {{--              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">--}}
        {{--                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />--}}
        {{--              </svg>--}}
        {{--            </button>--}}
        {{--          </div>--}}
        {{--        </div>--}}
        {{--        <div x-cloak x-show=" showMobileMenu === true " class="mt-6">--}}
        {{--          <nav class="grid gap-y-8">--}}
        {{--            <a @click=" tab = 'dashboard' " href="#" class="-m-3 flex items-center rounded-md hover:bg-gray-50">--}}
        {{--              <span class="text-base font-medium text-gray-900">--}}
        {{--                Dashboard--}}
        {{--              </span>--}}
        {{--            </a>--}}
        {{--            <a @click="isOpen = !isOpen, tab = 'courses' " href="#" class="-m-3 flex items-center rounded-md hover:bg-gray-50">--}}
        {{--              <span class="text-base font-medium text-gray-900">--}}
        {{--                Courses--}}
        {{--              </span>--}}
        {{--            </a>--}}
        {{--            <div x-cloak x-show="isOpen" >--}}
        {{--              @foreach ($registrations as $registration)--}}
        {{--                <a wire:click=" setTab({{ $registration->id }}) " href="#" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50" :class="tab === {{ $registration->id }} ? 'opacity-50' : '' ">--}}
        {{--                  <i class="fas fa-sticky-note mr-3"></i>--}}
        {{--                  <span class="text-base font-medium text-gray-900">--}}
        {{--                    {{ $registration->private_lessons_name }}--}}
        {{--                  </span>--}}
        {{--                </a>--}}
        {{--                <div x-cloak x-show="tab === {{ $registration->id }}" >--}}
        {{--                  <ul class="pl-6">--}}
        {{--                  <a class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50" href="#" @click="showMobileMenu = ! showMobileMenu" wire:click.prevent="selectContent('createAssignment') " :class="content === 'createAssignment' ? 'opacity-50' : '' ">--}}
        {{--                    <span class="text-base font-medium text-gray-900">--}}
        {{--                      Create Assignment--}}
        {{--                    </span>--}}
        {{--                  </a>--}}
        {{--                    <a class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50" href="#" wire:click.prevent="selectContent('viewAssignments') " :class="content === 'viewAssignments' ? 'opacity-50' : '' ">--}}
        {{--                      <span class="text-base font-medium text-gray-900">--}}
        {{--                      All Assignments--}}
        {{--                    </span>--}}
        {{--                    </a>--}}
        {{--                    <a class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50" href="#" wire:click.prevent="selectContent('addHours') " :class="content === 'addHours' ? 'opacity-50' : '' ">--}}
        {{--                      <span class="text-base font-medium text-gray-900">--}}
        {{--                      Add hours--}}
        {{--                    </span>--}}
        {{--                    </a>--}}
        {{--                  </ul>--}}
        {{--                </div>--}}
        {{--              @endforeach--}}
        {{--            </div>--}}
        {{--            <a class="-m-3 flex items-center rounded-md hover:bg-gray-50" href="{{ route('logout') }}"--}}
        {{--                  onclick="event.preventDefault();--}}
        {{--                                document.getElementById('logout-form').submit();">--}}
        {{--              <span class="text-base font-medium text-gray-900">--}}
        {{--                @lang('components/navbar.logout')--}}
        {{--              </span>--}}
        {{--            </a>--}}
        {{--            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
        {{--                @csrf--}}
        {{--            </form>--}}
        {{--          </nav>--}}
        {{--        </div>--}}
        {{--      </div>--}}

        {{--    </div>--}}
        {{--  </div>--}}
        <!-- End Mobile Menu -->

            <aside class="relative bg-blue-400 min-h-screen h-full w-64 hidden sm:block py-5 top-0 pr-4">
                {{-- <div class="p-6">
                  <img class="h-20 mx-auto" src="/images/logos/The Weaver School logo full.png"/>
                </div> --}}
                <div class="flex items-center flex-shrink-0 px-4">
                    <img class="h-8 w-auto" src="{{config('app.logo')}}" alt="The Weaver School">
                </div>
                <nav class="text-white text-base font-semibold pt-12">
                    <a href="#" @click="setTab('dashboard')" class="unstyled flex items-center text-white hover:opacity-50 py-1 pl-6 nav-item" :class="tab === 'dashboard' ? 'opacity-50' : '' ">
                        {{--            <i class="fas fa-tachometer-alt mr-3"></i>--}}
                        Dashboard
                    </a>
                    <a @click="isOpen = !isOpen, tab = 'courses' " href="#" class="unstyled flex items-center active-nav-link text-white hover:opacity-50 py-1 pl-6 nav-item" :class="tab === 'courses' ? 'opacity-50' : '' ">
                        {{--            <i class="fas fa-sticky-note mr-3"></i>--}}
                        Courses
                    </a>
                    @foreach ($registrations as $registration)
                        <a x-cloak x-show="isOpen" @click=" tab = {{ $registration->id }} " href="#" class="unstyled flex items-center active-nav-link hover:opacity-50 text-white py-1 pl-6 nav-item ml-2 mr-2" :class="tab === {{ $registration->id }} ? 'opacity-50' : '' ">
                            {{--                <i class="fas fa-sticky-note mr-3"></i>--}}
                            {{ $registration->private_lessons_name }}
                        </a>
                        <div x-cloak x-show="tab === {{ $registration->id }}" >
                            <ul class="pl-6">
                                <a class="unstyled flex items-center active-nav-link hover:opacity-50 text-white py-1 pl-6 nav-item ml-2 mr-2" href="#" wire:click.prevent="selectContent('createAssignment') " :class="content === 'createAssignment' ? 'opacity-50' : '' ">Create Assignment</a>
                                <a class="unstyled flex items-center active-nav-link hover:opacity-50 text-white py-1 pl-6 nav-item ml-2 mr-2" href="#" wire:click.prevent="selectContent('viewAssignments') " :class="content === 'viewAssignments' ? 'opacity-50' : '' ">All Assignments</a>
                                <a class="unstyled flex items-center active-nav-link hover:opacity-50 text-white py-1 pl-6 nav-item ml-2 mr-2" href="#" wire:click.prevent="selectContent('addHours') " :class="content === 'addHours' ? 'opacity-50' : '' ">Add hours</a>
                            </ul>
                        </div>
                    @endforeach
                    <a href="#" wire:click="setTab('quizzes')" class="unstyled flex items-center text-white hover:opacity-50 py-1 pl-2 nav-item" :class="tab === 'quizzes' ? 'opacity-50' : '' ">
                        <i class="fas fa-tachometer-alt mr-3"></i>
                        Quizzes
                    </a>
                    <a class="unstyled flex items-center active-nav-link text-white py-1 pl-6 nav-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        {{--              <i class="fas fa-sticky-note mr-3"></i>--}}
                        @lang('components/navbar.logout')
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </nav>
            </aside>

        </div>

    {{--    <livewire:myteacher.sidebar :registrations="$registrations" />--}}




    <!-- Start main dashboard -->
    <div class="flex flex-col flex-1">
{{--    <div class="relative w-full flex flex-col h-screen overflow-y-hidden sm:mt-10">--}}
        <div class="sticky top-0 z-10 md:hidden pl-1 pt-1 sm:pl-3 sm:pt-3 bg-gray-100">
            <button @click="showMobileMenu = !showMobileMenu" type="button" class="-ml-0.5 -mt-0.5 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                <span class="sr-only">Open sidebar</span>
                <!-- Heroicon name: outline/menu -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
        <main class="flex-1">
            <div class="pl-10 py-10">
{{--        <div class="w-full h-screen overflow-x-hidden flex flex-col">--}}
{{--            <main class="w-full flex-grow p-5">--}}


{{--                <div x-show=" tab === 'dashboard' ">--}}
{{--                    <h1 class="mb-5"> Welcome, {{ $user->first_name }}</h1>--}}
{{--                    <div class="px-4 py-3 mb-5 bg-white sm:rounded-lg shadow overflow-hidden" x-data="{ completed: @entangle('completed').live, }">--}}
{{--                        <div class="mt-2 mb-4">--}}
{{--                        <h4 class="mb-2">Welcome to your all new MyTeacher Dashboard</h4>--}}
{{--                        <p>Here you can see and manage all of your active students and lessons. Now you can upload assignments for your students, along with worksheets or other attachments, and manage these assignments.</p>--}}
{{--                        </div>--}}
{{--                        <div class="border-t border-gray-200">--}}
{{--                        <p class="my-3">In the sidebar to the left, you can find all of the lessons that you're currently teaching. After each lesson, you teacher can upload assignments along with worksheets for your students to complete. Each assignment will have its own due date and instructions.</p>--}}
{{--                        <p class="my-3">After your student completes a worksheet or assignment they can then upload the completed version which will appear in your MyTeacher dashboard for you to review and grade. Once you have graded an assignment, you just need to give it a score and some feedback and then your students will be able to see it in their student dashboard.--}}
{{--                        </p>--}}
{{--                        <p class="my-3">You can now also manage the remaining hours in a course by clicking on the "Add hours" menu item. This will allow you to record completed lesson hours, allowing you, me, and your students to keep track of how many hours they have remaining, and when they need to register for more hours.--}}
{{--                        </p>--}}
{{--                        <p class="my-3">I hope you enjoy these new features and find it helpful in your English teaching. More improvements are in the works, such as being able to edit a score and feedback after you've submitted it. Until then, if you have any questions or feedback, feel free to email me at lucas@weaverenglish.nl and I will help you as soon as I can.--}}
{{--                        </p>--}}
{{--                        </div>--}}
{{--                        <dl>--}}
{{--                        </dl>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div x-cloak x-show=" tab === 'courses' ">
                    <livewire:myteacher.courses.index :registrations="$registrations" :user="$user" />
                </div>

                <!-- Active Courses -->
                <div>
                    @foreach ($registrations as $registration)
                    <div x-cloak x-show=" tab === {{ $registration->id }} ">
                        <livewire:myteacher.courses.show :registration="$registration" :key="$registration->id" />
                    </div>
                    @endforeach
                </div>
                <!-- End Active Courses -->

                <div x-cloak x-show=" tab === 'assignments' ">
                    <livewire:myteacher.assignments.index :registrations="$registrations" :user="$user" />
                </div>

                <div x-cloak x-show=" tab === 'quizzes' ">
                    <x-dashboard.heading text="Quizzes" />
                    <livewire:myteacher.quizzes.create />
                    <livewire:myteacher.quizzes.index />
                </div>


        </div>
    </main>


    </div>
    </div>
</div>
