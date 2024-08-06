<x-layouts.flashcards>
<x-slot name="title">Create Flashcard</x-slot>
    <header class="flex flex-col mb-4 md:flex-row justify-between items-center w-full">
        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-teal-700 flex items-center mb-8">
            Add New Flashcard
        </h1>
         <div class="w-full md:w-auto">                        
            <a href="/flashcards/sets/{{ $id }}" class="text-teal-700 hover:text-teal-900 transition mr-8 font-bold text-sm float-right">Back to Set</a>
        </div>
    </header>    
    <!-- Flashcard Creation Form -->
    <form action="{{ route('flashcards.store') }}" method="POST" class="bg-white shadow-lg rounded-lg p-6 max-w-lg mx-auto">
        @csrf
        <input type="hidden" name="flashcard_set_id" value="{{ $id }}">
        <!-- Term Input -->
        <div class="mb-4">
            <label for="term" class="text-gray-700 font-medium">Term</label>
            <input type="text" name="term" id="term" class="form-input w-full rounded-md border-gray-300 py-2 px-4 focus:border-teal-500 focus:ring focus:ring-teal-200" placeholder="Enter term">
            @error('term')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <!-- Definition Input -->
        <div class="mb-4">
            <label for="definition" class="text-gray-700 font-medium">Definition or Translation</label>
            <textarea name="definition" id="definition" class="form-textarea w-full rounded-md border-gray-300 py-2 px-4 focus:border-teal-500 focus:ring focus:ring-teal-200" rows="3" placeholder="Enter definition or translation"></textarea>
            @error('definition')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <!-- Example Context Input -->
        <div class="mb-4">
            <label for="example" class="text-gray-700 font-medium">Context or Example</label>
            <textarea name="example" id="example" class="form-textarea w-full rounded-md border-gray-300 py-2 px-4 focus:border-teal-500 focus:ring focus:ring-teal-200" rows="2" placeholder="Add context or an example"></textarea>
            @error('example')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <!-- Image URL Input -->
        <div class="mb-6">
            <label for="image_url" class="text-gray-700 font-medium">Image URL</label>
            <input type="text" name="image_url" id="image_url" class="form-input w-full rounded-md border-gray-300 py-2 px-4 focus:border-teal-500 focus:ring focus:ring-teal-200" placeholder="http://">
            @error('image_url')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <!-- Submission Buttons -->
        <div class="flex items-center justify-between">
            <button class="bg-teal-500 hover:bg-teal-600 text-white font-medium py-2 px-4 rounded-full transition">Add Card</button>
            <a href="/flashcards/sets/{{ $id }}/study" class="text-teal-500 hover:text-teal-600 transition">Start Studying</a>
        </div>
    </form>
<x-alerts.success />
</x-layouts.flashcards>
