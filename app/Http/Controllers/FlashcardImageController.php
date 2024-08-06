<?php

namespace App\Http\Controllers;

use OpenAI;
use App\Models\Flashcard;
use App\Models\FlashcardSet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Jobs\CreateFlashcardImageWithOpenAI;


class FlashcardImageController extends Controller
{
    public function create($id) {
        $flashcardSet = FlashcardSet::findOrFail($id);    
        return view('flashcards.images.create', compact('flashcardSet'));
    }

    public function store(Request $request)
    {
        $flashcardSetId = $request->flashcard_set_id;
        $flashcards = Flashcard::where('flashcard_set_id', $flashcardSetId)->where('image_url', null)->get();
        foreach($flashcards as $flashcard)
        {
            CreateFlashcardImageWithOpenAI::dispatch($flashcard->id);
        }
        return redirect()->route('flashcards.sets.show', $flashcardSetId)->with('success', 'Images are processing. Please check back in a few minutes.');
    }
}
