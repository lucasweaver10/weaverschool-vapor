<x-layouts.app>
    <x-slot name="title">
        Speaking Practice Test Submissions | {{ config('app.name') }}
    </x-slot>
    <x-dashboard.index>
        <x-slot name="title">
            Speaking Practice Test Submissions
        </x-slot>
        <div class="max-w-lg mx-auto mt-6">
            <ul class="space-y-4">
                @foreach($submissions as $submission)
                    <li class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 ease-in-out">
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-xs font-medium text-teal-700 bg-gray-200 px-2 py-1 rounded">{{ $submission->exam }}</span>
                                {{-- @if($essay->score)<span class="text-xs font-medium text-teal-700 bg-gray-200 px-2 py-1 rounded">{{ $submission->score }}</span>@endif --}}
                            </div>
                            <div class="flex items-center">
                                <div class="flex-shrink-0">                                    
                                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-12 w-12 rounded-full">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 0 1 9 9v.375M10.125 2.25A3.375 3.375 0 0 1 13.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 0 1 3.375 3.375M9 15l2.25 2.25L15 12" />
                                    </svg>

                                </div>
                                <div class="ml-4">                                
                                    <a href="{{ route('dashboard.exam-prep.ielts.speaking.practice-tests.feedback.show', ['locale' => session('locale', 'en'), 'id' => $submission->id]) }}" class="text-2xl font-semibold text-gray-900 hover:text-teal-500 transition-colors duration-300">
                                        {{ $submission->test->title ?? '' }}
                                    </a>
                                    <div class="text-gray-700 dark:text-gray-700 text-base mb-2">
                                        <div class="flex">{{ $submission->test->description  ?? '' }}</div>
                                    </div>
                                    <div class="text-gray-700 dark:text-gray-700 text-xs">
                                        <div class="flex">{{ $submission->created_at  ?? '' }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="flex my-4">
            <a href="{{ route('dashboard.exam-prep.ielts.speaking.practice-tests.index', ['locale' => session('locale', 'en')])}}" class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded mt-4 mx-auto">
                Take Practice Exam
            </a>
        </div>
    </x-dashboard.index>

</x-layouts.app>
