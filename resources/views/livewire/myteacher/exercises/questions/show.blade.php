 <div x-data="{ editMode: @entangle('editMode').live }">
    <div x-show="!editMode">
        <span class="font-semibold">{{ $number }}. {{ $text }}</span>
        <div class="text-gray-600">
            <strong>Correct Answer:</strong> {{ $correct_answer }}<br>
            <strong>Hint:</strong> {{ $hint }}<br>
            <strong>Explanation:</strong> {{ $explanation }}
        </div>

        <button @click="editMode = true" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">Edit</button>
    </div>

    <div x-show="editMode" x-cloak>
        <form class="space-y-4">
            <input type="text" wire:model="number" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600" placeholder="Number">
            <textarea wire:model="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600" placeholder="Question Text"></textarea>
            <input type="text" wire:model="correct_answer" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600" placeholder="Correct Answer">
            <input type="text" wire:model="hint" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600" placeholder="Hint">
            <textarea wire:model="explanation" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600" placeholder="Explanation"></textarea>

            <div class="flex justify-end space-x-2">
                <button wire:click.prevent="saveQuestion" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save Changes</button>
                <button @click="editMode = false" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded">Cancel</button>
            </div>
        </form>
    </div>

    <x-alerts.success />
 </div>
