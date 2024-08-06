<?php

namespace App\Livewire\Flashcards\Sets\Explore;

use Livewire\Component;
use Livewire\Attributes\On;

class Show extends Component
{
    public $flashcardSet;
    public $flashcards;
    public $query = '';

    #[On('query-made')]
    public function handleQuery($query)
    {
        $this->query = $query;
        $this->queryFlashcards($query);
    }

    public function queryFlashcards($query)
    {
        $this->flashcards = $this->flashcardSet->flashcards()
            ->where(function ($q) use ($query) {
                $q->where('term', 'like', '%' . $query . '%')
                    ->orWhere('romanized_term', 'like', '%' . $query . '%')
                    ->orWhere('definition', 'like', '%' . $query . '%');
            })
            ->get();
    }

    public function clearQuery()
    {
        $this->query = '';
        $this->flashcards = $this->flashcardSet->flashcards;        
    }

    public function mount($flashcardSet)
    {
        $this->flashcardSet = $flashcardSet;
        $this->flashcards = $flashcardSet->flashcards;
    }
    
    public function render()
    {
        return view('livewire.flashcards.sets.explore.show');
    }
}
