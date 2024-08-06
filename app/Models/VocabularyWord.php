<?php

namespace App\Models;

use Exception;
use App\Models\SyntheticVoice;
use App\Services\OpenAiService;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Support\Facades\Log;
use App\Services\GoogleCloudService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\Translatable\HasTranslations;
use App\Jobs\GenerateVocabularyWordAudio;
use App\Jobs\GenerateVocabularyWordImage;
use App\Http\Controllers\OpenAiController;
use App\Jobs\GenerateVocabularyWordImages;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Collection;
use App\Jobs\GenerateVocabularyWordExplanation;
use App\Services\GoogleCloudTextToSpeechService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Jobs\GenerateVocabularyWordDefinitionAndExample;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;

class VocabularyWord extends Model implements HasMedia
{
    use HasFactory;
    use HasTranslations;
    use InteractsWithMedia;

    public $translatable = [
        'word',
        'definition',
        'example',        
        'romanized_word',
        'romanized_example',
    ];

    protected $useFallbackLocale = false;

    protected $guarded = [];

    public static function generateFromPrompt($prompt, $targetLocale, $nativeLocale, $voiceGender, $model = 'gpt-4o')
    {    
        $openAiService = new OpenAiService();
        $response = $openAiService->generateArrayResponse($prompt, $model);        
        $vocabularyWords = $response['vocabulary_words'];

        $vocabularyWords = self::storeFromArrayResponse($vocabularyWords, $targetLocale, $nativeLocale);
                
        self::generateImages($vocabularyWords);
        self::generateAudioUrls($vocabularyWords, $targetLocale, $voiceGender);
        
        return $vocabularyWords;
    }

    public static function generateFromYouTube($prompt, $targetLanguage, $targetLocale, $nativeLocale, $voiceGender, $model = 'gpt-4o')
    {
        $openAiService = new OpenAiService();
        $response = $openAiService->generateArrayResponse($prompt, $model);        
        $vocabularyWords = $response['vocabulary_words'];

        $vocabularyWords = self::storeFromArrayResponse($vocabularyWords, $targetLocale, $nativeLocale);
        // Update words with examples and romanized examples
        $vocabularyWords = self::generateExamples($vocabularyWords, $targetLanguage, $targetLocale);

        self::generateImages($vocabularyWords);
        self::generateAudioUrls($vocabularyWords, $targetLocale, $voiceGender);

        return $vocabularyWords;
    }

    public static function generateAudioUrls($vocabularyWords, $targetLocale, $voiceGender)
    {        
        $voiceId = SyntheticVoice::getVoiceId($targetLocale, $voiceGender);
        foreach ($vocabularyWords as $vocabularyWord) {
            GenerateVocabularyWordAudio::dispatch($vocabularyWord->id, $targetLocale, $voiceId);
        }
    }

    public static function generateAudioUrl($vocabularyWordId, $targetLocale, $voiceId)
    {
        $word = VocabularyWord::find($vocabularyWordId);
        $voice = SyntheticVoice::find($voiceId);
        $audioService = new GoogleCloudTextToSpeechService();

        // Assuming $word is your VocabularyWord or KeyPhrase model instance
        $audioUrls = $word->audio_urls ? json_decode($word->audio_urls, true) : [];

        // Check if the audio URL already exists for the specified locale and gender
        if (!isset($audioUrls[$targetLocale][$voice->ssml_gender])) {
            // It doesn't exist, so add or update the audio URL
            $text = $word->getTranslation('word', $targetLocale, false);
            $audioContent = $audioService->generateAudioFromText($text, $voice->voice_locale, $voice->voice_name, $voice->ssml_gender);
            $filename = 'vocabulary-word-' . $word->id . '-' . $voice->ssml_gender . '-' . $targetLocale . '-' . uniqid() . '.mp3';
            $path = '/audio/vocabulary-words/words/' . $filename;
            Storage::disk('s3-public')->put($path, $audioContent, 's3-public');
            $audioUrl = 'https://we-public.s3.eu-north-1.amazonaws.com' . $path;
            $audioUrls[$targetLocale][$voice->ssml_gender] = $audioUrl;

            // Encode the modified array back to JSON with unescaped slashes
            $word->audio_urls = json_encode($audioUrls, JSON_UNESCAPED_SLASHES);

            // Save the updated model
            $word->save();

            return $audioUrl;
        } else {
            // The audio URL already exists for this locale and gender            
            // Example: Log the attempt to overwrite            
        }
    }

