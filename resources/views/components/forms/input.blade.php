<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2" for="{{ $for }}">
        {{ $label }}
    </label>
    <input
            {{ $wireModel ? 'wire:model=' . $wireModel : '' }}
           {{ $xModel ? 'x-model=' . $xModel : '' }}
           class="max-w-lg block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:max-w-xs sm:text-lg
           border-gray-300 rounded-md"
           type="{{ $type }}"
           name="{{ $name }}"
           id="{{ $id }}"
           value="{{ $value }}">
</div>
