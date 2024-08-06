<?php

namespace App\Livewire\Flashcards\Images;

use Livewire\Component;
use App\Models\Flashcard;
use App\Jobs\CreateFlashcardImageWithOpenAI;

class Create extends Component
{
    public $flashcardId;
    public $flashcard;

    public function createAiFlashcardImage()
    {
        $flashcard = Flashcard::find($this->flashcardId);
        
        if($flashcard->set->user_id !== auth()->user()->id) {
            session()->flash('error', 'You can only create new images for flashcards you created.');
            return redirect()->route('flashcards.sets.show', $flashcard->flashcard_set_id);
        } else {
            CreateFlashcardImageWithOpenAI::dispatch($flashcard->id);
            session()->flash('success', 'Image is processing. Please check back in a few minutes.');
            return redirect()->route('flashcards.sets.show', $flashcard->flashcard_set_id);
        }
        
    }

    public function mount($flashcardId)
    {
        $this->flashcard = Flashcard::find($flashcardId);
    }
    
    public function render()
    {
        return view('livewire.flashcards.images.create');
    }
}
