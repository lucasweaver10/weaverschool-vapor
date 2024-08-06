<div>
    @if(!auth()->user()->hasFlashcardsAccess())
        <!-- Free user study button -->
        <button @click="subscriptionOverlayVisible = true" class="py-2 px-4 bg-teal-500 hover:bg-teal-600 text-white font-bold rounded-lg">
            Add +
        </button>
    @else
        <!-- Study Button -->
        @if(!$this->isStudyingSet)
            <button wire:click="addSetToUser" class="py-1 px-3 bg-teal-500 hover:bg-teal-600 text-white font-medium rounded-lg">
                Add +
            </button>
        @else
            <button wire:click="removeSetFromUser" class="py-1 px-3 bg-red-500 hover:bg-red-600 text-white font-medium rounded-lg">
                Remove
            </button>
        @endif
    @endif
</div>
