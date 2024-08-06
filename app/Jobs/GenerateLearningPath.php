<?php

namespace App\Jobs;

use App\Models\LearningPath;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GenerateLearningPath implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $topic;
    public $nativeLanguage;
    public $targetLanguage;
    public $voiceGender;
    public $userId;
    public $tries = 3;
    public $timeout = 120;

    /**
     * Create a new job instance.
     */
    public function __construct($topic, $nativeLanguage, $targetLanguage, $voiceGender, $userId)
    {
        $this->topic = $topic;
        $this->nativeLanguage = $nativeLanguage;
        $this->targetLanguage = $targetLanguage;
        $this->voiceGender = $voiceGender;
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        LearningPath::generate($this->topic, $this->nativeLanguage, $this->targetLanguage, $this->voiceGender, $this->userId);
    }
}
