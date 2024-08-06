<div>
    <div class="px-8 py-5 mt-8 mb-12 w-full lg:w-1/2 bg-white text-gray-900 shadow rounded-lg overflow-hidden">
        <div class="mt-2 mb-4">
            <h4 class="text-2xl text-center font-bold mb-5">Complete your profile</h4>
            <p class="mb-4">Please enter your first and last name as you wish it to appear on course registrations and payment receipts.</p>
            <div>
                @if($user->first_name == null)
                    <x-label for="first_name" :value="__('First Name')" />
                    <x-input id="first_name" class="block mt-1 w-full" type="text" wire:model="firstName" :value="old('first_name')" required autofocus />
                @endif
            </div>
            <div class="mt-4">
                @if($user->last_name == null)
                    <x-label for="last_name" :value="__('Last Name')" />
                    <x-input id="last_name" class="block mt-1 w-full" type="text" wire:model="lastName" :value="old('last_name')" required/>
                @endif
            </div>
            <button class="btn bg-teal-400 hover:bg-teal-700 rounded-lg text-white px-5 py-2 text-medium font-medium mt-4" wire:click="save">Save</button>
        </div>
</div>
