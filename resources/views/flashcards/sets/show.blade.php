<x-layouts.flashcards>
<x-slot name="title">{{ $flashcardSet->title }}</x-slot>
<div>
    <livewire:flashcards.sets.show :flashcardSet="$flashcardSet">
</div>    
</x-layouts.flashcards>
