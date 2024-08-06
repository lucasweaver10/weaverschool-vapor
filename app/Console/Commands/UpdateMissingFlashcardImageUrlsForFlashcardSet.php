<?php

namespace App\Console\Commands;

use App\Models\Flashcard;
use App\Models\FlashcardSet;
use Illuminate\Console\Command;

class UpdateMissingFlashcardImageUrlsForFlashcardSet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-missing-flashcard-image-urls-for-flashcard-set {flashcardSetId}';

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

        $flashcardSet = FlashcardSet::find($flashcardSetId);
        $flashcards = $flashcardSet->flashcards;

        foreach($flashcards as $flashcard) {
            Flashcard::addMissingImageUrl($flashcard->id);
        }

        return 'Flashcard images updated';
    }
}
