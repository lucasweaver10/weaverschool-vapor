<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Bus\Batchable;
use App\Models\VocabularyWord;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GenerateVocabularyWordImage implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    public $timeout = 120;
    public $tries = 3;
    public $vocabularyWordId;

    /**
     * Create a new job instance.
     */
    public function __construct($vocabularyWordId)
    {
        $this->vocabularyWordId = $vocabularyWordId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {        
        $imageUrl = VocabularyWord::generateImage($this->vocabularyWordId);
        
        if(!$imageUrl) {
            Log::error('Failed to generate image for vocabulary word with ID: ' . $this->vocabularyWordId);
            $this->fail();
        }
    }
}
