<?php

namespace App\Livewire\Myteacher\Quizzes;

use App\Http\Controllers\QuizController;
use App\Models\Quiz;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{

    public $name;
    public $description;
    public $instructions;
    public $lessons;
    public $lesson_id;

    public function createQuiz()
    {
        $userId = Auth::id();

        $quiz = Quiz::create([
            'name' => $this->name,
            'description' => $this->description,
            'instructions' => $this->instructions,
            'user_id' => $userId,
            'lesson_id' => $this->lesson_id,
        ]);

        session()->flash('success', 'Quiz created!');

        return redirect()->action(
            [QuizController::class, 'show'], ['id' => $quiz->id]
        );
    }

    public function mount()
    {
        $this->lessons = Lesson::all();
    }


    public function render()
    {
        return view('livewire.myteacher.quizzes.create');
    }
}
