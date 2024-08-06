<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Flashcard;
use Livewire\Attributes\On;
use App\Models\VocabularyWord;
use Illuminate\Support\Facades\Log;

class SpeechAnalyzer extends Component
{    
    public $evaluation; 
    public $identifier;

    #[On('audio-processed')]
    public function handleAudio($audioPath, $identifier)
    {
        if($identifier === $this->identifier) {    
            // $user = auth()->user();
            $flashcard = Flashcard::find($identifier);
            $vocabularyWord = VocabularyWord::find($flashcard->vocabulary_word_id);        

            // Provide the word to get the locale        
            $locale = $vocabularyWord->getLocaleByWord($flashcard->term);

            if ($locale) {
                $referenceText = $flashcard->term;
                $azureSpeechService = new \App\Services\AzureSpeechService();
                $response = $azureSpeechService->assessPronunciation($audioPath, $referenceText, $locale);                                                
                // then eventually here we will populate the evaluation with the response data
                $this->evaluation = $response['NBest'][0]['AccuracyScore'];                
            } else {
                echo "The word '{$flashcard->term}' was not found in any locale for this vocabulary word.";
            }
        }
    }
    
    public function render()
    {
        return view('livewire.speech-analyzer');
    }
}
