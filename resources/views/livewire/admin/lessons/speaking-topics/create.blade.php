<div>
    <div class="mb-4">
        @if($lesson->speakingTopics)
            <ul>
                @foreach($lesson->speakingTopics as $topic)
                    <li>{{ $topic->title }}</li>
                @endforeach
            </ul>
        @endif
        <textarea wire:model.live="speaking_topics" class="border border-gray-400 p-2 w-full" id="speaking_topics"></textarea>
        @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>
    <div class="text-right">
        <x-forms.edit-button alpineFunction="editMode=true" text="Edit" />
        <x-forms.submit-button livewireFunction="storeSpeakingTopics" text="Add" />
{{--        <button wire:click="storeSpeakingTopics" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Add</button>--}}
    </div>
    <x-alerts.success />
</div>
