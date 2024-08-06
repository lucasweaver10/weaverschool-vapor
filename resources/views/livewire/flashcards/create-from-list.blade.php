<div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-6">
    <!-- Existing Flashcards List -->
    <div class="mb-8">
        <h2 class="text-xl text-gray-700 font-semibold mb-3">Current Flashcards</h2>
        <div class="text-gray-700">
            @if($flashcardSet->flashcards && count($flashcardSet->flashcards) > 0)
                <ul class="list-disc pl-5">
                    @foreach($flashcardSet->flashcards as $flashcard)
                        <li>{{ $flashcard->term }}: {{ $flashcard->definition }}</li>
                    @endforeach
                </ul>
            @else
                <p>No flashcards added yet.</p>
            @endif
        </div>
    </div>

    <!-- Divider -->
    <hr class="my-4">

    <!-- Textarea for New Flashcards -->
    <div>
        <h2 class="text-xl text-gray-700 font-semibold mb-3">Add New Flashcards</h2>
        <textarea class="form-textarea w-full rounded-md border-gray-300 py-2 px-4 focus:border-teal-500 focus:ring
        focus:ring-teal-200 text-gray-900" wire:model.live="flashcards" id="flashcards" rows="5"
                  placeholder="Word: Definition of the word."></textarea>
        @error('flashcards') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror

        <!-- Submission Button -->
        <div class="flex justify-start mt-4">
            <button wire:click="storeFlashcards" class="bg-teal-500 hover:bg-teal-600 text-white font-medium py-2 px-5
            rounded-full transition">
                Add
            </button>
        </div>
    </div>
</div>
