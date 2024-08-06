<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\FlashcardSet;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class AttachUserToFlashcardSet implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 120;
    public $tries = 3;
    
    public $userId;
    public $flashcardSetId;

    /**
     * Create a new job instance.
     */
    public function __construct($userId, $flashcardSetId)
    {
        $this->userId = $userId;
        $this->flashcardSetId = $flashcardSetId;
    }    

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $user = User::find($this->userId);
        $flashcardSet = FlashcardSet::find($this->flashcardSetId);
        $user->flashcardSetsStudying()->attach($flashcardSet->id);
    }
}
