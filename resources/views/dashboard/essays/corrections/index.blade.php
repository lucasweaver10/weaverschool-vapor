<x-layouts.app>
    <x-slot name="title">
        Corrected Essays | {{ config('app.name') }}
    </x-slot>
    <x-dashboard.index>
        <x-slot name="title">
            Corrected Essays
        </x-slot>
        <div class="max-w-lg mx-auto mt-6">
            <ul class="space-y-4">
                @foreach($corrections as $correction)
                    <li class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 ease-in-out">
                        <div class="p-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-12 w-12 rounded-full">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <a href="/{{ session('locale') }}/dashboard/essays/corrections/{{ $correction->id }}" class="text-lg font-semibold text-gray-900 hover:text-teal-500 transition-colors duration-300">
                                        {{ mb_substr($correction->essay->topic, 0, 40) ?? '' }}...
                                    </a>
                                    <p class="text-sm text-gray-500">{{ mb_substr(strip_tags($correction->content), 0, 80) ?? '' }}...</p>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="flex my-4">
            <a href="/{{ session('locale') }}/dashboard/essays/create" class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded mt-4 mx-auto">
                Submit new essay
            </a>
        </div>
    </x-dashboard.index>

</x-layouts.app>
