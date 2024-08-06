<?php

namespace App\Livewire\Flashcards\Audio;

use Livewire\Component;
use App\Models\Flashcard;
use App\Models\SyntheticVoice;
use App\Jobs\CreateFlashcardAudioWithGoogleCloud;

class Create extends Component
{
    public $flashcardId;
    public $flashcard;
    public $syntheticVoices;
    public $voiceId;
    public $openPopup = false;


    public function createAiFlashcardAudio()
    {
        $flashcard = Flashcard::find($this->flashcardId);

        if ($flashcard->set->user_id !== auth()->user()->id) {
            session()->flash('error', 'You can only create new images for flashcards you created.');
            return redirect()->route('flashcards.sets.show', $flashcard->flashcard_set_id);
        } else {
            $syntheticVoice = SyntheticVoice::findOrFail($this->voiceId);
            CreateFlashcardAudioWithGoogleCloud::dispatch($flashcard->id, $syntheticVoice->locale, $syntheticVoice->voice_name);
            session()->flash('success', 'Audio is processing. Please check back in a few minutes.');
            $this->openPopup = false;
            return redirect()->route('flashcards.sets.show', $flashcard->flashcard_set_id);
        }
    }

    public function mount($flashcardId)
    {
        $this->flashcard = Flashcard::find($flashcardId);
        $this->syntheticVoices = SyntheticVoice::all();
        $this->voiceId = $this->syntheticVoices->first()->id;
    }
    
    public function render()
    {
        return view('livewire.flashcards.audio.create');
    }
}
