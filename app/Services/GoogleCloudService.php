<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class GoogleCloudService
{
    protected $key;

    public function __construct()
    {        
        $this->key = config('services.google_cloud.api_key');        
    }

    public function translateText($text, $targetLocale)
    {
        $googleCloudTranslationApiKey = config('services.google_cloud.api_key');


        $response = Http::post("https://translation.googleapis.com/language/translate/v2?key={$this->key}", [
            'q' => $text,
            'target' => $targetLocale,
        ]);

        if ($response->successful()) {
            $translatedText = $response->json()['data']['translations'][0]['translatedText'];
            return $translatedText;
        } else {
            // Handle the error appropriately.
            Log::error('Google Cloud Translation error: Unsuccessful response', [
                'status' => $response->status(),
                'response' => $response->body(),
                'text' => $text,
            ]);
            return false;           
        }      
    }
}
