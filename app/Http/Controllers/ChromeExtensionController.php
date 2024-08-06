<?php

namespace App\Http\Controllers;

use App\Jobs\CreateFlashcardsFromChromeExtension;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ChromeExtensionController extends Controller
{
    public function handle(Request $request)
    {        
        $user = $request->user();
                
        // Extract data from the request
        $title = $request['title'] ?? 'No title given';
        $targetLanguage = $request['targetLanguage'];
        $nativeLanguage = $request['nativeLanguage'];
        $contentType = $request['contentType'];
        $addImages = $request['addImages'] ?? true;
        $addPronunciation = $request['addPronunciation'] ?? true;
        $voiceGender = $request['voiceGender'];
        $contentText = $request['content'];    

        CreateFlashcardsFromChromeExtension::dispatch($title, $targetLanguage, $nativeLanguage, $contentType, $addImages, $addPronunciation, $voiceGender, $contentText, $user->id);

        return response()->json(['status' => 'success']);
    }    
}
