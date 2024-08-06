<?php

namespace App\Jobs;

use App\Models\KeyPhrase;
use Illuminate\Bus\Queueable;
use Illuminate\Bus\Batchable;
use App\Models\SyntheticVoice;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Services\GoogleCloudTextToSpeechService;

class GenerateKeyPhraseAudio implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 120;
    public $tries = 3;
    public $keyPhraseId;
    public $targetLocale;
    public $voiceId;

    /**
     * Create a new job instance.
     */
    public function __construct($keyPhraseId, $targetLocale, $voiceId)
    {
        $this->keyPhraseId = $keyPhraseId;
        $this->targetLocale = $targetLocale;
        $this->voiceId = $voiceId;
    }    

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $phrase = KeyPhrase::find($this->keyPhraseId);
        $voice = SyntheticVoice::find($this->voiceId);
        $audioService = new GoogleCloudTextToSpeechService();

        // Assuming $word is your VocabularyWord or KeyPhrase model instance
        $audioUrls = $phrase->audio_urls ? json_decode($phrase->audio_urls, true) : [];

        // Check if the audio URL already exists for the specified locale and gender
        if (!isset($audioUrls[$this->targetLocale][$voice->ssml_gender])) {
            // It doesn't exist, so add or update the audio URL
            $text = $phrase->getTranslation('phrase', $this->targetLocale, false);
            $audioContent = $audioService->generateAudioFromText($text, $voice->voice_locale, $voice->voice_name, $voice->ssml_gender);
            $filename = 'key-phrase-' . $phrase->id . '-' . $voice->ssml_gender . '-' . $this->targetLocale . '-' . uniqid() . '.mp3';            
            $path = '/audio/key-phrases/phrases/' . $filename;
            Storage::disk('s3-public')->put($path, $audioContent, 's3-public');
            $audioUrl = 'https://we-public.s3.eu-north-1.amazonaws.com' . $path;
            $audioUrls[$this->targetLocale][$voice->ssml_gender] = $audioUrl;

            // Encode the modified array back to JSON with unescaped slashes
            $phrase->audio_urls = json_encode($audioUrls, JSON_UNESCAPED_SLASHES);

            // Save the updated model
            $phrase->save();
        } else {
            // The audio URL already exists for this locale and gender
            // You can log this information or handle it as needed
            // Example: Log the attempt to overwrite            
        }
    }
}
