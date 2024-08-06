<?php

namespace App\Jobs;

use App\Models\Flashcard;
use App\Models\VocabularyWord;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CheckForUpdatedVocabularyWordImageUrlForFlashcard implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 120;
    public $tries = 3;
    public $backoff = 120;
    public $flashcardId;

    /**
     * Create a new job instance.
     */
    public function __construct($flashcardId)
    {
        $this->flashcardId = $flashcardId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // check if the vocabulary word image URL has been updated
        $flashcard = Flashcard::find($this->flashcardId);
        $vocabularyWord = VocabularyWord::find($flashcard->vocabulary_word_id);
        if($vocabularyWord->image_url !== $flashcard->image_url) {
            $flashcard->update(['image_url' => $vocabularyWord->image_url]);
        } 
    }
}
