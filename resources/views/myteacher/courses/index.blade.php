<x-layouts.app>
    <x-myteacher.index :regsitrations="$registrations">
        <x-slot name="title">
            Courses
        </x-slot>
        <div class="mt-5">
            @foreach($registrations as $registration)
                <div class="bg-white border border-2 border-gray-200 shadow-sm overflow-hidden sm:rounded-md mt-4">
                    <ul role="list" class="divide-y divide-gray-200 mb-0">
                        <li>
                            <a href="/myteacher/courses/{{ $registration->id }}"
                               class="block hover:bg-gray-50 unstyled">
                                <div class="flex items-center px-4 py-4 sm:px-6">
                                    <div class="min-w-0 flex-1 flex items-center">
                                        {{--                                        <div class="flex-shrink-0">--}}
                                        {{--                                            <img class="h-12 w-12 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">--}}
                                        {{--                                        </div>--}}
                                        <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                            <div>
                                                <p class="text-sm font-medium text-gray-700 truncate">{{ $registration->private_lessons_name ?? $registration->course_name }}
                                                    - {{ $registration->user->first_name . ' ' . $registration->user->last_name }}</p>
                                                <p class="mt-2 flex items-center text-sm text-gray-500">
                                                    <!-- Heroicon name: solid/mail -->
                                                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"
                                                         viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path
                                                            d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                                        <path
                                                            d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                                    </svg>
                                                    <span class="truncate">{{ $registration->user->email }}</span>
                                                </p>
                                            </div>
                                            <div class="hidden md:block">
                                                <div>
                                                    <p class="text-sm text-gray-700">
                                                        Registered on
                                                        <time
                                                            datetime="2020-01-07">{{ $registration->created_at->toFormattedDateString() }}</time>
                                                    </p>
                                                    <p class="mt-2 flex items-center text-sm text-gray-500">
                                                        <!-- Heroicon name: solid/clock -->
                                                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400"
                                                             viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                                                  clip-rule="evenodd"/>
                                                        </svg>
                                                        {{ $registration->hours_completed }}
                                                        /{{ $registration->total_hours }} hours completed
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <!-- Heroicon name: solid/chevron-right -->
                                        <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                             aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            @endforeach
        </div>
    </x-myteacher.index>
</x-layouts.app>
