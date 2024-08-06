<x-layouts.app>
    <x-slot name="title">
        Essay Feedback | {{ config('app.name') }}
    </x-slot>
    <x-dashboard.index>
        <x-slot name="title">
            Essay Feedback
        </x-slot>
        <div x-data="{ activeTab: 'overview' }">
        <div class="mt-8 mb-8">
            <div class="sm:hidden">
                <label for="tabs" class="sr-only">Select a tab</label>
                <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
                <select wire:model='activeTab' id="tabs" name="tabs" class="block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                <option selected value="overview">Overview</option>
                <option value="sentence-structure">Sentence Structure</option>
                <option value="vocabulary">Vocabulary</option>
                <option value="transitions">Transitions</option>
                <option value="argument">Argument</option>
                </select>
            </div>
            <div class="hidden sm:block text-gray-700 hover:text-gray-900 dark:text-gray-100 dark:hover:text-gray-300 text-md">
                <nav class="flex space-x-4" aria-label="Tabs">
                <!-- Current: "bg-indigo-100 text-indigo-700", Default: "text-gray-500 hover:text-gray-700" -->
                <button @click="activeTab = 'overview' " class="rounded-md px-3 py-2 font-medium" :class="activeTab === 'overview' ? 'bg-teal-600 text-teal-100' : '' ">Overview</button>
                <button @click="activeTab = 'sentence-structure' " class="rounded-md px-3 py-2 font-medium" :class="activeTab === 'sentence-structure' ? 'bg-teal-600 text-teal-100' : '' ">Sentence Structure</button>
                <button @click="activeTab = 'vocabulary' " class="rounded-md px-3 py-2 font-medium" :class="activeTab === 'vocabulary' ? 'bg-teal-600 text-teal-100' : '' ">Vocabulary</button>
                <button @click="activeTab = 'transitions' " class="rounded-md px-3 py-2 font-medium" :class="activeTab === 'transitions' ? 'bg-teal-600 text-teal-100' : '' ">Transitions</button>
                <button @click="activeTab = 'argument' " class="rounded-md px-3 py-2 font-medium" :class="activeTab === 'argument' ? 'bg-teal-600 text-teal-100' : '' ">Argument</button>
                </nav>
            </div>
        </div>
        <div x-cloak x-show="activeTab === 'overview' " class="max-w-4xl mx-auto mt-6 pb-1 bg-white shadow-lg rounded-lg overflow-visible">
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
        </div>
        <div x-cloak x-show="activeTab === 'sentence-structure' " class="max-w-4xl mx-auto mt-6 p-8 bg-white shadow-lg rounded-lg overflow-visible">
            <div class="text-4xl text-gray-700 font-bold mr-2 mb-8">Sentence Structure</div>
            <!-- Band 7 Section -->
            <div class="mb-6">
                <div class="text-gray-700 font-bold mb-4">Benchmark for C1</div>
                <div class="flex text-sm justify-between text-gray-700">
                    <span>🔵 Simple: 20-30%</span>
                    <span>🟠 Compound: 20-30%</span>
                    <span>🟢 Complex: 35-45%</span>
                    <span>🟣 Compound-complex: 5-15%</span>
                </div>
            </div>

            <!-- Band 8 Section -->
            <div class="mb-12">
                <div class="text-gray-700 font-bold mb-4">Benchmark for C2:</div>
                <div class="flex text-sm justify-between text-gray-700">
                    <span>🔵 Simple: 15-25%</span>
                    <span>🟠 Compound: 20-30%</span>
                    <span>🟢 Complex: 35-45%</span>
                    <span>🟣 Compound-complex: 10-20%</span>
                </div>
            </div>
                        
            <div class="prose prose-lg mt-4 text-gray-700">
                @if($essay->sentence_structure_feedback){!! Str::of($essay->sentence_structure_feedback)->markdown() !!}
                @else Processing... (try refreshing the page)
                @endif                   
            </div>
        </div>
        <div x-cloak x-show="activeTab === 'vocabulary' " class="max-w-4xl mx-auto mt-6 p-8 bg-white shadow-lg rounded-lg overflow-visible">
            <div class="text-4xl text-gray-700 font-bold mr-2 mb-8">Vocabulary</div>
            <!-- Band 8 Section -->
            <div class="mb-12">
                <div class="text-gray-700 font-bold mb-2">Benchmark Percentages of a C1 Essay:</div>
                <div class="flex text-sm justify-between text-gray-700">                    
                    <span>🔵 C2 (Proficiency): 5-10%</span>
                    <span>🟠 C1 (Advanced): 25-30%</span>
                    <span>🟢 B2 (Upper-Intermediate): 30-35%</span>
                    <span>🔴 B1 (Intermediate): 15-20%</span>
                </div>
            </div>
            <div class="prose prose-lg mt-4 text-gray-700">
                @if($essay->vocabulary_feedback){!! Str::of($essay->vocabulary_feedback)->markdown() !!}
                @else Processing... (try refreshing the page)
                @endif                   
            </div>
        </div>
        <div x-cloak x-show="activeTab === 'transitions' " class="max-w-3xl mx-auto mt-6 p-6 bg-white shadow-lg rounded-lg overflow-visible">
            <div class="text-4xl text-gray-700 font-bold mr-2 mb-8">Transitions</div>
            <div class="prose prose-lg mt-4 text-gray-700">
                @if($essay->transitions_feedback){!! Str::of($essay->transitions_feedback)->markdown() !!}
                @else Processing... (try refreshing the page)
                @endif                   
            </div>
        </div>
        <div x-cloak x-show="activeTab === 'argument' " class="max-w-3xl mx-auto mt-6 p-6 bg-white shadow-lg rounded-lg overflow-visible">
            <div class="text-4xl text-gray-700 font-bold mr-2 mb-8">Argument</div>
            <div class="prose prose-lg text-gray-700 mt-4">
                @if($essay->argument_feedback){!! Str::of($essay->argument_feedback)->markdown() !!}
                @else Processing... (try refreshing the page)
                @endif                   
            </div>
        </div>
        <div class="flex my-10">
            <div class="mx-auto space-x-8">
                <a class="text-teal-700 dark:text-teal-500 hover:text-teal-500 dark:hover:text-teal-300 font-bold mx-auto" href="{{ route('dashboard.exam-prep.cambridge.writing.feedback.index', ['locale' => session('locale', 'en')])}}">Back to all essays</a>
                <a href="{{ route('dashboard.exam-prep.cambridge.writing.submit', ['locale' => session('locale', 'en')])}}" class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded mt-4 mr-12">
                    Submit new essay
                </a>
            </div>
        </div>
    </x-dashboard.index>

</x-layouts.app>
