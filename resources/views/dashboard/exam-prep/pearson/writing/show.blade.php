<x-layouts.app>
    <x-slot name="title">
        Essay Feedback | {{ config('app.name') }}
    </x-slot>
    <x-dashboard.index>
        <x-slot name="title">
            Essay Feedback
        </x-slot>
        <div class="max-w-xl mx-auto mt-6 pb-1 bg-white shadow-lg rounded-lg overflow-visible">
            <div class="p-6">
                <div class="flex items-center border-b border-gray-200 pb-4">
                    <div class="flex-1">
                        <span class="text-2xl text-gray-700 font-bold mr-2">Topic:</span>
                        <span class="inline text-gray-800">{{ $essay->topic }}</span>
                    </div>
                </div>
                <div class="mt-8">
                    <h3 class="text-3xl text-gray-700 font-bold mb-2">AI Feedback:</h3>
                    @if($essay->score)<div class="text-xl text-teal-700 font-semibold mb-8">Your Score: {{ $essay->score }}</div>@endif
                    <div class="text-gray-600 text-xl prose prose-lg">
                        @if($essay->feedback){!! Str::of($essay->feedback)->markdown() !!}
                        @else Processing...
                        @endif                    
                    </div>
                </div>
            </div>
            {{-- <div class="px-6 flex mb-5 justify-end">
                <form action="/correct-ielts-essay/{{ $essay->id }}" method="post" x-data="{formSubmitted: false}">
                    @csrf
                    <button @click="formSubmitted = true" class="flex items-center bg-gray-100 hover:bg-gray-200 border border-1 border-gray-300 text-teal-700 text-base hover:text-teal-600 font-semibold py-2 px-4 rounded-lg">
                        <span class="flex" x-show="formSubmitted == false">Get Corrected Essay
                            <div x-data="{ tooltip: false }" class="relative ml-2 flex items-center">
                                <svg @mouseover="tooltip = true" @mouseleave="tooltip = false" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                                </svg>
                                <div x-show="tooltip" class="absolute bottom-full mb-5 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-base rounded py-1 px-4 w-80 z-50 shadow-lg">
                                    Get a fully corrected version of your essay including all of your mistakes with changes and explanations.
                                </div>
                            </div>
                        </span>

                        <span x-cloak x-show="formSubmitted == true" class="">
                            <img src="{{ asset('images/loading.gif') }}" alt="Loading" class="w-5 h-5">
                        </span>
                    </button>
                </form>
            </div> --}}
        </div>
        <div class="flex my-10">
            <div class="mx-auto space-x-8">
                <a class="text-teal-700 dark:text-teal-500 hover:text-teal-500 dark:hover:text-teal-300 font-bold mx-auto" href="{{ route('dashboard.exam-prep.pearson.writing.feedback.index', ['locale' => session('locale', 'en')])}}">Back to all essays</a>
                <a href="{{ route('dashboard.exam-prep.pearson.writing.submit', ['locale' => session('locale', 'en')])}}" class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded mt-4 mr-12">
                    Submit new essay
                </a>
            </div>
        </div>
    </x-dashboard.index>

</x-layouts.app>
