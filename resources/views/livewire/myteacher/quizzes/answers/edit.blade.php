<div x-data="{ text: @entangle('text').live, points: @entangle('points').live}">
    <div class="mb-4 flex">
        <input type="text" wire:model="text" class="w-2/5 shadow-sm mt-1 mr-4 sm:text-sm border border-gray-300 rounded-md" value="{{ $answer->text }}"></input>
        <input type="text" wire:model="points" id="pointValue" class="w-1/5 shadow-sm mt-1 sm:text-sm border border-gray-300 rounded-md" value="{{ $answer->point_value }}"></input>
        <button wire:click="updateAnswer({{$answer->id}})" class="btn btn-sm btn-light w-1/5 ml-4 mt-1">Update</button>
        <button wire:click="deleteAnswer({{$answer->id}})" class="btn btn-sm btn-dark w-1/5 mt-1 ml-4">Delete</button>
    </div>
    <x-alerts.success>
    </x-alerts.success>
</div>
