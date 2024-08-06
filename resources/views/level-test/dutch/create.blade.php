<x-layouts.app>
  <x-slot name="title">
    Free Dutch Level Test | The Weaver School
  </x-slot>
  <x-slot name="description">
    Take our free Dutch level test to determine your current Dutch level.
  </x-slot>

<div class="container mb-5">
  <livewire:level-test :questions="$questions" :levelTestId="$levelTestId" wire:ignore.self />
</div>
</x-layouts.app>
