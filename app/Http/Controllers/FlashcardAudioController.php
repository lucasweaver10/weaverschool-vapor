<?php

namespace App\Http\Controllers;

use App\Models\Flashcard;
use App\Models\FlashcardSet;
use Illuminate\Http\Request;
use App\Models\SyntheticVoice;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Livewire\Admin\AuthorImages\Create;
use App\Jobs\CreateFlashcardAudioWithGoogleCloud;

class FlashcardAudioController extends Controller
{
    public function create($id) {
        $flashcardSet = FlashcardSet::findOrFail($id);
        $syntheticVoices = SyntheticVoice::all();
        return view('flashcards.audio.create', compact('flashcardSet', 'syntheticVoices'));
    }

    public function storeFlashcardsAudioWithGoogleCloud(Request $request)
    {
        $flashcardSetId = $request->flashcard_set_id;
        $syntheticVoice = SyntheticVoice::findOrFail($request->synthetic_voice_id);
        $voiceLocale = $syntheticVoice->locale;
        $voiceName = $syntheticVoice->voice_name;
        $flashcards = Flashcard::where('flashcard_set_id', $flashcardSetId)->get();
        foreach($flashcards as $flashcard)
        {
            CreateFlashcardAudioWithGoogleCloud::dispatch($flashcard->id, $voiceLocale, $voiceName);
        }
        return redirect()->route('flashcards.sets.show', $flashcardSetId)->with('success', 'Audio creation in progress. Please check back in a few minutes.');

    }

    public function getAudioWithGoogleCloudTextToSpeech($text, $voiceLocale, $voiceName)
    {
        $apiKey = config('services.google_cloud.api_key');
        $baseUrl = 'https://us-central1-texttospeech.googleapis.com/v1beta1/text:synthesize';
        try {
            $response = Http::post($baseUrl . '?key=' . $apiKey, [
                'input' => ['text' => $text],
                'voice' => ['languageCode' => $voiceLocale, 'name' => $voiceName],
                'audioConfig' => ['audioEncoding' => 'MP3', 'speakingRate' => "0.93"],
            ]);
            if ($response->successful()) {
                $audioContent = base64_decode(json_decode($response->body())->audioContent);
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
}
