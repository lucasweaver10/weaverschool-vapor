<?php

namespace App\Jobs;

use App\Models\KeyPhrase;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GenerateKeyPhraseExplanation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $keyPhraseId;
    public $nativeLocale;
    public $targetLocale;
    public $prompt;
    public $timeout = 120;
    public $tries = 3;

    /**
     * Create a new job instance.
     */
    public function __construct($keyPhraseId, $nativeLocale, $targetLocale, $prompt)
    {
        $this->keyPhraseId = $keyPhraseId;
        $this->nativeLocale = $nativeLocale;
        $this->targetLocale = $targetLocale;
        $this->prompt = $prompt;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        KeyPhrase::generateExplanation($this->keyPhraseId, $this->nativeLocale, $this->targetLocale, $this->prompt);                        
    }
}
