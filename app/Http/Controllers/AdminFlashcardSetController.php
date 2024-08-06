<?php

namespace App\Http\Controllers;

use App\Models\FlashcardSet;
use Illuminate\Http\Request;

class AdminFlashcardSetController extends Controller
{
    public function create()
    {
        return view('admin.flashcardSets.create');
    }

    public function index()
    {
        $flashcardSets = FlashcardSet::where('user_id', auth()->user()->id)->get();

        return view('admin.flashcardSets.index', compact('flashcardSets'));
    }

    public function store(Request $request)
    {
        $flashcardSet = FlashcardSet::create([
            'title' => $request['title'],
            'description' => $request['description'] ?? null,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('admin.flashcards.sets.index');
    }
}
