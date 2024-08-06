<x-layouts.app>
    <div class="p-20">
        <form class="rounded-lg" method="post" action="{{ route('lessons.update', $lesson->id) }}">
            @csrf
            @method('PUT')

            <x-forms.input label="Lesson Number" for="lesson_number" name="lesson_number" type="text" id="lesson_number" value="{{ $lesson->lesson_number }}"/>

            <x-forms.input label="Title" for="title" name="title" type="text" id="title" value="{{ $lesson->title }}"/>

            <x-forms.textarea label="Description" for="description" name="description" id="description" text="{{ $lesson->description }}"/>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2" for="course_id">
                    Course
                </label>
                <select class="border border-gray-400 p-2 w-full" name="course_id" id="course_id">
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}" {{ $lesson->course_id == $course->id ? 'selected' : '' }}>{{ $course->name }} ({{ $course->type }})</option>
                    @endforeach
                </select>
            </div>

            <div class="text-right">
                <x-forms.submit-button type="submit" text="Update" />
            </div>

        </form>

            <div x-data="{editMode: false}">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2" for="title">
                        Grammar Topics
                    </label>
                <!-- Livewire component for creating grammar_topics -->
                    <div x-show="editMode === false">
                        <livewire:admin.lessons.grammar-topics.create :lesson="$lesson" class="mb-4"/>
                    </div>
                    <div x-cloak x-show="editMode === true">
                        <div class="bg-white rounded-lg">
                            <label class="block text-gray-700 font-medium mb-2" for="title">

                            </label>
                            @foreach($lesson->grammarTopics as $topic)
                                <div>
                                    <livewire:admin.lessons.grammar-topics.edit :lesson="$lesson" :topic="$topic" class="mb-4"/>
                                </div>
                            @endforeach
                        </div>
                        <button @click="editMode = false" class="inline-flex justify-center py-2 px-4 ml-2 mt-4 border border-transparent
                            shadow-sm text-sm font-medium rounded-md text-white bg-red-500 hover:bg-red-700 focus:outline-none focus:ring-2
                            focus:ring-offset-2 focus:ring-red-500">
                            Stop Editing
                        </button>
                    </div>
                </div>
            </div>

        <div x-data="{editMode: false}">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2" for="title">
                    Speaking Topics
                </label>
                <div x-cloak x-show="editMode === false">
                    <!-- Livewire component for creating speaking_topics -->
                    <livewire:admin.lessons.speaking-topics.create :lesson="$lesson" class="mb-4"/>
                </div>
                <div x-cloak x-show="editMode === true">
                    <div class="bg-white rounded-lg">
                        <label class="block text-gray-700 font-medium mb-2" for="title">

                        </label>
                        @foreach($lesson->speakingTopics as $topic)
                            <div>
                                <livewire:admin.lessons.speaking-topics.edit :lesson="$lesson" :topic="$topic" wire:key="{{ $index }}"/>
                            </div>
                        @endforeach
                    </div>
                    <button @click.prevent="editMode = false" class="inline-flex justify-center py-2 px-4 ml-2 mt-4 border border-transparent
                        shadow-sm text-sm font-medium rounded-md text-white bg-red-500 hover:bg-red-700 focus:outline-none focus:ring-2
                        focus:ring-offset-2 focus:ring-red-500">
                        Stop Editing
                    </button>
                </div>
            </div>
        </div>

            <div x-data="{editMode: false}">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2" for="title">
                        Vocabulary Words
                    </label>
                    <div x-cloak x-show="editMode === false">
                        <!-- Livewire component for creating vocabulary_words -->
                        <livewire:admin.lessons.vocabulary-words.create :lesson="$lesson" class="mb-4"/>
                    </div>
                    <div x-show="editMode === true">
                        <div class="bg-white rounded-lg">
                            <label class="block text-gray-700 font-medium mb-2" for="title">

                            </label>
                            @foreach($lesson->vocabularyWords as $vocabularyWord)
                                <div>
                                    <livewire:admin.lessons.vocabulary-words.edit :lesson="$lesson" :vocabularyWord="$vocabularyWord"/>
                                </div>
                            @endforeach
                        </div>
                        <button @click="editMode = false" class="inline-flex justify-center py-2 px-4 ml-2 mt-4 border border-transparent
                        shadow-sm text-sm font-medium rounded-md text-white bg-red-500 hover:bg-red-700 focus:outline-none focus:ring-2
                        focus:ring-offset-2 focus:ring-red-500">
                            Stop Editing
                        </button>
                    </div>
                </div>
            </div>

            <a href="{{ route('written-examples.index', $lesson->id) }}" class="inline-flex justify-center py-2 px-4 border border-transparent
                shadow-sm text-sm font-medium rounded-md text-white bg-gray-500 hover:bg-gray-700 focus:outline-none focus:ring-2
                focus:ring-offset-2 focus:ring-gray-500">
                View Written Examples
            </a>

            <a href="{{ route('discussion-questions.index', $lesson->id) }}" class="inline-flex justify-center py-2 px-4 border border-transparent
                shadow-sm text-sm font-medium rounded-md text-white bg-gray-500 hover:bg-gray-700 focus:outline-none focus:ring-2
                focus:ring-offset-2 focus:ring-gray-500">
                View Discussion Questions
            </a>        
            
    </div>
    @if(session()->has('message'))
        <div class="bg-green-500 text-white p-3">
            {{ session()->get('message') }}
        </div>
    @endif
</x-layouts.app>
