<x-layouts.app>
    <!--
  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-100">
  <body class="h-full">
  ```
-->
<div x-data="{ showMobileMenu: false }" class="min-h-full">
  <header class="bg-black pb-24">
    <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:max-w-7xl lg:px-8">
      <div class="relative flex items-center justify-center py-5 lg:justify-between">
        <!-- Logo -->
        <div class="absolute left-0 flex-shrink-0 lg:static inline-flex">
          <a href="/{{ session('locale')}}/dashboard">
            <span class="sr-only">The Weaver School</span>
            <img class="h-12 w-auto" src="{{ config('app.logo_dark') }}" alt="The Weaver School Logo">
          </a>
          <span class="ml-5 mt-2 font-bold text-xl text-white inline-flex">
            <a class="unstyled" href="/{{ session('locale') }}/dashboard/courses/{{ $course->id }}/lessons">{{ $course->name }}</a>
                <svg class="text-white w-4 h-4 mt-2 ml-2 align-middle" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" >
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            @isset($lesson)
            <a class="unstyled ml-2" href="/{{ session('locale') }}/dashboard/courses/{{ $course->id }}/lessons/{{ $lesson->id }}">{{ $lesson->title }}</a>
            @endisset
            @if(trim($title) !== '')
                <svg class="text-white w-4 h-4 mt-2 mx-2  align-middle" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" >
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
                {{ $title }}
            @endif
          </span>
        </div>

        <!-- Right section on desktop -->
        <div class="hidden lg:ml-4 lg:flex lg:items-center lg:pr-0.5">
          <button type="button" class="flex-shrink-0 rounded-full p-1 text-white hover:bg-opacity-10 hover:text-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-300">
            <span class="sr-only">View notifications</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
            </svg>
          </button>

          <!-- Profile dropdown -->
          <div x-data="{ showProfileDropdown: false }" class="relative ml-4 flex-shrink-0">
            <div>
              <button @click="showProfileDropdown = !showProfileDropdown" type="button" class="flex rounded-full bg-white text-sm ring-2 ring-white ring-opacity-20 focus:outline-none focus:ring-opacity-100" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                <span class="sr-only">Open user menu</span>
                @if(Auth::user()->avatar)
                    <img class="inline-block h-7 w-7 rounded-full" src="{{ Auth::user()->image }}" alt="">
                @else
                    <svg class="inline-block h-8 w-8 rounded-full" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                @endif
              </button>
            </div>

            <!--
              Dropdown menu, show/hide based on menu state.

              Entering: ""
                From: ""
                To: ""
              Leaving: "transition ease-in duration-75"
                From: "transform opacity-100 scale-100"
                To: "transform opacity-0 scale-95"
            -->
            <div x-cloak x-show="showProfileDropdown === true" class="absolute -right-2 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
              <!-- Active: "bg-gray-100", Not Active: "" -->
              <a href="/{{ session('locale') }}/dashboard" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Dashboard</a>
            </div>
          </div>
        </div>

        <!-- Search -->
        {{-- <div class="min-w-0 flex-1 px-12 lg:hidden">
          <div class="mx-auto w-full max-w-xs">
            <label for="desktop-search" class="sr-only">Search</label>
            <div class="relative text-white focus-within:text-gray-600">
              <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                </svg>
              </div>
              <input id="desktop-search" class="block w-full rounded-md border border-transparent bg-white bg-opacity-20 py-2 pl-10 pr-3 leading-5 text-gray-900 placeholder-white focus:border-transparent focus:bg-opacity-100 focus:placeholder-gray-500 focus:outline-none focus:ring-0 sm:text-sm" placeholder="Search" type="search" name="search">
            </div>
          </div>
        </div> --}}

        <!-- Menu button -->
        <div class="absolute right-0 flex-shrink-0 lg:hidden">
          <!-- Mobile menu button -->
          <button @click="showMobileMenu = !showMobileMenu" type="button" class="inline-flex items-center justify-center rounded-md bg-transparent p-2 text-white hover:bg-white hover:bg-opacity-10 hover:text-white focus:outline-none focus:ring-2 focus:ring-white" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <!-- Menu open: "hidden", Menu closed: "block" -->
            <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!-- Menu open: "block", Menu closed: "hidden" -->
            <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
      {{-- <div class="hidden border-t border-white border-opacity-20 py-5 lg:block">
        <div class="grid grid-cols-3 items-center gap-8">
          <div class="col-span-2">
            <nav class="flex space-x-4">
              <!-- Current: "text-white", Default: "text-indigo-100" -->
              <a href="#" class="text-white text-sm font-medium rounded-md bg-opacity-0 px-3 py-2 hover:bg-opacity-10" aria-current="page">Home</a>

              <a href="#" class="text-white text-sm font-medium rounded-md  bg-opacity-0 px-3 py-2 hover:bg-opacity-10">Profile</a>

              <a href="#" class="text-white text-sm font-medium rounded-md  bg-opacity-0 px-3 py-2 hover:bg-opacity-10">Resources</a>

              <a href="#" class="text-white text-sm font-medium rounded-md  bg-opacity-0 px-3 py-2 hover:bg-opacity-10">Company Directory</a>

              <a href="#" class="text-white text-sm font-medium rounded-md  bg-opacity-0 px-3 py-2 hover:bg-opacity-10">Openings</a>
            </nav>
          </div>
          <div>
            <div class="mx-auto w-full max-w-md">
              <label for="mobile-search" class="sr-only">Search</label>
              <div class="relative text-black focus-within:text-gray-600">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                  <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                  </svg>
                </div>
                <input id="mobile-search" class="block w-full rounded-md border border-transparent bg-white bg-opacity-20 py-2 pl-10 pr-3 leading-5 text-gray-900 placeholder-white focus:border-transparent focus:bg-opacity-100 focus:placeholder-gray-500 focus:outline-none focus:ring-0 sm:text-sm" placeholder="Search" type="search" name="search">
              </div>
            </div>
          </div>
        </div>
      </div> --}}
    </div>

    <!-- Mobile menu, show/hide based on mobile menu state. -->
    <div x-cloak x-show="showMobileMenu" class="lg:hidden">
      <!--
        Mobile menu overlay, show/hide based on mobile menu state.

        Entering: "duration-150 ease-out"
          From: "opacity-0"
          To: "opacity-100"
        Leaving: "duration-150 ease-in"
          From: "opacity-100"
          To: "opacity-0"
      -->
      <div class="fixed inset-0 z-20 bg-black bg-opacity-25" aria-hidden="true"></div>

      <!--
        Mobile menu, show/hide based on mobile menu state.

        Entering: "duration-150 ease-out"
          From: "opacity-0 scale-95"
          To: "opacity-100 scale-100"
        Leaving: "duration-150 ease-in"
          From: "opacity-100 scale-100"
          To: "opacity-0 scale-95"
      -->
      <div class="absolute inset-x-0 top-0 z-30 mx-auto w-full max-w-3xl origin-top transform p-2 transition">
        <div class="divide-y divide-gray-200 rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
          <div class="pt-3 pb-2">
            <div class="flex items-center justify-between px-4">
              <div>
                <img class="h-8 w-auto" src="{{ config('app.logo') }}" alt="{{ config('app.name')}}">
              </div>
              <div class="-mr-2">
                <button @click="showMobileMenu = false" type="button" class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                  <span class="sr-only">Close menu</span>
                  <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              </div>
            </div>
            <div class="mt-3 space-y-1 px-2">
              <a href="/{{ session('locale')}}/dashboard" class="block rounded-md px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-100 hover:text-gray-800">Dashboard</a>
              <a href="/logout" class="block rounded-md px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-100 hover:text-gray-800">Logout</a>
              {{-- <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-100 hover:text-gray-800">Resources</a>
              <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-100 hover:text-gray-800">Company Directory</a>
              <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-100 hover:text-gray-800">Openings</a> --}}
            </div>
          </div>
          <div x-data="{ showProfileDropdown: false }" class="pt-4 pb-2">
            <div class="flex items-center px-5">
              <div @click="showProfileDropdown = !showProfileDropdown" class="flex-shrink-0">
                @if(Auth::user()->avatar)
                    <img class="inline-block h-7 w-7 rounded-full" src="{{ Auth::user()->image }}" alt="">
                @else
                    <svg class="inline-block h-8 w-8 rounded-full" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                @endif
              </div>
              <div class="ml-3 min-w-0 flex-1">
              <!-- Put the user's first name in the div below -->
                <div class="truncate text-base font-medium text-gray-800">User name</div>
                <div class="truncate text-sm font-medium text-gray-500">User email</div>
              </div>
              {{-- <button type="button" class="ml-auto flex-shrink-0 rounded-full bg-white p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                <span class="sr-only">View notifications</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                </svg>
              </button> --}}
            </div>
            <div x-cloak x-show="showProfileDropdown === true" class="mt-3 space-y-1 px-2">
              <a href="/{{ session('locale') }}/dashboard" class="block rounded-md px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-100 hover:text-gray-800">Dashboard</a>
              <a href="/logout" class="block rounded-md px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-100 hover:text-gray-800">Logout</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <main class="-mt-24 pb-8">
    <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:max-w-7xl lg:px-8">
      <h1 class="sr-only">Page title</h1>
      <!-- Main 4 column grid -->
      <div class="grid grid-cols-1 items-start gap-4 lg:grid-cols-4 lg:gap-8">
        <!-- Left column -->
        <div class="grid grid-cols-1 gap-4 lg:col-span-3">
          <section aria-labelledby="section-1-title">
            <h2 class="sr-only" id="section-1-title">Section title</h2>
            <div class="overflow-hidden rounded-lg bg-white shadow">
              <div class="p-6">
                {{ $content }}
              </div>
            </div>
              <div class="mt-4 bg-gray-100 rounded-lg">
                  <audio controls autoplay class="w-full rounded-sm" id="whiteNoise">
                      <source src="/audio/WeaverSchool-WhiteNoise-1-60min.mp3"  type="audio/mpeg">
                      Your browser does not support the audio element.
                  </audio>
                  <script>
                      var audio = document.getElementById("whiteNoise");
                      audio.volume = 0.01;
                  </script>
              </div>
          </section>
        </div>

        <!-- Right column -->
        <div class="grid grid-cols-1 gap-4">
          <section aria-labelledby="section-2-title">
            <h2 class="sr-only" id="section-2-title">Section title</h2>
            <div class="overflow-hidden rounded-lg bg-white shadow">
                <div class="p-6 flex flex-1 flex-col">
                    <nav class="flex-1 space-y-1 px-2">

                        @unless($registration->experience === 'self-paced')
                            @isset($lesson->worksheets)
                                @foreach($lesson->worksheets as $worksheet)
                                    <div class="relative flex items-center">
                                        <div class="min-w-0 flex-1 text-sm">
                                            <a href="{{ $worksheet->google_doc_link }}" target="_blank" class="text-black hover:text-gray-600 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                                Lesson PDF
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @endisset
                        @endunless

                     @if(count($lesson->vocabularyWords))
                        <div class="relative flex items-center">
                          <div class="min-w-0 flex-1 text-sm">
                            <a href="{{ route('dashboard.lessons.vocabulary-words.index', ['locale' => session('locale'), 'courseId' => $course->id, 'lessonId' => $lesson->id]) }}" class="text-black hover:text-gray-600 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                Vocabulary Words
                            </a>
                          </div>
                          <div class="flex items-center">
                            {{-- <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg> --}}
                          </div>
                        </div>
                      @endif

                     @isset($lesson->flashcardSet)
                         <div class="relative flex items-center">
                             <div class="min-w-0 flex-1 text-sm">
                                 <a href="{{ route('dashboard.lessons.flashcards.index', ['locale' => session('locale'), 'courseId' => $course->id, 'lessonId' => $lesson->id]) }}" class="text-black hover:text-gray-600 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                     Flashcards
                                 </a>
                             </div>
                             <div class="flex items-center">
                                 {{-- <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                   <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                 </svg> --}}
                             </div>
                         </div>
                     @endisset
                          @php $lessonProgress = $registration->lessonProgresses->where('lesson_id', $lesson->id)->first(); @endphp
                          @if(count($lesson->exercises->where('type', '==', 'Guided Practice')))
                            <div class="relative flex items-center">
                              <div class="min-w-0 flex-1 text-sm">
                                @php $gpRouteEnding = ($lessonProgress->guided_practice_grade) ? '.results' : '.show'; @endphp
                                <a href="{{ route('dashboard.lessons.guided-practice' . $gpRouteEnding,
                                  ['locale' => session('locale'), 'courseId' => $course->id, 'lessonId' => $lesson->id]) }}" class="text-black hover:text-gray-600 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                    Guided Practice
                                </a>
                              </div>
                              <div class="flex items-center">
                                @if($lessonProgress->guided_practice_grade)
                                  <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                  </svg>
                                @endif
                              </div>
                            </div>
                          @endif

                      @if(count($lesson->exercises->where('type', '==', 'Free Practice')))
                        <div class="relative flex items-center">
                          <div class="min-w-0 flex-1 text-sm">
                            @php $fpRouteEnding = ($lessonProgress->free_practice_grade) ? '.results' : '.show'; @endphp
                            <a href="{{ route('dashboard.lessons.free-practice' . $fpRouteEnding,
                              ['locale' => session('locale'), 'courseId' => $course->id, 'lessonId' => $lesson->id]) }}" class="text-black hover:text-gray-600 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                Free Practice
                            </a>
                          </div>
                          <div class="flex items-center">
                            @if($lessonProgress->free_practice_grade)
                              <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                              </svg>
                            @endif
                          </div>
                        </div>
                      @endif

                         @if($registration->experience === 'self-paced')
                              @isset($lesson->worksheets)
                                  @foreach($lesson->worksheets as $worksheet)
                                     <div class="relative flex items-center">
                                         <div class="min-w-0 flex-1 text-sm">
                                             <a href="{{ $worksheet->google_doc_link }}" target="_blank" class="text-black hover:text-gray-600 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                                 Worksheet
                                             </a>
                                         </div>
                                     </div>
                                 @endforeach
                              @endisset
                         @endif

                      @isset($lesson->quiz)
                        <div class="relative flex items-center">
                          <div class="min-w-0 flex-1 text-sm">
                            @php $qRouteEnding = ($lessonProgress->quiz_grade) ? '.results' : '.show'; @endphp
                            <a href="{{ route('dashboard.lessons.quiz' . $qRouteEnding,
                              ['locale' => session('locale'), 'courseId' => $course->id, 'lessonId' => $lesson->id]) }}" class="text-black hover:text-gray-600 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                Quiz
                            </a>
                          </div>
                          <div class="flex items-center">
                            @if($lessonProgress->quiz_grade)
                              <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                              </svg>
                            @endif
                          </div>
                        </div>
                      @endisset

                      @isset($lessonProgress)
                          @unless($registration->experience === 'self-paced')
                            <div class="relative flex items-center">
                              <div class="min-w-0 flex-1 text-sm">
                                <a href="{{ route('dashboard.lessons.progress.show',
                                ['locale' => session('locale'), 'courseId' => $course->id, 'lessonId' => $lesson->id]) }}"
                                  class="text-black hover:text-gray-600 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                    Progress
                                </a>
                              </div>
                              <div class="flex items-center">
                                @if($lessonProgress->lesson_grade)
                                  <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                  </svg>
                                @endif
                              </div>
                            </div>
                          @endunless
                      @endisset

                    @isset($registration->experience)
                        @if($registration->experience === 'self-paced')
                             <div class="relative flex items-center">
                                 <div class="min-w-0 flex-1 text-sm">
                                     <form action="{{ route('dashboard.lessons.goToNextLesson', ['locale' => session('locale'), 'lessonId' => $lesson->id]) }}" method="POST">
                                         @csrf
                                         <button role="button" type="submit" class="text-black hover:text-gray-600 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                             Next lesson
                                         </button>
                                     </form>
                                 </div>
                             </div>
                        @endif
                    @endisset

                </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </main>
  <footer>
    <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:max-w-7xl lg:px-8">
      <div class="border-t border-gray-200 py-8 text-center text-sm text-gray-500 sm:text-left"><span class="block sm:inline">&copy; {{ date('Y') }} The Weaver School</span> <span class="block sm:inline">All rights reserved.</span></div>
    </div>
  </footer>
</div>

</x-layouts.app>
