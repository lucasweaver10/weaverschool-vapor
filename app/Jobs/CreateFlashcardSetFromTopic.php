<?php

namespace App\Jobs;

use App\Models\FlashcardSet;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use App\Http\Controllers\OpenAiController;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateFlashcardSetFromTopic implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 120;
    public $tries = 3;        

    protected $topic;
    protected $nativeLanguage;
    protected $targetLanguage;
    protected $userId;    
    protected $imagesSelected;
    protected $voiceExamplesSelected;
    protected $voiceGender;
    
    
    /**
     * Create a new job instance.
     */
    public function __construct($topic, $nativeLanguage, $targetLanguage, $userId, $imagesSelected, $voiceExamplesSelected, $voiceGender)
    {
        $this->topic = $topic;
        $this->nativeLanguage = $nativeLanguage;
        $this->targetLanguage = $targetLanguage;
        $this->userId = $userId;        
        $this->imagesSelected = $imagesSelected;
        $this->voiceExamplesSelected = $voiceExamplesSelected;
        $this->voiceGender = $voiceGender;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        FlashcardSet::createFromTopic($this->topic, $this->nativeLanguage, $this->targetLanguage, $this->userId, $this->imagesSelected, $this->voiceExamplesSelected, $this->voiceGender);        
    }
}
