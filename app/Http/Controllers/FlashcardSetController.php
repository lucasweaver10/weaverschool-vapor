<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\FlashcardSet;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Services\YouTubeService;
use Illuminate\Support\Facades\Log;
use App\Jobs\CreateFlashcardSetFromTopic;
use App\Jobs\CreateFlashcardSetFromYouTube;

class FlashcardSetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        
    public function index()
    {
        $flashcardSets = auth()->user()->flashcardSetsStudying()->orderBy('created_at', 'desc')->get();

        return view('flashcards.sets.index', compact('flashcardSets'));
    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('flashcards.sets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:191',
            'description' => 'nullable|string|max:191',
            'lesson_id' => 'nullable|integer|exists:lessons,id',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        $flashcardSet = FlashcardSet::create($validatedData);        

        auth()->user()->flashcardSetsStudying()->attach($flashcardSet->id);

        Event::create([
            'user_id' => auth()->user()->id,
            'anonymous_id' => session('uniqueID') ?? null,
            'name' => 'Flashcard set created',
            'properties' => json_encode(['title' => $flashcardSet->title]),
        ]);

        return redirect()->route('flashcards.sets.show', $flashcardSet->id);
    }
    
    public function handleFromTopic(Request $request)
    {
        $validatedData = $request->validate([
            'topic' => 'required|string|max:255',
            'native_language' => 'required|string|max:255',
            'target_language' => 'required|string|max:255',
            'voice_gender' => 'required|string|in:MALE,FEMALE',
        ]);

        $user = auth()->user();
        $topic = $validatedData['topic'];
        $nativeLanguage = $validatedData['native_language'];
        $targetLanguage = $validatedData['target_language'];
        $voiceGender = $validatedData['voice_gender'];       

        $imagesSelected = $request->add_images;
        $voiceExamplesSelected = $request->add_voice_examples;        

        // Only proceed with subscription checks if either images or voice examples are selected
        if ($imagesSelected || $voiceExamplesSelected) {
            $flashcardSetsWithAiGeneratedMediaCount = $user->flashcardSets()
                ->where('ai_generated_media', true)
                ->whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->count();

            // Check for Pro subscription if 1 or more flashcard sets with images and audio are created
            if ($flashcardSetsWithAiGeneratedMediaCount >= 1 && !$user->hasSubscriptionLevel($user->id, 'pro')) {
                return back()->with('error', 'Upgrade to Pro to create 5 monthly flashcard sets with AI.');
            }
        
            // Check for Premium subscription if more than 5 flashcard sets with images and audio are created
            if ($flashcardSetsWithAiGeneratedMediaCount >= 5 && !$user->hasSubscriptionLevel($user->id, 'premium')) {
                return back()->with('error', 'Upgrade to Premium to create more flashcards with AI.');
            }            
        }        

        CreateFlashcardSetFromTopic::dispatch($topic, $nativeLanguage, $targetLanguage, $user->id, $imagesSelected, $voiceExamplesSelected, $voiceGender);

        return redirect()->route('flashcards.sets.index')->with('success', 'Flashcards are processing!');
    }

    public function handleFromYoutube(Request $request)
    {
        $validatedData = $request->validate([
            'set_title' => 'required|string|max:155',
            'video_url' => 'required|url|max:255',
            'video_language' => 'required|string|max:2',
            'native_language' => 'required|string|max:255',
            'target_language' => 'required|string|max:255',
            'voice_gender' => 'required|string|in:MALE,FEMALE',
        ]);

        $user = auth()->user();
        $setTitle = $validatedData['set_title'];
        $videoUrl = $validatedData['video_url'];
        $videoLanguage = $validatedData['video_language'];
        $nativeLanguage = $validatedData['native_language'];
        $targetLanguage = $validatedData['target_language'];
        $voiceGender = $validatedData['voice_gender'];

        $imagesSelected = $request->add_images;
        $voiceExamplesSelected = $request->add_voice_examples;

        $youTubeService = new YouTubeService();        

        $response = $youTubeService->getCaptions($videoUrl, $videoLanguage);                

        if ($response->getStatusCode() === 400) {
            session()->flash('error', $response->getData()->error);
            return redirect()->back()->withInput();
        }

        $videoText = $response->getData()->captions;                

        // send the video text to tokenizer.py
        $result = $youTubeService->tokenizeCaptions($videoText, 14500);        
        $truncatedText = $result['truncated_text'];
        
        CreateFlashcardSetFromYouTube::dispatch($setTitle, $truncatedText, $nativeLanguage, $targetLanguage, $user->id, $imagesSelected, $voiceExamplesSelected, $voiceGender);

        return redirect()->route('flashcards.sets.index')->with('success', 'Flashcards are processing! (Wait just a minute...)');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FlashcardSet  $flashcardSet
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $flashcardSet = FlashcardSet::find($id);

        return view('flashcards.sets.show', compact('flashcardSet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FlashcardSet  $flashcardSet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $flashcardSet = FlashcardSet::findOrFail($id);
        
        return view('flashcards.sets.edit', compact('flashcardSet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FlashcardSet  $flashcardSet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $flashcardSet = FlashcardSet::findOrFail($id);

        if ($flashcardSet->user_id !== auth()->user()->id) {
            return back()->with('error', 'You can only edit flashcard sets that you created');
        }

        $validatedData = $request->validate([
            'title' => 'required|string|max:191',
            'description' => 'nullable|string|max:191',
            'lesson_id' => 'nullable|integer|exists:lessons,id',
        ]);

        $flashcardSet->update($validatedData);

        return redirect()->route('flashcards.sets.show', $flashcardSet->id)->with('success', 'Flashcard set updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FlashcardSet  $flashcardSet
     * @return \Illuminate\Http\Response
     */
    public function destroy(FlashcardSet $flashcardSet)
    {
        //
    }

    public function startStudyingFlashcards(Request $request)
    {
        $userId = $request->input('userId');
        $flashcardSetGroupId = $request->input('flashcardSetGroupId');
        FlashcardSet::startStudyingFlashcards($userId, $flashcardSetGroupId);

        return redirect()->route('flashcards.sets.index');

    }

    public function createFromList()
    {    
        return view('flashcards.sets.create.list');
    }

    public function createFromFile()
    {        
        return view('flashcards.sets.create.file');
    }

    public function createFromTopic()
    {
        return view('flashcards.sets.create.topic');
    }

    public function createFromYouTube()
    {
        return view('flashcards.sets.create.youtube');
    }
}
