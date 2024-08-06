<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class TextToSpeech extends Model
{
    use HasFactory;

    public static function convertTextToSpeech($text)
    {
        $voiceId = 'XB0fDUnXU5powFXDhCwa';
//        $maleVoiceId = 'zcAOhNBS3c14rBihAFp1';
        $url = "https://api.elevenlabs.io/v1/text-to-speech/" . $voiceId;
        $headers = [
            "Accept" => "audio/mpeg",
            "Content-Type" => "application/json",
            "xi-api-key" => 'ac6e18bf678449cb7e3c25c54d210f8f'
        ];

        $body = [
            "text" => $text,
            "voice_id" => $voiceId,
            "model_id" => "eleven_monolingual_v1", // You can specify the model if needed
            // Add other voice settings if needed
        ];

        $response = Http::withHeaders($headers)->post($url, $body);

        if ($response->successful()) {
            // Get the audio content
            $audioContent = $response->body();

            // Generate a unique filename
            $filename = 'audio_' . uniqid() . '.mp3';

            // Use Laravel's storage facade to store the file
            Storage::put($filename, $audioContent);

            // Return the path to the stored file
            return $filename;
        } else {
            // Handle error
            return 'Error';
        }
    }    
}
