<?php

namespace App\Jobs;

use App\Models\FlashcardSet;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GenerateVocabularyWordsFromTopic implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 120;
    public $tries = 3;
    
    public $topic;
    public $nativeLanguage;
    public $targetLanguage;
    public $targetLocale;
    public $nativeLocale;
    public $voiceGender;

    /**
     * Create a new job instance.
     */
    public function __construct($topic, $nativeLanguage, $targetLanguage, $targetLocale, $nativeLocale, $voiceGender)
    {
        $this->topic = $topic;
        $this->nativeLanguage = $nativeLanguage;
        $this->targetLanguage = $targetLanguage;
        $this->targetLocale = $targetLocale;
        $this->nativeLocale = $nativeLocale;
        $this->voiceGender = $voiceGender;
    }    

    /**
     * Execute the job.
     */
    public function handle(): void
    {        
        $vocabularyWords = FlashcardSet::generateVocabularyWordsFromTopic($this->topic, $this->nativeLanguage, $this->targetLanguage, $this->targetLocale, $this->nativeLocale, $this->voiceGender);       
    }
}
