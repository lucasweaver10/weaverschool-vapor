<?php

namespace App\Livewire\Flashcards\Sets\Create;

use App\Models\FlashcardSet;
use Livewire\Component;

class FromList extends Component
{    
    public $flashcards;
    public $setTitle;
    public $setDescription;

    protected $listeners = ['flashcardsUpdated' => '$refresh', 'flashcardEdited' => '$refresh'];

    public function storeFlashcards()
    {
        $data = $this->validate([
            'setTitle' => 'required|string|max:255',
            'setDescription' => 'nullable|string|max:255',
            'flashcards' => 'required',
        ]);

        $flashcardSet = FlashcardSet::create([
            'title' => $data['setTitle'],
            'description' => $data['setDescription'],
            'user_id' => auth()->user()->id,
        ]);
        
        auth()->user()->flashcardSetsStudying()->attach($flashcardSet->id);

        $flashcards = array_diff(preg_split("/\r\n|\n|\r/", $this->flashcards), ['']);
        foreach ($flashcards as $flashcard) {
            list($term, $definition) = preg_split("/[:]/", $flashcard);
            $flashcardSet->flashcards()->create([
                'term' => $term, 
                'definition' => $definition,
                'flashcard_set_id' => $flashcardSet->id
            ]);
        }

        return redirect()->route('flashcards.sets.show', $flashcardSet);
    }

    public function mount()
    {
        $this->setTitle = old('setTitle', '');
        $this->setDescription = old('setDescription', '');        
    }
    
    public function render()
    {
        return view('livewire.flashcards.sets.create.from-list');
    }
}
