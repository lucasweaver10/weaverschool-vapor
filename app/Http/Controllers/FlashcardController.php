<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Flashcard;
use App\Models\FlashcardSet;
use App\Models\Registration;
use Illuminate\Http\Request;
use App\Models\FlashcardSide;
use App\Models\SyntheticVoice;
use App\Models\VocabularyWord;
use Illuminate\Support\Carbon;
use App\Models\FlashcardExample;
use App\Jobs\AddExampleToFlashcard;
use Illuminate\Support\Facades\Log;
use App\Jobs\CreateFlashcardsFromTopic;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\AudioController;
use App\Jobs\CreateFlashcardsFromQuickNote;
use App\Livewire\Admin\AuthorImages\Create;
use App\Jobs\CreateFlashcardImageWithOpenAI;
use App\Jobs\CreateFlashcardAudioWithGoogleCloud;

class FlashcardController extends Controller
{
    public function index($id)
    {
        $user = auth()->user();

        $flashcardSet = FlashcardSet::find($id);
        $flashcards = $flashcardSet->flashcards->shuffle();
        $neuralBreaks = number_format((ceil($flashcards->count() * .2)), 0);

        if($flashcards->count() > 5) {
            $randomKeys = array_rand(range(1, $flashcards->count() - 2), $neuralBreaks);
            $randomNumbers = array_map(function ($key) {
                return $key + 1;
            }, $randomKeys);
        }
        else {
            $randomNumbers = [1];
        }

        $totalWords = $flashcards->count();

        return view('flashcards.index', compact('flashcards', 'randomNumbers',
            'totalWords', 'id'));
    }

    public function create($id)
    {
        return view('flashcards.create', compact('id'));
    }

    public function createFromList($id)
    {
        $flashcardSet = FlashcardSet::find($id);
        return view('flashcards.create-list', compact('id', 'flashcardSet'));
    }

    public function createFromFile($id)
    {
        $flashcardSet = FlashcardSet::find($id);
        return view('flashcards.create-file', compact('id', 'flashcardSet'));
    }

    public function store(Request $request) {

        $validatedData = $request->validate([
            'flashcard_set_id' => 'required|integer',
            'term' => 'required|string|max:255',
            'definition' => 'required|string|max:400',
            'example' => 'nullable|string|max:255',
            'image_url' => 'nullable|url',
        ]);

        $flashcard = Flashcard::create($validatedData);

        Event::create([
            'user_id' => auth()->user()->id,
            'anonymous_id' => session('uniqueID') ?? null,
            'name' => 'Flashcard created',
            'properties' => json_encode(['term' => $validatedData['term']]),
        ]);

        return back()->with('success', 'Flashcard created successfully!');
    }

    public function show($setId, $id)
    {
        $flashcard = Flashcard::find($id);

        return view('flashcards.show', compact('flashcard', 'setId'));
    }

    public function edit($setId, $id)
    {
        $flashcard = Flashcard::find($id);

        return view('flashcards.edit', compact('flashcard', 'setId'));
    }

