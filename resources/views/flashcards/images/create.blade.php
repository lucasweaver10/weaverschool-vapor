<x-layouts.flashcards>
    <x-slot name="title">Add Flashcard Images</x-slot>
    <!-- Header Section -->
    <header class="flex justify-between items-center mb-6">
        <h1 class="text-4xl font-bold text-teal-700">Generate AI Images</h1>
        <a href="/flashcards/sets/{{ $flashcardSet->id }}" class="text-teal-500 hover:text-teal-600 font-bold transition">Back to Set</a>
    </header>
    <!-- Instructional Content -->
    <div class="max-w-5xl mx-auto text-gray-700 p-6">
        <p class="mb-4">To add AI generated images to each of your flashcards just click the button below and all of your flashcards 
        that don't currently have images will get a new AI generated image.</p>
    </div>
    <div class="max-w-2xl mx-auto mt-8 bg-white shadow-lg rounded-lg p-8">
        <form action="{{ url('/flashcards/images/store') }}" method="POST">
            @csrf
            <input type="hidden" name="flashcard_set_id" value="{{ $flashcardSet->id }}">
            <h2 class="text-xl text-gray-700 font-semibold mb-3">Add Images</h2>
            {{-- <select name="synthetic_voice_id" class="rounded-md border-gray-300 my-3 py-2 px-4 focus:border-teal-500 focus:ring focus:ring-teal-200 text-gray-900">
                @foreach($syntheticVoices as $voice)
                    <option value="{{ $voice->id }}">{{ $voice->language }} - {{ $voice->ssml_gender }}</option>
                @endforeach
            </select> --}}
            @error('flashcards') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            <!-- Submission Button -->
            <div class="flex justify-start mt-4">
                <button class="bg-teal-500 hover:bg-teal-600 text-white font-medium py-2 px-5 rounded-full transition">Add Images</button>
            </div>
        </form>
<x-alerts.success />
<x-alerts.error />
</x-layouts.flashcards>
