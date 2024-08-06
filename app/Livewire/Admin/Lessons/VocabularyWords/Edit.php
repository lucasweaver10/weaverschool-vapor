<?php

namespace App\Livewire\Admin\Lessons\VocabularyWords;

use Livewire\Component;

class Edit extends Component
{
    public $vocabularyWord;
    public $word;
    public $definition;
    public $lesson;

//    protected $listeners = ['vocabularyWordEdited' => '$refresh'];

    public function mount($lesson, $vocabularyWord)
    {
        $this->lesson = $lesson;
        $this->vocabularyWord = $vocabularyWord;
        $this->word = $vocabularyWord->word;
        $this->definition = $vocabularyWord->definition;
    }

    public function updateVocabularyWord($id)
    {
        $this->validate([
            'word' => 'required|string|max:255',
            'definition' => 'required|string|max:480',
        ]);

        $topic = $this->lesson->vocabularyWords()->find($id);
        $topic->update([
            'word' => $this->word,
            'definition' => $this->definition,
        ]);

        session()->flash('success', 'Vocabulary word updated');
        $this->dispatch('vocabularyWordEdited');
        $this->dispatchTo('admin.lessons.vocabulary-words.create','vocabularyWordEdited');
    }

    public function render()
    {
        return view('livewire.admin.lessons.vocabulary-words.edit');
    }
}
