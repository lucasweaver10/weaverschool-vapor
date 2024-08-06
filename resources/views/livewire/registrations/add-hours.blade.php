<div x-show=" content === 'addHours' " class="bg-white shadow overflow-hidden sm:rounded-lg px-4">
    <div class="mt-4 mb-4">
        <h4>
          Add Hours
        </h4>
    </div>
    <div class="border-t border-gray-200">
      <dl>
        <div class="bg-white px-4 pt-2 pb-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="">
                Hours remaining
            </dt>
            <dd class="mt-1 sm:mt-0 sm:col-span-2">
                {{ $registration->total_hours - $registration->hours_completed }}
            </dd>
        </div>
        <div class="bg-white px-4 pt-2 pb-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="">
                Additional hours
            </dt>
            <dd class="mt-1 sm:mt-0 sm:col-span-2">
                <input type="text" class="form-control" wire:model.live="additionalHours">
            </dd>
        </div>
        <div class="bg-white px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <button class="btn btn-primary" wire:click.prevent="addHours">Add hours</button>
        </div>
      </dl>
    </div>
    <x-alerts.success>
    </x-alerts.success>
  </div>
