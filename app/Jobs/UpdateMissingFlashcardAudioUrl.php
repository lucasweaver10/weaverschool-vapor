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

class UpdateMissingFlashcardAudioUrl implements ShouldQueue
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
        Flashcard::updateOrReplaceAudioUrl($this->flashcardId, $this->targetLocale, $this->voiceGender);        
    }
}
