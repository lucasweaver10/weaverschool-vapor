<?php

namespace App\Jobs;

use Exception;
use App\Models\LearningPath;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use App\Models\SyntheticVoice;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Services\GoogleCloudTextToSpeechService;
use Livewire\Mechanisms\HandleComponents\Synthesizers\Synth;

class GenerateVocabularyWordAudioForLearningPath implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 120;
    public $tries = 3;
    public $learningPathId;
    public $targetLocale;
    public $voiceGender;

    /**
     * Create a new job instance.
     */
    public function __construct($learningPathId, $targetLocale, $voiceGender)
    {
        $this->learningPathId = $learningPathId;
        $this->targetLocale = $targetLocale;
        $this->voiceGender = $voiceGender;
    }    

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $voice = SyntheticVoice::where('locale', $this->targetLocale)->where('ssml_gender', $this->voiceGender)->first();
        if (!$voice) {
            // Handle the case where no voice is found
            // For example, log an error or throw an exception
            Log::error("No synthetic voice found for locale {$this->targetLocale} and gender {$this->voiceGender}.");
            throw new Exception("No synthetic voice found.");
        }

        $learningPath = LearningPath::with('vocabularyWords')->find($this->learningPathId);  
        if(!$learningPath->id) {
            // Handle the case where no learning path is found
            // For example, log an error or throw an exception
            Log::error("No learning path found for id {$this->learningPathId}.");
            throw new Exception("No learning path found.");
        }

        foreach($learningPath->vocabularyWords as $word) {
            GenerateVocabularyWordAudio::dispatch(
                $word->id, 
                $this->targetLocale, 
                $voice->id);
        }        
    }
}
