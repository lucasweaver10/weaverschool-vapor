{{--<x-navbars.admin />--}}
@if(request()->routeIs('admin.*'))
    <div class="h-screen flex overflow-hidden bg-gray-100">
        <!-- Off-canvas menu for mobile -->
        <div class="md:hidden">
            <div class="fixed inset-0 flex z-40">
                <!--
                  Off-canvas menu overlay, show/hide based on off-canvas menu state.

                  Entering: "transition-opacity ease-linear duration-300"
                    From: "opacity-0"
                    To: "opacity-100"
                  Leaving: "transition-opacity ease-linear duration-300"
                    From: "opacity-100"
                    To: "opacity-0"
                -->
                <div class="fixed inset-0">
                    <div class="absolute inset-0 bg-gray-600 opacity-75"></div>
                </div>
                <!--
                  Off-canvas menu, show/hide based on off-canvas menu state.

                  Entering: "transition ease-in-out duration-300 transform"
                    From: "-translate-x-full"
                    To: "translate-x-0"
                  Leaving: "transition ease-in-out duration-300 transform"
                    From: "translate-x-0"
                    To: "-translate-x-full"
                -->
                <div class="relative flex-1 flex flex-col max-w-xs w-full bg-gray-800">
                    <div class="absolute top-0 right-0 -mr-14 p-1">
                        <button
                            class="flex items-center justify-center h-12 w-12 rounded-full focus:outline-none focus:bg-gray-600"
                            aria-label="Close sidebar">
                            <svg class="h-6 w-6 text-white" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                    <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
                        <div class="flex-shrink-0 flex items-center px-4">
                            <img class="h-8 w-auto" src="{{ config('app.logo_dark') }}"
                                 alt="Weaver School Logo">
                        </div>
                        <nav class="px-2">
                            <a href="/admin"
                               class="group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md text-white bg-gray-900 focus:outline-none focus:bg-gray-700 transition ease-in-out duration-150">
                                <svg
                                    class="mr-4 h-6 w-6 text-white-300 group-hover:text-white-300 group-focus:text-white-300 transition ease-in-out duration-150"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                </svg>
                                Dashboard
                            </a>
                            <a href="/team"
                               class="mt-1 group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md text-white hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition ease-in-out duration-150">
                                <svg
                                    class="mr-4 h-6 w-6 text-white-400 group-hover:text-white-300 group-focus:text-white-300 transition ease-in-out duration-150"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                                Team
                            </a>
                        </nav>
                    </div>
                    <div class="flex-shrink-0 flex bg-gray-700 p-4">
                        <a href="/logout" class="flex-shrink-0 group block">
                            <div class="flex items-center">
                                <div>
{{--                                    <img class="inline-block h-10 w-10 rounded-full"--}}
{{--                                         src=""--}}
{{--                                         alt="">--}}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-base leading-6 font-medium text-white">
{{--                                        {{ $user->name }}--}}
                                    </p>
                                    <p class="text-sm leading-5 font-medium text-white group-hover:text-white-300 transition ease-in-out duration-150">
                                        Log out
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="flex-shrink-0 w-14">
                    <!-- Force sidebar to shrink to fit close icon -->
                </div>
            </div>
        </div>

        <!-- Static sidebar for desktop -->
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64 bg-black">
                <div class="h-0 flex-1 flex flex-col py-4 overflow-y-auto">
                    <div class="flex mx-auto items-center flex-shrink-0 px-4">
                        <img class="w-36" src="{{ config('app.logo_dark') }}"
                             alt="Weaver School logo">
                    </div>
                    <!-- Sidebar component, swap this element with another sidebar if you like -->
                    <nav class="mt-5 flex-1 pl-3 pr-3 bg-black">
                        <x-desktop-nav-link route="/admin">
                            <svg
                                class="mr-3 h-6 w-6 {{Request::routeIs('home') ? 'text-white-300' : 'text-white-400'}} group-hover:text-white-300 group-focus:text-white-300 transition ease-in-out duration-150"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                            Dashboard
                        </x-desktop-nav-link>
                        <x-desktop-nav-link route="/admin/posts/create">
                            <svg
                                class="mr-3 h-6 w-6 {{Request::routeIs('/admin/posts/*') ? 'text-white-300' : 'text-white-400'}} group-hover:text-white-300 group-focus:text-white-300 transition ease-in-out duration-150"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z"/>
                            </svg>
                            Blog
                        </x-desktop-nav-link>
                        <x-desktop-nav-link route="/admin/users">
                            <svg
                                class="mr-3 h-6 w-6 {{Request::routeIs('team.index') ? 'text-white-300' : 'text-white-400'}} group-hover:text-white-300 group-focus:text-white-300 transition ease-in-out duration-150"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"/>
                            </svg>
                            Users
                        </x-desktop-nav-link>
                        <x-desktop-nav-link route="/admin/authors/index">
                            <svg
                                class="mr-3 h-6 w-6 {{Request::routeIs('team.index') ? 'text-white-300' : 'text-white-400'}} group-hover:text-white-300 group-focus:text-white-300 transition ease-in-out duration-150"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"/>
                            </svg>

                            Authors
                        </x-desktop-nav-link>
                        <x-desktop-nav-link route="/admin/flashcards/sets">
                            <svg
                                class="mr-3 h-6 w-6 {{Request::routeIs('flashcards*') ? 'text-white-300' : 'text-white-400'}} group-hover:text-white-300 group-focus:text-white-300 transition ease-in-out duration-150"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"/>
                            </svg>

                            Flashcards
                        </x-desktop-nav-link>
{{--                        <a href="/logout"--}}
{{--                           class="mt-1 group flex items-center px-2 py-2 text-sm leading-5 font-medium text-white rounded-md hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition ease-in-out duration-150">--}}
{{--                            <svg--}}
{{--                                class="mr-3 h-6 w-6 text-white-400 group-hover:text-white-300 group-focus:text-white-300 transition ease-in-out duration-150"--}}
{{--                                fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
{{--                                      d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>--}}
{{--                            </svg>--}}
{{--                            Logout--}}
{{--                        </a>--}}
                    </nav>
                </div>
                <div class="flex-shrink-0 flex bg-black p-4">
                    <a href="/logout" class="flex-shrink-0 w-full group block">
                        <div class="flex items-center">
                            <div>
{{--                                <img class="inline-block h-9 w-9 rounded-full"--}}
{{--                                     src=""--}}
{{--                                     alt="">--}}
                            </div>
                            <div class="ml-3">
                                <p class="text-sm leading-5 font-medium text-white">
{{--                                    {{$user->name}}--}}
                                </p>
                                <p class="text-xs leading-4 font-medium text-white group-hover:text-white transition ease-in-out duration-150">
                                    Log out
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="flex flex-col w-0 flex-1 overflow-hidden">
            <div class="md:hidden pl-1 pt-1 sm:pl-3 sm:pt-3">
                <button
                    class="-ml-0.5 -mt-0.5 h-12 w-12 inline-flex items-center justify-center rounded-md text-white hover:text-white focus:outline-none focus:bg-gray-200 transition ease-in-out duration-150"
                    aria-label="Open sidebar">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
            <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none" tabindex="0">

                @if(session()->has('impersonate'))
                    <div class="relative bg-red-600">
                        <div class="max-w-screen-xl mx-auto pt-3 pb-2 px-3 sm:px-6 lg:px-8">
                            <div class="pr-16 sm:text-center sm:px-16">
                                <p class="font-medium text-white">
                            <span class="md:hidden">
                                You are impersonating {{auth()->user()->first_name ?? ''}} {{auth()->user()->last_name ?? ''}}
                            </span>
                                    <span class="hidden md:inline">
                                You are impersonating {{auth()->user()->first_name ?? ''}} {{auth()->user()->last_name ?? ''}}
                            </span>
                                    <span class="block sm:ml-2 sm:inline-block">
                                <a href="{{route('leave-impersonation')}}" class="text-white font-bold underline">
                                    Leave Impersonation &rarr;
                                </a>
                            </span>
                                </p>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="pt-2 pb-6 md:py-6">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <h1 class="text-2xl font-semibold text-white">@yield('title')</h1>
                    </div>
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                        {{ $slot }}
                    </div>
                </div>
            </main>
        </div>
    </div>
@else
    <x-navbars.app />
    {{ $slot }}
@endif



