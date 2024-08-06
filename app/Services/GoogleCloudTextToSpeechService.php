<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Exception\RequestException;
use App\Services\FFmpegService;

class GoogleCloudTextToSpeechService
{
    protected $key;

    public function __construct()
    {        
        $this->key = config('services.google_cloud_text_to_speech.api_key');        
    }    

    public function generateAudioFromText($text, $voiceLocale, $voiceName, $ssmlGender)
    {
        $apiKey = config('services.google_cloud.api_key');
        $baseUrl = 'https://texttospeech.googleapis.com/v1/text:synthesize';
        try {
            $response = Http::post($baseUrl . '?key=' . $apiKey, [
                'input' => ['text' => $text],
                'voice' => ['languageCode' => $voiceLocale, 'name' => $voiceName, 'ssmlGender' => $ssmlGender],
                'audioConfig' => ['audioEncoding' => 'MP3', 'speakingRate' => "0.90"],
            ]);
            if ($response->successful()) {
                $audioContent = base64_decode(json_decode($response->body())->audioContent);

                $ffmpegService = new FFmpegService();
                if (!$ffmpegService->validateAudioFile($audioContent)) {
                    return response()->json(['error' => 'Invalid audio file'], 400);
                }

                return $audioContent;
            } else {
                // Log non-exception errors
                Log::error('Text-to-Speech error: Unsuccessful response', [
                    'status' => $response->status(),
                    'response' => $response->body(),
                ]);
                return response()->json(['error' => 'Failed to process Text-to-Speech request'], $response->status());
            }
        } catch (RequestException $e) {
            // Log the detailed error message
            Log::error('Text-to-Speech error: ' . $e->getMessage(), [
                'request' => $e->getRequest()->getBody()->getContents(),
                'response' => $e->hasResponse() ? $e->getResponse()->getBody()->getContents() : 'No response',
            ]);
            return response()->json(['error' => 'An error occurred while processing your request'], 500);
        }
    }

    public function getAvailableVoices()
    {
        $apiKey = config('services.google_cloud.api_key');
        $baseUrl = 'https://texttospeech.googleapis.com/v1beta1/voices';
        try {
            $response = Http::get($baseUrl . '?key=' . $apiKey);
            if ($response->successful()) {
                $voices = json_decode($response->body())->voices;
                Log::info('Voices:', ['voices' => $voices]);
                return $voices;
            } else {
                // Log non-exception errors
                Log::error('Text-to-Speech error: Unsuccessful response', [
                    'status' => $response->status(),
                    'response' => $response->body(),
                ]);
                return response()->json(['error' => 'Failed to process Text-to-Speech request'], $response->status());
            }
        } catch (RequestException $e) {
            // Log the detailed error message
            Log::error('Text-to-Speech error: ' . $e->getMessage(), [
                'request' => $e->getRequest()->getBody()->getContents(),
                'response' => $e->hasResponse() ? $e->getResponse()->getBody()->getContents() : 'No response',
            ]);
            return response()->json(['error' => 'An error occurred while processing your request'], 500);
        }

    }

}
