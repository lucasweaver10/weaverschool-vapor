<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Models\VocabularyWord;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GenerateVocabularyWordExplanation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $vocabularyWordId;
    public $nativeLocale;
    public $targetLocale;
    public $prompt;
    public $timeout = 120;
    public $tries = 3;

    /**
     * Create a new job instance.
     */
    public function __construct($vocabularyWordId, $nativeLocale, $targetLocale, $prompt)
    {
        $this->vocabularyWordId = $vocabularyWordId;
        $this->nativeLocale = $nativeLocale;
        $this->targetLocale = $targetLocale;
        $this->prompt = $prompt;
    }  

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        VocabularyWord::generateExplanation($this->vocabularyWordId, $this->nativeLocale, $this->targetLocale, $this->prompt);
    }
}
