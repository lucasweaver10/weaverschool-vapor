<x-layouts.flashcards>
<x-slot name="title">Create Flashcards from a File</x-slot>
    <!-- Header Section -->
    <header class="flex justify-between items-center mb-6">
        <h1 class="text-4xl font-bold text-teal-400 mt-4">Create Flashcards from a File</h1>
        <a href="/flashcards/sets/{{ $id }}" class="text-teal-400 font-bold hover:text-teal-600 transition">Back to Set</a>
    </header>
    <!-- Instructional Content -->
    <div class="max-w-5xl mx-auto p-6 text-white">
        <p class="mb-8">
            To create new flashcards from a file, just follow the <strong>5 steps below</strong>, and our <strong>AI will automatically select
             the relevant vocabulary words from the text in your file and create flashcards</strong> for you with either definitions or translations.
        </p>
        <div class="bg-gray-200 p-4 rounded text-gray-700">
            <p>Step 1: Choose either <strong>definitions</strong> or <strong>translations</strong> for the backs of the flashcards.</p>
            <p>Step 2: Enter your <strong>target language</strong>.</p>
            <p>Step 3: Enter your <strong>native language</strong>.</p>
            <p>Step 4: <strong>Select a file</strong> containing the text you want to create flashcards from.</p>
            <p>Step 5: Click the <strong>"Upload"</strong> button.</p>
        </div>
    </div>

    <!-- Existing Flashcards List -->
    <div class="max-w-2xl mx-auto p-6 flex">
        <div class="mx-auto">
            <h2 class="text-xl text-center text-white font-semibold mb-3">Current Flashcards in this Set</h2>
            <div class="text-white">
                @if($flashcardSet->flashcards && count($flashcardSet->flashcards) > 0)
                    <ul class="list-disc pl-5">
                        @foreach($flashcardSet->flashcards as $flashcard)
                            <li>{{ $flashcard->term }}: {{ $flashcard->definition }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>No flashcards added yet.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Livewire Component for Flashcards Creation -->
    <livewire:flashcards.create-from-file :flashcardSet="$flashcardSet" />
    
    <x-alerts.success />
</x-layouts.flashcards>
