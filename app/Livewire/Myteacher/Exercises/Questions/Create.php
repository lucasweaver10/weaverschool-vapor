<?php

namespace App\Livewire\Myteacher\Exercises\Questions;

use App\Models\ExerciseQuestion;
use Livewire\Component;

class Create extends Component
{
    public $exercise;
    public $number;
    public $text;
    public $correct_answer;
    public $hint;
    public $explanation;

//    protected $listeners = ['change' => '$refresh'];

    protected $rules = [
        'number' => 'required|min:1',
        'text' => 'required|min:6',
        'correct_answer' => 'required',
        'hint' => 'required',
        'explanation' => 'required',
    ];

    public function saveQuestion()
    {
        $this->validateOnly('number');
        $this->validateOnly('text');
        $this->validateOnly('correct_answer');
        $this->validateOnly('hint');
        $this->validateOnly('explanation');

        $question = ExerciseQuestion::create([
            'exercise_id' => $this->exercise->id,
            'number' => $this->number,
            'text' => $this->text,
            'correct_answer' => $this->correct_answer,
            'hint' => $this->hint,
            'explanation' => $this->explanation,

        ]);

        session()->flash('success', 'Question created');

        $this->number = '';
        $this->text = '';
        $this->correct_answer = '';
        $this->hint = '';
        $this->explanation = '';

        $this->dispatch('questionSaved');
    }

    public function render()
    {
        return view('livewire.myteacher.exercises.questions.create');
    }
}
