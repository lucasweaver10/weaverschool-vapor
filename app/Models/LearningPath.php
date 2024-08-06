<?php

namespace App\Models;

use Exception;
use Illuminate\Bus\Batch;
use Illuminate\Support\Str;
use App\Services\OpenAiService;
use App\Services\SimilarityService;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Log;
use App\Jobs\GenerateKeyPhraseImages;
use Illuminate\Database\Eloquent\Model;
use App\Jobs\StoreLearningPathEmbedding;
use Spatie\Translatable\HasTranslations;
use App\Jobs\DispatchCreateFlashcardsJob;
use App\Jobs\GenerateVocabularyWordImage;
use App\Livewire\Admin\AuthorImages\Create;
use App\Jobs\GenerateLearningPathKeyPhrases;
use App\Jobs\CreateFlashcardsFromLearningPath;
use App\Jobs\GenerateKeyPhrasesExamplesAudios;
use App\Jobs\GenerateVocabularyExamplesAudios;
use App\Jobs\GenerateLearningPathCulturalNotes;
use App\Jobs\GenerateLearningPathVocabularyWords;
use App\Jobs\GenerateKeyPhraseAudioForLearningPath;
use App\Jobs\AddExplanationsToLearningPathKeyPhrases;
use App\Jobs\GenerateLearningPathVocabularyWordImages;
use App\Jobs\UpdateLearningPathKeyPhrasesTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Jobs\GenerateVocabularyWordAudioForLearningPath;
use App\Jobs\UpdateLearningPathVocabularyWordsTranslations;
use App\Jobs\AddExplanationsToVocabularyWordsForLearningPath;
use App\Jobs\UpdateLearningPathKeyPhrasesAndExamplesTranslations;
use App\Jobs\AddDefinitionsAndExamplesToVocabularyWordsForLearningPath;

