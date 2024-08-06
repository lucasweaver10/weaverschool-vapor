<?php

namespace App\Livewire\Flashcards;

use App\Models\Flashcard;
use App\Models\UserFlashcardProgress;
use Livewire\Component;

class Show extends Component
{
    public $flashcard;

    public $listeners = ['flashcard-marked-as-learned' => '$refresh'];
    
    public function markAsLearned($flashcardId)
    {
        $userId = auth()->id();
        $flashcard = Flashcard::find($flashcardId);
        // Fetch the specific progress record for the current user and the flashcard
        $currentProgress = $flashcard->userFlashcardProgress()->where('user_id', $userId)->first();
        $progress = $flashcard->userFlashcardProgress()->updateOrCreate(
            [
                'user_id' => $userId,
                'flashcard_id' => $flashcard->id,
                'flashcard_set_id' => $flashcard->flashcard_set_id,
            ],
            [
                'status' => 'learned',
                'times_learned' => $currentProgress ? $currentProgress->times_learned + 1 : 1,
                'last_reviewed_at' => now(),
            ]
        );
        UserFlashcardProgress::updateNextReviewDate($progress->id);
        $this->dispatch('flashcard-marked-as-learned');
    }

    public function mount($flashcard)
    {
        $this->flashcard = $flashcard;
    }

    public function render()
    {
        return view('livewire.flashcards.show');
    }
}
