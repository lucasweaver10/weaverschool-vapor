<?php

namespace App\Livewire\Myteacher\Exercises;

use App\Models\Exercise;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $description;
    public $type;
    public $format;
    public $lesson_id;
    public $lessons;

    public function store()
    {
        $exercise = Exercise::create([
            'lesson_id' => $this->lesson_id,
            'name' => $this->name,
            'description' => $this->description,
            'type' => $this->type,
            'format' => $this->format,
        ]);

        session()->flash('success', 'Exercise created!');

//        return redirect()->action(
//            [QuizController::class, 'show'], ['id' => $quiz->id]
//        );
    }

    public function mount()
    {
        $this->lessons = Lesson::all();
    }

    public function render()
    {
        return view('livewire.myteacher.exercises.create', [
            'lessons' => $this->lessons,
        ]);
    }
}
