<?php

namespace App\Livewire\Flashcards\Sets;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\FlashcardSet;

class Index extends Component
{
    public $flashcardSets; 
    public $query = '';       

    #[On('query-made')]
    public function handleQuery($query)
    {
        $this->query = $query;
        $this->queryFlashcardSets($query);
    }

    public function mount()
    {
        $this->flashcardSets = auth()->user()->flashcardSetsStudying()->orderBy('created_at', 'desc')->get();
    }

    public function queryFlashcardSets($query)
    {                
        $this->flashcardSets = auth()->user()->flashcardSetsStudying()->orderBy('created_at', 'desc')->with('flashcards')
            ->where('title', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->get();            
    }
    
    public function clearQuery()
    {        
        $this->query = '';
        $this->flashcardSets = auth()->user()->flashcardSetsStudying()->orderBy('created_at', 'desc')->get();        
    }
    
    public function render()
    {
        return view('livewire.flashcards.sets.index');
    }
}
