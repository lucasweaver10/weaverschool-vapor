<div>
    <label for="company-website" class="block text-sm font-medium text-gray-700">
        Score
    </label>
    <div class="mt-1 mb-4 flex rounded-md shadow-sm">
        <input type="text" wire:model.live="score" id="score" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1
            block w-full rounded-lg sm:text-sm border-gray-300" />
    </div>
    <label for="company-website" class="block text-sm font-medium text-gray-700">
        Feedback
    </label>
    <div class="mt-1 flex rounded-md shadow-sm">
        <textarea id="feedback" wire:model.live="feedback" rows="3" class="shadow-sm focus:ring-indigo-500
            focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="">
        </textarea>
    </div>
    <button wire:click="save" class="btn btn-primary float-right mt-3">Save</button>
</div>
