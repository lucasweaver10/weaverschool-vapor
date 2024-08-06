<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Services\GoogleCloudTextToSpeechService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Jobs\CheckForUpdatedVocabularyWordImageUrlForFlashcard;

class Flashcard extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $guarded = [];

    public static function createFlashcardsFromVocabularyWords($vocabularyWords, $flashcardSetId, $targetLocale, $nativeLocale, $voiceGender, $imagesSelected = true, $voiceExamplesSelected = true)
    {        
        foreach ($vocabularyWords as $word) {
            $word = VocabularyWord::find($word->id);
            $imageMedia = $imagesSelected ? $word->getMedia('images')->first() : null;
            $imageUrl = $imageMedia ? $imageMedia->getUrl('medium') : null;
            $audioUrl = $voiceExamplesSelected ? $word->getWordAudioUrl($targetLocale, $voiceGender) : null;

            $flashcard = Flashcard::create([
                'flashcard_set_id' => $flashcardSetId,
                'vocabulary_word_id' => $word->id,
                'term' => $word->getTranslation('word', $targetLocale),
                'romanized_term' => $word->getTranslation('romanized_word', $targetLocale),
                'definition' => $word->getTranslation('word', $nativeLocale),
                'example' => $word->getTranslation('example', $targetLocale),
                'audio_url' => $audioUrl,
                'image_url' => $imageUrl,
            ]);

            // Add a follow-up job if image_url is null to try to update the image url again in 5 minutes, but only if images were selected
            if ($imagesSelected && $flashcard->image_url === null) {
                CheckForUpdatedVocabularyWordImageUrlForFlashcard::dispatch($flashcard->id)->delay(now()->addMinutes(3));
            }
        }
    }

    public static function updateOrReplaceAudioUrl($flashcardId, $targetLocale, $voiceGender)
    {
        $flashcard = Flashcard::find($flashcardId);
        $voiceId = SyntheticVoice::getVoiceId($targetLocale, $voiceGender);

        if ($flashcard->vocabulary_word_id) {
            $vocabularyWord = VocabularyWord::find($flashcard->vocabulary_word_id);
            $audioUrl = $vocabularyWord->audio_urls[$targetLocale][$voiceGender] ?? VocabularyWord::generateAudioUrl($vocabularyWord->id, $targetLocale, $voiceId);
            $flashcard->update(['audio_url' => $audioUrl]);
        }
    }

    public static function replaceAudioUrl($flashcardId, $targetLocale, $voiceId)
    {
        $flashcard = Flashcard::find($flashcardId);
        $voice = SyntheticVoice::find($voiceId);
        $audioService = new GoogleCloudTextToSpeechService();        

        $text = $flashcard->term;
        $audioContent = $audioService->generateAudioFromText($text, $voice->voice_locale, $voice->voice_name, $voice->ssml_gender);
        $filename = 'flashcard-' . $flashcard->id . '-' . $voice->ssml_gender . '-' . $targetLocale . '-' . uniqid() . '.mp3';
        $path = '/audio/flashcards/' . $filename;
        Storage::disk('s3-public')->put($path, $audioContent, 's3-public');
        $audioUrl = 'https://we-public.s3.eu-north-1.amazonaws.com' . $path;
        
        $flashcard->update([
            'audio_url' => $audioUrl,
        ]);        

        return $audioUrl;     
    }

    public static function addMissingImageUrl($flashcardId)
    {                
        $flashcard = Flashcard::find($flashcardId);
        if($flashcard->vocabulary_word_id) {
            $word = VocabularyWord::find($flashcard->vocabulary_word_id);
            $imageMedia = $word->getMedia('images')->first();
            $imageUrl = $imageMedia->getUrl('medium');
            $flashcard->update([
                'image_url' => $imageUrl,
            ]);
        }
    }

    public function vocabularyWord()
    {
        return $this->belongsTo(VocabularyWord::class, 'vocabulary_word_id');
    }

    public function sides()
    {
        return $this->hasMany(FlashcardSide::class);
    }

    public function examples()
    {
        return $this->hasMany(FlashcardExample::class);
    }

    public function set()
    {
        return $this->belongsTo(FlashcardSet::class, 'flashcard_set_id');
    }

    public function userFlashcardProgress()
    {
        return $this->hasOne(UserFlashcardProgress::class);
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
