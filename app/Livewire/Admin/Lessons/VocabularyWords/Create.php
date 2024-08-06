<?php

namespace App\Livewire\Admin\Lessons\VocabularyWords;

use Livewire\Component;

class Create extends Component
{
    public $lesson;
    public $vocabulary_words;

    protected $listeners = ['vocabularyWordsUpdated' => '$refresh', 'vocabularyWordEdited' => '$refresh'];


    public function mount($lesson) {
        $this->lesson = $lesson;
    }

    public function storeVocabularyWords(){
        $data = $this->validate([
            'vocabulary_words' => 'required',
        ]);

        $vocabulary_words = array_diff(preg_split("/\r\n|\n|\r/", $this->vocabulary_words), ['']);
        foreach ($vocabulary_words as $vocab_word) {
            list($word, $definition) = preg_split("/[:]/", $vocab_word);
            $this->lesson->vocabularyWords()->create(['word' => $word, 'definition' => $definition,
                'lesson_id' => $this->lesson->id, 'example' => '']);
        }

        session()->flash('success', 'Vocabulary words added successfully!');

        $this->vocabulary_words = [''];
        $this->dispatch('vocabularyWordsUpdated');
    }


    public function render()
    {
        return view('livewire.admin.lessons.vocabulary-words.create');
    }
}
