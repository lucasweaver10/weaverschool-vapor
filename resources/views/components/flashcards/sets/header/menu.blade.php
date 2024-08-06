<div x-cloak x-show="mobileActionButtonOpen" @click.away="mobileActionButtonOpen = false" class="absolute w-auto min-w-max bg-white space-y-4 shadow-lg rounded-lg p-4 mt-2 z-10" style="left: 0; right: 0; min-width: 200px; max-width: 100vw;">
    <a href="/flashcards/sets/{{ $flashcardSetId }}/edit" class="block text-teal-700 hover:text-teal-900 hover:font-bold">Edit Set</a>
    <a href="/flashcards/sets" class="block text-teal-700 hover:text-teal-900 hover:font-bold">Back to Sets</a>
    <a href="/flashcards/{{ $flashcardSetId }}/create/list" class="block text-teal-700 hover:text-teal-900 hover:font-bold">Add from List</a>
    <a href="/flashcards/{{ $flashcardSetId }}/create/file" class="block text-teal-700 hover:text-teal-900 hover:font-bold">Add from File ✨</a>
    <a href="/flashcards/{{ $flashcardSetId }}/audio/create" class="block text-teal-700 hover:text-teal-900 hover:font-bold">Add Audio ✨</a>
    <a href="/flashcards/{{ $flashcardSetId }}/images/create" class="block text-teal-700 hover:text-teal-900 hover:font-bold">Add Images ✨</a>
</div>