    public static function replaceAudioUrl($vocabularyWordId, $targetLocale, $voiceId)
    {
        $word = VocabularyWord::find($vocabularyWordId);
        $voice = SyntheticVoice::find($voiceId);
        $audioService = new GoogleCloudTextToSpeechService();

        // Assuming $word is your VocabularyWord or KeyPhrase model instance
        $audioUrls = $word->audio_urls ? json_decode($word->audio_urls, true) : [];
        
        // It doesn't exist, so add or update the audio URL
        $text = $word->getTranslation('word', $targetLocale, false);
        $audioContent = $audioService->generateAudioFromText($text, $voice->voice_locale, $voice->voice_name, $voice->ssml_gender);
        $filename = 'vocabulary-word-' . $word->id . '-' . $voice->ssml_gender . '-' . $targetLocale . '-' . uniqid() . '.mp3';
        $path = '/audio/vocabulary-words/words/' . $filename;
        Storage::disk('s3-public')->put($path, $audioContent, 's3-public');
        $audioUrl = 'https://we-public.s3.eu-north-1.amazonaws.com' . $path;
        $audioUrls[$targetLocale][$voice->ssml_gender] = $audioUrl;

        // Encode the modified array back to JSON with unescaped slashes
        $word->audio_urls = json_encode($audioUrls, JSON_UNESCAPED_SLASHES);

        // Save the updated model
        $word->save();

        return $audioUrl;        
    }

    public static function storeFromArrayResponse($vocabularyWords, $targetLocale, $nativeLocale)
    {
        $vocabularyWordModels = collect();

        foreach ($vocabularyWords as $word) {
            // Convert the words to lowercase for comparison
            $lowercaseWord = mb_strtolower($word['word'], 'UTF-8');
            $lowercaseTranslation = mb_strtolower($word['translation'], 'UTF-8');

            // Ensure the locale variables are properly formatted
            $targetLocale = addslashes($targetLocale); // Escape any special characters
            $nativeLocale = addslashes($nativeLocale); // Escape any special characters

            // Construct the JSON path expressions
            $targetLocalePath = '$."' . $targetLocale . '"';
            $nativeLocalePath = '$."' . $nativeLocale . '"';

            $existingWord = VocabularyWord::query()
                ->whereRaw('LOWER(JSON_UNQUOTE(JSON_EXTRACT(word, ?))) = ?', [$targetLocalePath, $lowercaseWord])
                ->orWhereRaw('LOWER(JSON_UNQUOTE(JSON_EXTRACT(word, ?))) = ?', [$nativeLocalePath, $lowercaseTranslation])
                ->first();

            if ($existingWord) {
                $updatedExistingWord = self::updateExistingWord($existingWord, $word, $targetLocale, $nativeLocale);
                $vocabularyWordModels->push($updatedExistingWord);
            } else {
                $newWord = self::createNewWord($word, $targetLocale, $nativeLocale);
                $vocabularyWordModels->push($newWord);
            }
        }
        return $vocabularyWordModels;
    }

    public static function generateImages($vocabularyWords)
    {        
        foreach ($vocabularyWords as $vocabularyWord) {
            GenerateVocabularyWordImage::dispatch($vocabularyWord->id);            
        }
    }

    public static function generateImage($vocabularyWordId)
    {
        $vocabularyWord = VocabularyWord::find($vocabularyWordId);        
        if ($vocabularyWord->image_url || $vocabularyWord->getFirstMediaUrl()) {            
            return $vocabularyWord->getFirstMediaUrl() ?? $vocabularyWord->image_url;
        }
        $exampleTranslations = $vocabularyWord->getTranslations('example');
        $firstExample = reset($exampleTranslations);        
        $translatedExample = self::translateExample($firstExample);        
        if (!$translatedExample) {
            Log::error('The translated example for the vocabulary word was null');
            return false;
        }
        $prompt = "Create an image for the following sentence: {$translatedExample}. IMPORTANT: ABSOLUTELY DO NOT USE TEXT IN THE IMAGE.";
        $openAiService = new OpenAiService();
        $imageUrl = $openAiService->generateImage($prompt);        
        if ($imageUrl) {
            try {
                $vocabularyWord->addMediaFromUrl($imageUrl)
                    ->toMediaCollection('images');
                $vocabularyWord->refresh();
                $vocabularyWord->image_url = $vocabularyWord->getFirstMediaUrl('images');
                $vocabularyWord->save();                
            } catch (\Exception $e) {
                Log::error('Failed to store the image in the media library', ['error' => $e->getMessage()]);
                return false;
            }
        }
        return $imageUrl;
    }

