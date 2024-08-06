<div>
  {{-- <label for="location" class="block text-sm font-medium leading-6 text-gray-900">Vocabulary Word</label> --}}
  <select id="vocabularyWord" wire:model='vocabularyWordId' class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
    @foreach($vocabularyWords as $word)
        <option value="{{ $word->id }}">{{ $word->word }}</option>
    @endforeach
  </select>
  <button wire:click='attachVocabularyWord' class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Attach</button>
  </div>

