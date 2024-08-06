<?php

namespace App\Jobs;

use App\Models\LearningPath;
use App\Models\VocabularyWord;
use Illuminate\Bus\Queueable;
use Illuminate\Bus\Batchable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GenerateLearningPathVocabularyWords implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 120;
    public $tries = 3;

    public $learningPath;
    public $nativeLanguage;
    public $targetLanguage;
    public $targetLocale;
    public $nativeLocale;
    public $voiceGender;

    /**
     * Create a new job instance.
     */
    public function __construct($learningPath, $nativeLanguage, $targetLanguage, $targetLocale, $nativeLocale, $voiceGender)
    {
        $this->learningPath = $learningPath;
        $this->nativeLanguage = $nativeLanguage;
        $this->targetLanguage = $targetLanguage;
        $this->targetLocale = $targetLocale;
        $this->nativeLocale = $nativeLocale;
        $this->voiceGender = $voiceGender;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        LearningPath::generateVocabularyWords($this->learningPath, $this->nativeLanguage, $this->targetLanguage, $this->targetLocale, $this->nativeLocale, $this->voiceGender);
    }
}
