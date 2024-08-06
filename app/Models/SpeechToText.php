<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SpeechToText extends Model
{
    use HasFactory;    

    protected $client;
    protected $key;
    protected $region;
    protected $token;
    protected $endpoint;

    public function __construct()
    {
        $this->client = new Client();
        $this->key = config('services.azure_speech.key');
        $this->region = config('services.azure_speech.region');
        $this->endpoint = config('services.azure_speech.endpoint');
    }
    
    public function getAccessToken()
    {
        $response = $this->client->post("{$this->endpoint}/sts/v1.0/issueToken", [
            'headers' => [
                'Ocp-Apim-Subscription-Key' => $this->key,
            ],
        ]);

        $this->token = $response->getBody()->getContents();
    }

    public function assessPronunciation($audioFileName, $referenceText)
    {
        
        $token = $this->getAccessToken();
        
        $filePath = storage_path('app/public/audio/') . $audioFileName;
        $audioData = file_get_contents($filePath);
        $contentLength = strlen($audioData);

        $response = $this->client->post("https://westus.stt.speech.microsoft.com/speech/recognition/conversation/cognitiveservices/v1?language=en-US", [
            'headers' => [
                'Ocp-Apim-Subscription-Key' => $this->key,
                'Content-Type' => 'audio/wav; codecs=audio/pcm; samplerate=16000',
                'Content-Length' => $contentLength,                                
                'Accept' => 'application/json',
                'Pronunciation-Assessment' => json_encode([
                    'ReferenceText' => $referenceText,
                    'GradingSystem' => 'HundredMark',
                    'Granularity' => 'Phoneme',                    
                    'EnableMiscue' => true,
                ]),                
            ],
            'body' => $audioData,
        ]);

        Log::error($response->getBody()->getContents());


        return json_decode($response->getBody()->getContents(), true);
    }
}
