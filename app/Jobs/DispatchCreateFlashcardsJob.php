<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DispatchCreateFlashcardsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 120;
    public $tries = 3;
    public $learningPathId;
    public $targetLocale;
    public $nativeLocale;
    public $userId;

    /**
     * Create a new job instance.
     */
    public function __construct($learningPathId, $targetLocale, $nativeLocale, $userId)
    {
        $this->learningPathId = $learningPathId;
        $this->targetLocale = $targetLocale;
        $this->nativeLocale = $nativeLocale;
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        CreateFlashcardsFromLearningPath::dispatch($this->learningPathId, $this->targetLocale, $this->nativeLocale, $this->userId)->delay(now()->addMinutes(5));
    }
}
