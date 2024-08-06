<div class="mb-4 flex">
    <div class="flex w-full">
        <input type="text" id="answerText" wire:model.live="answerText" value="" class="w-3/5 shadow-sm mt-1 mr-4 sm:text-sm border border-gray-300 rounded-md" placeholder="Answer option"></input>
            @error('answerText') <span class="error">{{ $message }}</span> @enderror
        <input type="text" id="pointValue" wire:model.live="pointValue" value="" class="w-1/5 shadow-sm mt-1 sm:text-sm border border-gray-300 rounded-md" placeholder="Point value"></input>
            @error('pointValue') <span class="error">{{ $message }}</span> @enderror
        <button @click="answerEditing = true" wire:click="saveAnswerChoice" class="btn btn-sm btn-light w-1/5 ml-4 my-1">Save</button>
    </div>
</div>
