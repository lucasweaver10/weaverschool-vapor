<?php

namespace App\Livewire\Myteacher\Exercises\Questions;

use App\Models\ExerciseQuestion;
use Livewire\Component;

class Show extends Component
{
    public $editMode = false;
    public $question;
    public $number;
    public $text;
    public $correct_answer;
    public $hint;
    public $explanation;

    protected $listeners = ['questionUpdated' => 'toggleOffEditMode'];

    public function toggleOffEditMode()
    {
        $this->editMode = false;
    }

    public function saveQuestion()
    {
        $this->validate([
            'number' => 'required|integer',
            'text' => 'required|string',
            'correct_answer' => 'required|string',
            'hint' => 'nullable|string',
            'explanation' => 'nullable|string',
        ]);

        $question = ExerciseQuestion::find($this->question->id);

        $question->update([
            'number' => $this->number,
            'text' => $this->text,
            'correct_answer' => $this->correct_answer,
            'hint' => $this->hint,
            'explanation' => $this->explanation,
        ]);

        $this->editMode = false;
        $this->dispatch('alert', 'success', 'Question updated successfully.');
    }

    public function mount()
    {
        $this->number = $this->question->number;
        $this->text = $this->question->text;
        $this->correct_answer = $this->question->correct_answer;
        $this->hint = $this->question->hint;
        $this->explanation = $this->question->explanation;
    }

    public function render()
    {
        return view('livewire.myteacher.exercises.questions.show');
    }
}
