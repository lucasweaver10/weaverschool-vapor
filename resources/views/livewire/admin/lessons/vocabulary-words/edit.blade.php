<div class="sm:flex sm:items-center mb-4">
    <div class="sm:max-w-xs mr-3">
        <input wire:model.live="word" class="max-w-lg block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:max-w-xs sm:text-sm
           border-gray-300 rounded-md" type="text" name="word" id="word">
        @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>
    <div class="w-full sm:max-w-xl">
        <input wire:model.live="definition" class="max-w-lg block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:max-w-xl sm:text-sm
           border-gray-300 rounded-md" type="text" name="definition" id="definition">
        @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>

    <x-forms.submit-button livewireFunction="updateVocabularyWord({{ $vocabularyWord->id }})" text="Save" />

    <x-alerts.success />
</div>
