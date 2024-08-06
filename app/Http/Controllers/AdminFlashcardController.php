<?php

namespace App\Http\Controllers;

use App\Models\FlashcardSet;
use Illuminate\Http\Request;

class AdminFlashcardController extends Controller
{
    public function create($setId) {
        $flashcardSet = FlashcardSet::findOrFail($setId);
        return view('admin.flashcards.create', compact('flashcardSet'));
    }

    public function index($setId) {
        $flashcardSet = FlashcardSet::findOrFail($setId);
        $flashcards = $flashcardSet->flashcards;

        return view('admin.flashcards.index', compact('flashcardSet', 'flashcards'));
    }
}
