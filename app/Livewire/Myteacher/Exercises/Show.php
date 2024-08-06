<?php

namespace App\Livewire\Myteacher\Exercises;

use Livewire\Component;

class Show extends Component
{
    public $exercise;
    public $name;
    public $description;
    public $exerciseEditMode = false;

    protected $listeners = ['questionSaved' => '$refresh', 'answerCreated' => '$refresh', 'exerciseUpdated' => '$refresh'];

    public function updateExercise()
    {
        $exercise = Exercise::where('id', $this->exercise->id);
        $exercise->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        session()->flash('success', 'Quiz updated');

        $this->dispatchSelf('exerciseUpdated');
        $this->exerciseEditMode = false;
    }

    public function render()
    {
        $this->name = $this->exercise->name;
        $this->description = $this->exercise->description;

        return view('livewire.myteacher.exercises.show');
    }
}
