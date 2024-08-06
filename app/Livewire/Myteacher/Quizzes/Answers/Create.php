<?php

namespace App\Livewire\Myteacher\Quizzes\Answers;

use App\Models\QuizAnswer;
use Livewire\Component;

class Create extends Component
{
    public $answerText;
    public $pointValue;
    public $questionId;
    public $answers;

    protected $rules = [
        'answerText' => 'required|min:1',
        'pointValue' => 'required|min:1',
    ];

    public function saveAnswerChoice()
    {
        $this->validateOnly('answerText');
        $this->validateOnly('pointValue');

        $answer = QuizAnswer::create([
            'quiz_question_id' => $this->questionId,
            'text' => $this->answerText,
            'point_value' => $this->pointValue,
        ]);

        $this->answerText = '';
        $this->pointValue = '';

//        $this->dispatch('answerCreated');
    }

    public function render()
    {
        return view('livewire.myteacher.quizzes.answers.create');
    }
}
