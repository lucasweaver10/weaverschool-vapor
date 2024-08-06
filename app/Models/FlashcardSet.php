<?php

namespace App\Models;

use Exception;
use App\Models\Event;
use App\Models\Flashcard;
use App\Services\OpenAiService;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Log;
use App\Jobs\AttachUserToFlashcardSet;
use Illuminate\Database\Eloquent\Model;
use App\Jobs\GenerateVocabularyWordsFromTopic;
use App\Jobs\CreateFlashcardsFromVocabularyWords;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FlashcardSet extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function createFromTopic($topic, $nativeLanguage, $targetLanguage, $userId, $imagesSelected, $voiceExamplesSelected, $voiceGender)
    {
        $hasAiGeneratedMedia = self::determineAiGeneratedMediaStatus($imagesSelected, $voiceExamplesSelected);
        $aiGenerated = true;
        $flashcardSetPrompt = self::buildFlashcardSetPrompt($topic, $nativeLanguage, $targetLanguage);
        $flashcardSetData = self::generateFlashcardSetData($flashcardSetPrompt);           
        $flashcardSet = self::storeFlashcardSet($flashcardSetData['title'], $flashcardSetData['description'], $userId, $hasAiGeneratedMedia, $aiGenerated);          
        $voiceGender = VoiceGender::ensureVoiceGenderExists($voiceGender, $flashcardSetData['target_locale']);        
        $vocabularyWords = self::generateVocabularyWordsFromTopic($topic, $nativeLanguage, $targetLanguage, $flashcardSetData['target_locale'], $flashcardSetData['native_locale'], $voiceGender);
        Bus::chain([            
            new CreateFlashcardsFromVocabularyWords($vocabularyWords, $flashcardSet->id, $flashcardSetData['target_locale'], $flashcardSetData['native_locale'], $voiceGender, $imagesSelected, $voiceExamplesSelected),
            new AttachUserToFlashcardSet($userId, $flashcardSet->id),
        ])->dispatch();

        Event::create([
            'user_id' => $userId,
            'name' => 'Flashcard set created',
            'properties' => json_encode([
                'source' => 'Create from topic',
                'topic' => $topic,
                'ai_generated_media' => $hasAiGeneratedMedia,
                'target_locale' => $flashcardSetData['target_locale'],
                'voice_gender' => $voiceGender,
            ]),
        ]);
    }

    public static function createFromYouTube($setTitle, $videoText, $nativeLanguage, $targetLanguage, $userId, $imagesSelected, $voiceExamplesSelected, $voiceGender)
    {
        $hasAiGeneratedMedia = self::determineAiGeneratedMediaStatus($imagesSelected, $voiceExamplesSelected);
        $aiGenerated = true;
        $flashcardSetPrompt = self::buildPromptFromTitleAndLanguages($setTitle, $nativeLanguage, $targetLanguage);
        $flashcardSetData = self::generateFlashcardSetData($flashcardSetPrompt);        
        $flashcardSet = self::storeFlashcardSet($flashcardSetData['title'], $flashcardSetData['description'], $userId, $hasAiGeneratedMedia, $aiGenerated);        
        $voiceGender = VoiceGender::ensureVoiceGenderExists($voiceGender, $flashcardSetData['target_locale']);        
        $vocabularyWords = self::generateVocabularyWordsFromYouTube($videoText, $nativeLanguage, $targetLanguage, $flashcardSetData['target_locale'], $flashcardSetData['native_locale'], $voiceGender);                        
        Bus::chain([
            new CreateFlashcardsFromVocabularyWords($vocabularyWords, $flashcardSet->id, $flashcardSetData['target_locale'], $flashcardSetData['native_locale'], $voiceGender, $imagesSelected, $voiceExamplesSelected),
            new AttachUserToFlashcardSet($userId, $flashcardSet->id),
        ])->dispatch();

        Event::create([
            'user_id' => $userId,
            'name' => 'Flashcard set created',
            'properties' => json_encode([
                'source' => 'Create from youtube',
                'title' => $setTitle,
                'ai_generated_media' => $hasAiGeneratedMedia,
                'target_locale' => $flashcardSetData['target_locale'],
                'voice_gender' => $voiceGender,
            ]),
        ]);
    }
    
    public static function createFromExtractedTextFromFile($text, $targetLanguage, $nativeLanguage, $flashcardSetId, $userId, $imagesSelected, $voiceExamplesSelected, $voiceGender)
    {
        $flashcardSet = FlashcardSet::find($flashcardSetId);
        $languageGenerationPrompt = self::buildLanguageInfoGenerationPrompt($targetLanguage, $nativeLanguage);
        $openAiService = new OpenAiService();
        $languageData = $openAiService->generateArrayResponse($languageGenerationPrompt);

        if(isset($languageData['target_locale']) && isset($languageData['native_locale']))
        {
            $targetLocale = $languageData['target_locale'];
            $nativeLocale = $languageData['native_locale'];            
        } else {
            Log::error('Error generating language info from OpenAI: ' . json_encode($languageData));
            return back()->with('error', 'There was an error with your request.');
        }

        $voiceGender = VoiceGender::ensureVoiceGenderExists($voiceGender, $languageData['target_locale']);
        Log::error($voiceGender);

        $vocabularyWordsGenerationPrompt = self::buildPrompForVocabularyWordsGenerationFromTextExtractedFromFile($text, $targetLanguage, $nativeLanguage);
        $vocabularyWords = VocabularyWord::generateFromPrompt($vocabularyWordsGenerationPrompt, $targetLocale, $nativeLocale, $voiceGender);

        Bus::chain([
            new CreateFlashcardsFromVocabularyWords($vocabularyWords, $flashcardSet->id, $languageData['target_locale'], $languageData['native_locale'], $voiceGender, $imagesSelected, $voiceExamplesSelected),            
        ])->dispatch();

        Event::create([
            'user_id' => $userId,
            'name' => 'Flashcard set created',
            'properties' => json_encode([
                'source' => 'Create from file',                                
                'target_locale' => $targetLocale,
                'voice_gender' => $voiceGender,
            ]),
        ]);
    }

    public static function createFromChromeExtension($title, $targetLanguage, $nativeLanguage, $contentType, $imagesSelected, $voiceExamplesSelected, $voiceGender, $content, $userId)
    {
        
        $hasAiGeneratedMedia = self::determineAiGeneratedMediaStatus($imagesSelected, $voiceExamplesSelected);
        $aiGenerated = true;
        $flashcardSetPrompt = self::buildPromptFromTitleAndLanguages($title, $nativeLanguage, $targetLanguage);
        $flashcardSetData = self::generateFlashcardSetData($flashcardSetPrompt);
        $flashcardSet = self::storeFlashcardSet($flashcardSetData['title'], $flashcardSetData['description'], $userId, $hasAiGeneratedMedia, $aiGenerated);
        $voiceGender = VoiceGender::ensureVoiceGenderExists($voiceGender, $flashcardSetData['target_locale']); 
        
        $vocabularyWordsGenerationPrompt = self::buildPrompForVocabularyWordsGenerationFromTextExtractedFromFile($content, $targetLanguage, $nativeLanguage);        
        $vocabularyWords = VocabularyWord::generateFromPrompt($vocabularyWordsGenerationPrompt, $flashcardSetData['target_locale'], $flashcardSetData['native_locale'], $voiceGender);

        Bus::chain([
            new CreateFlashcardsFromVocabularyWords($vocabularyWords, $flashcardSet->id, $flashcardSetData['target_locale'], $flashcardSetData['native_locale'], $voiceGender, $imagesSelected, $voiceExamplesSelected),
            new AttachUserToFlashcardSet($userId, $flashcardSet->id),
        ])->dispatch();

        Event::create([
            'user_id' => $userId,
            'name' => 'Flashcard set created',
            'properties' => json_encode([
                'source' => 'Create from Chrome extension',
                'ttitle' => $title,
                'ai_generated_media' => $hasAiGeneratedMedia,
                'target_locale' => $flashcardSetData['target_locale'],
                'voice_gender' => $voiceGender,
            ]),
        ]);

    }

    // public static function createUsingDefinitionModeFromExtractedTextFromFile($text, $targetLanguage, $nativeLanguage, $flashcardSetId, $userId, $imagesSelected, $voiceExamplesSelected, $voiceGender)
    // {
    //     $languageGenerationPrompt = self::buildLanguageInfoGenerationPrompt($targetLanguage, $nativeLanguage);
    //     $openAiService = new OpenAiService();
    //     $languageData = $openAiService->generateArrayResponse($languageGenerationPrompt);

    //     if (isset($languageData['target_locale']) && isset($languageData['native_locale'])) {
    //         $targetLocale = $languageData['target_locale'];
    //         $nativeLocale = $languageData['native_locale'];
    //     } else {
    //         Log::error('Error generating language info from OpenAI: ' . json_encode($languageData));
    //         return back()->with('error', 'There was an error with your request.');
    //     }

    //     $voiceGender = VoiceGender::ensureVoiceGenderExists($voiceGender, $languageData['target_locale']);

    //     $vocabularyWordsUsingDefinitionModeGenerationPrompt = self::buildPromptUsingDefinitionModeForVocabularyWordsGenerationFromTextExtractedFromFile($text, $targetLanguage);
    //     $vocabularyWords = VocabularyWord::generateFromPrompt($vocabularyWordsUsingDefinitionModeGenerationPrompt, $targetLocale, $nativeLocale, $voiceGender);


    // }

    public static function buildPrompForVocabularyWordsGenerationFromTextExtractedFromFile($text, $targetLanguage, $nativeLanguage)
    {
        $prompt = "Please extract all the relevant vocabulary words that match the tessaract language
        code: $targetLanguage, from this text: '{$text}'. Then return a JSON formatted array named 'vocabulary_words' of key value pairs 
        with the vocabulary words, their translations, examples, and romanized versions if necessary. 
        The content you return should be in the form of a JSON array with the following structure: 
        ['vocabulary_words' => ['word' => 'Word', 'translation' => 'Tranlsation of the word into their native langauge of {$nativeLanguage}',        
        'romanized_word' => 'Optional: If using a non-Latin-based alphabet, include a Romanized version of the word using the most phonetically friendly system 
        such as Paiboon for Thai or Pinyin for Chinese. If the language uses a Latin-based alphabet, such as Vietnamese or Spanish, omit this field',
        'example' => 'An example sentence using the word in {$targetLanguage}', 'romanized_example' => 'Optional: If using a non-Latin-based alphabet, 
        include a Romanized version of the example sentence using the most phonetically friendly system such as Paiboon for Thai or Pinyin for Chinese. 
        If the language uses a Latin-based alphabet, such as Vietnamese or Spanish, omit this field',]]
        Important! You must name the array 'vocabulary_words'!";

        return $prompt;
    }

    // public static function buildPromptUsingDefinitionModeForVocabularyWordsGenerationFromTextExtractedFromFile($text, $targetLanguage)
    // {
    //     $prompt = "Please extract all the relevant vocabulary words that match the tessaract language
    //     code: $targetLanguage, from this text: '{$text}'. Then return a JSON formatted array named 'vocabulary_words' of key value pairs 
    //     with the vocabulary words and their definitions. 
    //     The content you return should be in the form of a JSON array with the following structure: 
    //     ['vocabulary_words' => 
    //         [
    //             'word' => 'word', 
    //             'definition' => 'Definition of the word into the target langauge of {$targetLanguage}',        
    //         ]
    //     ];
    //     Important! You must name the array 'vocabulary_words'!";

    //     return $prompt;
    // }

    public static function buildLanguageInfoGenerationPrompt($targetLanguage, $nativeLanguage)
    {
        $prompt = "Take this target language: {$targetLanguage} and native language: {$nativeLanguage} and return the following data about those languages
        in a JSON array with the following structure:            
            [
            'target_locale' => 'The 4-letter language locale code of the target language in the appropriate form, i.e. 'en-US'', 
            'native_locale' => 'The 4-letter language locale code of the native language in form of en-US',
            'target_iso_639_3_code' => 'The 3-letter language code of the target language in the appropriate form, i.e. 'eng'',
            'target_language_name' => 'The official ISO 693-3 name of the target language in English',
            'native_iso_639_3_code' => 'The 3-letter language code of the native language in the appropriate form, i.e. 'eng'',
            'native_language_name' => 'The official ISO 693-3 name of the native language in English',        
            ].";

        return $prompt;        
    }

    public static function determineAiGeneratedMediaStatus($imagesSelected, $voiceExamplesSelected)
    {
        return $imagesSelected || $voiceExamplesSelected;
    }

    public static function generateFlashcardSetData($flashcardSetPrompt)
    {
        $openAiService = new OpenAiService();
        $response = $openAiService->generateArrayResponse($flashcardSetPrompt);
        if (isset($response['flashcard_set'])) {
            // Check if 'flashcard_set' is an array and if the first element is an array (nested case)
            if (is_array($response['flashcard_set']) && isset($response['flashcard_set'][0]) && is_array($response['flashcard_set'][0])) {
                $flashcardSetData = $response['flashcard_set'][0]; // Handle the nested array case                
            } else {
                $flashcardSetData = $response['flashcard_set']; // Handle the direct associative array case                
            }
        } else {
            // Handle case where 'flashcard_set' key is missing
            throw new Exception("The array from OpenAI was incorrectly formatted.");
        }
        return $flashcardSetData;
    }

    private static function buildFlashcardSetPrompt($topic, $nativeLanguage, $targetLanguage)
    {
        $prompt = "Create the starting info for a single flashcard set for a user who wants to learn about {$topic} in target language: {$targetLanguage}. 
        The content you return should be in their native language of: {$nativeLanguage}.        
        The title should be informative and not click-baity. 
        The flashcard set object should be in the form of a JSON array with the following structure: 
        ['flashcard_set' => ['title' => 'Flashcard set title (make this clear and not click-baity like a blog post)', 
        'description' => 'A short description of the flashcard set (make this informative and fun and not click-baity)', 
        'target_locale' => 'The 4-letter language locale code of the target language in the appropriate form, i.e. 'en-US'', 
        'native_locale' => 'The 4-letter language locale code of the native language in form of en-US',
        'target_iso_639_3_code' => 'The 3-letter language code of the target language in the appropriate form, i.e. 'eng'',
        'target_language_name' => 'The official ISO 693-3 name of the target language in English',
        'native_iso_639_3_code' => 'The 3-letter language code of the native language in the appropriate form, i.e. 'eng'',
        'native_language_name' => 'The official ISO 693-3 name of the native language in English',        
        ]]. Important! Don't return any flashcards, we're just creating the details for the overall set now.";

        return $prompt;
    }

    private static function buildPromptFromTitleAndLanguages($setTitle, $nativeLanguage, $targetLanguage)
    {
        $prompt = "Create the starting info for a single flashcard set for a user who wants to learn about {$setTitle} in target language: {$targetLanguage}. 
        The content you return should be in their native language of: {$nativeLanguage}.        
        The description should be informative and not click-baity. 
        The flashcard set object should be in the form of a JSON array with the following structure: 
        ['flashcard_set' => ['title' => {$setTitle}, 
        'description' => 'A short description for the flashcard set.', 
        'target_locale' => 'The 4-letter language locale code of the target language in the appropriate form, i.e. 'en-US'', 
        'native_locale' => 'The 4-letter language locale code of the native language in form of en-US',
        'target_iso_639_3_code' => 'The 3-letter language code of the target language in the appropriate form, i.e. 'eng'',
        'target_language_name' => 'The official ISO 693-3 name of the target language in English',
        'native_iso_639_3_code' => 'The 3-letter language code of the native language in the appropriate form, i.e. 'eng'',
        'native_language_name' => 'The official ISO 693-3 name of the native language in English',        
        ]]. Important! Don't return any flashcards, we're just creating the details for the overall set now.";

        return $prompt;
    }
    
    public static function storeFlashcardSet($title, $description, $userId, $hasAiGeneratedMedia, $aiGenerated)
    {
        $flashcardSet = FlashcardSet::create([
            'title' => $title,
            'description' => $description,            
            'user_id' => $userId,
            'ai_generated' => $aiGenerated,
            'ai_generated_media' => $hasAiGeneratedMedia,
        ]);

        return $flashcardSet;
    }
    
    public static function generateVocabularyWordsFromTopic($topic, $nativeLanguage, $targetLanguage, $targetLocale, $nativeLocale, $voiceGender)
    {
        $prompt = "You are helping a language learner learn about {$topic} in their target language of {$targetLanguage}.
        Create a comprehensive list of relevant vocabulary words in {$targetLanguage} for the topic of {$topic}. 
        The content you return should be in the form of a JSON array with the following structure: 
        ['vocabulary_words' => ['word' => 'Word in {$targetLanguage}', 'translation' => 'Tranlsation of the word in {$nativeLanguage}',        
        'romanized_word' => 'Optional: If the target language uses a non-Latin-based alphabet, include a Romanized version of the word using the most phonetically friendly system such as Paiboon for Thai or Pinyin 
        for Chinese. If the language uses a Latin-based alphabet, such as Vietnamese or Spanish, omit this field',
        'example' => 'An example sentence in {$targetLanguage} using the word.',
        'romanized_example' => 'Optional: If the target langauge uses a non-Latin-based alphabet, include a Romanized version of the example sentence using the most phonetically friendly system such as Paiboon for Thai or Pinyin for Chinese. 
        If the target language uses a Latin-based alphabet, such as Vietnamese or Spanish, omit this field',]]
        Important! You must name the array 'vocabulary_words'!";

        Log::error('Prompt: ' . $prompt);

        $vocabularyWords = VocabularyWord::generateFromPrompt($prompt, $targetLocale, $nativeLocale, $voiceGender);

        return $vocabularyWords;        
    }

    public static function generateVocabularyWordsFromYouTube($videoText, $nativeLanguage, $targetLanguage, $targetLocale, $nativeLocale, $voiceGender)
    {             
        $prompt = "You are helping a language learner learn their target language of {$targetLanguage}.
        They have chosen a YouTube video to learn from. Your task is to analyze the text of the transcript
        and return a comprehensive list of relevant vocabulary words in {$targetLanguage} that will be used for flashcards
        for them to study. Aim to include at least 30 vocabulary words. Here is the text from the video: '{$videoText}'.         
        The content you return must be in the form of a JSON array with the following structure: 
        ['vocabulary_words' => ['word' => 'Word in {$targetLanguage}', 'translation' => 'Tranlsation of the word in {$nativeLanguage}',
        'romanized_word' => 'Optional: If the target language uses a non-Latin-based alphabet, include a Romanized version of the word using the most phonetically friendly system such as Paiboon for Thai or Pinyin 
        for Chinese. If the language uses a Latin-based alphabet, such as Vietnamese or Spanish, omit this field',]]
        Important! You must name the array 'vocabulary_words'!";
        
        $model = 'gpt-3.5-turbo';

        $vocabularyWords = VocabularyWord::generateFromYouTube($prompt, $targetLanguage, $targetLocale, $nativeLocale, $voiceGender, $model);

        return $vocabularyWords;        
    }
    
    public function flashcards()
    {
        return $this->hasMany(Flashcard::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_flashcard_sets');
    }

    public function quickNote()
    {
        return $this->belongsTo(QuickNote::class, 'quick_note_id');
    }

    public function quickNoteSet()
    {
        return $this->belongsTo(QuickNoteSet::class, 'quick_note_set_id');
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public static function startStudyingFlashcards($userId, $flashcardSetGroupId)
    {
        $user = User::find($userId);
        $flashcardSets = FlashcardSet::where('flashcard_set_group_id', $flashcardSetGroupId)->get();
        foreach($flashcardSets as $flashcardSet)
        {
            $user->flashcardSetsStudying()->attach($flashcardSet->id);
        }

        return 'Success';

    }

    public static function stopStudyingFlashcards($userId, $flashcardSetId)
    {
        $user = User::find($userId);
        $user->flashcardSetsStudying()->detach($flashcardSetId);
    }
}
