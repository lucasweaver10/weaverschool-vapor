<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\CreateFlashcardSymbolicImageWithOpenAiFromEnglish;

class AddSymbolicImagesToFlashcards extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'flashcards:add-symbolic-images-to-flashcards {start} {end}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add symbolic images to flashcards for a given ID range';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $startId = $this->argument('start');
        $endId = $this->argument('end');

        for ($id = $startId; $id <= $endId; $id++) {
            $this->info("Dispatching job for flashcard with ID: $id");
            CreateFlashcardSymbolicImageWithOpenAiFromEnglish::dispatch($id);
        }

        $this->info('Completed adding images to flashcards.');
    }
}
