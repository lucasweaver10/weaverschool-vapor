<?php

namespace App\Http\Controllers;

use App\Models\FlashcardSet;
use Illuminate\Http\Request;

class FlashcardSetsExplorerController extends Controller
{
    public function index()
    {
        $userIds = [771, 91];

        $flashcardSets = FlashcardSet::where('quick_note_set_id', null)
            ->whereIn('user_id', $userIds)
            ->get();     
        
        return view('flashcards.explore.sets.index', compact('flashcardSets'));
    }

    public function show($locale, $id)
    {
        $flashcardSet = FlashcardSet::find($id);        
        return view('flashcards.explore.sets.show', compact('flashcardSet'));
    }
}
