<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Bus\Batchable;
use App\Models\VocabularyWord;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class AddDefinitionsAndExamplesToVocabularyWordsForLearningPath implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $learningPathId;
    public $targetLanguage;
    public $targetLocale;
    public $nativeLanguage;
    public $nativeLocale;
    public $timeout = 120;
    public $tries = 3;

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
        VocabularyWord::addDefinitionsAndExamples(
            $this->learningPathId, 
            $this->targetLanguage, 
            $this->targetLocale,
            $this->nativeLanguage,
            $this->nativeLocale
        );
    }
}
