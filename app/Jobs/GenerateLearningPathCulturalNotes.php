<?php

namespace App\Jobs;

use App\Models\CulturalNote;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GenerateLearningPathCulturalNotes implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $learningPathId;
    public $targetLanguage;
    public $nativeLanguage;
    public $nativeLocale;
    public $timeout = 120;
    public $tries = 3;

    /**
     * Create a new job instance.
     */
    public function __construct($learningPathId, $targetLanguage, $nativeLanguage, $nativeLocale)
    {
        $this->learningPathId = $learningPathId;
        $this->targetLanguage = $targetLanguage;
        $this->nativeLanguage = $nativeLanguage;
        $this->nativeLocale = $nativeLocale;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        CulturalNote::generate($this->learningPathId, $this->targetLanguage, $this->nativeLanguage, $this->nativeLocale);
    }
}