    public static function updateExistingWord($existingWord, $word, $targetLocale, $nativeLocale) {
        // Check if the target locale translation is missing before adding it
        if (!$existingWord->getTranslation('word', $targetLocale, false)) {
            $existingWord->setTranslation('word', $targetLocale, $word['word']);
        }
        // Check if the native locale translation is missing before adding it
        if (!$existingWord->getTranslation('word', $nativeLocale, false)) {
            $existingWord->setTranslation('word', $nativeLocale, $word['translation']);
        }
        // Check if the romanized word is missing before adding it
        if (!empty($word['romanized_word']) && !$existingWord->getTranslation('romanized_word', $targetLocale, false)) {
            $existingWord->setTranslation('romanized_word', $targetLocale, $word['romanized_word']);
        }
        // Check if the array includes an example and if so add it
        if (!empty($word['example']) && !$existingWord->getTranslation('example', $targetLocale, false)) {
            $existingWord->setTranslation('example', $targetLocale, $word['example']);
        }
        // Check if the array includes a romanized example and if so add it
        if (!empty($word['romanized_example']) && !$existingWord->getTranslation('romanized_example', $targetLocale, false)) {
            $existingWord->setTranslation('romanized_example', $targetLocale, $word['romanized_example']);
        }
        
        // Save any changes made to the existing word
        $existingWord->save();
        return $existingWord;        
    }

    public static function createNewWord($word, $targetLocale, $nativeLocale) {
        // Initialize the array for creating a new VocabularyWord
        $wordData = [
            'word' => [
                $targetLocale => $word['word'],
                $nativeLocale => $word['translation'],
            ]
        ];
        // Conditionally add the romanized_word if it exists and is not null
        if (isset($word['romanized_word']) && $word['romanized_word'] !== null) {
            $wordData['romanized_word'] = [
                $targetLocale => $word['romanized_word']
            ];
        }
        // Conditionally add the example if it exists and is not null
        if (isset($word['example']) && $word['example'] !== null) {
            $wordData['example'] = [
                $targetLocale => $word['example']
            ];
        }
        // Conditionally add the romanized_example if it exists and is not null
        if (isset($word['romanized_example']) && $word['romanized_example'] !== null) {
            $wordData['romanized_example'] = [
                $targetLocale => $word['romanized_example']
            ];
        }
        // Create the new VocabularyWord with the constructed data array
        $newWord = VocabularyWord::create($wordData);
        return $newWord;        
    }
    
    public static function updateLearningPathVocabularyWordsTranslations($learningPathId, $targetLanguage, $targetLocale, $nativeLanguage, $nativeLocale)
    {
        $learningPath = LearningPath::find($learningPathId);
        $vocabularyWords = $learningPath->vocabularyWords;

        // Create an array of vocabulary words with their ids and words in the target locale
        $wordsForTranslation = [];
        foreach ($vocabularyWords as $vocabularyWord) {
            $word = $vocabularyWord->getTranslation('word', $targetLocale);
            $wordsForTranslation[] = [
                'id' => $vocabularyWord->id,
                'word' => $word
            ];
        }

        // Convert the array to JSON
        $wordsForTranslationJson = json_encode($wordsForTranslation);

        $prompt = "A language student is studying the learning path of {$learningPath->getTranslation('title', $nativeLocale)} for the {$targetLanguage} language.
        Provide a translation for this list of words in the student's native language of {$nativeLanguage}.
        Here is the list of words: {$wordsForTranslationJson}.                
        The content you return should be in the form of a JSON array named 'translated_words' with the following structure: 
        ['translated_words' => ['original_word_id' => 'translated_word', 'original_word_id' => 'translated_word', 'original_word_id' => 'translated_word']]";

        $openAiService = new OpenAiService();
        $response = $openAiService->generateArrayResponse($prompt);

        $translatedWords = $response['translated_words'];        

        foreach ($translatedWords as $originalWordId => $translatedWord) {
            // Find the VocabularyWord by its id
            $vocabularyWord = VocabularyWord::find($originalWordId);

            // Check if the VocabularyWord exists
            if ($vocabularyWord) {
                // Update or create the translation                
                $existingTranslation = $vocabularyWord->getTranslation('word', $nativeLocale);
                if (!$existingTranslation) {
                    $vocabularyWord->setTranslation('word', $nativeLocale, $translatedWord);
                    $vocabularyWord->save();                    
                }                
            }
        }
    }

