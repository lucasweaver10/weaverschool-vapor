<?php

namespace App\Livewire\Myteacher\Quizzes\Questions;

use App\Models\QuizAnswer;
use App\Models\QuizQuestion;
use Livewire\Component;

class Create extends Component
{
    public $quiz;
    public $number;
    public $text = '';
    public $type = 'radio';
    public $points = "1";
    public $answerText;
    public $answerDescription;
    public $pointValue;
    public $answers = [];

//    protected $listeners = ['change' => '$refresh'];

    protected $rules = [
        'text' => 'required|min:6',
        'type' => 'required',
        'points' => 'required|min:1',
        'answerText' => 'required|min:1',
        'pointValue' => 'required|min:1',
    ];

    public function saveQuestion()
    {
        $this->validateOnly('text');
        $this->validateOnly('type');
        $this->validateOnly('points');

        $question = QuizQuestion::create([
           'number' => '1',
           'text' => $this->text,
           'type' => $this->type,
           'possible_points' => $this->points,
           'quiz_id' => $this->quiz->id,
        ]);

        foreach($this->answers as $answer)
        {
            QuizAnswer::create([
               'quiz_question_id' => $question->id,
                'text' => $answer['answer_text'],
                'point_value' => $answer['point_value'],
            ]);
        }

        session()->flash('success', 'Question created');

        $this->number = '';
        $this->text = '';
        $this->type = 'radio';
        $this->points = '';
        $this->answers = [];

        $this->dispatch('questionSaved');
    }

    public function saveAnswerChoice()
    {
        $this->validateOnly('answerText');
        $this->validateOnly('pointValue');

        $answer = [
            'answer_text' => $this->answerText,
            'point_value' => $this->pointValue,
        ];

        $this->answers[] = $answer;

        $this->answerText = '';
        $this->pointValue = '';
    }

    public function render()
    {
        return view('livewire.myteacher.quizzes.questions.create');
    }
}
