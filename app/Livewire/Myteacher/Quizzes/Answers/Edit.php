<?php

namespace App\Livewire\Myteacher\Quizzes\Answers;

use App\Models\QuizAnswer;
use Livewire\Component;

class Edit extends Component
{
    public $answer;
    public $text;
    public $points;

    public function updateAnswer($id)
    {
        $answer = QuizAnswer::find($id);

        $answer->update([
            'text' => $this->text,
            'point_value' => $this->points,
        ]);

        $this->points = $answer->point_value;

        session()->flash('success', 'Answer choice updated');
    }

    public function deleteAnswer($id)
    {
        $answer = QuizAnswer::find($id);

        $answer->delete();

        session()->flash('success', 'Answer choice deleted');
    }

//    public function mount()
//    {
//        $this->text = $this->answer->text;
//        $this->points = $this->answer->point_value;
//    }

    public function render()
    {
        $this->answer = QuizAnswer::find($this->answer->id);
        $this->text = $this->answer->text;
        $this->points = $this->answer->point_value;
        return view('livewire.myteacher.quizzes.answers.edit');
    }
}
