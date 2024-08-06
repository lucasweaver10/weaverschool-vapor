<?php

namespace App\Livewire\Flashcards;

use Livewire\Component;

class ManageSetFromExplore extends Component
{
    public $set;
    public $isStudyingSet;

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
        $this->isStudyingSet = auth()->user()->flashcardSetsStudying()->where('flashcard_set_id', $this->set->id)->exists();
    }
    
    public function render()
    {
        return view('livewire.flashcards.manage-set-from-explore');
    }
}
