<?php

namespace App\Http\Controllers;

use App\Models\KeyPhrase;
use App\Models\CulturalNote;
use App\Models\LearningPath;
use Illuminate\Http\Request;
use App\Models\VocabularyWord;
use App\Jobs\GenerateLearningPath;
use App\Jobs\UpdateLearningPathForNewNativeLanguage;
use App\Models\Language;

class LearningPathController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($locale)
    {
        $user = auth()->user();
        // Make $learningPaths in descending order from the latest
        $learningPaths = $user->learningPaths()->orderBy('created_at', 'desc')->get();
        
        return view('dashboard.learning-paths.index', compact('learningPaths'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($locale)
    {
        return view('dashboard.learning-paths.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $learningPathsCount = $user->learningPaths()->count();
        if (!$user->subscribed('premium') && $learningPathsCount >= 1) {
            return back()
                ->with('error', 'You need to upgrade to Premium to create more Learning Paths.');
        }
        
        $userId = auth()->user()->id;
        $topic = $request->topic;
        $nativeLanguage = $request->native_language;
        $targetLanguage = $request->target_language;
        $voiceGender = $request->voice_gender;

        GenerateLearningPath::dispatch($topic, $nativeLanguage, $targetLanguage, $voiceGender, $userId);        

        return back()->with('success', 'Your learning path is processing. Please check in a few minutes.');
    }

    public function studyExisting(Request $request)
    {
        if (!auth()->check()) {
            return back()->with('error', 'Log in or create an account to study this Learning Path');
        }

        $learningPathsCount = auth()->user()->learningPaths()->count();
        if (!auth()->user()->subscribed('premium') && $learningPathsCount >= 2) {
            return back()
                ->with('error', 'You need to upgrade to Premium to study more Learning Paths.');
        }

        $request->validate([
            'learning_path_id' => 'required|exists:learning_paths,id',
            'native_language' => 'required',
            'voice_gender' => 'required',
        ]);
        
        $learningPathId = $request->learning_path_id;
        $nativeLanguage = $request->native_language;
        $voiceGender = $request->voice_gender;

        UpdateLearningPathForNewNativeLanguage::dispatch($learningPathId, $nativeLanguage, $voiceGender);              

        return redirect()->route('learning-paths.index', ['locale' => session('locale', 'en')])->with('success', "We're building your learning path. Please check in a few minutes.");
    }

    /**
     * Display the specified resource.
     */
    public function show($locale, $learningPathId)
    {
        $user = auth()->user();
        $path = $user->learningPaths()
            ->with(['vocabularyWords', 'keyPhrases', 'culturalNotes'])
            ->find($learningPathId);                  

        return view('dashboard.learning-paths.show', compact('path'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LearningPath $learningPath)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LearningPath $learningPath)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LearningPath $learningPath)
    {
        //
    }

    public function vocabularyShow($locale, $learningPathId, $vocabularyWordId)
    {
        $user = auth()->user(); // Get the authenticated user
        $path = $user->learningPaths()->where('learning_path_id', $learningPathId)->first();
        $word = VocabularyWord::find($vocabularyWordId);

        if (!$path || !$word) {
            abort(404); // Return a 404 error if the path or word doesn't exist
        }

        $vocabularyWords = $path->vocabularyWords()->orderBy('id')->get(); // Get all vocabulary words sorted by ID

        // Get current word index
        $currentIndex = $vocabularyWords->search(function ($item, $key) use ($word) {
            return $item->id === $word->id;
        });

        // Get previous and next words
        $prevWord = $currentIndex > 0 ? $vocabularyWords[$currentIndex - 1] : null;
        $nextWord = $currentIndex < $vocabularyWords->count() - 1 ? $vocabularyWords[$currentIndex + 1] : null;

        return view('dashboard.learning-paths.vocabulary.show', compact(['path', 'word', 'prevWord', 'nextWord']));
    }

    public function phraseShow($locale, $learningPathId, $phraseId)
    {
        $user = auth()->user(); // Get the authenticated user
        $path = $user->learningPaths()->where('learning_path_id', $learningPathId)->first();
        $phrase = KeyPhrase::find($phraseId);

        if (!$path || !$phrase) {
            abort(404); // Return a 404 error if the path or phrase doesn't exist
        }

        $keyPhrases = $path->keyPhrases()->orderBy('id')->get(); // Get all key phrases sorted by ID

        // Get current phrase index
        $currentIndex = $keyPhrases->search(function ($item, $key) use ($phrase) {
            return $item->id === $phrase->id;
        });

        // Get previous and next phrases
        $prevPhrase = $currentIndex > 0 ? $keyPhrases[$currentIndex - 1] : null;
        $nextPhrase = $currentIndex < $keyPhrases->count() - 1 ? $keyPhrases[$currentIndex + 1] : null;

        return view('dashboard.learning-paths.phrases.show', compact(['path', 'phrase', 'prevPhrase', 'nextPhrase']));
    }

    public function culturalNoteShow($locale, $learningPathId, $noteId)
    {
        $user = auth()->user(); // Get the authenticated user
        $path = $user->learningPaths()->where('learning_path_id', $learningPathId)->first();
        $note = CulturalNote::find($noteId);

        if (!$path || !$note) {
            abort(404); // Return a 404 error if the path or note doesn't exist
        }

        $culturalNotes = $path->culturalNotes()->orderBy('id')->get(); // Get all cultural notes sorted by ID

        // Get current note index
        $currentIndex = $culturalNotes->search(function ($item, $key) use ($note) {
            return $item->id === $note->id;
        });

        // Get previous and next notes
        $prevNote = $currentIndex > 0 ? $culturalNotes[$currentIndex - 1] : null;
        $nextNote = $currentIndex < $culturalNotes->count() - 1 ? $culturalNotes[$currentIndex + 1] : null;

        return view('dashboard.learning-paths.cultural-notes.show', compact(['path', 'note', 'prevNote', 'nextNote']));
    }

    public function info($locale) 
    {
        return view('learning-paths.info');
    }

    public function explore($locale)
    {
        $paths = LearningPath::all();
        $languages = Language::has('learningPaths')->get();
        return view('learning-paths.explore.index', compact(['paths', 'languages']));
    }

    public function exploreShow($locale, $languageSlug, $pathSlug)
    {
        $path = LearningPath::where('slug', $pathSlug)->with(['vocabularyWords', 'keyPhrases', 'culturalNotes'])->first();        

        return view('learning-paths.explore.show', compact('path'));
    }

    public function exploreLanguageIndex($locale, $languageSlug)
    {
        $language = Language::where('slug', $languageSlug)->with('learningPaths')->first();        
        $paths = $language->learningPaths;        

        return view('learning-paths.explore.language.index', compact('paths'));
    }    
}
