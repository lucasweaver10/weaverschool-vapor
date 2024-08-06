<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\GenerateVocabularyWordImageWithOpenAI;

class GenerateVocabularyWordImagesWithOpenAI extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vocabulary-words:generate-images {start} {end}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add images to vocabulary words for a given ID range';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $startId = $this->argument('start');
        $endId = $this->argument('end');

        for ($id = $startId; $id <= $endId; $id++) {
            $this->info("Dispatching job for vocabulary word with ID: $id");
            GenerateVocabularyWordImageWithOpenAI::dispatch($id);
        }

        $this->info('Completed adding images to vocabulary words.');
    }
}
