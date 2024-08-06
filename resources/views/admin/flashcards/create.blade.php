<x-layouts.app>
    <div class="p-20">

        <div x-data="{editMode: false}">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2" for="title">
                    Flashcards
                </label>
                <div x-cloak x-show="editMode === false">
                    <!-- Livewire component for creating flashcards -->
                    <livewire:admin.flashcards.create :flashcardSet="$flashcardSet" class="mb-4"/>
                </div>
                <div x-show="editMode === true">
                    <div class="bg-white rounded-lg">
                        <label class="block text-gray-700 font-medium mb-2" for="title">
                        </label>
{{--                        @foreach($flashcards as $flashcard)--}}
{{--                            <div>--}}
{{--                                <livewire:admin.flashcards.edit :flashcardSet="$flashcardSet" :flashcard="$flashcard"/>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
                    </div>
                    <button @click="editMode = false" class="inline-flex justify-center py-2 px-4 ml-2 mt-4 border border-transparent
                        shadow-sm text-sm font-medium rounded-md text-white bg-red-500 hover:bg-red-700 focus:outline-none focus:ring-2
                        focus:ring-offset-2 focus:ring-red-500">
                        Stop Editing
                    </button>
                </div>
            </div>
        </div>

    </div>
    @if(session()->has('message'))
        <div class="bg-green-500 text-white p-3">
            {{ session()->get('message') }}
        </div>
    @endif
</x-layouts.app>