    public static function addDefinitionsAndExamples($learningPathId, $targetLanguage, $targetLocale, $nativeLanguage, $nativeLocale)
    {
        $learningPath = LearningPath::find($learningPathId);
        $vocabularyWords = $learningPath->vocabularyWords;

        foreach ($vocabularyWords as $vocabularyWord) {
            $word = $vocabularyWord->getTranslation('word', $targetLocale);
            $existingDefinition = $vocabularyWord->getTranslation('definition', $targetLocale);
            $existingExample = $vocabularyWord->getTranslation('example', $targetLocale);
            if (!$existingDefinition || !$existingExample) {
                $prompt = "Provide a definition and an example sentence for the word '{$word}' in the target language of {$targetLanguage},
                and the native language of {$nativeLanguage}.
                The content you return should be in the form of a JSON array with the following structure: 
                ['target_definition' => 'Definition of the word in the target language', 
                'native_definition' => 'Definition of the word in the provided native language',
                'target_example' => 'An example of the word used in a sentence in the provided target language.',
                'native_example' => 'An example of the word used in a sentence in the provided native language.']";

                GenerateVocabularyWordDefinitionAndExample::dispatch($vocabularyWord->id, $targetLocale, $nativeLocale, $prompt);                
            }        
        }

    }

    public static function generateDefinitionAndExample($vocabularyWordId, $targetLocale, $nativeLocale, $prompt)
    {
        $vocabularyWord = VocabularyWord::find($vocabularyWordId);
        
        $openAiService = new OpenAiService();
        $response = $openAiService->generateArrayResponse($prompt);

        $targetDefinition = $response['target_definition'];
        $nativeDefinition = $response['native_definition'];
        $targetExample = $response['target_example'];
        $nativeExample = $response['native_example'];        

        $vocabularyWord->setTranslation('definition', $targetLocale, $targetDefinition)
            ->setTranslation('example', $targetLocale, $targetExample)
            ->setTranslation('definition', $nativeLocale, $nativeDefinition)
            ->setTranslation('example', $nativeLocale, $nativeExample)
            ->save();    
    }

    public static function addExplanations($learningPathId, $targetLanguage, $targetLocale, $nativeLanguage, $nativeLocale)
    {
        $learningPath = LearningPath::find($learningPathId);
        $vocabularyWords = $learningPath->vocabularyWords;        

        foreach ($vocabularyWords as $vocabularyWord) {  
            $existingExplanation = $vocabularyWord->getExplanation($targetLocale, $nativeLocale);                      

            if(!$existingExplanation) {
                $word = $vocabularyWord->getTranslation('word', $targetLocale);
                $prompt = "You're an AI expert language tutor helping people learn to speak their target language of {$targetLanguage} in real-life situations.
                Provide an explanation in {$nativeLanguage} to help the student understand the {$targetLanguage} word: '{$word}'.          
                If the target language uses a non-latin alphabet, please provide a romanized version in parentheses each time you use the target language in your explanation.
                Format the explanation in markdown, using bold, italics, etc., where needed to help understanding.
                The content you return should be in the form of a JSON array with the following structure: 
                ['explanation' => 'A helpful paragraph form explanation of the target langauge vocabulary word given in the student's native language, formatted in markdown.]";

                GenerateVocabularyWordExplanation::dispatch($vocabularyWord->id, $nativeLocale, $targetLocale, $prompt);
            }
        }
    }

