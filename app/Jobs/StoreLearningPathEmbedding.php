<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Models\LearningPathEmbedding;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class StoreLearningPathEmbedding implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $embedding;
    public $learningPathId;
    public $timeout = 120;
    public $tries = 3;

    /**
     * Create a new job instance.
     */
    public function __construct($embedding, $learningPathId)
    {
        $this->embedding = $embedding;
        $this->learningPathId = $learningPathId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        LearningPathEmbedding::store($this->embedding, $this->learningPathId);
    }
}
