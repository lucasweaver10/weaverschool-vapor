
<tr>
    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
        <input wire:model.live="text" class="max-w-xl block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:max-w-xl sm:text-sm
        border-gray-300 rounded-md mr-2" type="text" name="text" id="text">
        @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
    </td>
    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
        <select id="vocabularyWord" wire:model.live="vocabularyWordIds"" class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6" multiple>
            @foreach($lesson->vocabularyWords as $word)
                <option value="{{ $word->id }}">{{ $word->word }}</option>
            @endforeach
        </select>
    </td>
    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
        <select id="grammarTopic" wire:model.live="grammarTopicIds" class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6" multiple>
            @foreach($lesson->grammarTopics as $topic)
                <option value="{{ $topic->id }}">{{ $topic->title }}</option>
            @endforeach
        </select>
    </td>
    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
        <select id="speakingTopic" wire:model.live="speakingTopicIds" class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6" multiple>
            @foreach($lesson->speakingTopics as $topic)
                <option value="{{ $topic->id }}">{{ $topic->title }}</option>
            @endforeach
        </select>
    </td>
    {{-- <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $example->speakingTopic->title ?? '' }}</td> --}}
    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
    <x-forms.submit-button livewireFunction="updateDiscussionQuestion({{ $question->id }})" text="Save" />
    </td>
    <x-alerts.success />
</tr>