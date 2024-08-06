<?php

namespace App\Jobs;

use App\Models\LearningPath;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateLearningPathForNewNativeLanguage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    public $timeout = 120;    
    public $learningPathId;
    public $nativeLanguage;
    public $voiceGender;

    /**
     * Create a new job instance.
     */
    public function __construct($learningPathId, $nativeLanguage, $voiceGender)
    {
        $this->learningPathId = $learningPathId;
        $this->nativeLanguage = $nativeLanguage;
        $this->voiceGender = $voiceGender;
    }    

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        LearningPath::updateForNewNativeLanguage($this->learningPathId, $this->nativeLanguage, $this->voiceGender);
    }
}
