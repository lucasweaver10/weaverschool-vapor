<?php

namespace App\Jobs;

use App\Models\Flashcard;
use Illuminate\Bus\Queueable;
use App\Models\SyntheticVoice;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use App\Http\Controllers\FlashcardAudioController;

class CreateFlashcardAudioWithGoogleCloud implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 300;
    public $tries = 3;

    protected $flashcardId;
    protected $voiceLocale; 
    protected $voiceName;

    /**
     * Create a new job instance.
     */
    public function __construct($flashcardId, $voiceLocale, $voiceName)
    {
        $this->flashcardId = $flashcardId;
        $this->voiceLocale = $voiceLocale;
        $this->voiceName = $voiceName;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $flashcard = Flashcard::find($this->flashcardId);
        $text = $flashcard->term;
        $flashcardAudioController = new FlashcardAudioController();
        $response = $flashcardAudioController->getAudioWithGoogleCloudTextToSpeech($text, $this->voiceLocale, $this->voiceName);
        if ($response instanceof \Illuminate\Http\Response && $response->status() != 200) {
            // Handle the error more appropriately, maybe log it or extract the error message
            $errorMessage = json_decode($response->getContent(), true)['error'] ?? 'Error creating audio';
            Log::error('Text-to-Speech error: Unsuccessful response', [
                'status' => $response->status(),
                'response' => $errorMessage,
            ]);        
        } elseif (!empty($response)) {
            // Assuming response is the audio content
            $audioContent = $response;
            $filename = 'flashcard-' . $text . '-' . $this->voiceName . '-' . $this->voiceLocale . '-' . uniqid() . '.mp3';
            $path = '/audio/flashcards/' . $filename;
            Storage::disk('s3-public')->put($path, $audioContent, 's3-public');
            $audioUrl = 'https://we-public.s3.eu-north-1.amazonaws.com' . $path;            
            $flashcard->update(['audio_url' => $audioUrl]);
        } else {
            // Fallback error handling
            Log::error('Fallback error creating text to speech with Google.');
        }
    }
}
