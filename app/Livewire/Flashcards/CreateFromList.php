<?php

namespace App\Livewire\Flashcards;

use Livewire\Component;

class CreateFromList extends Component
{
    public $flashcardSet;
    public $flashcards;

    protected $listeners = ['flashcardsUpdated' => '$refresh', 'flashcardEdited' => '$refresh'];

    public function storeFlashcards(){
        $data = $this->validate([
            'flashcards' => 'required',
        ]);

        $flashcards = array_diff(preg_split("/\r\n|\n|\r/", $this->flashcards), ['']);
        foreach ($flashcards as $flashcard) {
            list($term, $definition) = preg_split("/[:]/", $flashcard);
            $this->flashcardSet->flashcards()->create(['term' => $term, 'definition' => $definition,
                'flashcard_set_id' => $this->flashcardSet->id, 'example' => '']);
        }

        $this->dispatch('success', message: 'Success! Check your flashcard set page.');

        $this->flashcards = [''];
        $this->dispatch('flashcardsUpdated');
    }

    public function mount($flashcardSet) {
        $this->flashcardSet = $flashcardSet;
    }

    public function render()
    {
        return view('livewire.flashcards.create-from-list');
    }
}
