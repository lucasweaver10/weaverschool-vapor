@if(count($registrations) == 0)
    <div class="mt-5 grid grid-cols-1 gap-5 md:grid-cols-1 lg:grid-cols-1">
        <div class="text-center">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path d="M12 14l9-5-9-5-9 5 9 5z" />
                <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0
                00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083
                12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0
                01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">@lang('dashboard/welcome.no_active_courses')</h3>
            <p class="mt-1 text-sm text-gray-500">@lang('dashboard/welcome.get_started_register')</p>
            <div class="mt-6">
                <a href="https://meetings.hubspot.com/lucas56" target="_blank" type="button" class="inline-flex
                items-center px-4 py-3 border border-transparent shadow-sm text-sm text-gray-900 font-medium rounded-md
                hover:bg-gray-300 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">
                    <!-- Heroicon name: solid/plus -->
                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="-ml-1 mr-2 h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0
                        01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75
                        0 .375.375 0 01.75 0zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283
                        3.293.369V21l4.184-4.183a1.14 1.14 0 01.778-.332 48.294 48.294 0 005.83-.498c1.585-.233 2.708-1.626
                        2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373
                        3.746 2.25 5.14 2.25 6.741v6.018z" />
                    </svg>
                    @lang('dashboard/welcome.schedule_call_button')
                </a>
                <a href="/{{ session()->get('locale') ?? 'en' }}/dashboard/registrations/create" type="button" class="inline-flex
                items-center px-4 py-3 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-400
                hover:bg-blue-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400">
                    <!-- Heroicon name: solid/plus -->
                    <svg class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0
                        110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    @lang('dashboard/welcome.register_button')
                </a>
            </div>
        </div>
    </div>
@else

    @foreach($registrations as $registration)
        <livewire:dashboard.courses.show :registration="$registration" :wire:key="$registration->id" />
    @endforeach




{{--    <div class="mt-5 grid grid-cols-1 gap-5 md:grid-cols-3">--}}

{{--        <div class="bg-white overflow-hidden shadow rounded-lg">--}}
{{--            <div class="px-4 py-5 sm:p-6">--}}
{{--                <a href="/{{ session('locale') ?? 'en' }}/dashboard/assignments?status=open">--}}
{{--                    <div class="flex items-center">--}}
{{--                        <div class="flex-shrink-0 bg-blue-400 rounded-md p-3">--}}
{{--                            <svg class="h-6 w-6 text-white" viewBox="0 0 20 20" fill="currentColor">--}}
{{--                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />--}}
{{--                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2--}}
{{--                                2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0--}}
{{--                                100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"--}}
{{--                                      clip-rule="evenodd" />--}}
{{--                            </svg>--}}
{{--                        </div>--}}
{{--                        <div class="ml-5 w-0 flex-1">--}}
{{--                            <dl>--}}
{{--                                <dt class="text-sm leading-5 font-medium text-gray-500 truncate">--}}
{{--                                    @lang('dashboard/welcome.open_assignments')--}}
{{--                                </dt>--}}
{{--                                <dd class="flex items-baseline">--}}
{{--                                    <div class="text-2xl leading-8 font-semibold text-gray-900">--}}
{{--                                        {{ count($openAssignments) }}--}}
{{--                                    </div>--}}
{{--                                </dd>--}}
{{--                            </dl>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="bg-white overflow-hidden shadow rounded-lg">--}}
{{--            <div class="px-4 py-5 sm:p-6">--}}
{{--                <a href="/{{ session('locale') ?? 'en' }}/dashboard/assignments?status=graded">--}}
{{--                    <div class="flex items-center">--}}
{{--                        <div class="flex-shrink-0 bg-blue-400 rounded-md p-3">--}}
{{--                            <svg class="h-6 w-6 text-white" viewBox="0 0 20 20" fill="currentColor">--}}
{{--                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />--}}
{{--                            </svg>--}}
{{--                        </div>--}}
{{--                        <div class="ml-5 w-0 flex-1">--}}
{{--                            <dl>--}}
{{--                                <dt class="text-sm leading-5 font-medium text-gray-500 truncate">--}}
{{--                                    @lang('dashboard/welcome.graded_assignments')--}}
{{--                                </dt>--}}
{{--                                <dd class="flex items-baseline">--}}
{{--                                    <div class="text-2xl leading-8 font-semibold text-gray-900">--}}
{{--                                        {{ count($gradedAssignments) }}--}}
{{--                                    </div>--}}
{{--                                </dd>--}}
{{--                            </dl>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="bg-white overflow-hidden shadow rounded-lg">--}}
{{--            <div class="px-4 py-5 sm:p-6">--}}
{{--                <a href="/{{ session('locale') ?? 'en' }}/dashboard/quizzes">--}}
{{--                    <div class="flex items-center">--}}
{{--                        <div class="flex-shrink-0 bg-blue-400 rounded-md p-3">--}}
{{--                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">--}}
{{--                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />--}}
{{--                            </svg>--}}
{{--                        </div>--}}
{{--                        <div class="ml-5 w-0 flex-1">--}}
{{--                            <dl>--}}
{{--                                <dt class="text-sm leading-5 font-medium text-gray-500 truncate">--}}
{{--                                    @lang('dashboard/welcome.open_quizzes')--}}
{{--                                </dt>--}}
{{--                                <dd class="flex items-baseline">--}}
{{--                                    <div class="text-2xl leading-8 font-semibold text-gray-900">--}}
{{--                                        {{ count($openQuizzes) }}--}}
{{--                                    </div>--}}
{{--                                </dd>--}}
{{--                            </dl>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endif
