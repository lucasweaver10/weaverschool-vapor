<x-layouts.flashcards>
<x-slot name="title">Edit Flashcard</x-slot>
    <div x-data="deleteConfirmDialogOpen: false">
    <!-- Header Section -->
    <header class="flex justify-between items-center mb-6">
        <h1 class="text-4xl font-bold text-teal-700">Edit Flashcard</h1>
        <a href="/flashcards/sets/{{ $setId }}" class="text-teal-500 hover:text-teal-600 font-bold transition">Back to Set</a>
    </header>
    <!-- Flashcard Editing Form -->
    <div class="bg-white shadow-lg rounded-lg p-6 max-w-lg mx-auto">
        <form action="/flashcards/{{ $flashcard->id }}/update" method="POST">
            @csrf
            @method('PUT')
            <!-- Term Input -->
            <div class="mb-4">
                <label for="term" class="text-gray-700 font-medium">Term</label>
                <input type="text" name="term" id="term" value="{{ $flashcard->term }}" class="form-input w-full rounded-md border-gray-300 py-2 px-4 focus:border-teal-500 focus:ring focus:ring-teal-200" aria-describedby="term-error">
                @error('term')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <!-- Definition Input -->
            <div class="mb-4">
                <label for="definition" class="text-gray-700 font-medium">Definition</label>
                <textarea name="definition" id="definition" class="form-textarea w-full rounded-md border-gray-300 py-2 px-4 focus:border-teal-500 focus:ring focus:ring-teal-200" rows="3">{{ $flashcard->definition }}</textarea>
                @error('definition')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <!-- Example Context Input -->
            <div class="mb-4">
                <label for="example" class="text-gray-700 font-medium">Context or Example</label>
                <textarea name="example" id="example" class="form-textarea w-full rounded-md border-gray-300 py-2 px-4 focus:border-teal-500 focus:ring focus:ring-teal-200" rows="2">{{ $flashcard->example }}</textarea>
                @error('example')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <!-- Image URL Input -->
            <div class="mb-6">
                <label for="image_url" class="text-gray-700 font-medium">Image URL</label>
                <input type="text" name="image_url" id="image_url" value="{{ $flashcard->image_url }}" class="form-input w-full rounded-md border-gray-300 py-2 px-4 focus:border-teal-500 focus:ring focus:ring-teal-200">
                @error('image_url')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <!-- Update Button -->
            <div class="flex justify-between items-center mt-4">
                <button class="bg-teal-500 hover:bg-teal-600 text-white font-medium py-2 px-4 rounded-lg transition">
                    Update Card</button>
        </form>
        <form action="/flashcards/{{ $flashcard->id }}/destroy" method="POST" onsubmit="return confirm('Are you sure you want to delete this flashcard?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500 hover:text-red-600 transition">Delete Card</button>
        </form>
            </div>
<x-alerts.success />
<x-alerts.error />
</div>
</x-layouts.flashcards>
