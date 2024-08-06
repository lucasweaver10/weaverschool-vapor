<x-layouts.app>
  <x-slot name="title">
      {{ $levelTest->name }} | The Weaver School
  </x-slot>
  <x-slot name="description">
      {{ $levelTest->description }}
  </x-slot>

<div class="container mb-5">
  <livewire:level-test :levelTest="$levelTest" wire:ignore.self />
</div>
</x-layouts.app>