    public function update(Request $request, $id)
    {
        $flashcard = Flashcard::findOrFail($id);

        if($flashcard->set->user_id !== auth()->user()->id) {
            return back()->with('error', 'You can only edit flashcards that you created');
        }

        $validatedData = $request->validate([
            'term' => 'required|string|max:255',
            'definition' => 'required|string|max:400',
            'example' => 'nullable|string|max:255',
            'image_url' => 'nullable|url',
        ]);
        
        $flashcard->update($validatedData);

        return redirect('/flashcards/sets/' . $flashcard->flashcard_set_id)->with('success', 'Flashcard updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flashcard = Flashcard::find($id);
        // Check if flashcard exists
        if (!$flashcard) {
            return redirect()->back()->with('error', 'Flashcard not found.');
        }

        // Check if the user is authorized to delete the flashcard //
        if ($flashcard->set->user_id !== auth()->user()->id) {
            return redirect()->back()->with('error', 'You can only delete flashcards that you created.');
        }

        // Get the set ID before deleting the flashcard
        $setId = $flashcard->set->id;
        // Perform the deletion
        try {
            $flashcard->delete();
            return redirect()->route('flashcards.sets.show', $setId)
                ->with('success', 'Flashcard deleted successfully.');
        } catch (\Exception $e) {
            // You can log the exception if needed
            return redirect()->back()->with('error', 'Error occurred while deleting the flashcard.');
        }
    }

    public function info() {
        session(['flashcardsInterest' => 'true']);
        return view('flashcards.info');
    }

    public function featuresIndex()
    {
        session(['flashcardsInterest' => 'true']);
        return view('flashcards.features.index');
    }

    public function createFromFileFeature() {
        session(['flashcardsInterest' => 'true']);
        return view('flashcards.features.create-from-file');
    }

    public function createFromTopic() {
        session(['flashcardsInterest' => 'true']);
        return view('flashcards.features.create-from-topic');
    }

    public function imageMode() {
        session(['flashcardsInterest' => 'true']);
        return view('flashcards.features.image-mode');
    }

    public function neuralReplay() {
        session(['flashcardsInterest' => 'true']);
        return view('flashcards.features.neural-replay');
    }

    public function spacedRepetition() {
        session(['flashcardsInterest' => 'true']);
        return view('flashcards.features.spaced-repetition');
    }

    public function voicePronunciation() {
        session(['flashcardsInterest' => 'true']);
        return view('flashcards.features.voice-pronunciation');
    }

    public function whiteNoise() {
        session(['flashcardsInterest' => 'true']);
        return view('flashcards.features.white-noise');
    }

    public function imageCreation() {
        session(['flashcardsInterest' => 'true']);
        return view('flashcards.features.image-creation');
    }

    public function createFlashcardsAudioWithGoogleCloud(Request $request)
    {
        $audioController = new AudioController();
        $flashcardSetId = $request->flashcard_set_id;
        $flashcardSet = FlashcardSet::find($flashcardSetId);

        if ($flashcardSet->user_id !== auth()->user()->id) {
            return back()->with('error', 'You can only create audio for flashcard sets that you created');
        }

        $flashcards = $flashcardSet->flashcards;
        
        foreach($flashcards as $flashcard)
        {
            $text = $flashcard->term;
            $response = $audioController->createAudioWithGoogleCloudTextToSpeech($text);
            if ($response instanceof \Illuminate\Http\Response && $response->status() != 200) {
                // Handle the error more appropriately, maybe log it or extract the error message
                $errorMessage = json_decode($response->getContent(), true)['error'] ?? 'Error creating audio';
                Log::error('Text-to-Speech error: Unsuccessful response', [
                    'status' => $response->status(),
                    'response' => $errorMessage,
                ]);
                return back()->with('error', $errorMessage);
            } elseif (!empty($response)) {
                // Assuming response is the audio content
                $audioContent = $response;
                $filename = 'audio/audio_' . uniqid() . '.mp3';
                Storage::put($filename, $audioContent);
                $flashcard->update(['audio_url' => $filename]);
            } else {
                // Fallback error handling
                return back()->with('error', 'Error creating audio');
            }
        }
        return redirect()->route('flashcards.sets.show', $flashcardSetId)->with('success', 'Audio created successfully');
    }

    public function addExampleToFlashcard($id)
    {
        AddExampleToFlashcard::dispatch($id);
        return true;
    }

    public function createFlashcardsFromQuickNote($text, $flashcardSetId) {        
        $openAiController = new OpenAiController();
        $flashcardSetId = $openAiController->createFlashcardsFromQuickNote($text, $flashcardSetId);

        return $flashcardSetId;
    }

    public function createFlashcardSetForQuickNoteSet($userId, $quickNoteSetId) {
        $flashcardSet = FlashcardSet::create([
            'user_id' => $userId,
            'title' => 'Quick Notes',
            'description' => 'Flashcards for your Quick Notes',
            'quick_note_set_id' => $quickNoteSetId,
        ]);

        $user = User::find($userId);

        $user->flashcardSetsStudying()->attach($flashcardSet->id);

        return $flashcardSet->id;
    }

    public function createFlashcardImages($flashcardSetId) {
        $flashcardSet = FlashcardSet::find($flashcardSetId);
        
        foreach($flashcardSet->flashcards as $flashcard) {
            CreateFlashcardImageWithOpenAI::dispatch($flashcard->id);
        }   
    }

    public function createFlashcardAudio($flashcardSetId) {
        $flashcardSet = FlashcardSet::find($flashcardSetId);
        
        foreach($flashcardSet->flashcards as $flashcard) {
            if(!$flashcard->locale) {
                Log::error('Flashcard locale not set', [
                    'flashcard_id' => $flashcard->id,
                ]);
            } else {
                $voice = SyntheticVoice::where('locale', $flashcard->locale)->first();
                CreateFlashcardAudioWithGoogleCloud::dispatch($flashcard->id, $voice->voice_locale, $voice->voice_name);
            }
        }
    }
}
