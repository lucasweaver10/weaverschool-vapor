<?php

namespace App\Jobs;

use App\Models\VocabularyWord;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GenerateVocabularyWordImages implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 120;
    public $tries = 3;

    public $vocabularyWords;

    /**
     * Create a new job instance.
     */
    public function __construct($vocabularyWords)
    {
        $this->vocabularyWords = $vocabularyWords;
    }    

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        VocabularyWord::generateImages($this->vocabularyWords);
    }
}
