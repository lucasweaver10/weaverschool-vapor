<?php

namespace App\Jobs;

use App\Models\FlashcardSet;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class createFlashcardSetFromExtractedTextFromFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    // set and accept all these params: $this->text, $this->targetLanguage, $this->nativeLanguage, $flashcardSet->id, auth()->user()->id, $this->imagesSelected, $this->voiceExamplesSelected, $this->voiceGender

    public $text;
    public $targetLanguage;
    public $nativeLanguage;
    public $flashcardSetId;
    public $userId;
    public $imagesSelected;
    public $voiceExamplesSelected;
    public $voiceGender;

    /**
     * Create a new job instance.
     */
    public function __construct($text, $targetLanguage, $nativeLanguage, $flashcardSetId, $userId, $imagesSelected, $voiceExamplesSelected, $voiceGender)
    {
        $this->text = $text;
        $this->targetLanguage = $targetLanguage;
        $this->nativeLanguage = $nativeLanguage;
        $this->flashcardSetId = $flashcardSetId;
        $this->userId = $userId;
        $this->imagesSelected = $imagesSelected;
        $this->voiceExamplesSelected = $voiceExamplesSelected;
        $this->voiceGender = $voiceGender;
    }    

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        FlashcardSet::createFromExtractedTextFromFile($this->text, $this->targetLanguage, $this->nativeLanguage, $this->flashcardSetId, $this->userId, $this->imagesSelected, $this->voiceExamplesSelected, $this->voiceGender);
    }
}
