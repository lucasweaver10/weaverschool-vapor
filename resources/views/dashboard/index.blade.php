<x-layouts.app>
    <x-slot name="title">
        Dashboard | {{ config('app.name') }}
    </x-slot>
    <x-dashboard.index :user="$user">
        <x-slot name="title">
            Dashboard
        </x-slot>        

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 p-4">
            <a href="/flashcards/sets" class="h-full">
                <div class="bg-teal-800 hover:bg-teal-500 text-white p-4 rounded-lg shadow-lg transform transition duration-500 hover:scale-105 h-full flex flex-col justify-between">
                    <div class="flex justify-between items-center">
                        <h3 class="font-bold text-xl">Flashcards</h3>
                        @if(count($user->flashcardSets) > 0)
                        <span class="bg-teal-500 rounded-full p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="text-teal-200 w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                        </span>
                        @else
                        <span class="bg-gray-400 rounded-full p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </span>
                        @endif
                    </div>
                    <p>Use AI to create flashcards from a topic, PDF, or YouTube Video.</p>
                </div>
            </a>

            <a href="/{{ session('locale') }}/my/learning-paths" class="h-full">
                <div class="bg-teal-800 hover:bg-teal-500 text-white p-4 rounded-lg shadow-lg transform transition duration-500 hover:scale-105 h-full flex flex-col justify-between">
                    <div class="flex justify-between items-center">
                        <h3 class="font-bold text-xl">Learning Paths</h3>
                        @if(count($user->learningPaths) > 0)
                        <span class="bg-teal-500 rounded-full p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="text-teal-200 w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                        </span>
                        @else
                        <span class="bg-gray-400 rounded-full p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </span>
                        @endif
                    </div>
                    <p>Fully customized language learning paths for any topic you choose.</p>
                </div>
            </a>

            <a href="/quick-notes" class="h-full">
                <div class="bg-teal-800 hover:bg-teal-500 text-white p-4 rounded-lg shadow-lg transform transition duration-500 hover:scale-105 h-full flex flex-col justify-between">
                    <div class="flex justify-between items-center">
                        <h3 class="font-bold text-xl">Quick Notes</h3>
                        @if(count($user->quickNotes) > 0)
                        <span class="bg-teal-500 rounded-full p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="text-teal-200 w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                        </span>
                        @else
                        <span class="bg-gray-400 rounded-full p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </span>
                        @endif
                    </div>
                    <p>Get explanations and flashcards for quick language questions.</p>
                </div>
            </a>

            {{-- <a href="/{{ session('locale') }}/dashboard/courses" class="h-full">
                <div class="bg-teal-800 hover:bg-teal-400 text-white p-4 rounded-lg shadow-lg transform transition duration-500 hover:scale-105 h-full flex flex-col justify-between">
                    <div class="flex justify-between items-center">
                        <h3 class="font-bold text-xl">Courses</h3>
                        @if(count($user->registrations) > 0)
                        <span class="bg-teal-500 rounded-full p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="text-teal-200 w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                        </span>
                        @else
                        <span class="bg-gray-400 rounded-full p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </span>
                        @endif
                    </div>
                    <p>Video courses for language learning.</p>
                </div>
            </a> --}}
        </div>

    
    </x-dashboard.index>
</x-layouts.app>
