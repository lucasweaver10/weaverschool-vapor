<x-layouts.flashcards>
<x-slot name="title">Create Flashcards from a File</x-slot>
<x-slot name="description">Create flashcards from a file using the Weaver School's AI flashcard maker.</x-slot>
    <!-- Header Section -->
    <header class="flex justify-between items-center mb-6">        
        {{-- <a href="/flashcards/sets" class="text-teal-400 font-bold hover:text-teal-600 transition">Back to Sets</a> --}}
        <x-flashcards.sets.header.heading text="Create Flashcards from a File" />        
        <x-flashcards.sets.header.back-link text="Back to Sets" route="/flashcards/sets" />
    </header>
    <!-- Instructional Content -->
    <div class="max-w-5xl mx-auto p-6">
        <p class="mb-8 text-white">
            Supported file formats are: <strong>PDF, JPG, JPEG, PNG, TIFF</strong>. Just follow the <strong>steps below</strong>, and our <strong>AI will automatically select
             the relevant vocabulary words from the text in your file and create flashcards</strong> for you with either definitions or translations.
        </p>       
    </div>        

    <!-- Livewire Component for Flashcards Creation -->
    <livewire:flashcards.sets.create.from-file />
    
    <x-alerts.success />
</x-layouts.flashcards>
