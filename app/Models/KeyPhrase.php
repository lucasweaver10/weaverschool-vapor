<?php

namespace App\Models;

use Exception;
use App\Services\OpenAiService;
use Illuminate\Support\Facades\Log;
use App\Services\GoogleCloudService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\Translatable\HasTranslations;
use App\Jobs\GenerateKeyPhraseExplanation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class KeyPhrase extends Model implements HasMedia
{
    use HasFactory;
    use HasTranslations;
    use InteractsWithMedia;
   
    public $translatable = [
        'phrase',
        'romanized_phrase',
        'example',
        'romanized_example'             
    ];

    protected $useFallbackLocale = false;

    protected $guarded = [];


    public function learningPaths()
    {
        return $this->belongsToMany(LearningPath::class, 'key_phrase_learning_path');
    }


    public static function generate($learningPathId, $targetLanguage, $targetLocale, $nativeLanguage, $nativeLocale)
    {
        $learningPath = LearningPath::find($learningPathId);
        $vocabularyWords = $learningPath->vocabularyWords;

        $prompt = "A language student is studying the learning path titled: {$learningPath->getTranslation('title',$nativeLocale)}.
        They are focusing on the following vocabulary words: {$vocabularyWords->pluck('word')->implode(', ')}.
        Please provide a list of 5 relevant key phrases in the target language of: {$targetLanguage} that are related to the learning path and vocabulary words, and would be useful for the student.
        Avoid duplicating the vocabulary words as key phrases. You can use them within key phrases, but we're looking for relevant phrases that may or may not include the vocabulary words.
        Return a JSON array named 'key_phrases' with the following structure:
        [
            'key_phrases' => [
                [
                    'phrase' => 'A key phrase in the user\'s target language',
                    'romanized_phrase' => 'Optional! If the target language uses a non-Latin-based alphabet, include a Romanized version of the phrase using the most phonetically friendly system such as Paiboon for Thai or Pinyin for Chinese. If using a Latin-based alphabet, such as Vietnamese or Spanish, omit this field',
                    'translation' => 'The translation of the key phrase into the user\'s native language of {$nativeLanguage}',
                    'example' => 'An example sentence using the key phrase in the target language of {$targetLanguage}.',
                    'romanized_example' => 'Optional! If the target language uses a non-Latin-based alphabet, include a Romanized version of the example sentence using the most phonetically friendly system such as Paiboon for Thai or Pinyin for Chinese. If using a Latin-based alphabet, such as Vietnamese or Spanish, omit this field',
                ],
                ...
            ]
        ]
        Important: The array must be named 'key_phrases'!";


        $openAiService = new OpenAiService();
        $response = $openAiService->generateArrayResponse($prompt);        

        $keyPhrases = $response['key_phrases'];        

        foreach ($keyPhrases as $phrase) {
            $existingPhrase = KeyPhrase::query()
                ->whereJsonContains("phrase->$targetLocale", $phrase['phrase'])
                ->orWhereJsonContains("phrase->$nativeLocale", $phrase['translation'])
                ->first();

            if ($existingPhrase) {
                if (!$existingPhrase->getTranslation('phrase', $targetLocale, false)) {
                    $existingPhrase->setTranslation('phrase', $targetLocale, $phrase['phrase']);
                }
                if (!$existingPhrase->getTranslation('phrase', $nativeLocale, false)) {
                    $existingPhrase->setTranslation('phrase', $nativeLocale, $phrase['translation']);
                }
                // add the romanized_phrase in the 'en' locale if it doesn't exist in the 'en' locale
                if (isset($phrase['romanized_phrase']) && $phrase['romanized_phrase'] && !$existingPhrase->getTranslation('romanized_phrase', $targetLocale, false)) {
                    $existingPhrase->setTranslation('romanized_phrase', $targetLocale, $phrase['romanized_phrase']);
                }
                if (!$existingPhrase->getTranslation('example', $targetLocale, false)) {
                    $existingPhrase->setTranslation('example', $targetLocale, $phrase['example']);
                }
                if (isset($phrase['romanized_example']) && $phrase['romanized_example'] && !$existingPhrase->getTranslation('romanized_example', $targetLocale, false)) {
                    $existingPhrase->setTranslation('romanized_example', $targetLocale, $phrase['romanized_example']);
                }

                $existingPhrase->save();
                $existingPhrase->learningPaths()->syncWithoutDetaching([$learningPath->id]);
            } else {
                // Initialize the array for creating a new KeyPhrase
                $phraseData = [
                    'phrase' => [
                        $targetLocale => $phrase['phrase'],
                        $nativeLocale => $phrase['translation'],
                    ],
                    'example' => [
                        $targetLocale => $phrase['example'],
                    ]
                ];

                // Conditionally add the romanized_phrase if it exists and is not null
                if (isset($phrase['romanized_phrase']) && $phrase['romanized_phrase'] !== null) {
                    $phraseData['romanized_phrase'] = [
                        $targetLocale => $phrase['romanized_phrase']
                    ];
                }
                // conditionally add the romanized_example if it exists and is not null
                if (isset($phrase['romanized_example']) && $phrase['romanized_example'] !== null) {
                    $phraseData['romanized_example'] = [
                        $targetLocale => $phrase['romanized_example']
                    ];
                }
                // Create the new KeyPhrase with the constructed data array
                $newPhrase = KeyPhrase::create($phraseData);

                $learningPath = LearningPath::find($learningPathId);
                if ($learningPath) {
                    $learningPath->keyPhrases()->attach($newPhrase);
                }
            }
        }

        return true;

    }

    public static function addExplanations($learningPathId, $targetLanguage, $targetLocale, $nativeLanguage, $nativeLocale)
    {
        $learningPath = LearningPath::find($learningPathId);
        $keyPhrases = $learningPath->keyPhrases;

        foreach ($keyPhrases as $keyPhrase) {                                    
            $existingExplanation = $keyPhrase->getExplanation($targetLocale, $nativeLocale);

            if (!$existingExplanation) {
                $phrase = $keyPhrase->getTranslation('phrase', $targetLocale);

                $prompt = "You're an AI expert language tutor helping people learn to speak their target language of {$targetLanguage} in real-life situations.
                Provide an explanation in {$nativeLanguage} to help the student understand the {$targetLanguage} phrase '{$phrase}'.                
                If the target language uses a non-latin alphabet, please provide a romanized version in parentheses each time you use the target language in your explanation.
                Format the explanation in markdown, using bold, italics, etc., where needed to help understanding.
                The content you return should be in the form of a JSON array with the following structure: 
                ['explanation' => 'A helpful paragraph form explanation of the target langauge phrase given in the student's native language, formatted in markdown.]";

                GenerateKeyPhraseExplanation::dispatch($keyPhrase->id, $nativeLocale, $targetLocale, $prompt);
            }            
        }

    }

    public static function generateExplanation($keyPhraseId, $nativeLocale, $targetLocale, $prompt)
    {
        $openAiService = new OpenAiService();
        $response = $openAiService->generateArrayResponse($prompt);

        if (!isset($response['explanation']) || empty($response['explanation'])) {
            Log::error('OpenAI did not return a valid key phrase explanation array for prompt: ' . $prompt);
            return false;
        }
        
        $explanation = $response['explanation'];

        self::storeExplanation($keyPhraseId, $nativeLocale, $targetLocale, $explanation);            
    }

    public static function storeExplanation($keyPhraseId, $nativeLocale, $targetLocale, $explanation)
    {
        $keyPhrase = KeyPhrase::find($keyPhraseId);
        if (!$keyPhrase) {
            throw new \Exception('KeyPhrase not found.');
        }

        $explanations = $keyPhrase->explanation ? json_decode($keyPhrase->explanation, true) : [];
        $explanations[$targetLocale][$nativeLocale] = $explanation;
        $keyPhrase->explanation = json_encode($explanations, JSON_UNESCAPED_SLASHES);

        if ($keyPhrase->save()) {
            $updatedKeyPhrase = KeyPhrase::find($keyPhraseId);
            $updatedExplanations = json_decode($updatedKeyPhrase->explanation, true);

            if (
                isset($updatedExplanations[$targetLocale][$nativeLocale]) &&
                $updatedExplanations[$targetLocale][$nativeLocale] === $explanation
            ) {
                return true;
            } else {
                throw new \Exception('Explanation was not stored correctly.');
            }
        }

        throw new \Exception('Failed to save the KeyPhrase.');
    }

    public static function UpdateLearningPathKeyPhrasesAndExamplesTranslations($learningPathId, $targetLanguage, $targetLocale, $nativeLanguage, $nativeLocale)
    {
        $learningPath = LearningPath::find($learningPathId);
        $keyPhrases = $learningPath->keyPhrases;

        // Create an array of key phrases with their ids, phrases, and examples in the target locale
        $phrasesForTranslation = [];
        foreach ($keyPhrases as $keyPhrase) {
            $phrase = $keyPhrase->getTranslation('phrase', $targetLocale);
            $example = $keyPhrase->getTranslation('example', $targetLocale);
            $phrasesForTranslation[] = [
                'id' => $keyPhrase->id,
                'phrase' => $phrase,
                'example' => $example
            ];
        }

        // Convert the array to JSON
        $phrasesForTranslationJson = json_encode($phrasesForTranslation);

        $prompt = "A language student is studying the learning path of {$learningPath->getTranslation('title', $nativeLocale)} for the {$targetLanguage} language.
        Provide a translation for this list of phrases and their examples in the student's native language of {$nativeLanguage}.
        Here is the list of phrases and examples: {$phrasesForTranslationJson}.                
        The content you return should be in the form of a JSON array named 'translated_phrases' with the following structure: 
        ['translated_phrases' => ['original_phrase_id' => ['translated_phrase' => 'translated_phrase', 'translated_example' => 'translated_example'], ...]]";

        $openAiService = new OpenAiService();
        $response = $openAiService->generateArrayResponse($prompt);

        $translatedPhrases = $response['translated_phrases'];        

        foreach ($translatedPhrases as $originalPhraseId => $translations) {
            // Find the KeyPhrase by its id
            $keyPhrase = KeyPhrase::find($originalPhraseId);

            // Check if the KeyPhrase exists
            if ($keyPhrase) {
                // Update or create the translation for the phrase
                if (isset($translations['translated_phrase'])) {
                    $existingPhraseTranslation = $keyPhrase->getTranslation('phrase', $nativeLocale);
                    if (!$existingPhraseTranslation) {
                        $keyPhrase->setTranslation('phrase', $nativeLocale, $translations['translated_phrase']);
                    }
                }

                // Update or create the translation for the example
                if (isset($translations['translated_example'])) {
                    $existingExampleTranslation = $keyPhrase->getTranslation('example', $nativeLocale);
                    if (!$existingExampleTranslation) {
                        $keyPhrase->setTranslation('example', $nativeLocale, $translations['translated_example']);
                    }
                }

                $keyPhrase->save();                
            }
        }
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

    public function getPhraseAudioUrl($locale, $gender)
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

    public static function generateImage($keyPhraseId)
    {
        $keyPhrase = KeyPhrase::find($keyPhraseId);

        if ($keyPhrase->image_url) {         
            return false;
        }

        $exampleTranslations = $keyPhrase->getTranslations('example');
        $firstExample = reset($exampleTranslations);

        $googleCloudService = new GoogleCloudService();
        $translatedExample = $googleCloudService->translateText($firstExample, 'en');

        if (!$translatedExample) {            
            return false;
        }

        $prompt = "Create an image for the following sentence: {$translatedExample}. IMPORTANT: ABSOLUTELY DO NOT USE TEXT IN THE IMAGE.";
        $openAiService = new OpenAiService();
        $imageUrl = $openAiService->generateImage($prompt);
        
        if ($imageUrl) {            
            try {
                $keyPhrase->addMediaFromUrl($imageUrl)
                    ->toMediaCollection('images');
            } catch (\Exception $e) {
                Log::error('Failed to store the image in the media library', ['error' => $e->getMessage()]);
                return false;
            }            
        }
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')
            ->withResponsiveImages()
            ->useFallbackUrl('/images/weaver_school_learning_path_fallback_image.webp')
            ->registerMediaConversions(function (?Media $media = null) {
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
    //     ->format('webp')
    //     ->width(150)
    //         ->height(150)
    //         ->sharpen(10);

    //     $this->addMediaConversion('small')
    //     ->format('webp')
    //     ->width(320)
    //         ->height(320);

    //     $this->addMediaConversion('medium')
    //     ->format('webp')
    //     ->width(427)
    //         ->height(427);

    //     $this->addMediaConversion('large')
    //     ->format('webp')
    //     ->width(800)
    //         ->height(800);

    //     $this->addMediaConversion('full')
    //     ->format('webp')
    //     ->width(1024)
    //         ->height(1024);
    // }

}
