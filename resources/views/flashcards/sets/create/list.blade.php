<x-layouts.flashcards>
<x-slot name="title">Create Flashcards from a List</x-slot>
<x-slot name="description">Create flashcards from a list using the Weaver School's AI flashcard maker.</x-slot>
    <!-- Header Section -->
    <header class="flex justify-between items-center mb-6">        
        <x-flashcards.sets.header.heading text="Create Flashcards from a List" />        
        <x-flashcards.sets.header.back-link text="Back to Sets" route="/flashcards/sets" />
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
        <livewire:flashcards.sets.create.from-list class="bg-white shadow-lg rounded-lg p-6" />
    </div>
    <x-alerts.success />
</x-layouts.flashcards>
