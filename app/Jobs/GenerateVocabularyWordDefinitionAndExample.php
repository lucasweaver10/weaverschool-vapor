<?php

namespace App\Jobs;

use App\Models\VocabularyWord;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GenerateVocabularyWordDefinitionAndExample implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    public $vocabularyWordId;
    public $targetLocale;
    public $nativeLocale;
    public $prompt;
    public $tries = 3;
    public $timeout = 120;

    /**
     * Create a new job instance.
     */
    public function __construct($vocabularyWordId, $targetLocale, $nativeLocale, $prompt)
    {
        $this->vocabularyWordId = $vocabularyWordId;
        $this->targetLocale = $targetLocale;
        $this->nativeLocale = $nativeLocale;
        $this->prompt = $prompt;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        VocabularyWord::generateDefinitionAndExample($this->vocabularyWordId, $this->targetLocale, $this->nativeLocale, $this->prompt);
    }
}
