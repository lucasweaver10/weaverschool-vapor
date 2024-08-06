<x-layouts.app>
    <x-myteacher.index title="Students">
        <div class="mt-5">
            @foreach($registrations as $registration)
                <div class="bg-white border border-2 border-gray-200 shadow-sm overflow-hidden sm:rounded-md mt-4">
                    <ul role="list" class="divide-y divide-gray-200 mb-0">
                        <li>
                            <a href="/myteacher/courses/{{ $registration->id }}" class="block hover:bg-gray-50 unstyled">
                                <div class="flex items-center px-4 py-4 sm:px-6">
                                    <div class="min-w-0 flex-1 flex items-center">
                                        <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                            <div>
                                                <p class="text-sm font-medium text-gray-700 truncate">{{ $registration->user->first_name . ' ' . $registration->user->last_name }}</p>
                                                <p class="mt-2 flex items-center text-sm text-gray-500">
                                                    <!-- Heroicon name: solid/mail -->
                                                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                                    </svg>
                                                    <span class="truncate">{{ $registration->user->email }}</span>
                                                </p>
                                            </div>
                                            <div class="hidden md:block">
                                                <div>
                                                    <p class="text-sm text-gray-700">
                                                        Registered on
                                                        <time datetime="2020-01-07">{{ $registration->created_at->toFormattedDateString() }}</time>
                                                    </p>
                                                    <p class="mt-2 flex items-center text-sm text-gray-500">
                                                        @if($registration->user->level_test_score)
                                                            <!-- Heroicon name: solid/check-circle -->
                                                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                            </svg>
                                                        @else
                                                            <!-- Heroicon name: solid/x-circle -->
                                                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                                            </svg>
                                                        @endif
                                                        Completed level test
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <!-- Heroicon name: solid/chevron-right -->
                                        <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
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
