<x-layouts.app>
    <x-dashboard.index :user="$user">
        <x-slot name="title">
            Quizzes
        </x-slot>
        @if(count($user->quizAssignments->where('completed_at', null)) < 1)
           <div class="">
               No open quizzes.
           </div>
        @endif
        @foreach($user->quizAssignments as $quizAssignment)
            @if ($quizAssignment->completed_at == null)
            <div class="bg-white border border-2 border-gray-200 shadow-sm overflow-hidden sm:rounded-md mt-4">
                <ul role="list" class="divide-y divide-gray-200 mb-0">
                        <li>
                            <a href="/{{ session('locale') ?? 'en' }}/dashboard/quizzes/{{ $quizAssignment->quiz->id ?? '' }}?assignmentId={{ $quizAssignment->id ?? '' }}" class="block hover:bg-gray-50 unstyled">
                                <div class="flex items-center px-4 py-4 sm:px-6">
                                    <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                        <div>
                                            <div class="text-md font-medium truncate">{{ $quizAssignment->quiz->name ?? '' }}</div>
                                            <div class="text-sm">
                                                Due
                                                <time
                                                    datetime="2020-01-07">{{ $quizAssignment->due_at->toFormattedDateString() }}</time>
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
            @endif
        @endforeach
    </x-dashboard.index>
    <x-alerts.success >
    </x-alerts.success>
</x-layouts.app>
