<?php

namespace App\Jobs;

use App\Models\KeyPhrase;
use Illuminate\Bus\Queueable;
use App\Models\VocabularyWord;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateLearningPathKeyPhrasesAndExamplesTranslations implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    public $timeout = 120;    
    public $learningPathId;
    public $targetLanguage;
    public $targetLocale;
    public $nativeLanguage;
    public $nativeLocale;

    /**
     * Create a new job instance.
     */
    public function __construct($learningPathId, $targetLanguage, $targetLocale, $nativeLanguage, $nativeLocale)
    {        
        $this->learningPathId = $learningPathId;
        $this->targetLanguage = $targetLanguage;
        $this->targetLocale = $targetLocale;
        $this->nativeLanguage = $nativeLanguage;
        $this->nativeLocale = $nativeLocale;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Update the key phrases translations for the learning path
        KeyPhrase::updateLearningPathKeyPhrasesAndExamplesTranslations($this->learningPathId, $this->targetLanguage, $this->targetLocale, $this->nativeLanguage, $this->nativeLocale);
    }
}
