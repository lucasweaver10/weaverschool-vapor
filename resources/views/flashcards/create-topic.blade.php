<x-layouts.flashcards>
<x-slot name="title">Create Flashcards from a Topic</x-slot>
    <!-- Header Section -->
    <header class="flex justify-between items-center mb-10">
        <h1 class="text-2xl sm:text-4xl font-bold text-teal-400 mt-4">Create Flashcards from a Topic</h1>
        {{-- <a href="/flashcards/sets/{{ $id }}" class="text-teal-500 font-bold hover:text-teal-600 transition">Back to Set</a> --}}
    </header>    
    <div class="max-w-4xl mx-auto text-gray-700 p-6 bg-gray-700 rounded">
        <p class="mb-8 text-white">
            Enter a language learning topic and our AI will create a set of flashcards for you to study.
        </p>
        <form action="/flashcards/handle-from-topic" method="POST">
            @csrf
            <label for="topic" class="block text-white font-bold mb-2">Topic</label> 
            <div class="flex flex-wrap gap-2">       
                <div class="flex-1 sm:flex-none sm:w-1/2 mr-3">
                    <input type="text" name="topic" class="w-full rounded-lg py-3 px-3 bg-white text-gray-800" placeholder="For example: How to ask someone to join me for dinner in Chinese">
                </div>
                <button type="submit" class="bg-teal-500 text-white px-4 py-2 rounded-lg font-medium hover:bg-teal-700 transition">Create</button>
            </div>
        </form>
    </div>


    

    <!-- Livewire Component for Flashcards Creation -->
    {{-- <livewire:flashcards.create-from-file :flashcardSet="$flashcardSet" /> --}}
    
    <x-alerts.success />
</x-layouts.flashcards>
