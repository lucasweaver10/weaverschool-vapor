<?php

namespace App\Services;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class AzureSpeechService
{
    protected $client;
    protected $key;
    protected $region;
    protected $endpoint;
    protected $token;

    public function __construct()
    {
        $this->client = new Client();
        $this->key = config('services.azure_speech.key');
        $this->region = config('services.azure_speech.region');
        $this->endpoint = config('services.azure_speech.endpoint');
    }

    // public function getAccessToken()
    // {
    //     $response = $this->client->post("{$this->endpoint}/sts/v1.0/issueToken", [
    //         'headers' => [
    //             'Ocp-Apim-Subscription-Key' => $this->key,
    //         ],
    //     ]);

    //     $this->token = $response->getBody()->getContents();
    // }

    public function assessPronunciation($audioPath, $referenceText, $locale)
    {                
        // $token = $this->getAccessToken();

        $audioUrl = storage_path('app/public/') . $audioPath;
        $audioData = file_get_contents($audioUrl);
        $contentLength = strlen($audioData);

        $pronAssessmentParams = json_encode([
            'ReferenceText' => $referenceText,
            'GradingSystem' => 'HundredMark',
            'Granularity' => 'Phoneme',
            'EnableMiscue' => true,
        ]);

        $pronAssessmentHeader = base64_encode($pronAssessmentParams);

        $response = $this->client->post($this->endpoint . "/speech/recognition/conversation/cognitiveservices/v1?language=" . $locale, [
            'headers' => [
                'Ocp-Apim-Subscription-Key' => $this->key,
                'Content-Type' => 'audio/wav; codecs=audio/pcm; samplerate=16000',
                'Content-Length' => $contentLength,
                'Accept' => 'application/json',
                'Pronunciation-Assessment' => $pronAssessmentHeader,
            ],
            'body' => $audioData,
        ]);

        $responseBody = $response->getBody()->getContents();

        // Decode the JSON response
        $decodedResponse = json_decode($responseBody, true);

        // Check for JSON decoding errors
        if (json_last_error() !== JSON_ERROR_NONE) {
            Log::error("JSON Decode Error: " . json_last_error_msg());
        } else {
            Log::error("Decoded Response: " . print_r($decodedResponse, true));
        }

        return $decodedResponse;
    }

}
