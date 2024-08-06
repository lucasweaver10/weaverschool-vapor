<div x-data="{ editMode: false }" x-init="$watch('editMode', value => { if (value) Livewire.dispatch('startEditing') })">
    <div class="mb-4">
        <label for="number" class="block text-sm font-medium leading-6 text-gray-900">Question Number</label>
        <input id="number" type="text" wire:model="number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Number">
        @error('number') <span class="error text-red-500">{{ $message }}</span> @enderror
    </div>

    <div class="mb-4">
        <label for="hint" class="block text-sm font-medium leading-6 text-gray-900">Hint</label>
        <input id="hint" type="text" wire:model="hint" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Hint">
        @error('hint') <span class="error text-red-500">{{ $message }}</span> @enderror
    </div>

    <div class="mb-4">
        <label for="text" class="block text-sm font-medium leading-6 text-gray-900">Question Text</label>
        <textarea id="text" wire:model="text" class="w-full shadow-sm mt-1 block border border-gray-300 rounded-md" placeholder="Question"></textarea>
        @error('text') <span class="error text-red-500">{{ $message }}</span> @enderror
    </div>

    <div class="mb-4">
        <label for="correct_answer" class="block text-sm font-medium leading-6 text-gray-900">Correct Answer</label>
        <input id="correct_answer" type="text" wire:model="correct_answer" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Correct Answer">
        @error('correct_answer') <span class="error text-red-500">{{ $message }}</span> @enderror
    </div>

    <div class="mb-4">
        <label for="explanation" class="block text-sm font-medium leading-6 text-gray-900">Explanation</label>
        <textarea id="explanation" wire:model="explanation" class="w-full shadow-sm mt-1 block border border-gray-300 rounded-md" placeholder="Explanation"></textarea>
        @error('explanation') <span class="error text-red-500">{{ $message }}</span> @enderror
    </div>

    <div class="flex justify-end">
        <button wire:click="saveQuestion" class="btn btn-primary float-right bg-teal-400 p-3 rounded-lg">Save Question</button>
    </div>
</div>
