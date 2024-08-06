<?php

namespace App\Livewire\Myteacher\Quizzes\Questions;

use App\Models\Quiz;
use App\Models\QuizQuestion;
use Livewire\Component;

class Index extends Component
{
    public $quiz;
    public $name;
    public $description;
//    public $questions;
    public $quizEditMode = false;

    protected $listeners = ['questionSaved' => '$refresh', 'answerCreated' => '$refresh', 'quizUpdated' => '$refresh'];

    public function updateQuiz()
    {
        $quiz = Quiz::where('id', $this->quiz->id);
        $quiz->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        session()->flash('success', 'Quiz updated');

        $this->dispatchSelf('quizUpdated');
        $this->quizEditMode = false;
    }

    public function render()
    {
//        $this->questions = QuizQuestion::where('quiz_id', $this->quiz->id)->with('answers')->get();

        $this->name = $this->quiz->name;
        $this->description = $this->quiz->description;

        return view('livewire.myteacher.quizzes.questions.index');
    }
}
