<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Models\EssaySubmission;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class DispatchAdditionalEssayFeedbackJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    public $timeout = 120;
    public $backoff = 20;

    public $submissionId;
    
    /**
     * Create a new job instance.
     */
    public function __construct($submissionId)
    {
        $this->submissionId = $submissionId;
    }    

    /**
     * Execute the job.
     */
    public function handle(): void
    {                
        GenerateSentenceStructureFeedback::dispatch($this->submissionId);
        GenerateTransitionsFeedback::dispatch($this->submissionId);
        GenerateVocabularyFeedback::dispatch($this->submissionId);
        GenerateArgumentFeedback::dispatch($this->submissionId);
    }
}