    public static function generateExplanation($vocabularyWordId, $nativeLocale, $targetLocale, $prompt)
    {
        $openAiService = new OpenAiService();
        $response = $openAiService->generateArrayResponse($prompt);

        if (!isset($response['explanation']) || empty($response['explanation'])) {
            Log::error('OpenAI did not return a valid vocabulary word explanation array for prompt: ' . $prompt);
            return false;
        }
        
        $explanation = $response['explanation'];

        self::storeExplanation($vocabularyWordId, $nativeLocale, $targetLocale, $explanation);            
    }

    public static function storeExplanation($vocabularyWordId, $nativeLocale, $targetLocale, $explanation)
    {
        $vocabularyWord = VocabularyWord::find($vocabularyWordId);
        if (!$vocabularyWord) {
            throw new \Exception('VocabularyWord not found.');
        }

        $explanations = $vocabularyWord->explanation ? json_decode($vocabularyWord->explanation, true) : [];
        $explanations[$targetLocale][$nativeLocale] = $explanation;
        $vocabularyWord->explanation = json_encode($explanations, JSON_UNESCAPED_SLASHES);

        if ($vocabularyWord->save()) {
            $updatedVocabularyWord = VocabularyWord::find($vocabularyWordId);
            $updatedExplanations = json_decode($updatedVocabularyWord->explanation, true);

            if (
                isset($updatedExplanations[$targetLocale][$nativeLocale]) &&
                $updatedExplanations[$targetLocale][$nativeLocale] === $explanation
            ) {
                return true;
            } else {
                throw new \Exception('Explanation was not stored correctly in VocabularyWord.');
            }
        }

        throw new \Exception('Failed to save the VocabularyWord.');
    }
    
    public static function generateExamples($vocabularyWords, $targetLanguage, $targetLocale )
    {
        // Create an array of vocabulary words with their ids and words in the target locale
        $vocabularyWordsArray = [];
        foreach ($vocabularyWords as $vocabularyWord) {
            $word = $vocabularyWord->getTranslation('word', $targetLocale);
            $vocabularyWordsArray[] = [
                'id' => $vocabularyWord->id,
                'word' => $word
            ];
        }

        // Convert the array to JSON
        $vocabularyWordsArrayJson = json_encode($vocabularyWordsArray);
        $model = 'gpt-3.5-turbo';
        $systemPrompt = "You generate vocabulary lists to help people speak their target language in real-life situations. You always return your output in valid JSON format.";
        
        $userPrompt = "You're an AI language tutor helping people learn to speak their target language in real-life situations.
        Provide an example sentence for each of the following words in the language of {$targetLanguage}.
        Then, if the language uses a non-latin alphabet, like Chinese, provide an example with the romanized spelling in the most phonetically friendly spelling. 
        If the language uses a latin alphabet, like Vietnamese or Spanish, omit this field. Here is the list of words: {$vocabularyWordsArrayJson}.
        You MUST return your response in the form of a nested JSON array named 'examples'. You MUST re-use the original 'id' from the provided list of words as the key of each example. Use the following structure:\n 
        {
          'examples': [
            {
              'id': 'original_word_id_1',              
              'example_sentence': 'Example sentence in {$targetLanguage}.',
              'romanized_example': 'Romanized version of example sentence above (only if non-latin alphabet!)'
            },
            {
              'id': 'original_word_id_2',              
              'example_sentence': 'Another xample sentence in {$targetLanguage}.',
              'romanized_example': 'Romanized version of the example sentence above (only if non-latin alphabet!)'
            }
          ]
        }";

        $openAiService = new OpenAiService();
        $response = $openAiService->generateArrayResponseWithSystemInstructions($systemPrompt, $userPrompt, $model);        
        $vocabularyWordsWithExamples = $response['examples'];
        $updatedVocabularyWordsCollection = new Collection();

        foreach ($vocabularyWordsWithExamples as $updatedWord) {
            // Find the VocabularyWord by its id
            $vocabularyWord = VocabularyWord::find($updatedWord['id']);
            // Check if the VocabularyWord exists
            if ($vocabularyWord) {
                // Update or create the translation                
                $existingExample = $vocabularyWord->getTranslation('example', $targetLocale);
                if (!$existingExample) {
                    $vocabularyWord->setTranslation('example', $targetLocale, $updatedWord['example_sentence']);
                    $vocabularyWord->save();                    
                }

                $existingRomanizedExample = $vocabularyWord->getTranslation('romanized_example', $targetLocale);
                if (!$existingRomanizedExample) {
                    $vocabularyWord->setTranslation('romanized_example', $targetLocale, $updatedWord['romanized_example']);
                    $vocabularyWord->save();                    
                }

                $updatedVocabularyWordsCollection->push($vocabularyWord);
            }
        }

        return $updatedVocabularyWordsCollection;
    }
    
