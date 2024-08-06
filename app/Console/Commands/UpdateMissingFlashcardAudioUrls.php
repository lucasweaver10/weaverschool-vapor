<?php

namespace App\Console\Commands;

use App\Models\FlashcardSet;
use Illuminate\Console\Command;
use App\Jobs\UpdateMissingFlashcardAudioUrl;

class UpdateMissingFlashcardAudioUrls extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-missing-flashcard-audio-urls {flashcardSetId} {targetLocale} {voiceGender}';

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
        $flashcardSetId = $this->argument('flashcardSetId');
        $targetLocale = $this->argument('targetLocale');
        $voiceGender = $this->argument('voiceGender');

        $flashcardSet = FlashcardSet::find($flashcardSetId);
        $flashcards = $flashcardSet->flashcards;

        foreach ($flashcards as $flashcard) {
            UpdateMissingFlashcardAudioUrl::dispatch($flashcard->id, $targetLocale, $voiceGender);
        }        
    }
}
