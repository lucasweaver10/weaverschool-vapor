<?php

namespace App\Jobs;

use App\Models\Flashcard;
use App\Models\KeyPhrase;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CheckForUpdatedKeyPhraseImageUrlForFlashcard implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 120;
    public $backoff = 120;
    public $tries = 3;
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
        // check if the key phrase image URL has been updated
        $flashcard = Flashcard::find($this->flashcardId);
        $keyPhrase = KeyPhrase::find($flashcard->key_phrase_id);
        if($keyPhrase->image_url !== $flashcard->image_url) {
            $flashcard->update(['image_url' => $keyPhrase->image_url]);
        }
    }
}
