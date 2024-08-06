<?php

namespace App\Http\Controllers;

use OpenAI;
use Exception;
use App\Models\User;
use App\Models\Event;
use App\Models\FlashcardSet;
use App\Models\LearningPath;
use Illuminate\Http\Request;
use App\Models\VocabularyWord;
use App\Models\EssayCorrection;
use App\Models\EssaySubmission;
use Illuminate\Support\Facades\Log;
use App\Models\IeltsEssaySubmission;

class OpenAiController extends Controller {

    public function transcribeAudio($audioFile)
    {
        $key = config('services.openai.key');
        $client = OpenAI::client($key);

        $response = $client->audio()->transcribe([
            'model' => 'whisper-1',
            'file' => fopen(storage_path('app/public/' . $audioFile), 'r'),
            'response_format' => 'verbose_json',            
        ]);                

        return $response->text;
    
    }

    public function correctIeltsEssay($essayId)
    {
        try
        {
            $key = config('services.openai.key');
            $client = OpenAI::client($key);
            $essay = EssaySubmission::find($essayId);
            $response = $client->chat()->create([
                'model' => 'gpt-4-0125-preview',
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => "Review the following text and provide corrections. Please format the response by including the original text with strikethrough for incorrect parts and use italics for the corrected parts. Use markdown format for the corrections. Here's the text: . $essay->essay_content . -- Important! Don't return any pre or post text dialogue, only the corrected essay."
                    ],
                ],
            ]);
            $corrections = [];
            foreach ($response->choices as $result)
            {
                $corrections[] = $result->message->content;
            }
            $user = auth()->user();
            $correction = EssayCorrection::create([
                'user_id' => $user->id,
                'essay_submission_id' => $essay->id,
                'content' => $corrections[0],
            ]);

