<div x-data="{
    completed: @entangle('completed').live,
}">
    <button x-show="completed == 0" wire:click="complete" class="btn btn-primary mt-3">Mark complete</button>
</div>
