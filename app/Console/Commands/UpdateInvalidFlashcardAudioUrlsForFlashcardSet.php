<?php

namespace App\Console\Commands;

use App\Models\FlashcardSet;
use Illuminate\Console\Command;
use App\Jobs\UpdateInvalidFlashcardAudioUrl;

class UpdateInvalidFlashcardAudioUrlsForFlashcardSet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-invalid-flashcard-audio-urls-for-flashcard-set {flashcardSetId} {targetLocale} {voiceGender}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // handle the arguments below
        $flashcardSetId = $this->argument('flashcardSetId');
        $targetLocale = $this->argument('targetLocale');
        $voiceGender = $this->argument('voiceGender');

        $flashcardSet = FlashcardSet::find($flashcardSetId);
        $flashcards = $flashcardSet->flashcards;

        foreach($flashcards as $flashcard) {
            UpdateInvalidFlashcardAudioUrl::dispatch($flashcard->id, $targetLocale, $voiceGender);            
        }        
    }
}
