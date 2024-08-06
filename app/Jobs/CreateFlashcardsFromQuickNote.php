<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Http\Controllers\FlashcardController;

class CreateFlashcardsFromQuickNote implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    
    public $timeout = 300;
    public $tries = 3;
    public $backoff = 60;

    protected $text;
    protected $userId;
    protected $quickNoteId;
    
    /**
     * Create a new job instance.
     */
    public function __construct($text, $userId, $quickNoteId)
    {
        $this->text = $text;
        $this->userId = $userId;
        $this->quickNoteId = $quickNoteId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $flashcardController = new FlashcardController();

        $user = User::find($this->userId);
        $quickNoteSetId = $user->quickNoteSet->id;
        $quickNoteFlashcardSetId = $user->flashcardSets->where('quick_note_set_id', $quickNoteSetId)->first()->id ?? null;

        if($quickNoteFlashcardSetId) {
            $flashcardSetId = $quickNoteFlashcardSetId;
        } else {
            $flashcardSetId = $flashcardController->createFlashcardSetForQuickNoteSet($this->userId, $quickNoteSetId);
        }

        $status = $flashcardController->createFlashcardsFromQuickNote($this->text, $flashcardSetId);

        if (!$status) {
            Log::error('Error creating flashcards from quick note', [
                'text' => $this->text,
                'flashcardSetId' => $flashcardSetId,
            ]);
        }

        $flashcardController->createFlashcardImages($flashcardSetId);
        $flashcardController->createFlashcardAudio($flashcardSetId);        
    }
}
