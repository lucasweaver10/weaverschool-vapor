<x-layouts.flashcards>
    <x-slot name="title">New Flashcard Set</x-slot>
    <header class="flex flex-col mb-4 md:flex-row justify-between items-center w-full">        
        <x-flashcards.sets.header.heading text="Edit Flashcard Set" />
        <x-flashcards.sets.header.back-link text="Back to all sets" route="/flashcards/sets" />
    </header>    
    <form action="/flashcards/sets/{{ $flashcardSet->id }}/update" method="POST" class="bg-white shadow-lg rounded-lg mt-12 p-6 max-w-lg mx-auto">
        @csrf
        @method('PUT')
        <!-- Title Input -->
        <div class="mb-4">
            <label for="title" class="text-gray-700 font-medium">Title</label>
            <input type="text" name="title" id="title" value="{{ $flashcardSet->title }}" class="form-input w-full rounded-md border-gray-300 py-2 px-4 focus:border-teal-500 focus:ring focus:ring-teal-200" placeholder="Enter title">
            @error('title')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <!-- Description Input -->
        <div class="mb-6">
            <label for="description" class="text-gray-700 font-medium">Description</label>
            <textarea name="description" id="description" class="form-textarea w-full rounded-md border-gray-300 py-2 px-4 focus:border-teal-500 focus:ring focus:ring-teal-200" rows="3" placeholder="Enter description">{{ $flashcardSet->description }}</textarea>
            @error('description')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <!-- Submission Button -->
        <div class="flex items-center justify-between">
            <button class="bg-teal-500 hover:bg-teal-600 text-white font-medium py-2 px-4 rounded-full transition">Update Set</button>
        </div>
    </form>
    <x-alerts.error />
</x-layouts.flashcards>
