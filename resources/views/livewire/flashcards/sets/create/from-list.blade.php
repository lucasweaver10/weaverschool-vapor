<div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-6">
    <!-- Textarea for New Flashcards -->
    <div>    
        <div class="w-full mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-1" for="title">
                Set Name
            </label>
            <input wire:model="setTitle" class="form-input w-full rounded-md border-gray-300 py-2 px-4 my-2 focus:border-teal-500
            focus:ring focus:ring-teal-200 text-gray-900" id="type" placeholder="Enter a name for your flashcard set">                    
            @error('setTitle')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="w-full my-4">
            <label class="block text-gray-700 text-sm font-bold mb-1" for="description">
                Set Description
            </label>
            <input wire:model="setDescription" class="form-input w-full rounded-md border-gray-300 py-2 px-4 my-2 focus:border-teal-500
            focus:ring focus:ring-teal-200 text-gray-900" id="description" placeholder="Enter a description"> 
            @error('setDescription')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror                                  
        </div>

        <div class="w-full my-4">
            <label class="block text-gray-700 text-sm font-bold mb-1" for="description">
                Flashcards
            </label>
            <textarea class="form-textarea w-full rounded-md border-gray-300 py-2 px-4 focus:border-teal-500 focus:ring
            focus:ring-teal-200 text-gray-900" wire:model.live="flashcards" id="flashcards" rows="5"
                    placeholder="Word: Definition of the word."></textarea>
            @error('flashcards') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Submission Button -->
        <div class="flex justify-start mt-4">
            <button wire:click="storeFlashcards" class="bg-teal-500 hover:bg-teal-600 text-white font-medium py-2 px-5
            rounded-md transition">
                Add
            </button>
        </div>
    </div>
</div>
