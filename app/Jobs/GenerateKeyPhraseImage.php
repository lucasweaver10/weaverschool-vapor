<?php

namespace App\Jobs;

use App\Models\KeyPhrase;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GenerateKeyPhraseImage implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $keyPhraseId;
    public $timeout = 120;
    public $tries = 3;
    
    /**
     * Create a new job instance.
     */
    public function __construct($keyPhraseId)
    {
        $this->keyPhraseId = $keyPhraseId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $imageUrl = KeyPhrase::generateImage($this->keyPhraseId);

        if (!$imageUrl) {
            Log::error('Failed to generate image for key phrase with ID: ' . $this->keyPhraseId);
            $this->fail();
        }
    }
}
