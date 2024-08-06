<x-layouts.flashcards>
    <x-slot name="title">
        {{ $flashcardSet->title }} flashcard set
    </x-slot>
    <x-slot name="description">
        Explore the flashcard set for {{ $flashcardSet->description ?? '' }}.
    </x-slot>  
    <div>
        <livewire:flashcards.sets.explore.show :flashcardSet="$flashcardSet" />    
    </div>
</x-layouts.flashcards>