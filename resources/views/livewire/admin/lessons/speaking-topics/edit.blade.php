<div class="sm:flex sm:items-center mb-4">
    <div class="w-full sm:max-w-xs">
        <input wire:model.live="title" class="max-w-lg block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:max-w-xs sm:text-sm
           border-gray-300 rounded-md" type="text" name="title" id="title">
        @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>

    <x-forms.submit-button livewireFunction="updateSpeakingTopic({{ $topic->id }})" text="Save" />

    <x-alerts.success />
</div>
