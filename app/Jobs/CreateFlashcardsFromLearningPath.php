<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Flashcard;
use App\Models\FlashcardSet;
use App\Models\LearningPath;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Jobs\CheckForUpdatedKeyPhraseImageUrlForFlashcard;

class CreateFlashcardsFromLearningPath implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 120;
    public $tries = 3;
    public $learningPathId;
    public $targetLocale;
    public $nativeLocale;
    public $userId;

    /**
     * Create a new job instance.
     */
    public function __construct($learningPathId, $targetLocale, $nativeLocale, $userId)
    {
        $this->learningPathId = $learningPathId;
        $this->targetLocale = $targetLocale;
        $this->nativeLocale = $nativeLocale;
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $user = User::find($this->userId);
        $learningPath = $user->learningPaths()->where('learning_path_id', $this->learningPathId)->with(['vocabularyWords', 'keyPhrases'])->first();

        $vocabularyWords = $learningPath->vocabularyWords;
        $keyPhrases = $learningPath->keyPhrases;

        if ($learningPath->vocabularyWords->isEmpty() || $learningPath->keyPhrases->isEmpty()) {
            Log::warning("Prerequisite data missing for Learning Path ID: {$this->learningPathId}");
            $this->fail();
            return;
        }

        $flashcardSet = FlashcardSet::create([        
            'learning_path_id' => $this->learningPathId,
            'user_id' => $this->userId,
            'title' => $learningPath->title,
            'description' => $learningPath->description,
        ]);
                
        $user->flashcardSetsStudying()->attach($flashcardSet->id);

        foreach($vocabularyWords as $word)
        {
            $flashcard = Flashcard::create([
                'flashcard_set_id' => $flashcardSet->id,
                'vocabulary_word_id' => $word->id,
                'term' => $word->getTranslation('word', $this->targetLocale),
                'romanized_term' => $word->getTranslation('romanized_word', $this->targetLocale),
                'definition' => $word->getTranslation('word', $this->nativeLocale),
                'example' => $word->getTranslation('example', $this->targetLocale),
                'audio_url' => $word->getWordAudioUrl($this->targetLocale, $learningPath->pivot->voice_gender) ?? null,
                'image_url' => $word->getMedia('images')->first()->getUrl('medium') ?? null,
            ]);

            // add a follow up job if image_url is null to try to update the image url again in 5 minutes
            if($flashcard->image_url === null)
            {
                CheckForUpdatedVocabularyWordImageUrlForFlashcard::dispatch($flashcard->id)->delay(now()->addMinutes(3));
            }
        }

        foreach($keyPhrases as $phrase)
        {
            $flashcard = Flashcard::create([
                'flashcard_set_id' => $flashcardSet->id,
                'key_phrase_id' => $phrase->id,                
                'term' => $phrase->getTranslation('phrase', $this->targetLocale),
                'romanized_term' => $phrase->getTranslation('romanized_phrase', $this->targetLocale),                 
                'definition' => $phrase->getTranslation('phrase', $this->nativeLocale),
                'example' => $phrase->getTranslation('example', $this->targetLocale),
                'audio_url' => $phrase->getPhraseAudioUrl($this->targetLocale, $learningPath->pivot->voice_gender) ?? null,
                'image_url' => $phrase->getMedia('images')->first()->getUrl('medium') ?? null,
            ]);

            // add a follow up job if image_url is null to try to update the image url again in 5 minutes
            if($flashcard->image_url === null)
            {
                CheckForUpdatedKeyPhraseImageUrlForFlashcard::dispatch($flashcard->id)->delay(now()->addMinutes(3));
            }
        }
    }
}
