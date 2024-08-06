<?php

namespace App\Jobs;

use App\Models\Flashcard;
use Illuminate\Bus\Queueable;
use App\Models\SyntheticVoice;
use App\Models\VocabularyWord;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateInvalidFlashcardAudioUrl implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $flashcardId;
    public $targetLocale;
    public $voiceGender;
    
    /**
     * Create a new job instance.
     */
    public function __construct($flashcardId, $targetLocale, $voiceGender)
    {
        $this->flashcardId = $flashcardId;
        $this->targetLocale = $targetLocale;
        $this->voiceGender = $voiceGender;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $flashcard = Flashcard::find($this->flashcardId);
        $voiceId = SyntheticVoice::getVoiceId($this->targetLocale, $this->voiceGender);

        if($flashcard->vocabulary_word_id) {            
            $audioUrl = VocabularyWord::replaceAudioUrl($flashcard->vocabulary_word_id, $this->targetLocale, $voiceId);
            $flashcard->update(['audio_url' => $audioUrl]);
        } else {
            $audioUrl = Flashcard::replaceAudioUrl($flashcard->id, $this->targetLocale, $voiceId);
        }                
    }
}
