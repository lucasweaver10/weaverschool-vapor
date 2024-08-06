<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Flashcard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class AudioController extends Controller
{
    public function store(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'audio' => 'required|mimes:webm',
        ]);

        if ($request->hasFile('audio') && $request->file('audio')->isValid()) {
            $audio = $request->file('audio');
            $tempPath = $audio->store('temp', 'public'); // Store temporarily to convert
            $inputPath = storage_path('app/public/' . $tempPath);

            // Extract the original filename without extension
            $originalFilename = pathinfo($audio->getClientOriginalName(), PATHINFO_FILENAME);

            // Get the authenticated user's id
            $userId = Auth::check() ? Auth::id() : 'guest';

            // Generate a unique identifier using the current timestamp
            $uniqueId = time(); // Current timestamp

            // Create the output filename with the user id, unique identifier, and .wav extension
            $outputFilename = $originalFilename . '_' . $userId . '_' . $uniqueId . '.wav';
            $outputPath = storage_path('app/public/audio/' . $outputFilename);

            // Ensure the 'audio' directory exists
            Storage::disk('public')->makeDirectory('audio');

            // Run the FFmpeg process to convert the file and specify the sample rate
            $process = new Process(['ffmpeg', '-i', $inputPath, '-ar', '16000', $outputPath]);
            $process->run();

            // Check if the process was successful
            if (!$process->isSuccessful()) {
                // Clean up the temporary file
                Storage::disk('public')->delete($tempPath);
                throw new ProcessFailedException($process);
            }

            // Remove the temporary file
            Storage::disk('public')->delete($tempPath);

            // Define the converted file path
            $convertedPath = 'audio/' . $outputFilename;

            return response()->json([
                'audioPath' => $convertedPath,
            ]);
        }

        return response()->json(['error' => 'No valid audio file provided'], 400);
    }
    
    
    public function createFlashcardsAudio(Request $request) {
//        $voiceId = 'XB0fDUnXU5powFXDhCwa';
        $voiceId = 'bVMeCyTHy58xNoL34h3p';
//        $maleVoiceId = 'zcAOhNBS3c14rBihAFp1';
        $url = "https://api.elevenlabs.io/v1/text-to-speech/" . $voiceId;
        $headers = [
            "Accept" => "audio/mpeg",
            "Content-Type" => "application/json",
            "xi-api-key" => config('services.elevenlabs.api_key')
        ];
        $flashcardSetId = $request->flashcard_set_id;
        $flashcards = Flashcard::where('flashcard_set_id', $flashcardSetId)->get();
        foreach($flashcards as $flashcard)
        {
            $body = [
                "text" => $flashcard->term,
                "voice_id" => $voiceId,
                "model_id" => "eleven_multilingual_v2", // You can specify the model if needed
                // Add other voice settings if needed
            ];
            $response = Http::withHeaders($headers)->post($url, $body);
            if ($response->successful())
            {
                // Get the audio content
                $audioContent = $response->body();

                // Generate a unique filename
                $filename = 'audio/audio_' . uniqid() . '.mp3';

                // Use Laravel's storage facade to store the file
                Storage::put($filename, $audioContent);

                // Return the path to the stored file
//                if($flashcard->audio_url = null)
//                {
                    $flashcard->update(['audio_url' => $filename]);
//                }
            } else
            {
                // Handle error
                return back()->with('error', 'Error creating audio');
            }
        }
        return redirect()->route('flashcards.sets.show', $flashcardSetId)->with('success', 'Audio created successfully');
    }

    public function createAudioWithGoogleCloudTextToSpeech($text)
    {
        $apiKey = config('services.google_cloud.api_key');
        $baseUrl = 'https://texttospeech.googleapis.com/v1/text:synthesize';

        try {
            $response = Http::post($baseUrl . '?key=' . $apiKey, [
                'input' => ['text' => $text],
                'voice' => ['languageCode' => 'th-TH', 'name' => 'th-TH-Neural2-C'],
                'audioConfig' => ['audioEncoding' => 'MP3'],
            ]);
            if ($response->successful()) {
                $audioContent = base64_decode(json_decode($response->body())->audioContent);
                return $audioContent;
            } else {
                dd($response->body());
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
