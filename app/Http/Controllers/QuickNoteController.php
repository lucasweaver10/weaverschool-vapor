<?php

namespace App\Http\Controllers;

use user;
use App\Models\Event;
use App\Models\QuickNote;
use App\Models\QuickNoteSet;
use Illuminate\Http\Request;
use App\Jobs\CreateFlashcardsFromQuickNote;
use App\Jobs\CreateExplanationFromQuickNote;

class QuickNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        if(!$user->quickNoteSet) {
            return redirect()->route('quick-note.create');
        }

        $quickNotes = $user->quickNoteSet->quickNotes;        
        $flashcardSetId = $user->quickNoteSet->flashcardSet->id;

        return view('quick-notes.index', compact('quickNotes', 'flashcardSetId'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('quick-notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('audio') && $request->file('audio')->isValid()) {
            $audio = $request->audio;
            $path = $audio->store('audio', 'public');
            // In case I end up needing the full path //
            // $audioPath = storage_path('app/public/' . $path);

            $openAiController = new OpenAiController();
            $text = $openAiController->transcribeAudio($path);
        } elseif ($request->has('text')) {
            $text = $request->input('text');
        }

        if (!$text) {
            return response()->json(['error' => true, 'message' => 'Sorry, there was a problem with your input.']);
        }

        if (!auth()->check()) { // If no user is logged in            
            session()->put('quickNoteText', $text);

            return response()->json([
                'error' => true,
                'require_auth' => true,
                'message' => 'Please log in or create an account to create a quick note.'
            ]);
        }

        $user = auth()->user();

        if (!$user->quickNoteSet) {
            $quickNoteSet = QuickNoteSet::create([
                'user_id' => $user->id,
                'title' => 'Quick Notes',
            ]);
        } else {
            $quickNoteSet = $user->quickNoteSet;
        }

        $quicknote = QuickNote::create([
            'user_id' => $user->id,
            'quick_note_set_id' => $quickNoteSet->id,
            'text' => $text,
        ]);

        $userId = $user->id;
        $quickNoteId = $quicknote->id;

        CreateExplanationFromQuickNote::dispatch($text, $quickNoteId);

        CreateFlashcardsFromQuickNote::dispatch($text, $userId, $quickNoteId);

        Event::create([
            'user_id' => $userId,
            'name' => 'Quick note created',
            'properties' => json_encode([
                'text' => $text,                
            ]),
        ]);

        return response()->json(['success' => true, 'message' => 'Flashcards are processing']);
    }

    /**
     * Display the specified resource.
     */
    public function show(QuickNote $quickNote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QuickNote $quickNote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, QuickNote $quickNote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QuickNote $quickNote)
    {
        //
    }
    
    public function info() 
    {
        return view('quick-notes.info');
    }
}
