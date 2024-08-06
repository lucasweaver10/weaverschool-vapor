<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Registration;
use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\App;
use App\Models\Lesson;
use App\Models\FlashcardSet;
use App\Models\Flashcard;

class AdminController extends Controller
{
    public function index()
    {        
        return view('admin.index');
    }

    public function show($id) {
        $registrations = Registration::all()->load('teacher', 'user', 'privateLessons');
        $registration = $registrations->find($id);

        return view('admin.registrations.show', [
            'registration' => $registration
        ]);
    }

    // make a function to store new flashcards in the flashcard model from $lesson->vocabularyWords for each vocabularyWord in a lesson //
    public function storeFlashcards(Request $request) {
        $lesson = Lesson::find($request->lesson_id);

        $flashcardSet = FlashcardSet::create([
            'title' => $lesson->title,
            'lesson_id' => $lesson->id,
            'description' => 'Flashcards for ' . $lesson->description,
            'user_id' => auth()->user()->id,
        ]);

        foreach ($lesson->vocabularyWords as $vocabularyWord) {
            $flashcard = Flashcard::create([
                'term' => $vocabularyWord->word,
                'definition' => $vocabularyWord->definition,
                'flashcard_set_id' => $flashcardSet->id,
                'vocabulary_word_id' => $vocabularyWord->id,
                'example' => $vocabularyWord->writtenExamples->first()->example ?? '',
            ]);

            $this->getAndStoreGoogleImageForVocabularyWord($flashcard);

        }

        return back()->with('success', 'Flashcards created successfully!');
    }

    public function getAndStoreGoogleImageForVocabularyWord($flashcard) {
        $apiKey = env('GOOGLE_JSON_API_KEY');
        $searchEngineId = '730b379afde3047e3';
        $searchQuery = urlencode($flashcard->definition);
        $googleApiUrl = "https://www.googleapis.com/customsearch/v1?key=" . $apiKey . "&cx=" . $searchEngineId . "&q=" . $searchQuery . "&searchType=image";

        $response = Http::get($googleApiUrl);

        if ($response->getStatusCode() === 200) {
            $responseData = json_decode($response->getBody(), true);

            // Check if there are any image results
            if (isset($responseData['items'][0]['link'])) {
                $imageUrl = $responseData['items'][0]['link'];

                // Save the image URL to the flashcard
                $flashcard = Flashcard::find($flashcard->id)
                    ->update(['image_url' => $imageUrl]);
            }
        }
    }

    public function registrations()
    {
        $registrations = Registration::all()->load('group');

        $groups = Group::all();


        return view('admin.registrations.index', [
            'registrations' => $registrations,
            'groups' => $groups,
            ]);

    }

    public function users()
    {
        $users = User::with('groups')->get();

        return view('admin.users.index', [
            'users' => $users,
            ]);
    }

    public function usersIndex()
    {
        $users = User::selectRaw('users.*, MAX(events.created_at) as latest_event_created_at')
            ->join('events', 'users.id', '=', 'events.user_id')
            ->groupBy('users.id')
            ->orderBy('latest_event_created_at', 'desc')
            ->take(50)
            ->get();



        return view('admin.users.index', [
            'users' => $users,
            ]);
    }

    public function userShow($id)
    {
        $user = User::find($id);

        return view('admin.users.show', [
            'user' => $user,
            ]);
    }
}
