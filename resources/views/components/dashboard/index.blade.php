@php
    $locale = session('locale', 'en');
    $url = request()->path();
    if ($locale !== 'en') {
        $path = substr("$url", 6);
    } else {
        $path = substr("$url", 3);
    }
@endphp
<div x-cloak x-data="{ showMobileMenu: false, languageMenuOpen: false, userMenuOpen: false, examPrepDropdownOpen: {{ Route::is('dashboard.exam-prep*') ? 'true' : 'false' }}, ieltsCoachDropdownOpen: {{ Route::is('dashboard.exam-prep.ielts*') ? 'true' : 'false' }}, ieltsWritingDropdownOpen: {{ Route::is('dashboard.exam-prep.ielts.writing*') ? 'true' : 'false' }}, ieltsSpeakingDropdownOpen: {{ Route::is('dashboard.exam-prep.ielts.speaking*') ? 'true' : 'false' }}, cambridgeCoachDropdownOpen: {{ Route::is('dashboard.exam-prep.cambridge*') ? 'true' : 'false' }}, cambridgeWritingDropdownOpen: {{ Route::is('dashboard.exam-prep.cambridge.writing*') ? 'true' : 'false' }}, cambridgeSpeakingDropdownOpen: {{ Route::is('dashboard.exam-prep.cambridge.speaking*') ? 'true' : 'false' }}, pearsonCoachDropdownOpen: {{ Route::is('dashboard.exam-prep.pearson*') ? 'true' : 'false' }}, coursesDropdownOpen: {{ Route::is('dashboard.courses*') || Route::is('dashboard.registrations.create') ? 'true' : 'false' }}, @if (request()->is('dashboard/quizzes*')) quizzesDropdownOpen: true, @else quizzesDropdownOpen: false, @endif }">
    <div>
        <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
        <div x-cloak x-show="showMobileMenu" class="fixed inset-0 z-40 flex md:hidden" role="dialog" aria-modal="true">
            <!--
              Off-canvas menu overlay, show/hide based on off-canvas menu state.
            -->
            <div class="fixed inset-0 bg-gray-600 bg-opacity-75" aria-hidden="true"></div>

            <!--
              Off-canvas menu, show/hide based on off-canvas menu state.
            -->
            <div x-cloak x-show="showMobileMenu"
                class="relative flex w-full max-w-xs flex-1 flex-col bg-gray-200 dark:bg-gray-900">
                <!--
                  Close button, show/hide based on off-canvas menu state.
                -->
                <div @click="showMobileMenu = false" class="absolute right-0 top-0 -mr-12 pt-2">
                    <button type="button"
                        class="ml-1 flex h-10 w-10 items-center justify-center rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                        <span class="sr-only">Close sidebar</span>
                        <!-- Heroicon name: outline/x -->
                        <svg class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="h-0 flex-1 overflow-y-auto pb-4 pt-5">
                    <div class="flex flex-shrink-0 items-center px-4">
                        <!-- Light mode logo (hidden in dark mode) -->
                        <img class="mx-auto h-8 w-auto dark:hidden" src="{{ config('app.logo') }}"
                            alt="{{ config('app.name') . ' logo' }}">
                        <!-- Dark mode logo (only shown in dark mode) -->
                        <img class="mx-auto hidden h-8 w-auto dark:block" src="{{ config('app.logo_dark') }}"
                            alt="{{ config('app.name') . ' logo' }}">
                    </div>

                    <nav class="mt-5 space-y-1 px-2">
                        <!-- Current: "bg-teal-800 text-white", Default: "text-white hover:bg-teal-600 hover:bg-opacity-75" -->
                        <a href="/{{ session('locale') ?? '' }}/dashboard"
                            class="@if (request()->routeIs('dashboard.index')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md px-2 py-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                            <!-- Heroicon name: outline/home -->
                            <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Dashboard
                        </a>

                        {{-- Commenting this out until learning paths are finished --}}
                        <a href="{{ route('learning-paths.index', ['locale' => session('locale', 'en')])}}" class="hover:text-gray-900 hover:bg-gray-200 group flex items-center px-2 py-2 text-sm font-medium rounded-md @if(request()->is('/learning-paths*')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif">
                            <!-- Heroicon name: outline/rectangle-stack -->
                            <svg fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="mr-3 flex-shrink-0 w-6 h-6">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                            </svg>
                            Learning Paths
                        </a>

                        <a href="/flashcards/sets"
                            class="@if (request()->is('/flashcards*')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md px-2 py-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                            <!-- Heroicon name: outline/rectangle-stack -->
                            <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6 6.878V6a2.25 2.25 0 012.25-2.25h7.5A2.25 2.25 0 0118 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 004.5 9v.878m13.5-3A2.25 2.25 0 0119.5 9v.878m0 0a2.246 2.246 0 00-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0121 12v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6c0-.98.626-1.813 1.5-2.122" />
                            </svg>
                            Flashcards
                        </a>

                        <a href="/quick-notes"
                            class="@if (request()->is('/quick-notes')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md px-2 py-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                            <!-- Heroicon name: outline/rectangle-stack -->
                            <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                            </svg>
                            Quick Notes
                        </a>

                        {{-- Exam-Prep Dropdown Component --}}
                        <div class="space-y-1">
                            <button @click="examPrepDropdownOpen = !examPrepDropdownOpen" type="button"
                                class="unstyled group flex w-full items-center rounded-md px-2 py-2 text-left text-sm font-medium text-gray-900 hover:bg-gray-200 hover:text-gray-900 focus:outline-none dark:text-gray-100"
                                aria-controls="sub-menu-essays" aria-expanded="false">
                                {{-- Icon for Essays --}}
                                <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                </svg>
                                <span class="flex-1">Exam Prep</span>
                                {{-- Dropdown Arrow --}}
                                <svg x-show="!examPrepDropdownOpen"
                                    class="ml-3 h-5 w-5 flex-shrink-0 transform text-gray-900 transition-colors duration-150 ease-in-out group-hover:text-gray-900 dark:text-gray-100"
                                    viewBox="0 0 20 20" aria-hidden="true">
                                    <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                </svg>
                                <svg x-cloak x-show="examPrepDropdownOpen"
                                    class="ml-3 h-5 w-5 flex-shrink-0 rotate-90 transform text-gray-900 transition-colors duration-150 ease-in-out group-hover:text-gray-900 dark:text-gray-100"
                                    viewBox="0 0 20 20" aria-hidden="true">
                                    <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                </svg>
                            </button>
                            {{-- Dropdown Links --}}
                            <div x-cloak x-show="examPrepDropdownOpen" class="space-y-1" id="sub-menu-essays">
                                <button @click="ieltsCoachDropdownOpen = !ieltsCoachDropdownOpen" type="button"
                                    class="unstyled group flex w-full items-center rounded-md px-2 py-2 text-left text-sm font-medium text-gray-900 hover:bg-gray-200 hover:text-gray-900 focus:outline-none dark:text-gray-100"
                                    aria-controls="sub-menu-essays" aria-expanded="false">
                                    <span class="ml-9 flex-1">IELTS Coach</span>
                                    <svg x-show="!ieltsCoachDropdownOpen"
                                        class="ml-3 h-5 w-5 flex-shrink-0 transform text-gray-900 transition-colors duration-150 ease-in-out group-hover:text-gray-900 dark:text-gray-100"
                                        viewBox="0 0 20 20" aria-hidden="true">
                                        <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                    </svg>
                                    <svg x-cloak x-show="ieltsCoachDropdownOpen"
                                        class="ml-3 h-5 w-5 flex-shrink-0 rotate-90 transform text-gray-900 transition-colors duration-150 ease-in-out group-hover:text-gray-900 dark:text-gray-100"
                                        viewBox="0 0 20 20" aria-hidden="true">
                                        <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                    </svg>
                                </button>
                                <div x-cloak x-show="ieltsCoachDropdownOpen" class="space-y-1" id="sub-menu-essays">
                                    <button @click="ieltsWritingDropdownOpen = !ieltsWritingDropdownOpen"
                                        type="button"
                                        class="unstyled group flex w-full items-center rounded-md px-2 py-2 text-left text-sm font-medium text-gray-900 hover:bg-gray-200 hover:text-gray-900 focus:outline-none dark:text-gray-100"
                                        aria-controls="sub-menu-essays" aria-expanded="false">
                                        <span class="ml-9 flex-1">Writing</span>
                                        <svg x-show="!ieltsWritingDropdownOpen"
                                            class="ml-3 h-5 w-5 flex-shrink-0 transform text-gray-900 transition-colors duration-150 ease-in-out group-hover:text-gray-900 dark:text-gray-100"
                                            viewBox="0 0 20 20" aria-hidden="true">
                                            <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                        </svg>
                                        <svg x-cloak x-show="ieltsWritingDropdownOpen"
                                            class="ml-3 h-5 w-5 flex-shrink-0 rotate-90 transform text-gray-900 transition-colors duration-150 ease-in-out group-hover:text-gray-900 dark:text-gray-100"
                                            viewBox="0 0 20 20" aria-hidden="true">
                                            <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                        </svg>
                                    </button>
                                    {{-- IELTS Writing Submenu --}}
                                    <div x-cloak x-show="ieltsWritingDropdownOpen" class="space-y-1"
                                        id="sub-menu-ielts-writing">
                                        <a href="{{ route('dashboard.exam-prep.ielts.writing.submit', ['locale' => session('locale', 'en')]) }}"
                                            class="@if (Route::is('dashboard.exam-prep.ielts.writing.submit*')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md py-2 pl-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                                            {{-- Icon for Feedback --}}
                                            <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                {{-- Your SVG Path for Feedback Icon --}}
                                            </svg>
                                            Writing Checker
                                        </a>

                                        <a href="{{ route('dashboard.exam-prep.ielts.writing.feedback.index', ['locale' => session('locale', 'en')]) }}"
                                            class="@if (Route::is('dashboard.exam-prep.ielts.writing.feedback*')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md py-2 pl-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                                            {{-- Icon for Feedback --}}
                                            <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                {{-- Your SVG Path for Feedback Icon --}}
                                            </svg>
                                            Writing Feedback
                                        </a>

                                        <a href="{{ route('dashboard.exam-prep.ielts.writing.practice.thesis', ['locale' => session('locale', 'en')]) }}"
                                            class="@if (Route::is('dashboard.exam-prep.ielts.writing.practice.thesis*')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md py-2 pl-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                                            <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                {{-- Your SVG Path for Corrections Icon --}}
                                            </svg>
                                            Thesis Statements
                                        </a>

                                        <a href="{{ route('dashboard.exam-prep.ielts.writing.practice.introduction', ['locale' => session('locale', 'en')]) }}"
                                            class="@if (Route::is('dashboard.exam-prep.ielts.writing.practice.introduction*')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md py-2 pl-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                                            <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                {{-- Your SVG Path for Corrections Icon --}}
                                            </svg>
                                            Introductions
                                        </a>

                                        <a href="{{ route('dashboard.exam-prep.ielts.writing.practice.task-two-outline', ['locale' => session('locale', 'en')]) }}"
                                            class="@if (Route::is('dashboard.exam-prep.ielts.writing.practice.task-two-outline*')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md py-2 pl-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                                            <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                {{-- Your SVG Path for Corrections Icon --}}
                                            </svg>
                                            Task 2 Outlines
                                        </a>

                                        <a href="{{ route('dashboard.exam-prep.ielts.writing.progress', ['locale' => session('locale', 'en')]) }}"
                                            class="@if (Route::is('dashboard.exam-prep.ielts.writing.progress*')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md py-2 pl-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                                            {{-- Icon for Corrections --}}
                                            <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                {{-- Your SVG Path for Corrections Icon --}}
                                            </svg>
                                            Score Progress
                                        </a>
                                    </div>
                                    <button @click="ieltsSpeakingDropdownOpen = !ieltsSpeakingDropdownOpen"
                                        type="button"
                                        class="unstyled group flex w-full items-center rounded-md px-2 py-2 text-left text-sm font-medium text-gray-900 hover:bg-gray-200 hover:text-gray-900 focus:outline-none dark:text-gray-100"
                                        aria-controls="sub-menu-essays" aria-expanded="false">
                                        <span class="ml-9 flex-1">Speaking</span>
                                        <svg x-show="!ieltsSpeakingDropdownOpen"
                                            class="ml-3 h-5 w-5 flex-shrink-0 transform text-gray-900 transition-colors duration-150 ease-in-out group-hover:text-gray-900 dark:text-gray-100"
                                            viewBox="0 0 20 20" aria-hidden="true">
                                            <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                        </svg>
                                        <svg x-cloak x-show="ieltsSpeakingDropdownOpen"
                                            class="ml-3 h-5 w-5 flex-shrink-0 rotate-90 transform text-gray-900 transition-colors duration-150 ease-in-out group-hover:text-gray-900 dark:text-gray-100"
                                            viewBox="0 0 20 20" aria-hidden="true">
                                            <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                        </svg>
                                    </button>
                                    {{-- IELTS Speaking Submenu --}}
                                    <div x-cloak x-show="ieltsSpeakingDropdownOpen" class="space-y-1"
                                        id="sub-menu-ielts-speaking">
                                        <a href="{{ route('dashboard.exam-prep.ielts.speaking.practice-tests.index', ['locale' => session('locale', 'en')]) }}"
                                            class="@if (Route::is('dashboard.exam-prep.ielts.speaking.practice-tests.index*')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md py-2 pl-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                                            {{-- Icon for Feedback --}}
                                            <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                {{-- Your SVG Path for Feedback Icon --}}
                                            </svg>
                                            Practice Tests
                                        </a>
                                        <a href="{{ route('dashboard.exam-prep.ielts.speaking.practice-tests.feedback.index', ['locale' => session('locale', 'en')]) }}"
                                            class="@if (Route::is('dashboard.exam-prep.ielts.speaking.practice-tests.feedback*')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md py-2 pl-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                                            {{-- Icon for Feedback --}}
                                            <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                {{-- Your SVG Path for Feedback Icon --}}
                                            </svg>
                                            Feedback
                                        </a>
                                    </div>
                                </div>

                                <button @click="cambridgeCoachDropdownOpen = !cambridgeCoachDropdownOpen"
                                    type="button"
                                    class="unstyled group flex w-full items-center rounded-md px-2 py-2 text-left text-sm font-medium text-gray-900 hover:bg-gray-200 hover:text-gray-900 focus:outline-none dark:text-gray-100"
                                    aria-controls="sub-menu-cambridge" aria-expanded="false">
                                    {{-- Icon for Essays --}}
                                    {{-- <svg class="mr-3 flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                </svg> --}}
                                    <span class="ml-9 flex-1">Cambridge Coach</span>
                                    {{-- Dropdown Arrow --}}
                                    <svg x-show="!cambridgeCoachDropdownOpen"
                                        class="ml-3 h-5 w-5 flex-shrink-0 transform text-gray-900 transition-colors duration-150 ease-in-out group-hover:text-gray-900 dark:text-gray-100"
                                        viewBox="0 0 20 20" aria-hidden="true">
                                        <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                    </svg>
                                    <svg x-cloak x-show="cambridgeCoachDropdownOpen"
                                        class="ml-3 h-5 w-5 flex-shrink-0 rotate-90 transform text-gray-900 transition-colors duration-150 ease-in-out group-hover:text-gray-900 dark:text-gray-100"
                                        viewBox="0 0 20 20" aria-hidden="true">
                                        <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                    </svg>
                                </button>
                                <div x-cloak x-show="cambridgeCoachDropdownOpen" class="space-y-1"
                                    id="sub-menu-cambridge-writing">
                                    <button @click="cambridgeWritingDropdownOpen = !cambridgeWritingDropdownOpen"
                                        type="button"
                                        class="unstyled group flex w-full items-center rounded-md px-2 py-2 text-left text-sm font-medium text-gray-900 hover:bg-gray-200 hover:text-gray-900 focus:outline-none dark:text-gray-100"
                                        aria-controls="sub-menu-essays" aria-expanded="false">
                                        <span class="ml-9 flex-1">Writing</span>
                                        <svg x-show="!cambridgeWritingDropdownOpen"
                                            class="ml-3 h-5 w-5 flex-shrink-0 transform text-gray-900 transition-colors duration-150 ease-in-out group-hover:text-gray-900 dark:text-gray-100"
                                            viewBox="0 0 20 20" aria-hidden="true">
                                            <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                        </svg>
                                        <svg x-cloak x-show="cambridgeWritingDropdownOpen"
                                            class="ml-3 h-5 w-5 flex-shrink-0 rotate-90 transform text-gray-900 transition-colors duration-150 ease-in-out group-hover:text-gray-900 dark:text-gray-100"
                                            viewBox="0 0 20 20" aria-hidden="true">
                                            <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                        </svg>
                                    </button>
                                    {{-- Cambridge Writing Submenu --}}
                                    <div x-cloak x-show="cambridgeWritingDropdownOpen" class="space-y-1"
                                        id="sub-menu-cambridge-writing">                                                                    
                                        <a href="{{ route('dashboard.exam-prep.cambridge.writing.submit', ['locale' => session('locale', 'en')]) }}"
                                            class="@if (Route::is('dashboard.exam-prep.cambridge.writing.submit*')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md py-2 pl-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                                            {{-- Icon for Feedback --}}
                                            <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                {{-- Your SVG Path for Feedback Icon --}}
                                            </svg>
                                            Writing Checker
                                        </a>

                                        <a href="{{ route('dashboard.exam-prep.cambridge.writing.feedback.index', ['locale' => session('locale', 'en')]) }}"
                                            class="@if (Route::is('dashboard.exam-prep.cambridge.writing.feedback*')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md py-2 pl-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                                            {{-- Icon for Feedback --}}
                                            <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                {{-- Your SVG Path for Feedback Icon --}}
                                            </svg>
                                            Writing Feedback
                                        </a>

                                        <a href="{{ route('dashboard.exam-prep.cambridge.writing.progress', ['locale' => session('locale', 'en')]) }}"
                                            class="@if (Route::is('dashboard.exam-prep.cambridge.writing.progress*')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md py-2 pl-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                                            {{-- Icon for Corrections --}}
                                            <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                {{-- Your SVG Path for Corrections Icon --}}
                                            </svg>
                                            Score Progress
                                        </a>
                                    </div>
                                    <button @click="cambridgeSpeakingDropdownOpen = !cambridgeSpeakingDropdownOpen"
                                        type="button"
                                        class="unstyled group flex w-full items-center rounded-md px-2 py-2 text-left text-sm font-medium text-gray-900 hover:bg-gray-200 hover:text-gray-900 focus:outline-none dark:text-gray-100"
                                        aria-controls="sub-menu-essays" aria-expanded="false">
                                        <span class="ml-9 flex-1">Speaking</span>
                                        <svg x-show="!cambridgeSpeakingDropdownOpen"
                                            class="ml-3 h-5 w-5 flex-shrink-0 transform text-gray-900 transition-colors duration-150 ease-in-out group-hover:text-gray-900 dark:text-gray-100"
                                            viewBox="0 0 20 20" aria-hidden="true">
                                            <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                        </svg>
                                        <svg x-cloak x-show="cambridgeSpeakingDropdownOpen"
                                            class="ml-3 h-5 w-5 flex-shrink-0 rotate-90 transform text-gray-900 transition-colors duration-150 ease-in-out group-hover:text-gray-900 dark:text-gray-100"
                                            viewBox="0 0 20 20" aria-hidden="true">
                                            <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                        </svg>
                                    </button>
                                    {{-- Cambridge Speaking Submenu --}}
                                    <div x-cloak x-show="cambridgeSpeakingDropdownOpen" class="space-y-1"
                                        id="sub-menu-cambridge-speaking">
                                        <a href="{{ route('dashboard.exam-prep.cambridge.speaking.practice-tests.index', ['locale' => session('locale', 'en')]) }}"
                                            class="@if (Route::is('dashboard.exam-prep.cambridge.speaking.practice-tests.index') ||
                                                    Route::is('dashboard.exam-prep.cambridge.speaking.practice-tests.submit')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md py-2 pl-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                                            {{-- Icon for Feedback --}}
                                            <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                {{-- Your SVG Path for Feedback Icon --}}
                                            </svg>
                                            Practice Tests
                                        </a>
                                        <a href="{{ route('dashboard.exam-prep.cambridge.speaking.practice-tests.feedback.index', ['locale' => session('locale', 'en')]) }}"
                                            class="@if (Route::is('dashboard.exam-prep.cambridge.speaking.practice-tests.feedback*')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md py-2 pl-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                                            {{-- Icon for Feedback --}}
                                            <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                {{-- Your SVG Path for Feedback Icon --}}
                                            </svg>
                                            Feedback
                                        </a>
                                    </div>
                                </div>                                
                                
                                <button @click="pearsonCoachDropdownOpen = !pearsonCoachDropdownOpen"
                                    type="button"
                                    class="unstyled group flex w-full items-center rounded-md px-2 py-2 text-left text-sm font-medium text-gray-900 hover:bg-gray-200 hover:text-gray-900 focus:outline-none dark:text-gray-100"
                                    aria-controls="sub-menu-essays" aria-expanded="false">
                                    <span class="ml-9 flex-1">Pearson Coach</span>
                                    <svg x-show="!pearsonCoachDropdownOpen"
                                        class="ml-3 h-5 w-5 flex-shrink-0 transform text-gray-900 transition-colors duration-150 ease-in-out group-hover:text-gray-900 dark:text-gray-100"
                                        viewBox="0 0 20 20" aria-hidden="true">
                                        <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                    </svg>
                                    <svg x-cloak x-show="pearsonCoachDropdownOpen"
                                        class="ml-3 h-5 w-5 flex-shrink-0 rotate-90 transform text-gray-900 transition-colors duration-150 ease-in-out group-hover:text-gray-900 dark:text-gray-100"
                                        viewBox="0 0 20 20" aria-hidden="true">
                                        <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                    </svg>
                                </button>
                                <div x-cloak x-show="pearsonCoachDropdownOpen" class="space-y-1" id="sub-menu-essays">
                                    <a href="{{ route('dashboard.exam-prep.pearson.writing.submit', ['locale' => session('locale', 'en')]) }}"
                                        class="@if (Route::is('dashboard.exam-prep.pearson.writing.submit*')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md py-2 pl-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                                        <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            {{-- Your SVG Path for Writing Checker Icon --}}
                                        </svg>
                                        Writing Checker
                                    </a>

                                    <a href="{{ route('dashboard.exam-prep.pearson.writing.feedback.index', ['locale' => session('locale', 'en')]) }}"
                                        class="@if (Route::is('dashboard.exam-prep.pearson.writing.feedback*')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md py-2 pl-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                                        <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            {{-- Your SVG Path for Writing Feedback Icon --}}
                                        </svg>
                                        Writing Feedback
                                    </a>

                                    <a href="{{ route('dashboard.exam-prep.pearson.writing.progress', ['locale' => session('locale', 'en')]) }}"
                                        class="@if (Route::is('dashboard.exam-prep.pearson.writing.progress*')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md py-2 pl-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                                        <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            {{-- Your SVG Path for Score Progress Icon --}}
                                        </svg>
                                        Score Progress
                                    </a>
                                </div>

                            </div>
                        </div>

                        <div class="space-y-1">
                            <button @click="coursesDropdownOpen = !coursesDropdownOpen" type="button"
                                class="unstyled group flex w-full items-center rounded-md px-2 py-2 text-left text-sm font-medium text-gray-900 hover:bg-gray-200 hover:text-gray-900 focus:outline-none dark:text-gray-100"
                                aria-controls="sub-menu-courses" aria-expanded="false">
                                {{-- Icon for courses --}}
                                <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                                </svg>
                                <span class="flex-1">Courses</span>
                                {{-- Dropdown Arrow --}}
                                <svg x-show="!coursesDropdownOpen"
                                    class="ml-3 h-5 w-5 flex-shrink-0 transform text-gray-900 transition-colors duration-150 ease-in-out group-hover:text-gray-900 dark:text-gray-100"
                                    viewBox="0 0 20 20" aria-hidden="true">
                                    <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                </svg>
                                <svg x-cloak x-show="coursesDropdownOpen"
                                    class="ml-3 h-5 w-5 flex-shrink-0 rotate-90 transform text-gray-900 transition-colors duration-150 ease-in-out group-hover:text-gray-900 dark:text-gray-100"
                                    viewBox="0 0 20 20" aria-hidden="true">
                                    <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                </svg>
                            </button>
                            {{-- Dropdown Links --}}
                            <div x-cloak x-show="coursesDropdownOpen" class="space-y-1" id="sub-menu-courses">
                                <a href="/{{ session('locale') ?? '' }}/dashboard/courses"
                                    class="@if (Route::is('dashboard.courses')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md py-2 pl-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                                    {{-- Icon for Feedback --}}
                                    <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        {{-- Your SVG Path for Feedback Icon --}}
                                    </svg>
                                    My Courses
                                </a>

                                <a href="/{{ session('locale') ?? '' }}/dashboard/registrations/create"
                                    class="@if (Route::is('dashboard.registrations.create*')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md py-2 pl-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                                    {{-- Icon for Feedback --}}
                                    <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        {{-- Your SVG Path for Feedback Icon --}}
                                    </svg>
                                    Register for a Course
                                </a>
                            </div>
                        </div>

                        {{-- <a href="/{{ session('locale') ?? '' }}/dashboard/payments" class="hover:text-gray-900 hover:bg-gray-200 group flex items-center px-2 py-2 text-sm font-medium rounded-md @if (request()->is('dashboard/payments')) bg-teal-400 text-white @else text-gray-900 @endif">
                            <!-- Heroicon name: outline/cash -->
                            <svg class="mr-3 flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            @lang('dashboard/index.payments')
                        </a> --}}

                        <a href="/{{ session('locale') ?? '' }}/dashboard/subscriptions"
                            class="@if (request()->is('dashboard/payments')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md px-2 py-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                            <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                            </svg>
                            Subscriptions
                        </a>

                    </nav>
                </div>
                <div class="flex flex-shrink-0 p-4">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();"
                        class="unstyled group block flex-shrink-0">
                        <div class="flex items-center">
                            <div>
                                @if (Auth::user()->avatar)
                                    <img class="inline-block h-7 w-7 rounded-full" src="{{ Auth::user()->image }}"
                                        alt="">
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="inline-block h-8 w-8 rounded-full text-gray-900 dark:text-gray-100"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                @endif
                            </div>
                            <div class="ml-3">
                                {{--                                <p class="text-base font-medium">{{ $user->first_name }}</p> --}}
                                <p class="text-sm font-medium text-gray-900 dark:text-gray-100">@lang('dashboard/index.logout')</p>
                            </div>
                        </div>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>

            <div class="w-14 flex-shrink-0" aria-hidden="true">
                <!-- Force sidebar to shrink to fit close icon -->
            </div>
        </div>
        <!-- End Mobile Menu -->

        <!-- Static sidebar for desktop -->
        <div class="hidden md:fixed md:inset-y-0 md:flex md:w-64 md:flex-col">
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div
                class="flex min-h-0 flex-1 flex-col bg-white dark:bg-gray-900 dark:text-gray-100 dark:hover:text-gray-900">
                <div class="flex flex-1 flex-col overflow-y-auto pb-4 pl-6 pt-5">
                    {{-- <a class="" href="/">                        
                        {{-- <div class="flex dark:hidden items-center flex-shrink-0 px-4">
                            <img class="h-12 w-auto mx-auto" src="{{config('app.logo')}}" alt="{{ config('app.name') . 'logo'}}">
                        </div> --}}
                    {{-- <div class="flex items-center flex-shrink-0 px-4">
                            <img class="h-12 w-auto mx-auto" src="{{config('app.logo_dark')}}" alt="{{ config('app.name') . 'logo'}}">
                        </div>
                    </a> --}}

                    <a href="/">
                        <div class="flex flex-shrink-0 items-center px-4">
                            <!-- Light mode logo (hidden in dark mode) -->
                            <img class="mx-auto h-12 w-auto dark:hidden" src="{{ config('app.logo') }}"
                                alt="{{ config('app.name') . ' logo' }}">
                            <!-- Dark mode logo (only shown in dark mode) -->
                            <img class="mx-auto hidden h-12 w-auto dark:block" src="{{ config('app.logo_dark') }}"
                                alt="{{ config('app.name') . ' logo' }}">
                        </div>
                    </a>

                    <nav class="mt-5 flex-1 flex-wrap items-stretch space-y-1 px-2">
                        <!-- Current: "bg-teal-800 text-white", Default: "text-white hover:bg-teal-600 hover:bg-opacity-75" -->
                        <a href="/{{ session('locale') ?? '' }}/dashboard"
                            class="@if (request()->routeIs('dashboard.index')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md px-2 py-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                            <!-- Heroicon name: outline/home -->
                            <svg class="mr-3 h-6 w-6 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Dashboard
                        </a>

                        <a href="{{ route('learning-paths.index', ['locale' => session('locale', 'en')])}}" class="hover:text-gray-900 hover:bg-gray-200  group flex items-center px-2 py-2 text-sm font-medium rounded-md @if(request()->is('/learning-paths*')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100  @endif">
                            <!-- Heroicon name: outline/rectangle-stack -->
                            <svg fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="mr-3 flex-shrink-0 w-6 h-6">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                            </svg>
                            Learning Paths
                        </a>

                        <a href="/flashcards/sets"
                            class="@if (request()->is('/flashcards')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md px-2 py-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                            <!-- Heroicon name: outline/rectangle-stack -->
                            <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6 6.878V6a2.25 2.25 0 012.25-2.25h7.5A2.25 2.25 0 0118 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 004.5 9v.878m13.5-3A2.25 2.25 0 0119.5 9v.878m0 0a2.246 2.246 0 00-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0121 12v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6c0-.98.626-1.813 1.5-2.122" />
                            </svg>
                            Flashcards
                        </a>

                        <a href="/quick-notes"
                            class="@if (request()->is('/quick-notes')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md px-2 py-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                            <!-- Heroicon name: outline/rectangle-stack -->
                            <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                            </svg>
                            Quick Notes
                        </a>

                        {{-- Exam-Prep Dropdown Component --}}
                        <div class="space-y-1">
                            <button @click="examPrepDropdownOpen = !examPrepDropdownOpen" type="button"
                                class="unstyled group flex w-full items-center rounded-md px-2 py-2 text-left text-sm font-medium text-gray-900 hover:bg-gray-200 hover:text-gray-900 focus:outline-none dark:text-gray-100"
                                aria-controls="sub-menu-essays" aria-expanded="false">
                                {{-- Icon for Essays --}}
                                <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                </svg>
                                <span class="flex-1">Exam Prep</span>
                                {{-- Dropdown Arrow --}}
                                <svg x-show="!examPrepDropdownOpen"
                                    class="ml-3 h-5 w-5 flex-shrink-0 transform text-gray-900 transition-colors duration-150 ease-in-out group-hover:text-gray-900 dark:text-gray-100"
                                    viewBox="0 0 20 20" aria-hidden="true">
                                    <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                </svg>
                                <svg x-cloak x-show="examPrepDropdownOpen"
                                    class="ml-3 h-5 w-5 flex-shrink-0 rotate-90 transform text-gray-900 transition-colors duration-150 ease-in-out group-hover:text-gray-900 dark:text-gray-100"
                                    viewBox="0 0 20 20" aria-hidden="true">
                                    <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                </svg>
                            </button>
                            {{-- Dropdown Links --}}
                            <div x-cloak x-show="examPrepDropdownOpen" class="space-y-1" id="sub-menu-essays">
                                <button @click="ieltsCoachDropdownOpen = !ieltsCoachDropdownOpen" type="button"
                                    class="unstyled group flex w-full items-center rounded-md px-2 py-2 text-left text-sm font-medium text-gray-900 hover:bg-gray-200 hover:text-gray-900 focus:outline-none dark:text-gray-100"
                                    aria-controls="sub-menu-essays" aria-expanded="false">
                                    <span class="ml-9 flex-1">IELTS Coach</span>
                                    <svg x-show="!ieltsCoachDropdownOpen"
                                        class="ml-3 h-5 w-5 flex-shrink-0 transform text-gray-900 transition-colors duration-150 ease-in-out group-hover:text-gray-900 dark:text-gray-100"
                                        viewBox="0 0 20 20" aria-hidden="true">
                                        <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                    </svg>
                                    <svg x-cloak x-show="ieltsCoachDropdownOpen"
                                        class="ml-3 h-5 w-5 flex-shrink-0 rotate-90 transform text-gray-900 transition-colors duration-150 ease-in-out group-hover:text-gray-900 dark:text-gray-100"
                                        viewBox="0 0 20 20" aria-hidden="true">
                                        <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                    </svg>
                                </button>
                                <div x-cloak x-show="ieltsCoachDropdownOpen" class="space-y-1" id="sub-menu-ielts-coach">
                                    <button @click="ieltsWritingDropdownOpen = !ieltsWritingDropdownOpen"
                                        type="button"
                                        class="unstyled group flex w-full items-center rounded-md px-2 py-2 text-left text-sm font-medium text-gray-900 hover:bg-gray-200 hover:text-gray-900 focus:outline-none dark:text-gray-100"
                                        aria-controls="sub-menu-essays" aria-expanded="false">
                                        <span class="ml-9 flex-1">Writing</span>
                                        <svg x-show="!ieltsWritingDropdownOpen"
                                            class="ml-3 h-5 w-5 flex-shrink-0 transform text-gray-900 transition-colors duration-150 ease-in-out group-hover:text-gray-900 dark:text-gray-100"
                                            viewBox="0 0 20 20" aria-hidden="true">
                                            <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                        </svg>
                                        <svg x-cloak x-show="ieltsWritingDropdownOpen"
                                            class="ml-3 h-5 w-5 flex-shrink-0 rotate-90 transform text-gray-900 transition-colors duration-150 ease-in-out group-hover:text-gray-900 dark:text-gray-100"
                                            viewBox="0 0 20 20" aria-hidden="true">
                                            <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                        </svg>
                                    </button>
                                    {{-- IELTS Writing Submenu --}}
                                    <div x-cloak x-show="ieltsWritingDropdownOpen" class="space-y-1"
                                        id="sub-menu-ielts-writing">
                                        <a href="{{ route('dashboard.exam-prep.ielts.writing.submit', ['locale' => session('locale', 'en')]) }}"
                                            class="@if (Route::is('dashboard.exam-prep.ielts.writing.submit*')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md py-2 pl-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                                            {{-- Icon for Feedback --}}
                                            <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                {{-- Your SVG Path for Feedback Icon --}}
                                            </svg>
                                            Writing Checker
                                        </a>

                                        <a href="{{ route('dashboard.exam-prep.ielts.writing.feedback.index', ['locale' => session('locale', 'en')]) }}"
                                            class="@if (Route::is('dashboard.exam-prep.ielts.writing.feedback*')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md py-2 pl-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                                            {{-- Icon for Feedback --}}
                                            <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                {{-- Your SVG Path for Feedback Icon --}}
                                            </svg>
                                            Writing Feedback
                                        </a>

                                        <a href="{{ route('dashboard.exam-prep.ielts.writing.practice.thesis', ['locale' => session('locale', 'en')]) }}"
                                            class="@if (Route::is('dashboard.exam-prep.ielts.writing.practice.thesis*')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md py-2 pl-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                                            <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                {{-- Your SVG Path for Corrections Icon --}}
                                            </svg>
                                            Thesis Statements
                                        </a>

                                        <a href="{{ route('dashboard.exam-prep.ielts.writing.practice.introduction', ['locale' => session('locale', 'en')]) }}"
                                            class="@if (Route::is('dashboard.exam-prep.ielts.writing.practice.introduction*')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md py-2 pl-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                                            <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                {{-- Your SVG Path for Corrections Icon --}}
                                            </svg>
                                            Introductions
                                        </a>

                                        <a href="{{ route('dashboard.exam-prep.ielts.writing.practice.task-two-outline', ['locale' => session('locale', 'en')]) }}"
                                            class="@if (Route::is('dashboard.exam-prep.ielts.writing.practice.task-two-outline*')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md py-2 pl-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                                            <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                {{-- Your SVG Path for Corrections Icon --}}
                                            </svg>
                                            Task 2 Outlines
                                        </a>

                                        <a href="{{ route('dashboard.exam-prep.ielts.writing.progress', ['locale' => session('locale', 'en')]) }}"
                                            class="@if (Route::is('dashboard.exam-prep.ielts.writing.progress*')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md py-2 pl-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                                            {{-- Icon for Corrections --}}
                                            <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                {{-- Your SVG Path for Corrections Icon --}}
                                            </svg>
                                            Score Progress
                                        </a>
                                    </div>
                                    <button @click="ieltsSpeakingDropdownOpen = !ieltsSpeakingDropdownOpen"
                                        type="button"
                                        class="unstyled group flex w-full items-center rounded-md px-2 py-2 text-left text-sm font-medium text-gray-900 hover:bg-gray-200 hover:text-gray-900 focus:outline-none dark:text-gray-100"
                                        aria-controls="sub-menu-essays" aria-expanded="false">
                                        <span class="ml-9 flex-1">Speaking</span>
                                        <svg x-show="!ieltsSpeakingDropdownOpen"
                                            class="ml-3 h-5 w-5 flex-shrink-0 transform text-gray-900 transition-colors duration-150 ease-in-out group-hover:text-gray-900 dark:text-gray-100"
                                            viewBox="0 0 20 20" aria-hidden="true">
                                            <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                        </svg>
                                        <svg x-cloak x-show="ieltsSpeakingDropdownOpen"
                                            class="ml-3 h-5 w-5 flex-shrink-0 rotate-90 transform text-gray-900 transition-colors duration-150 ease-in-out group-hover:text-gray-900 dark:text-gray-100"
                                            viewBox="0 0 20 20" aria-hidden="true">
                                            <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                        </svg>
                                    </button>
                                    {{-- IELTS Speaking Submenu --}}
                                    <div x-cloak x-show="ieltsSpeakingDropdownOpen" class="space-y-1"
                                        id="sub-menu-ielts-speaking">
                                        <a href="{{ route('dashboard.exam-prep.ielts.speaking.practice-tests.index', ['locale' => session('locale', 'en')]) }}"
                                            class="@if (Route::is('dashboard.exam-prep.ielts.speaking.practice-tests.index') ||
                                                    Route::is('dashboard.exam-prep.ielts.speaking.practice-tests.submit')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md py-2 pl-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                                            {{-- Icon for Feedback --}}
                                            <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                {{-- Your SVG Path for Feedback Icon --}}
                                            </svg>
                                            Practice Tests
                                        </a>
                                        <a href="{{ route('dashboard.exam-prep.ielts.speaking.practice-tests.feedback.index', ['locale' => session('locale', 'en')]) }}"
                                            class="@if (Route::is('dashboard.exam-prep.ielts.speaking.practice-tests.feedback*')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md py-2 pl-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                                            {{-- Icon for Feedback --}}
                                            <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                {{-- Your SVG Path for Feedback Icon --}}
                                            </svg>
                                            Feedback
                                        </a>
                                    </div>
                                </div>

                                <button @click="cambridgeCoachDropdownOpen = !cambridgeCoachDropdownOpen"
                                    type="button"
                                    class="unstyled group flex w-full items-center rounded-md px-2 py-2 text-left text-sm font-medium text-gray-900 hover:bg-gray-200 hover:text-gray-900 focus:outline-none dark:text-gray-100"
                                    aria-controls="sub-menu-cambridge" aria-expanded="false">
                                    {{-- Icon for Essays --}}
                                    {{-- <svg class="mr-3 flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                </svg> --}}
                                    <span class="ml-9 flex-1">Cambridge Coach</span>
                                    {{-- Dropdown Arrow --}}
                                    <svg x-show="!cambridgeCoachDropdownOpen"
                                        class="ml-3 h-5 w-5 flex-shrink-0 transform text-gray-900 transition-colors duration-150 ease-in-out group-hover:text-gray-900 dark:text-gray-100"
                                        viewBox="0 0 20 20" aria-hidden="true">
                                        <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                    </svg>
                                    <svg x-cloak x-show="cambridgeCoachDropdownOpen"
                                        class="ml-3 h-5 w-5 flex-shrink-0 rotate-90 transform text-gray-900 transition-colors duration-150 ease-in-out group-hover:text-gray-900 dark:text-gray-100"
                                        viewBox="0 0 20 20" aria-hidden="true">
                                        <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                    </svg>
                                </button>
                                <div x-cloak x-show="cambridgeCoachDropdownOpen" class="space-y-1"
                                    id="sub-menu-cambridge-writing">
                                    <button @click="cambridgeWritingDropdownOpen = !cambridgeWritingDropdownOpen"
                                        type="button"
                                        class="unstyled group flex w-full items-center rounded-md px-2 py-2 text-left text-sm font-medium text-gray-900 hover:bg-gray-200 hover:text-gray-900 focus:outline-none dark:text-gray-100"
                                        aria-controls="sub-menu-essays" aria-expanded="false">
                                        <span class="ml-9 flex-1">Writing</span>
                                        <svg x-show="!cambridgeWritingDropdownOpen"
                                            class="ml-3 h-5 w-5 flex-shrink-0 transform text-gray-900 transition-colors duration-150 ease-in-out group-hover:text-gray-900 dark:text-gray-100"
                                            viewBox="0 0 20 20" aria-hidden="true">
                                            <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                        </svg>
                                        <svg x-cloak x-show="cambridgeWritingDropdownOpen"
                                            class="ml-3 h-5 w-5 flex-shrink-0 rotate-90 transform text-gray-900 transition-colors duration-150 ease-in-out group-hover:text-gray-900 dark:text-gray-100"
                                            viewBox="0 0 20 20" aria-hidden="true">
                                            <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                        </svg>
                                    </button>
                                    {{-- Cambridge Writing Submenu --}}
                                    <div x-cloak x-show="cambridgeWritingDropdownOpen" class="space-y-1"
                                        id="sub-menu-cambridge-writing">                                                                    
                                        <a href="{{ route('dashboard.exam-prep.cambridge.writing.submit', ['locale' => session('locale', 'en')]) }}"
                                            class="@if (Route::is('dashboard.exam-prep.cambridge.writing.submit*')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md py-2 pl-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                                            {{-- Icon for Feedback --}}
                                            <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                {{-- Your SVG Path for Feedback Icon --}}
                                            </svg>
                                            Writing Checker
                                        </a>

                                        <a href="{{ route('dashboard.exam-prep.cambridge.writing.feedback.index', ['locale' => session('locale', 'en')]) }}"
                                            class="@if (Route::is('dashboard.exam-prep.cambridge.writing.feedback*')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md py-2 pl-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                                            {{-- Icon for Feedback --}}
                                            <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                {{-- Your SVG Path for Feedback Icon --}}
                                            </svg>
                                            Writing Feedback
                                        </a>

                                        <a href="{{ route('dashboard.exam-prep.cambridge.writing.progress', ['locale' => session('locale', 'en')]) }}"
                                            class="@if (Route::is('dashboard.exam-prep.cambridge.writing.progress*')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md py-2 pl-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                                            {{-- Icon for Corrections --}}
                                            <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                {{-- Your SVG Path for Corrections Icon --}}
                                            </svg>
                                            Score Progress
                                        </a>
                                    </div>
                                    <button @click="cambridgeSpeakingDropdownOpen = !cambridgeSpeakingDropdownOpen"
                                        type="button"
                                        class="unstyled group flex w-full items-center rounded-md px-2 py-2 text-left text-sm font-medium text-gray-900 hover:bg-gray-200 hover:text-gray-900 focus:outline-none dark:text-gray-100"
                                        aria-controls="sub-menu-essays" aria-expanded="false">
                                        <span class="ml-9 flex-1">Speaking</span>
                                        <svg x-show="!cambridgeSpeakingDropdownOpen"
                                            class="ml-3 h-5 w-5 flex-shrink-0 transform text-gray-900 transition-colors duration-150 ease-in-out group-hover:text-gray-900 dark:text-gray-100"
                                            viewBox="0 0 20 20" aria-hidden="true">
                                            <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                        </svg>
                                        <svg x-cloak x-show="cambridgeSpeakingDropdownOpen"
                                            class="ml-3 h-5 w-5 flex-shrink-0 rotate-90 transform text-gray-900 transition-colors duration-150 ease-in-out group-hover:text-gray-900 dark:text-gray-100"
                                            viewBox="0 0 20 20" aria-hidden="true">
                                            <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                        </svg>
                                    </button>
                                    {{-- Cambridge Speaking Submenu --}}
                                    <div x-cloak x-show="cambridgeSpeakingDropdownOpen" class="space-y-1"
                                        id="sub-menu-cambridge-speaking">
                                        <a href="{{ route('dashboard.exam-prep.cambridge.speaking.practice-tests.index', ['locale' => session('locale', 'en')]) }}"
                                            class="@if (Route::is('dashboard.exam-prep.cambridge.speaking.practice-tests.index') ||
                                                    Route::is('dashboard.exam-prep.cambridge.speaking.practice-tests.submit')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md py-2 pl-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                                            {{-- Icon for Feedback --}}
                                            <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                {{-- Your SVG Path for Feedback Icon --}}
                                            </svg>
                                            Practice Tests
                                        </a>
                                        <a href="{{ route('dashboard.exam-prep.cambridge.speaking.practice-tests.feedback.index', ['locale' => session('locale', 'en')]) }}"
                                            class="@if (Route::is('dashboard.exam-prep.cambridge.speaking.practice-tests.feedback*')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md py-2 pl-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                                            {{-- Icon for Feedback --}}
                                            <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                {{-- Your SVG Path for Feedback Icon --}}
                                            </svg>
                                            Feedback
                                        </a>
                                    </div>
                                </div>                                

                                <button @click="pearsonCoachDropdownOpen = !pearsonCoachDropdownOpen"
                                    type="button"
                                    class="unstyled group flex w-full items-center rounded-md px-2 py-2 text-left text-sm font-medium text-gray-900 hover:bg-gray-200 hover:text-gray-900 focus:outline-none dark:text-gray-100"
                                    aria-controls="sub-menu-essays" aria-expanded="false">
                                    <span class="ml-9 flex-1">Pearson Coach</span>
                                    <svg x-show="!pearsonCoachDropdownOpen"
                                        class="ml-3 h-5 w-5 flex-shrink-0 transform text-gray-900 transition-colors duration-150 ease-in-out group-hover:text-gray-900 dark:text-gray-100"
                                        viewBox="0 0 20 20" aria-hidden="true">
                                        <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                    </svg>
                                    <svg x-cloak x-show="pearsonCoachDropdownOpen"
                                        class="ml-3 h-5 w-5 flex-shrink-0 rotate-90 transform text-gray-900 transition-colors duration-150 ease-in-out group-hover:text-gray-900 dark:text-gray-100"
                                        viewBox="0 0 20 20" aria-hidden="true">
                                        <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                    </svg>
                                </button>
                                <div x-cloak x-show="pearsonCoachDropdownOpen" class="space-y-1" id="sub-menu-essays">
                                    <a href="{{ route('dashboard.exam-prep.pearson.writing.submit', ['locale' => session('locale', 'en')]) }}"
                                        class="@if (Route::is('dashboard.exam-prep.pearson.writing.submit*')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md py-2 pl-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                                        <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            {{-- Your SVG Path for Writing Checker Icon --}}
                                        </svg>
                                        Writing Checker
                                    </a>

                                    <a href="{{ route('dashboard.exam-prep.pearson.writing.feedback.index', ['locale' => session('locale', 'en')]) }}"
                                        class="@if (Route::is('dashboard.exam-prep.pearson.writing.feedback*')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md py-2 pl-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                                        <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            {{-- Your SVG Path for Writing Feedback Icon --}}
                                        </svg>
                                        Writing Feedback
                                    </a>

                                    <a href="{{ route('dashboard.exam-prep.pearson.writing.progress', ['locale' => session('locale', 'en')]) }}"
                                        class="@if (Route::is('dashboard.exam-prep.pearson.writing.progress*')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md py-2 pl-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                                        <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            {{-- Your SVG Path for Score Progress Icon --}}
                                        </svg>
                                        Score Progress
                                    </a>
                                </div>



                            </div>
                        </div>

                        <div class="space-y-1">
                            <button @click="coursesDropdownOpen = !coursesDropdownOpen" type="button"
                                class="unstyled group flex w-full items-center rounded-md px-2 py-2 text-left text-sm font-medium text-gray-900 hover:bg-gray-200 hover:text-gray-900 focus:outline-none dark:text-gray-100"
                                aria-controls="sub-menu-courses" aria-expanded="false">
                                {{-- Icon for courses --}}
                                <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                                </svg>
                                <span class="flex-1">Courses</span>
                                {{-- Dropdown Arrow --}}
                                <svg x-show="!coursesDropdownOpen"
                                    class="ml-3 h-5 w-5 flex-shrink-0 transform text-gray-900 transition-colors duration-150 ease-in-out group-hover:text-gray-900 dark:text-gray-100"
                                    viewBox="0 0 20 20" aria-hidden="true">
                                    <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                </svg>
                                <svg x-cloak x-show="coursesDropdownOpen"
                                    class="ml-3 h-5 w-5 flex-shrink-0 rotate-90 transform text-gray-900 transition-colors duration-150 ease-in-out group-hover:text-gray-900 dark:text-gray-100"
                                    viewBox="0 0 20 20" aria-hidden="true">
                                    <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                </svg>
                            </button>
                            {{-- Dropdown Links --}}
                            <div x-cloak x-show="coursesDropdownOpen" class="space-y-1" id="sub-menu-courses">
                                <a href="/{{ session('locale') ?? '' }}/dashboard/courses"
                                    class="@if (Route::is('dashboard.courses')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md py-2 pl-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                                    {{-- Icon for Feedback --}}
                                    <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        {{-- Your SVG Path for Feedback Icon --}}
                                    </svg>
                                    My Courses
                                </a>

                                <a href="/{{ session('locale') ?? '' }}/dashboard/registrations/create"
                                    class="@if (Route::is('dashboard.registrations.create*')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md py-2 pl-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                                    {{-- Icon for Feedback --}}
                                    <svg class="mr-3 h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        {{-- Your SVG Path for Feedback Icon --}}
                                    </svg>
                                    Register for a Course
                                </a>
                            </div>
                        </div>

                        {{-- <div class="space-y-1">
                            <!-- Current: "bg-gray-100 text-gray-900", Default: "bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
                            <button @click="quizzesDropdownOpen = !quizzesDropdownOpen" type="button" class="unstyled text-gray-900 text-left hover:text-gray-900 hover:bg-gray-200 group flex items-center px-2 py-2 text-sm font-medium rounded-md w-full focus:outline-none" aria-controls="sub-menu-5" aria-expanded="false">
                                <!-- Heroicon name: outline/question-mark-circle -->
                                <svg class="mr-3 flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="flex-1"> @lang('dashboard/index.quizzes') </span>
                                <!-- Expanded: "text-gray-400 rotate-90", Collapsed: "text-gray-300" -->
                                <svg x-show="!quizzesDropdownOpen" class="text-gray-900 ml-3 flex-shrink-0 h-5 w-5 transform group-hover:text-gray-900 transition-colors ease-in-out duration-150" viewBox="0 0 20 20" aria-hidden="true">
                                    <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                </svg>
                                <svg x-cloak x-show="quizzesDropdownOpen" class="text-gray-900 ml-3 flex-shrink-0 h-5 w-5 transform rotate-90 group-hover:text-gray-900 transition-colors ease-in-out duration-150" viewBox="0 0 20 20" aria-hidden="true">
                                    <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                                </svg>
                            </button>
                            <!-- Expandable link section, show/hide based on state. -->
                            <div x-cloak x-show="quizzesDropdownOpen" class="space-y-1" id="sub-menu-5">
                                <a href="/{{ session('locale') ?? '' }}/dashboard/quizzes" class="unstyled @if (request()->routeIs('dashboard.quizzes.index')) bg-teal-400 text-white @else text-gray-400 @endif hover:text-gray-900 hover:bg-gray-200 group flex items-center pl-11 py-2 text-sm font-medium rounded-md">
                                    <svg class="mr-3 flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Open </a>

                                <a href="/{{ session('locale') ?? '' }}/dashboard/quizzes/graded" class="unstyled @if (request()->routeIs('dashboard.quizzes.graded.index')) bg-teal-400 text-white @else text-gray-400 @endif hover:text-gray-900 hover:bg-gray-200 group flex items-center pl-11 py-2 text-sm font-medium rounded-md">
                                    <svg class="mr-3 flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Graded </a>
                            </div>
                        </div> --}}

                        <a href="/{{ session('locale') }}/dashboard/subscriptions"
                            class="@if (request()->is('/flashcards')) bg-teal-400 text-white @else text-gray-900 dark:text-gray-100 @endif group flex items-center rounded-md px-2 py-2 text-sm font-medium hover:bg-gray-200 hover:text-gray-900">
                            <!-- Subscription icon -->
                            <svg fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                class="mr-3 h-6 w-6 flex-shrink-0 rounded-full">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                            </svg>
                            Subscriptions
                        </a>

                    </nav>
                </div>
            </div>
        </div>

        <div class="flex min-h-screen flex-1 flex-col bg-gray-100 md:pl-64">
            <div class="sticky top-0 z-10 flex h-16 flex-shrink-0 bg-white dark:bg-gray-900 dark:text-gray-100">
                <button @click="showMobileMenu = true" type="button"
                    class="-ml-0.5 -mt-0.5 inline-flex h-12 w-12 items-center justify-center rounded-md text-gray-500 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-teal-500 md:hidden">
                    <span class="sr-only">Open sidebar</span>
                    <!-- Heroicon name: outline/menu -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <div class="flex flex-1 justify-between px-4">
                    <div class="flex flex-1">
                    </div>
                    <div class="ml-4 flex items-center md:ml-6">
                        <div class="mt-1">
                            <livewire:navbar-notifications />
                        </div>

                        <!-- Language Switcher -->
                        {{-- <div class="mt-3 ml-2 relative">
                            <a @click="languageMenuOpen = ! languageMenuOpen" class="inline-block" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="">
                                <svg class="h-5 w-5 text-xs font-medium text-gray-900 dark:text-gray-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129" />
                                </svg>
                            </a>
                            <div x-show="languageMenuOpen" class="origin-top-right absolute right-0 w-48 rounded-md shadow-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="language-menu-button" tabindex="-1">
                                @switch($locale)
                                    @case('en')
                                    <a class="unstyled block px-4 py-2 text-sm hover:bg-teal-400 hover:text-white" href="/nl-NL/{{$path}}">Nederlands</a>
                                    <a class="unstyled block px-4 py-2 text-sm hover:bg-teal-400 hover:text-white" href="/de-DE/{{$path}}">Deutsch</a>
                                    @break
                                    @case('en-NL')
                                    <a class="unstyled block px-4 py-2 text-sm hover:bg-teal-400 hover:text-white" href="/nl-NL/{{$path}}">Nederlands</a>
                                    <a class="unstyled block px-4 py-2 text-sm hover:bg-teal-400 hover:text-white" href="/de-DE/{{$path}}">Deutsch</a>
                                    @break
                                    @case('nl-NL')
                                    <a class="unstyled block px-4 py-2 text-sm hover:bg-teal-400 hover:text-white" href="/en-NL/{{$path}}">English</a>
                                    <a class="unstyled block px-4 py-2 text-sm hover:bg-teal-400 hover:text-white" href="/de-DE/{{$path}}">Deutsch</a>
                                    @break
                                    @case('de-DE')
                                    <a class="unstyled block px-4 py-2 text-sm hover:bg-teal-400 hover:text-white" href="/en-NL/{{$path}}">English</a>
                                    <a class="unstyled block px-4 py-2 text-sm hover:bg-teal-400 hover:text-white" href="/nl-NL/{{$path}}">Nederlands</a>
                                    @break
                                @endswitch
                            </div>
                        </div> --}}
                        <!-- End language switcher -->

                        <!-- Profile dropdown -->
                        <div class="relative ml-3">
                            <div>
                                <button @click="userMenuOpen = ! userMenuOpen" type="button"
                                    class="flexitems-center id= max-w-xs text-sm focus:outline-none"user-menu-button"
                                    aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    @if (Auth::user()->avatar)
                                        <img class="inline-block h-7 w-7 rounded-full"
                                            src="{{ Auth::user()->image }}" alt="">
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor"
                                            class="inline-block h-6 w-6 text-gray-900 dark:text-gray-100">
                                            <path fill-rule="evenodd"
                                                d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    @endif
                                </button>
                            </div>

                            <!--
                              Dropdown menu, show/hide based on menu state.

                              Entering: "transition ease-out duration-100"
                                From: "transform opacity-0 scale-95"
                                To: "transform opacity-100 scale-100"
                              Leaving: "transition ease-in duration-75"
                                From: "transform opacity-100 scale-100"
                                To: "transform opacity-0 scale-95"
                            -->
                            <div x-show="userMenuOpen"
                                class="absolute right-0 mt-2 w-48 origin-top-right rounded-md bg-white text-gray-900 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none dark:bg-gray-700"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                tabindex="-1">
                                <!-- Active: "bg-gray-100", Not Active: "" -->
                                {{--                                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a> --}}

                                {{--                                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a> --}}

                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"
                                    class="unstyled block rounded-lg px-4 py-3 text-sm font-bold text-gray-900 hover:bg-teal-500 hover:text-white dark:text-gray-100">
                                    @lang('dashboard/index.logout')
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-1 bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-100">
                <div class="p-2 sm:p-6 sm:pl-8">
                    <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
                        <h1 class="mb-4 mt-4 text-4xl font-semibold text-gray-900 dark:text-gray-100">
                            {{ $title ?? '' }}</h1>
                    </div>
                    <div class="mx-auto max-w-7xl px-4 text-gray-900 dark:text-gray-100 sm:px-6 md:px-8">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
