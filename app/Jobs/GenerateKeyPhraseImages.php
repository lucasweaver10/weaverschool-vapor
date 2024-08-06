<?php

namespace App\Jobs;

use App\Models\LearningPath;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GenerateKeyPhraseImages implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $learningPathId;
    public $timeout = 120;
    public $tries = 3;

    /**
     * Create a new job instance.
     */
    public function __construct($learningPathId)
    {
        $this->learningPathId = $learningPathId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $learningPath = LearningPath::with('keyPhrases')->find($this->learningPathId);
        if (!$learningPath) {
            Log::error('Learning path not found');
            throw new \Exception("No learning path found for image creation.");
        }

        $keyPhrases = $learningPath->keyPhrases;

        foreach ($keyPhrases as $phrase) {
            GenerateKeyPhraseImage::dispatch($phrase->id);
        }
    }
}
