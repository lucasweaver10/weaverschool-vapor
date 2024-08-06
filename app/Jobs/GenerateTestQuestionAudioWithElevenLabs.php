<?php

namespace App\Jobs;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\SpeakingPracticeTestQuestion;

class GenerateTestQuestionAudioWithElevenLabs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 120;
    public $tries = 3;

    public $questionId;
    public $voiceId;

    /**
     * Create a new job instance.
     */
    public function __construct($questionId, $voiceId)
    {
        $this->questionId = $questionId;
        $this->voiceId = $voiceId;
    }    

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $question = SpeakingPracticeTestQuestion::find($this->questionId);
        
        // $voiceId = 'bVMeCyTHy58xNoL34h3p';        
        $url = "https://api.elevenlabs.io/v1/text-to-speech/" . $this->voiceId;
        
        $headers = [
            "Accept" => "audio/mpeg",
            "Content-Type" => "application/json",
            "xi-api-key" => config('services.elevenlabs.api_key')
        ];
                
        $body = [
            "text" => $question->text,
            "voice_id" => $this->voiceId,
            "model_id" => "eleven_multilingual_v2",
            'voice_settings' => [
                "stability" => 0.88,
                "similarity_boost" => 0.88,
                "speaker_boost" => true,
            ],
            
        ];

        $response = Http::withHeaders($headers)->post($url, $body);        
        try {            
            if ($response->successful()) {
                // Get the audio content
                $audioContent = $response->body();

                // Generate a unique filename
                $filename = 'audio/audio_' . uniqid() . '.mp3';

                $questionTextSlug = Str::slug($question->text);
                $testTitleSlug = Str::slug($question->test->title);
                $filename = $questionTextSlug . '-' . uniqid() . '.mp3';
                $path = '/audio/test-questions/' . strtolower($question->test->exam) . '/' . $testTitleSlug . '/' . $filename;                
                Storage::disk('s3-public')->put($path, $audioContent, 's3-public');
                Storage::disk('local')->put($path, $audioContent);
                $audioUrl = 'https://we-public.s3.eu-north-1.amazonaws.com' . $path;
                $question->update(['audio_url' => $audioUrl]);
            } else {
                // Handle unsuccessful response
                Log::error('Unsuccessful response from audio generation service');
            }
        } catch (Exception $e) {
            Log::error('Error creating audio: ' . $e->getMessage(), ['exception' => $e]);
        }
    }        
}
