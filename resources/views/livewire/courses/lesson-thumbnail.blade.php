<div class="flex grid grid-cols-4 mb-4 mr-4">
    <div class="col-span-3">
        <div class="text-lg font-semibold leading-7 text-gray-900 mr-5 md:mr-2">{{ $lesson->title }}</div>
        <div class="text-base text-gray-600 mb-4 mr-5 md:mr-2">{{ $lesson->description }}</div>
    </div>
    <div class="col-span-1">
        <div x-data="{ loadThumbnail: false, thumbnailUrl: @entangle('thumbnailUrl').live }" x-init="() => { $watch('loadThumbnail', value => { if (value) { @this.call('loadThumbnail'); } }) }" x-intersect.once="loadThumbnail = true">
            <template x-if="loadThumbnail">
                <img x-bind:src="thumbnailUrl" alt="Thumbnail for {{ $lesson->title }}" class="mt-2 rounded-md shadow-md w-32" wire:ignore.self />
            </template>
        </div>
    </div>
</div>
