<div>
    <ul class="border border-gray-200 rounded-md divide-y divide-gray-200">
      <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
        <div class="w-0 flex-1 flex items-center">
          <input type="file" wire:model.live="uploads">
          <div wire:loading wire:target="uploads">Working...</div>
        </div>
        <div class="ml-4 flex-shrink-0">
          <a href="#" wire:click="store" class="text-blue-400 hover:text-blue-500 mt-2">Upload</a>
        </div>
      </li>
    </ul>
  <x-alerts.success>
  </x-alerts.success>
</div>