class LearningPath extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = [
        'title',
        'description'
    ];

    protected $guarded = [];    

    public static function generate($topic, $nativeLanguage, $targetLanguage, $voiceGender, $userId)
    {
        $prompt = self::buildPrompt($topic, $nativeLanguage, $targetLanguage);    
        $openAiService = new OpenAiService();
        $response = $openAiService->generateArrayResponse($prompt);        
        if (isset($response['learning_path'])) {
            // Check if 'learning_path' is an array and if the first element is an array (nested case)
            if (is_array($response['learning_path']) && isset($response['learning_path'][0]) && is_array($response['learning_path'][0])) {
                $learningPathData = $response['learning_path'][0]; // Handle the nested array case                
            } else {                
                $learningPathData = $response['learning_path']; // Handle the direct associative array case                
            }            
        } else {
            // Handle case where 'learning_path' key is missing
            throw new Exception("The array from OpenAI was incorrectly formatted.");
        }

        $slug = self::generateUniqueSlug($learningPathData['slug']);
        $voiceGender = VoiceGender::ensureVoiceGenderExists($voiceGender, $learningPathData['target_locale']);

        $targetLanguageId = Language::getOrCreateLanguageId($learningPathData['target_iso_639_3_code'], $learningPathData['target_language_name'], $learningPathData['target_locale']);
        $nativeLanguageId = Language::getOrCreateLanguageId($learningPathData['native_iso_639_3_code'], $learningPathData['native_language_name'], $learningPathData['native_locale']);

        $voiceGenderId = VoiceGender::where('name', $voiceGender)->first()->id;
        $embedding = LearningPathEmbedding::generateLearningPathEmbeddingFromArrayWithOpenAi($learningPathData);
        $similarLearningPathId = LearningPathEmbedding::findSimilarLearningPathId($embedding);                                    
                
        if (!$similarLearningPathId) {
            self::createNewLearningPath($embedding, $targetLanguageId, $learningPathData['target_locale'], $learningPathData['title'], $learningPathData['description'], $slug, $nativeLanguageId, $learningPathData['native_locale'], $nativeLanguage, $targetLanguage, $voiceGender, $userId);                        
        } else {
            self::processSimilarLearningPath($similarLearningPathId, $learningPathData['title'], $learningPathData['description'], $learningPathData['native_locale'], $learningPathData['target_locale'],  $nativeLanguageId, $nativeLanguage, $targetLanguage, $voiceGender, $voiceGenderId, $userId);
        }
    }

    private static function buildPrompt($topic, $nativeLanguage, $targetLanguage)
    {
        $prompt = "Create a single learning path for a user who wants to learn about {$topic} in target language: {$targetLanguage}. 
        The content you return should be in their native language of: {$nativeLanguage}, however, the learning path itself should be language agnostic.
        This is because learning paths will be used by users from various native languages using translations.
        The title should be informative and not click-baity. 
        The learning path object should be in the form of a JSON array with the following structure: 
        ['learning_path' => ['title' => 'Learning path title (make this clear and not click-baity like a blog post)', 
        'description' => 'A short description for the learning path.', 
        'target_locale' => 'The 4-letter language locale code of the target language in the appropriate form, i.e. 'en-US'', 
        'native_locale' => 'The 4-letter language locale code of the native language in form of en-US',
        'target_iso_639_3_code' => 'The 3-letter language code of the target language in the appropriate form, i.e. 'eng'',
        'target_language_name' => 'The official ISO 693-3 name of the target language in English',
        'native_iso_639_3_code' => 'The 3-letter language code of the native language in the appropriate form, i.e. 'eng'',
        'native_language_name' => 'The official ISO 693-3 name of the native language in English',
        'slug' => 'An SEO friendly slug of the learning path derived from the title with no stop-words',
        ]]. Important! Only return one learning path!";

        return $prompt;
    }

    private static function generateUniqueSlug($existingSlug)
    {
        $slug = Str::slug($existingSlug, '-');
        $count = 2;
        while (LearningPath::whereSlug($slug)->exists()) {
            $slug = "{$slug}-" . $count++;
        }
        return $slug;
    }    

    private static function createNewLearningPath($embedding, $targetLanguageId, $targetLocale, $title, $description, $slug, $nativeLanguageId, $nativeLocale, $nativeLanguage, $targetLanguage, $voiceGender, $userId)
    {
        $learningPath = LearningPath::create([
            'language_id' => $targetLanguageId,
            'target_locale' => $targetLocale,            
            'title' => [$nativeLocale => $title],
            'description' => [$nativeLocale => $description],            
            'slug' => $slug,
        ]);    
        self::attachNativeLanguageToLearningPath($learningPath->id, $nativeLanguageId);
        self::attachUserToLearningPath($learningPath->id, $nativeLocale, $targetLocale, $voiceGender, $userId);

        StoreLearningPathEmbedding::dispatch($embedding, $learningPath->id);

        self::dispatchLearningPathCreationJobs($learningPath, $nativeLanguage, $targetLanguage, $targetLocale, $nativeLocale, $voiceGender, $userId);

        return $learningPath;
    }

    private static function processSimilarLearningPath($learningPathId, $learningPathTitle, $learningPathDescription, $nativeLocale, $targetLocale,  $nativeLanguageId, $nativeLanguage, $targetLanguage, $voiceGender, $voiceGenderId, $userId)
    {        
        self::addLearningPathDataTranslations($learningPathId, $learningPathTitle, $learningPathDescription, $nativeLocale);
        self::attachUserToLearningPath($learningPathId, $nativeLocale, $targetLocale, $voiceGender, $userId);
        self::processTranslationsAndAudio($learningPathId, $nativeLanguageId, $voiceGenderId, $targetLocale, $nativeLocale, $targetLanguage, $nativeLanguage, $voiceGender);
        return back()->with('success', 'Your learning path is processing.');        
    }    

    private static function addLearningPathDataTranslations($learningPathId, $learningPathTitle, $learningPathDescription, $nativeLocale)
    {
        $learningPath = LearningPath::find($learningPathId);        
        $learningPath->setTranslation('title', $nativeLocale, $learningPathTitle);
        $learningPath->setTranslation('description', $nativeLocale, $learningPathDescription);
        $learningPath->save();
    }

    private static function processTranslationsAndAudio($learningPathId, $nativeLanguageId, $voiceGenderId, $targetLocale, $nativeLocale, $targetLanguage, $nativeLanguage, $voiceGender)
    {
        if(!self::checkForExistingLearningPathNativeLanguage($learningPathId, $nativeLanguageId)) {
            UpdateLearningPathVocabularyWordsTranslations::dispatch($learningPathId, $targetLanguage, $targetLocale, $nativeLanguage, $nativeLocale);
            UpdateLearningPathKeyPhrasesAndExamplesTranslations::dispatch($learningPathId, $targetLanguage, $targetLocale, $nativeLanguage, $nativeLocale);
            AddDefinitionsAndExamplesToVocabularyWordsForLearningPath::dispatch($learningPathId, $targetLanguage, $targetLocale, $nativeLanguage, $nativeLocale);
            AddExplanationsToVocabularyWordsForLearningPath::dispatch($learningPathId, $targetLanguage, $targetLocale, $nativeLanguage, $nativeLocale);
            AddExplanationsToLearningPathKeyPhrases::dispatch($learningPathId, $targetLanguage, $targetLocale, $nativeLanguage, $nativeLocale);
        }
        if(!self::checkForExistingLearningPathVoiceGender($learningPathId, $voiceGenderId)) {
            GenerateVocabularyWordAudioForLearningPath::dispatch($learningPathId, $targetLocale, $voiceGender);
            GenerateVocabularyExamplesAudios::dispatch($learningPathId, $targetLocale, $voiceGender);
            GenerateKeyPhraseAudioForLearningPath::dispatch($learningPathId, $targetLocale, $voiceGender);
            GenerateKeyPhrasesExamplesAudios::dispatch($learningPathId, $targetLocale, $voiceGender);
            self::attachVoiceGenderToLearningPath($learningPathId, $voiceGenderId);
        }
    }

    private static function dispatchLearningPathCreationJobs($learningPath, $nativeLanguage, $targetLanguage, $targetLocale, $nativeLocale, $voiceGender, $userId)
    {
        Bus::chain([
            Bus::batch([
                [
                    new GenerateLearningPathVocabularyWords($learningPath, $nativeLanguage, $targetLanguage, $targetLocale, $nativeLocale, $voiceGender),
                    Bus::batch([
                        [
                            new AddDefinitionsAndExamplesToVocabularyWordsForLearningPath($learningPath->id, $targetLanguage, $targetLocale, $nativeLanguage, $nativeLocale),
                            new GenerateVocabularyExamplesAudios($learningPath->id, $targetLocale, $voiceGender),
                            new GenerateLearningPathVocabularyWordImages($learningPath->id),
                        ],
                        new GenerateVocabularyWordAudioForLearningPath($learningPath->id, $targetLocale, $voiceGender),
                        new AddExplanationsToVocabularyWordsForLearningPath($learningPath->id, $targetLanguage, $targetLocale, $nativeLanguage, $nativeLocale),
                    ])
                ],
                [
                    new GenerateLearningPathKeyPhrases($learningPath->id, $targetLanguage, $targetLocale, $nativeLanguage, $nativeLocale),
                    Bus::batch([
                        new AddExplanationsToLearningPathKeyPhrases($learningPath->id, $targetLanguage, $targetLocale, $nativeLanguage, $nativeLocale),
                        new GenerateKeyPhraseAudioForLearningPath($learningPath->id, $targetLocale, $voiceGender),
                        new GenerateKeyPhrasesExamplesAudios($learningPath->id, $targetLocale, $voiceGender),
                        new GenerateKeyPhraseImages($learningPath->id),
                    ])
                ],
            ])->name('Learning Path Content Creation Batch')->then(function (Batch $batch) {                
            }),
            new GenerateLearningPathCulturalNotes($learningPath->id, $targetLanguage, $nativeLanguage, $nativeLocale),
            new DispatchCreateFlashcardsJob($learningPath->id, $targetLocale, $nativeLocale, $userId),
        ])->dispatch();            
    }

    public static function updateForNewNativeLanguage($learningPathId, $nativeLanguageName, $voiceGender)
    {
        $learningPath = LearningPath::find($learningPathId);
        $targetLanguage = $learningPath->targetLanguage->name;
        $targetLocale = $learningPath->target_locale;
        $voiceGenderId = VoiceGender::where('name', $voiceGender)->first()->id;

        $nativeLanguage = self::getOrCreateNativeLanguage($nativeLanguageName);
        $nativeLocale = $nativeLanguage->locale;

        if(!self::checkForExistingLearningPathNativeLanguage($learningPathId, $nativeLanguage)) {
            self::dispatchNewNativeLanguageTranslationUpdateJobs($learningPathId, $targetLanguage, $targetLocale, $nativeLanguage, $nativeLocale);
            self::attachNativeLanguageToLearningPath($learningPathId, $nativeLanguage->Id);
        }

        if(self::checkForExistingLearningPathVoiceGender($learningPathId, $voiceGenderId)) {
            self::dispatchNewVoiceGenderJobs($learningPathId, $targetLocale, $voiceGender);
            self::attachVoiceGenderToLearningPath($learningPathId, $voiceGenderId);
        }                
    }

    private static function dispatchNewNativeLanguageTranslationUpdateJobs($learningPathId, $targetLanguage, $targetLocale, $nativeLanguage, $nativeLocale)
    {
        UpdateLearningPathVocabularyWordsTranslations::dispatch($learningPathId, $targetLanguage, $targetLocale, $nativeLanguage, $nativeLocale);
        UpdateLearningPathKeyPhrasesAndExamplesTranslations::dispatch($learningPathId, $targetLanguage, $targetLocale, $nativeLanguage, $nativeLocale);        
        AddExplanationsToVocabularyWordsForLearningPath::dispatch($learningPathId, $targetLanguage, $targetLocale, $nativeLanguage, $nativeLocale);
        AddExplanationsToLearningPathKeyPhrases::dispatch($learningPathId, $targetLanguage, $targetLocale, $nativeLanguage, $nativeLocale);
    }

    private static function dispatchNewVoiceGenderJobs($learningPathId, $targetLocale, $voiceGender)
    {
        GenerateVocabularyWordAudioForLearningPath::dispatch($learningPathId, $targetLocale, $voiceGender);
        GenerateVocabularyExamplesAudios::dispatch($learningPathId, $targetLocale, $voiceGender);
        GenerateKeyPhraseAudioForLearningPath::dispatch($learningPathId, $targetLocale, $voiceGender);
        GenerateKeyPhrasesExamplesAudios::dispatch($learningPathId, $targetLocale, $voiceGender);
    }

    private static function getOrCreateNativeLanguage($nativeLanguageName)
    {
        $nativeLanguageExists = self::checkIfNativeLanguageExists($nativeLanguageName);
        if (!$nativeLanguageExists) {
            return self::createNewLanguage($nativeLanguageName);
        } else {
            return Language::where('name', $nativeLanguageName)->first();
        }
    }

    public static function checkIfNativeLanguageExists($nativeLanguage)
    {
        return Language::where('name', $nativeLanguage)->exists();
    }

    public static function createNewLanguage($language)
    {        
        $prompt = "I'm giving you the name of a language and I want you to give return a few parameters about that language.
        The language name is: {$language}.
        You should return an object in the form of a JSON array with the following structure: 
        ['locale' => 'The 4-letter language locale code of the target language in the appropriate form, i.e. 'en-US'',             
        'iso_639_3_code' => 'The 3-letter language code of the target language in the appropriate form, i.e. 'eng'',            
        ]";

        $openAiService = new OpenAIService();
        $response = $openAiService->generateArrayResponse($prompt);

        $locale = $response['locale'];
        $iso6393Code = $response['iso_639_3_code'];

        $language = Language::create([
            'name' => $language,
            'slug' => Str::slug($language, '-'),
            'description' => 'Learn ' . $language,
            'iso_639_3_code' => $iso6393Code,
            'locale' => $locale,
            'active' => true,
        ]);

        return $language;
    }
    
    public static function attachUserToLearningPath($learningPathId, $nativeLocale, $targetLocale, $voiceGender, $userId)
    {
        $user = User::find($userId);
        $user->learningPaths()->attach($learningPathId, [
            'native_locale' => $nativeLocale,
            'target_locale' => $targetLocale,
            'voice_gender' => $voiceGender,
        ]);
    }

    public static function checkForExistingLearningPathNativeLanguage($learningPathId, $nativeLanguageId)
    {
        $learningPath = LearningPath::find($learningPathId);
        return $learningPath->nativeLanguages()->where('language_id', $nativeLanguageId)->exists();        
    }

    public static function attachNativeLanguageToLearningPath($learningPathId, $nativeLanguageId)
    {
        $learningPath = LearningPath::find($learningPathId);
        $learningPath->nativeLanguages()->attach($nativeLanguageId);
    }

    public static function checkForExistingLearningPathVoiceGender($learningPathId, $voiceGenderId)
    {
        $learningPath = LearningPath::find($learningPathId);
        return $learningPath->voiceGenders()->where('voice_gender_id', $voiceGenderId)->exists();        
    }

    public static function attachVoiceGenderToLearningPath($learningPathId, $voiceGenderId)
    {
        $learningPath = LearningPath::find($learningPathId);
        $learningPath->voiceGenders()->attach($voiceGenderId);
    }
    
    public static function calculateBuildProgress($id)
    {        
        $path = LearningPath::find($id);

        $vocabularyWordsCount = $path->vocabularyWords()
        ->whereHas('media', function ($query) {
            $query->where('collection_name', 'images');
        })
            ->whereNotNull('audio_urls')
            ->count();

        $keyPhrasesCount = $path->keyPhrases()
        ->whereHas('media', function ($query) {
            $query->where('collection_name', 'images');
        })
            ->whereNotNull('audio_urls')
            ->count();

        $totalVocabularyWords = $path->vocabularyWords()->count();
        $totalKeyPhrases = $path->keyPhrases()->count();

        $total = $totalVocabularyWords + $totalKeyPhrases;

        $buildProgress = $total > 0 ? ($vocabularyWordsCount + $keyPhrasesCount) / $total : 0;

        // $buildProgress has a floor of 10%
        $buildProgress = max($buildProgress, 0.1);

        return $buildProgress * 100;
    }

    public static function generateVocabularyWords($learningPath, $nativeLanguage, $targetLanguage, $targetLocale, $nativeLocale, $voiceGender)
    {        
        $prompt = "You are designing a language learning path for a native {$nativeLanguage} speaker who is learning {$targetLanguage}.
        Create a list of the 10 most relevant vocabulary words in {$targetLanguage} for the learning path topic of '{$learningPath->getTranslation('title', $nativeLocale)}'. 
        The content you return should be in the form of a JSON array with the following structure: 
        ['vocabulary_words' => ['word' => 'Word', 'translation' => 'Tranlsation of the word into their native langauge of {$nativeLanguage}', 
        'romanized_word' => 'Optional: If the target language uses a non-Latin-based alphabet, include a Romanized version of the word using the most phonetically friendly system such as Paiboon for Thai or Pinyin 
        for Chinese. If the target language uses a Latin-based alphabet, such as Vietnamese or Spanish, omit this field.']]
        Important! You must name the array 'vocabulary_words'!";

        $vocabularyWords = VocabularyWord::generateFromPrompt($prompt, $targetLocale, $nativeLocale, $voiceGender);

        foreach ($vocabularyWords as $word) 
        {
            $word->learningPaths()->syncWithoutDetaching($learningPath->id);
        }
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_learning_paths')
        ->withPivot('native_locale', 'target_locale', 'voice_gender', 'started_at', 'completed_at', 'last_accessed')
        ->withTimestamps();
    }

    public function vocabularyWords()
    {
        return $this->belongsToMany(VocabularyWord::class, 'learning_path_vocabulary_word');
    }

    public function culturalNotes()
    {
        return $this->belongsToMany(CulturalNote::class, 'cultural_note_learning_path');
    }

    public function keyPhrases()
    {
        return $this->belongsToMany(KeyPhrase::class, 'key_phrase_learning_path');
    }

    public function embedding()
    {
        return $this->hasOne(LearningPathEmbedding::class, 'learning_path_id');
    }

    public function targetLanguage()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }

    public function nativeLanguages()
    {
        return $this->belongsToMany(Language::class, 'learning_path_native_language');
    }

    public function voiceGenders()
    {
        return $this->belongsToMany(VoiceGender::class, 'learning_path_voice_gender');
    }
}
