<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\FlashcardController;
use App\Jobs\AddExampleToFlashcard;

class AddExamplesToFlashcards extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'flashcards:add-examples {start} {end}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add examples to flashcards for a given ID range';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $startId = $this->argument('start');
        $endId = $this->argument('end');

        for ($id = $startId; $id <= $endId; $id++) {
            $this->info("Dispatching job for flashcard with ID: $id");
            AddExampleToFlashcard::dispatch($id);
        }
        
        $this->info('Completed adding examples to flashcards.');
    }
}
