<div x-data="{ step: @entangle('step').live }" class="float-right">
    <button class="btn btn-lg btn-light" type="button" x-on:click="step--"><
    </button>
    <button class="btn btn-lg btn-light" type="button" wire:click="step++">></button>
</div>
