<?php

namespace App\Jobs;

use App\Models\FlashcardSet;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateFlashcardsFromChromeExtension implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $title;
    public $targetLanguage;
    public $nativeLanguage; 
    public $contentType;
    public $addImages; 
    public $addPronunciation;
    public $voiceGender;
    public $content;
    public $userId;

    /**
     * Create a new job instance.
     */
    public function __construct($title, $targetLanguage, $nativeLanguage, $contentType, $addImages, $addPronunciation, $voiceGender, $content, $userId)
    {
        $this->title = $title;
        $this->targetLanguage = $targetLanguage;
        $this->nativeLanguage = $nativeLanguage;
        $this->contentType = $contentType;
        $this->addImages = $addImages;
        $this->addPronunciation = $addPronunciation;
        $this->voiceGender = $voiceGender;
        $this->content = $content;
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        FlashcardSet::createFromChromeExtension($this->title, $this->targetLanguage, $this->nativeLanguage, $this->contentType, $this->addImages, $this->addPronunciation, $this->voiceGender, $this->content, $this->userId);
    }
}
