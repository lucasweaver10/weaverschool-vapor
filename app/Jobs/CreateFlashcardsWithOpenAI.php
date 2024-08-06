<?php

namespace App\Jobs;

use App\Http\Controllers\OpenAiController;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\FlashcardSet;
use Illuminate\Support\Facades\Log;
use OpenAI;

class CreateFlashcardsWithOpenAI implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 300;

    protected $flashcardSet;
    protected $text;
    protected $targetLanguage;
    protected $nativeLanguage;
    protected $type;
    protected $userId;

    /**
     * Create a new job instance.
     */
    public function __construct(FlashcardSet $flashcardSet, $text, $targetLanguage, $nativeLanguage, $type, $userId)
    {
        $this->flashcardSet = $flashcardSet;
        $this->text = $text;
        $this->targetLanguage = $targetLanguage;
        $this->nativeLanguage = $nativeLanguage;
        $this->type = $type;
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $openAIController = new OpenAIController();
        $openAIController->createFlashcardsWithOpenAI(
            $this->userId,
            $this->targetLanguage,
            $this->nativeLanguage,
            $this->type,
            $this->text,
            $this->flashcardSet->id
        );
    }

}