            return redirect()->to('/' . session('locale') . '/dashboard/essays/corrections/' . $correction->id);
        } catch (\Exception $e)
        {
            return back()->with('error', __('Error processing your request. Please try again later.'));
        }
    }

    public function createFlashcardsWithOpenAI($userId, $targetLanguage, $nativeLanguage, $type, $text, $flashcardSetId)
    {
        $key = config('services.openai.key');
        $client = OpenAI::client($key);
        $user = User::find($userId);

        try
        {
            if($type == 'translations') {
                $response = $client->chat()->create([
                    'model' => 'gpt-4-1106-preview',
                    'response_format' => ['type' => 'json_object'],
                    'messages' => [
                        [
                            'role' => 'user',
                            'content' => "Please extract all the relevant vocabulary words that match the tessaract language
                            code: $targetLanguage, from the included text. Then, return a json formatted array named 'vocabulary' of key value pairs with
                            with the vocabulary words, their translations, and examples, in $nativeLanguage. For example,
                            'term': '학원', 'definition': 'academy', 'example': '저는 영어를 배우기 위해 학원에 다닙니다.'. Here is the text: $text.
                            Remember to name the array 'vocabulary'."
                        ],
                    ],
                ]);
            } elseif($type == 'definitions') {
                $response = $client->chat()->create([
                    'model' => 'gpt-4-1106-preview',
                    'response_format' => ['type' => 'json_object'],
                    'messages' => [
                        [
                            'role' => 'user',
                            'content' => "Please extract all the relevant vocabulary words that match the tessaract language
                            code: $targetLanguage, from the included text. Then, return a json formatted array named 'vocabulary' of key value pairs with
                            with the vocabulary words, their definitions, and an example, in $nativeLanguage. For example,
                            'term': '학원', 'definition': '학생들이 학교 수업 외에 특정 과목이나 기술을 배우기 위해 다니는 사설 교육 기관.', 'example': '저는 영어를 배우기 위해 학원에 다닙니다.'. Here is the text: $text.
                            Remember to name the array 'vocabulary'."
                        ],
                    ],
                ]);
            }

            foreach ($response->choices as $result)
            {
                $responseContent = json_decode($result->message->content, true);
                if (isset($responseContent['vocabulary']) && is_array($responseContent['vocabulary']))
                {
                    $vocabularyWords = $responseContent['vocabulary'];
                    $flashcardSet = FlashcardSet::findOrFail($flashcardSetId);
                    foreach ($vocabularyWords as $wordObject)
                    {
                        $term = $wordObject['term'];
                        $definition = $wordObject['definition'];
                        $example = $wordObject['example'];

                        $flashcardSet->flashcards()->create([
                            'term' => $term,
                            'definition' => $definition,
                            'flashcard_set_id' => $flashcardSetId,
                            'example' => $example
                        ]);
                    }
                } else
                {
                    // Send the user an error message
                    Log::error('Response from OpenAI does not match array specification', ['response' => $response]);
                    session()->flash('error', __('Error processing your request. Please try again.'));
                }
                // Send an in-app notification to the user that the flashcards are ready
                //    $user->notify(new FlashcardsReady($this->flashcardSet));
                Log::debug('Flashcards process completed');
            }
        }
        catch (\Exception $e)
        {
            // Handle and log exception
            Log::error('Error interacting with OpenAI', ['exception' => $e->getMessage()]);
            session()->flash('error', __('Error processing your request. Please try again later.'));
        }
    }

    public function createFlashcardExampleWithOpenAI($word)
    {
        $key = config('services.openai.key');
        $client = OpenAI::client($key);

        try {
            $response = $client->chat()->create([
                'model' => 'gpt-4-1106-preview',
                'response_format' => ['type' => 'json_object'],
                'messages' => [
                    [
                        'role' => 'user',                        
                        'content' => "Please write an example sentence using the vocabulary word: $word. Then, return a JSON formatted string with the key 'example' and its value being the example sentence you've written. The format should be like 'example' => 'Your example sentence here.'. For instance, if the word is '학원', you could return 'example' => '저는 영어를 배우기 위해 학원에 다닙니다.'."
                    ],
                ],
            ]);

            foreach ($response->choices as $result) {
                $responseContent = json_decode($result->message->content, true);
                if (isset($responseContent['example'])) {
                    $example = $responseContent['example'];                    
                    return $example;                
                } else {
                    // Send the user an error message
                    Log::error('Response from OpenAI does not match array specification', ['response' => $response]);
                    session()->flash('error', __('Error processing your request. Please try again.'));
                }
                // Send an in-app notification to the user that the flashcards are ready
                //    $user->notify(new FlashcardsReady($this->flashcardSet));
                Log::debug('Flashcards process completed');
            }
        } catch (\Exception $e) {
            // Handle and log exception
            Log::error('Error interacting with OpenAI', ['exception' => $e->getMessage()]);
            session()->flash('error', __('Error processing your request. Please try again later.'));
        }
    }


    public function createFlashcardImage($example)
    {
        $key = config('services.openai.key');
        $client = OpenAI::client($key);

        $response = $client->images()->create([
            'model' => 'dall-e-3',
            'prompt' => "Create an image for the following sentence: $example . IMPORTANT: ABSOLUTELY DO NOT USE TEXT IN THE IMAGE.",
            'n' => 1,
            'size' => '1024x1024',
            'response_format' => 'url',
        ]);

        
        foreach ($response->data as $data) {
            try {
                return $data->url;        
            } catch (Exception $e) {
                // Handle any exceptions
                echo "Error: " . $e->getMessage() . "\n";
            }
        }

    }

    public function createSymbolicFlashcardImage($term, $definition)
    {
        $key = config('services.openai.key');
        $client = OpenAI::client($key);

        $response = $client->images()->create([
            'model' => 'dall-e-3',
            'prompt' => 'Create a symbolic image designed to help remember the word "' . $term . '" which means "' . $definition . '". IMPORTANT: ABSOLUTELY DO NOT USE TEXT IN THE IMAGE.',
            'n' => 1,
            'size' => '1024x1024',
            'response_format' => 'url',
        ]);

        foreach ($response->data as $data) {
            try {
                return $data->url;
            } catch (Exception $e) {
                // Handle any exceptions
                echo "Error: " . $e->getMessage() . "\n";
            }
        }
    }

    public function sendEssayToOpenAiForGrading($type, $topic, $essay, $scoreRange)
    {                
        $key = config('services.openai.key');
        $client = OpenAI::client($key);        

        try {
            $response = $client->chat()->create([
                'model' => 'gpt-4-1106-preview',
                'response_format' => ['type' => 'json_object'],
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => "You are an AI bot named 'the Weaver School AI Essay Grader' specialized in grading $type writing exam essays. You are giving
                    direct feedback to a student on their $type essay. You should tell the student their band
                    score, give feedback on all mistakes they made, as well as how they could improve. Address the
                    student directly as 'Dear student,' in your response.
                    Here is their writing topic: $topic. Here is their essay: $essay. -- Format the 'feedback' json field as markdown and make a new paragraph after each sentence.
                     Also include a 'score' field with the band score as a number between $scoreRange in accordance with the $type exam scoring system."
                    ],
                ],
            ]);

            foreach ($response->choices as $result) {
                $jsonContent = json_decode($result->message->content, true);

                if (isset($jsonContent['feedback']) && isset($jsonContent['score'])) {
                    return [
                        'feedback' => $jsonContent['feedback'],
                        'score' => $jsonContent['score']
                    ];

                }
            }

            // Handle case where no valid response is received
            return back()->with('error', __('No valid response received from the AI. Please try again.'));
 
        } catch (\Exception $e) {
            Log::error('Error interacting with OpenAI', ['exception' => $e->getMessage()]);
        }
    }

    public function createFlashcardsFromQuickNote($text, $flashcardSetId)
    {
        $key = config('services.openai.key');
        $client = OpenAI::client($key);

        try {            
            $response = $client->chat()->create([
                'model' => 'gpt-4-0125-preview',
                'response_format' => ['type' => 'json_object'],
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => "A user learning a language has written down a quick note of something they want to learn how to say in a foreign language. Please determine the language of the text. Then, return a json formatted array named 'vocabulary' of key value pairs with
                        with the relevant vocabulary words, if the language doesn't use the Latin alphabet then include their romanized spelling (using the most phonetically friendly system such as Paiboon for Thai or Pinyin for Chinese), their definitions, an example, and the language locale (like 'th-TH' for Thai), that they will need to learn in order to be able to speak about this topic. For example, a user says 'How to say 'Are you still open?' in Thai'. You would return: 
                        'term': 'เปิด', 'romanized_term': 'bpet', 'definition': 'open (for business)', 'example': 'คุณยังเปิดอยู่ไหม?', 'locale': 'th-TH'. Please note the 'romanized_term' should only be returned if the alphabet is non-Latin. Make sure to include the whole original phrase they ask about along with the translation as one of the vocabulary words in the set. Here is the text: $text. Remember to name the array 'vocabulary'."
                    ],
                ],
            ]);            

            foreach ($response->choices as $result) {
                $responseContent = json_decode($result->message->content, true);
                if (isset($responseContent['vocabulary']) && is_array($responseContent['vocabulary'])) {
                    $vocabularyWords = $responseContent['vocabulary'];                    
                    foreach ($vocabularyWords as $wordObject) {
                        $term = $wordObject['term'];
                        $romanized_term = $wordObject['romanized_term'] ?? null;
                        $definition = $wordObject['definition'];
                        $example = $wordObject['example'];
                        $locale = $wordObject['locale'];
                        $flashcardSet = FlashcardSet::findOrFail($flashcardSetId);

                        $flashcardSet->flashcards()->create([
                            'term' => $term,
                            'romanized_term' => $romanized_term,
                            'definition' => $definition,
                            'locale' => $locale,
                            'flashcard_set_id' => $flashcardSet->id,
                            'example' => $example
                        ]);
                    }
                    return true;
                } else {
                    // Send the user an error message
                    Log::error('Response from OpenAI does not match array specification', ['response' => $response]);
                    session()->flash('error', __('Error processing your request. Please try again.'));
                    return false;
                }
                // Send an in-app notification to the user that the flashcards are ready
                //    $user->notify(new FlashcardsReady($this->flashcardSet));
                Log::debug('Flashcards process completed');
            }
        } catch (\Exception $e) {
            // Handle and log exception
            Log::error('Error interacting with OpenAI', ['exception' => $e->getMessage()]);
            session()->flash('error', __('Error processing your request. Please try again later.'));
        }
    }

    public function createFlashcardsFromTopic($topic, $userId)
    {
        $key = config('services.openai.key');
        $client = OpenAI::client($key);

        try {
            $response = $client->chat()->create([
                'model' => 'gpt-4-0125-preview',
                'response_format' => ['type' => 'json_object'],
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => "A user learning a language has given you a topic they want to learn how to talk about in a foreign language. 
                        Please determine the language of the text. Then, return a json formatted array named 'vocabulary', including a 'vocabulary_set_title', 
                        a 'vocabulary_set_description', and a nested array called 'vocabulary_words' of key value pairs with
                        with the relevant vocabulary words, if the language doesn't use the Latin alphabet then include their romanized spelling 
                        (using the most phonetically friendly system such as Paiboon for Thai or Pinyin for Chinese), their definitions, an example,
                         and the language locale (like 'th-TH' for Thai), that they will need to learn in order to be able to speak about this topic. 
                         For example, a user says 'How to say 'Are you still open?' in Thai'. You would return: 
                        'term': 'เปิด', 'romanized_term': 'bpet', 'definition': 'open (for business)', 'example': 'คุณยังเปิดอยู่ไหม?', 'locale': 'th-TH'.
                         Please note the 'romanized_term' should only be returned if the alphabet is non-Latin. Here is the topic: '$topic'. 
                         Remember to name the array 'vocabulary'."
                    ],
                ],
            ]);            

            foreach ($response->choices as $result) {
                $responseContent = json_decode($result->message->content, true);                
                if (is_array($responseContent)) {

                    $vocabularyWords = $responseContent['vocabulary_words'];

                    $flashcardSetTitle = $responseContent['vocabulary_set_title'];
                    $flashcardSetDescription = $responseContent['vocabulary_set_description'];
                    
                    $flashcardSet = FlashcardSet::create([
                        'title' => $flashcardSetTitle,
                        'description' => $flashcardSetDescription,
                        'user_id' => $userId,
                    ]);                                    

                    $user = User::find($userId);

                    $user->flashcardSetsStudying()->attach($flashcardSet->id);                    

                    foreach ($vocabularyWords as $wordObject) {
                        $term = $wordObject['term'];
                        $romanized_term = $wordObject['romanized_term'] ?? null;
                        $definition = $wordObject['definition'];
                        $example = $wordObject['example'];
                        $locale = $wordObject['locale'];                        

                        $flashcardSet->flashcards()->create([
                            'term' => $term,
                            'romanized_term' => $romanized_term,
                            'definition' => $definition,
                            'locale' => $locale,
                            'flashcard_set_id' => $flashcardSet->id,
                            'example' => $example
                        ]);
                    }                

                    return $flashcardSet->id;
                } else {
                    // Send the user an error message
                    Log::error('Response from OpenAI does not match array specification', ['response' => $response]);
                    session()->flash('error', __('Error processing your request. Please try again.'));
                    return false;
                }
                // Send an in-app notification to the user that the flashcards are ready
                //    $user->notify(new FlashcardsReady($this->flashcardSet));                
            }
        } catch (\Exception $e) {
            // Handle and log exception
            Log::error('Error interacting with OpenAI', ['exception' => $e->getMessage()]);
            session()->flash('error', __('Error processing your request. Please try again later.'));
        }
    }

    public function createExplanationFromQuickNote($text)
    {
        $key = config('services.openai.key');
        $client = OpenAI::client($key);

        try {
            $response = $client->chat()->create([
                'model' => 'gpt-4-0125-preview',
                'response_format' => ['type' => 'json_object'],
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => "A user learning a language has written down a quick note of something they want to learn how to say in a foreign language. 
                        Respond with an explanation that will help them understand and learn the answer to their question Please include the romanized versions of words as well as their native scripts. 
                        Here is their text: $text. -- Format the 'explanation' json field as markdown and make a new paragraph after each sentence."
                    ],
                ],
            ]);

            foreach ($response->choices as $result) {
                $jsonContent = json_decode($result->message->content, true);

                if (isset($jsonContent['explanation'])) {
                    return $jsonContent['explanation']; 
                } else {
                    // Send the user an error message
                    Log::error('Response from OpenAI does not match array specification', ['response' => $response]);                    
                    return false;
                }
                // Send an in-app notification to the user that the flashcards are ready
                //    $user->notify(new FlashcardsReady($this->flashcardSet));                
            }
        } catch (\Exception $e) {
            // Handle and log exception
            Log::error('Error interacting with OpenAI', ['exception' => $e->getMessage()]);
            session()->flash('error', __('Error processing your request. Please try again later.'));
        }
    }

    public function createLearningPath($topic, $nativeLanguage, $targetLanguage)
    {
        $key = config('services.openai.key');
        $client = OpenAI::client($key);        

        try {
            $response = $client->chat()->create([
                'model' => 'gpt-4-0125-preview',
                'response_format' => ['type' => 'json_object'],
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => "You are an AI language learning assistant. A user has given you a topic in a target language that they want to learn about.
                        Your job is to create a learning path for them to follow. The learning path should include a list of vocabulary words, key phrases, 
                        and cultural notes that the user should learn in order to understand the topic. The learning path object should be in the form of a JSON array 
                        with the following structure: ['learning_path' => ['title' => 'Learning path title'], ['description' => 'A short description for the learning path.'], 
                        ['vocabulary_words' => ['word' => 'word', 'romanized_word' => 'A romanized version of the term if it's in a non-latin alphabet', 'definition' => 'definition of the word', 'translation' => 'The translation of the word into the native language',
                         'example' => 'An example of the word used in a sentence.', 'target_locale' => 'The language locale code of the target language in form of en-US', 'native_locale' => 'The language locale code of the native language in form of en-US', 
                         'explanation' => 'An explanation of the word.' ], 'key_phrases' => ['phrase' => 'A phrase in the target language', 'translation' => 'Phrase translated into English'], 
                         'cultural_notes' => ['note' => 'A cultural note they should konw about this topic.']]. 
                        Here is the topic: $topic, the target language is: $targetLanguage, and their native language is: $nativeLanguage."
                    ],
                ],
            ]);

            foreach ($response->choices as $result) {
                $responseContent = json_decode($result->message->content, true);
                if (isset($responseContent['learning_path']) && is_array($responseContent['learning_path'])) {
                    // fetch the array from openAi 
                    $learningPath = $responseContent['learning_path'];                                                        

                    // Accessing various parts of the learning path
                    $title = $learningPath[0]['title'];
                    $description = $learningPath[1]['description'];                    
                    $vocabularyWords = $learningPath[2]['vocabulary_words'];
                    $keyPhrases = $learningPath[2]['key_phrases'];
                    $culturalNotes = $learningPath[2]['cultural_notes'];

                    // Create a learning path in the learning path model //
                    $learningPath = LearningPath::create([
                        'title' => $title,
                        'description' => $description,
                    ]);

                    
                    // Example: looping through vocabulary words
                    foreach ($vocabularyWords as $word) {
                        VocabularyWord::create([
                            'word' => [
                                $word['target_locale'] => $word['word'],
                                $word['native_locale'] => $word['translation'],
                            ],                            
                            'definition' => [
                                $word['target_locale'] => $word['definition'],
                            ],
                            'example' => [
                                $word['target_locale'] => $word['example'],
                            ],                                                        
                            'explanation' => [
                                $word['target_locale'] => $word['explanation'],
                            ],
                            'romanized_word' => $word['romanized_word'],                         
                            'learning_path_id' => $learningPath->id,
                        ]);
                    }

                    foreach ($keyPhrases as $phrase) {
                        // create a key phrase in the key phrase model with a parent learning path id
                    }

                    foreach ($culturalNotes as $note) {
                        // create a cultural note in the cultural note model with a parent learning path id
                    }

                    // Example: Accessing the first cultural note
                    // $firstNote = $culturalNotes[0]['note'];
                    // echo "Cultural note: $firstNote\n";

                    return true;                    
                } else {
                    // Send the user an error message
                    Log::error('Response from OpenAI does not match array specification', ['response' => $response]);
                    session()->flash('error', __('Error processing your request. Please try again.'));
                    return false;
                }
                // Send an in-app notification to the user that the flashcards are ready
                //    $user->notify(new FlashcardsReady($this->flashcardSet));
                Log::debug('Flashcards process completed');
            }
        } catch (\Exception $e) {
            // Handle and log exception
            Log::error('Error interacting with OpenAI', ['exception' => $e->getMessage()]);
            session()->flash('error', __('Error processing your request. Please try again later.'));
        }
    }

    public function generateArrayResponse($prompt)
    {
        $key = config('services.openai.key');
        $client = OpenAI::client($key);        

        try {
            $response = $client->chat()->create([
                'model' => 'gpt-4-0125-preview',
                'response_format' => ['type' => 'json_object'],
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => $prompt,
                    ],
                ],
            ]);

            foreach ($response->choices as $result) {
                $responseContent = json_decode($result->message->content, true);
                if (isset($responseContent) && is_array($responseContent)) {
                   
                    return $responseContent;
                } else {
                    // Send the user an error message
                    Log::error('Response from OpenAI does not match array specification', ['response' => $response]);
                    session()->flash('error', __('Error processing your request. Please try again.'));
                    return false;
                }                
            }
        } catch (\Exception $e) {
            // Handle and log exception
            Log::error('Error interacting with OpenAI', ['exception' => $e->getMessage()]);
            session()->flash('error', __('Error processing your request. Please try again later.'));
        }


    }

}
