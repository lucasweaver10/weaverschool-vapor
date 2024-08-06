<?php

namespace App\Livewire\Myteacher\Quizzes\Questions;

use App\Models\QuizAnswer;
use App\Models\QuizQuestion;
use Livewire\Component;

class Edit extends Component
{
    public $question;
    public $text;
    public $type;
    public $newAnswerText;
    public $newAnswerPointValue;
    public $possiblePoints;
    public $existingAnswers;
    public $answers;
    public $newAnswers;
    public $editMode = false;

    protected $listeners = ['answerCreated' => '$refresh'];

    protected $rules = [
        'newAnswerText' => 'required|min:1',
        'newAnswerPointValue' => 'required|min:1',
    ];

    public function updateQuestion()
    {
        $this->question->update([
            'text' => $this->text,
            'possible_points' => $this->possiblePoints,
            'type' => $this->type,
        ]);

        if($this->newAnswers)
        {
            foreach ($this->newAnswers as $answer)
            {
                QuizAnswer::create([
                    'quiz_question_id' => $this->question->id,
                    'text' => $answer['answer_text'],
                    'point_value' => $answer['point_value'],
                ]);
            }
        }

        session()->flash('success', 'Question updated');

        $this->dispatch('questionUpdated');
    }

    public function deleteQuestion()
    {
        $question = QuizQuestion::find($this->question->id);

        $question->answers()->delete();

        $question->delete();

        return back()->with('success', 'Question deleted');
    }

    public function saveNewAnswerChoice()
    {
        $this->validateOnly('newAnswerText');
        $this->validateOnly('newAnswerPointValue');

        $answer = QuizAnswer::create([
            'quiz_question_id' => $this->question->id,
            'text' => $this->newAnswerText,
            'point_value' => $this->newAnswerPointValue,
        ]);

//        $answer = [
//            'answer_id' => $answer->id,
//            'answer_text' => $this->newAnswerText,
//            'point_value' => $this->newAnswerPointValue,
//        ];
//
//        $this->newAnswers[] = $answer;

        $this->newAnswerText = '';
        $this->newAnswerPointValue = '';
    }


    public function mount()
    {
        $this->question = QuizQuestion::where('id', $this->question->id)->first();
//        $this->answers = $this->question->answers;
        $this->text = $this->question->text;
        $this->type = $this->question->type;
        $this->possiblePoints = $this->question->possible_points;
//        $this->answers = QuizAnswer::where('quiz_question_id', $this->question->id)->get();
    }

    public function render()
    {
//        $this->answers = $this->question->answers;
        return view('livewire.myteacher.quizzes.questions.edit');
    }
}
