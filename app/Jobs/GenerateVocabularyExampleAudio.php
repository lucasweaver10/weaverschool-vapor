<?php

namespace App\Jobs;

use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use App\Models\SyntheticVoice;
use App\Models\VocabularyWord;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Services\GoogleCloudTextToSpeechService;

class GenerateVocabularyExampleAudio implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 120;
    public $tries = 3;
    public $vocabularyWordId;
    public $targetLocale;
    public $voiceId;

    /**
     * Create a new job instance.
     */
    public function __construct($vocabularyWordId, $targetLocale, $voiceId)
    {
        $this->vocabularyWordId = $vocabularyWordId;
        $this->targetLocale = $targetLocale;
        $this->voiceId = $voiceId;
    }  

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $word = VocabularyWord::find($this->vocabularyWordId);
        $voice = SyntheticVoice::find($this->voiceId);
        $audioService = new GoogleCloudTextToSpeechService();

        // Assuming $word is your VocabularyWord or KeyPhrase model instance
        $audioUrls = $word->example_audio_urls ? json_decode($word->example_audio_urls, true) : [];

        // Check if the audio URL already exists for the specified locale and gender
        if (!isset($audioUrls[$this->targetLocale][$voice->ssml_gender])) {
            // It doesn't exist, so add or update the audio URL
            $text = $word->getTranslation('example', $this->targetLocale, false);
            $audioContent = $audioService->generateAudioFromText($text, $voice->voice_locale, $voice->voice_name, $voice->ssml_gender);
            $filename = 'vocabulary-word-example' . $word->id . '-' . $voice->ssml_gender . '-' . $this->targetLocale . '-' . uniqid() . '.mp3';            
            $path = '/audio/vocabulary-words/examples/' . $filename;
            Storage::disk('s3-public')->put($path, $audioContent, 's3-public');
            $audioUrl = 'https://we-public.s3.eu-north-1.amazonaws.com' . $path;
            $audioUrls[$this->targetLocale][$voice->ssml_gender] = $audioUrl;

            // Encode the modified array back to JSON with unescaped slashes
            $word->example_audio_urls = json_encode($audioUrls, JSON_UNESCAPED_SLASHES);

            // Save the updated model
            $word->save();
        } else {
            // The audio URL already exists for this locale and gender            
            // Example: Log the attempt to overwrite            
        }
    }
}