    public static function translateExample($example)
    {
        $googleCloudService = new GoogleCloudService();
        $translatedExample = $googleCloudService->translateText($example, 'en');
        return $translatedExample;
    }

    public function lesson() {
        return $this->belongsTo(Lesson::class);
    }
    public function discussionQuestions()
    {
        return $this->belongsToMany(DiscussionQuestion::class, 'discussion_question_vocabulary_word');
    }
    public function writtenExamples()
    {
        return $this->belongsToMany(WrittenExample::class, 'written_example_vocabulary_word');
    }

    public function learningPaths()
    {
        return $this->belongsToMany(LearningPath::class, 'learning_path_vocabulary_word');
    }

    public function flashcards()
    {
        return $this->hasMany(Flashcard::class);
    }

    public function getWordAudioUrl($locale, $gender)
    {                                
        $audioUrls = json_decode($this->audio_urls, true);        
        $url = $audioUrls[$locale][$gender] ?? null;
        if (!$url) {
            // Fallback to the other gender if the preferred isn't available
            $fallbackGender = $gender === 'MALE' ? 'FEMALE' : 'MALE';
            $url = $audioUrls[$locale][$fallbackGender] ?? null;
        }        
        return $url;
    }

    public function getExampleAudioUrl($locale, $gender)
    {
        $audioUrls = json_decode($this->example_audio_urls, true);
        $url = $audioUrls[$locale][$gender] ?? null;
        if (!$url) {
            // Fallback to the other gender if the preferred isn't available
            $fallbackGender = $gender === 'MALE' ? 'FEMALE' : 'MALE';
            $url = $audioUrls[$locale][$fallbackGender] ?? null;
        }
        return $url;
    }

    public function getExplanation($targetLocale, $nativeLocale)
    {        
        $explanation = json_decode($this->explanation, true);

        // Retrieve the explanation for the targetLocale and nativeLocale
        $localizedExplanation = $explanation[$targetLocale][$nativeLocale] ?? null;

        // Optional: fallback to English if the nativeLocale explanation is not available
        if (!$localizedExplanation && $nativeLocale !== 'en-US') {
            $localizedExplanation = $explanations[$targetLocale]['en-US'] ?? null;
        }

        return $localizedExplanation;
    }

    public function getLocaleByWord(string $word): ?string
    {
        $translations = $this->getTranslations('word');

        foreach ($translations as $locale => $translation) {
            if ($translation === $word) {
                return $locale;
            }
        }

        return null; // Return null if the word is not found
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')
            ->withResponsiveImages()
            ->useFallbackUrl('/images/weaver_school_learning_path_fallback_image.webp')
            ->registerMediaConversions(function(?Media $media = null) {
            $this->addMediaConversion('thumb')
                ->format('webp')
                ->width(150)
                ->height(150)
                ->sharpen(10);

            $this->addMediaConversion('small')
                ->format('webp')
                ->width(320)
                ->height(320);

            $this->addMediaConversion('medium')
                ->format('webp')
                ->width(427)
                ->height(427);

            $this->addMediaConversion('large')
                ->format('webp')
                ->width(800)
                ->height(800);

            $this->addMediaConversion('full')
                ->format('webp')
                ->width(1024)
                ->height(1024);            
            });

    }

    // public function registerMediaConversions(?Media $media = null): void
    // {
    //     $this->addMediaConversion('thumb')
    //         ->format('webp')
    //         ->width(150)
    //         ->height(150)
    //         ->sharpen(10);

    //     $this->addMediaConversion('small')
    //         ->format('webp')
    //         ->width(320)
    //         ->height(320);            

    //     $this->addMediaConversion('medium')
    //         ->format('webp')
    //         ->width(427)
    //         ->height(427);            

    //     $this->addMediaConversion('large')
    //         ->format('webp')
    //         ->width(800)
    //         ->height(800);
            
    //     $this->addMediaConversion('full')
    //         ->format('webp')
    //         ->width(1024)
    //         ->height(1024);            
    // }
}
