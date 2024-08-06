<?php

namespace App\Jobs;

use App\Models\FlashcardSet;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateFlashcardSetFromYouTube implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 120;
    public $tries = 3;

    protected $setTitle;
    protected $videoText;
    protected $nativeLanguage;
    protected $targetLanguage;
    protected $userId;
    protected $imagesSelected;
    protected $voiceExamplesSelected;
    protected $voiceGender;
    
    /**
     * Create a new job instance.
     */
    public function __construct($setTitle, $videoText, $nativeLanguage, $targetLanguage, $userId, $imagesSelected, $voiceExamplesSelected, $voiceGender)
    {
        $this->setTitle = $setTitle;
        $this->videoText = $videoText;
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
        FlashcardSet::createFromYouTube($this->setTitle, $this->videoText, $this->nativeLanguage, $this->targetLanguage, $this->userId, $this->imagesSelected, $this->voiceExamplesSelected, $this->voiceGender);
    }
}
