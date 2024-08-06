<?php

namespace App\Livewire\Myteacher\Quizzes;

use App\Models\Quiz;
use Livewire\Component;

class Edit extends Component
{
    public $quiz;
    public $name;
    public $description;
    public $instructions;

    protected $rules = [
        'quiz.name' => 'string|min:6',
        'quiz.description' => 'string|max:500',
        'quiz.instructions' => 'string|max:500',
    ];

    public function update()
    {
        $quiz = Quiz::findOrFail($this->quiz->id);

        $this->validate();

        $quiz->update([
            'name' => $this->name,
            'description' => $this->description,
            'instructions' => $this->instructions,
        ]);

        session()->flash('success', 'Quiz updated!');

        return redirect('/myteacher/quizzes/' . $quiz->id);
    }

    public function mount()
    {
        $this->name = $this->quiz->name;
        $this->description = $this->quiz->description;
        $this->instructions = $this->quiz->instructions;
    }

    public function render()
    {
        return view('livewire.myteacher.quizzes.edit');
    }
}
