<?php

namespace App\Livewire\Flashcards;

use App\Models\FlashcardSet;
use Livewire\Component;

class Index extends Component
{
    public $flashcards;
    public int $word;
    public int $totalWords;
    public $randomNumbers;
    public bool $pauseVisible = false;
    public bool $imageMode = false;
    public bool $romanized = true;
    public bool $neuralReplayMode = false;
    public bool $whiteNoise = false;
    public bool $learnedCardsIncluded = true;
    public int $flashcardSetId;
    public int $neuralBreaks;    

    public function includeLearnedCards()
    {
        $this->learnedCardsIncluded = !$this->learnedCardsIncluded;
        $this->retrieveFlashcards();
    }

    public function retrieveFlashcards()
    {
        $flashcardSet = FlashcardSet::find($this->flashcardSetId);
        $user_id = auth()->id();
        if($this->learnedCardsIncluded)
        {
            $this->flashcards = $flashcardSet->flashcards()->get();
        } else
        {
            $this->flashcards = $flashcardSet->flashcards()
                ->where(function ($query) use ($user_id) {
                    $query->doesntHave('userFlashcardProgress')
                        ->orWhereHas('userFlashcardProgress', function ($subQuery) use ($user_id) {
                            $subQuery->where('user_id', $user_id)
                                ->whereNotIn('status', ['learned', 'mastered']);
                        });
                })
                ->get()
                ->shuffle();
        }
        $this->calculateNeuralBreaks();
        $this->generateRandomNumbers();
        $this->totalWords = $this->flashcards->count();
        $this->word = 1;
    }

    public function calculateNeuralBreaks()
    {
        $this->neuralBreaks = number_format((ceil($this->flashcards->count() * .2)), 0);
    }

    public function generateRandomNumbers()
    {
        if ($this->flashcards->count() > 5) {
            $randomKeys = array_rand(range(1, $this->flashcards->count() - 2), $this->neuralBreaks);
            $this->randomNumbers = array_map(function ($key) {
                return $key + 1;
            }, $randomKeys);
        } else {
            $this->randomNumbers = [1];
        }
    }

    public function mount()
    {
        $this->retrieveFlashcards();
    }

    public function render()
    {
        return view('livewire.flashcards.index');
    }
}
