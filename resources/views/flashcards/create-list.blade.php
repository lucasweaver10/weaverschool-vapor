<x-layouts.flashcards>
<x-slot name="title">Create Flashcards from a List</x-slot>
    <!-- Header Section -->
    <header class="flex justify-between items-center mb-6">
        <h1 class="text-4xl font-bold text-teal-400">Create Flashcards from a List</h1>
        <a href="/flashcards/sets/{{ $id }}" class="text-teal-400 font-bold hover:text-teal-600 transition">Back to Set</a>
    </header>
    <!-- Instructional Content -->
    <div class="max-w-5xl mx-auto p-6">
        <p class="mb-4 text-white">To create new flashcards from a list, copy and paste a list of words and definitions in the following format:</p>
        <div class="bg-gray-200 p-4 rounded text-gray-700">
            <p>Word: Definition of the word.<br>Word 2: Next word definition here.</p>
        </div>
        <p class="mt-4 text-white">Each word and definition must be on a new line, and the word and definition must be separated by a colon ":".</p>
    </div>
    <!-- Livewire Component for Flashcards Creation -->
    <div class="mt-8">
        <livewire:flashcards.create-from-list :flashcardSet="$flashcardSet" class="bg-white shadow-lg rounded-lg p-6" />
    </div>
    <x-alerts.success />
</x-layouts.flashcards>
