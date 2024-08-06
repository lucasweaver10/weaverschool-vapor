<?php

namespace App\Livewire\Myteacher\Quizzes\Questions;

use Livewire\Component;

class Show extends Component
{
    public $question;
    public $number;
    public $editMode = false;
    public $answers;

    protected $listeners = ['answerCreated' => '$refresh', 'questionUpdated' => 'toggleOffEditMode'];

    public function toggleOffEditMode()
    {
        $this->editMode = false;
    }


    public function render()
    {
        return view('livewire.myteacher.quizzes.questions.show');
    }
}
