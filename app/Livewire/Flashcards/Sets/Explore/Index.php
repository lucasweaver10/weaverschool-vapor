<?php

namespace App\Livewire\Flashcards\Sets\Explore;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\FlashcardSet;

class Index extends Component
{    
    public $query = '';

    #[On('query-made')]
    public function handleQuery($query)
    {
        $this->query = $query;
        $this->queryFlashcardSets($query);
    }    

    public function queryFlashcardSets($query)
    {
        $this->flashcardSets = FlashcardSet::where('quick_note_set_id', null)->orderBy('created_at', 'desc')->with('flashcards')
            ->where('title', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->get();
    }

    public function clearQuery()
    {
        $this->query = '';
        $this->flashcardSets = FlashcardSet::where('quick_note_set_id', null)->orderBy('created_at', 'desc')->get();
    }

    public function addSetToUser()
    {
        auth()->user()->flashcardSetsStudying()->syncWithoutDetaching([$this->set->id]);
        $this->dispatch('success', message: 'Flashcard set added to your sets');
    }

    public function removeSetFromUser()
    {
        auth()->user()->flashcardSetsStudying()->detach($this->set->id);
        $this->dispatch('success', message: 'Flashcard set removed from your sets');
    }

    public function mount()
    {        
    }
    
    public function render()
    {
        $this->flashcardSets = FlashcardSet::where('quick_note_set_id', null)
            ->orderBy('created_at', 'desc')
            ->paginate(23);

        return view('livewire.flashcards.sets.explore.index', [
            'flashcardSets' => $this->flashcardSets
        ]);
    }
}
