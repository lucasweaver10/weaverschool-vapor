<?php

namespace App\Jobs;

use App\Models\Flashcard;
use App\Models\FlashcardSet;
use Illuminate\Bus\Queueable;
use App\Models\VocabularyWord;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateFlashcardsFromVocabularyWords implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    public $vocabularyWords;
    public $flashcardSetId;
    public $targetLocale;
    public $nativeLocale;
    public $voiceGender;
    public $imagesSelected;
    public $voiceExamplesSelected;

    /**
     * Create a new job instance.
     */
    public function __construct($vocabularyWords, $flashcardSetId, $targetLocale, $nativeLocale, $voiceGender, $imagesSelected = true, $voiceExamplesSelected = true)
    {
        $this->vocabularyWords = $vocabularyWords;
        $this->flashcardSetId = $flashcardSetId;
        $this->targetLocale = $targetLocale;
        $this->nativeLocale = $nativeLocale;
        $this->voiceGender = $voiceGender;
        $this->imagesSelected = $imagesSelected;
        $this->voiceExamplesSelected = $voiceExamplesSelected;
    }    

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Flashcard::createFlashcardsFromVocabularyWords($this->vocabularyWords, $this->flashcardSetId, $this->targetLocale, $this->nativeLocale, $this->voiceGender, $this->imagesSelected, $this->voiceExamplesSelected);
    }
}
