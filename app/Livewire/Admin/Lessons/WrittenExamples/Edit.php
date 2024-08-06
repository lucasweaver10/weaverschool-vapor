<?php

namespace App\Livewire\Admin\Lessons\WrittenExamples;

use Livewire\Component;

class Edit extends Component
{
    public $example;
    public $text;
    public $lesson;
    public $vocabularyWordIds = [];
    public $grammarTopicIds = [];

//    protected $listeners = ['writtenExampleEdited' => '$refresh'];

    public function mount($lesson, $example)
    {
        $this->lesson = $lesson;
        $this->example = $example;
        $this->text = $this->example->example;
        $this->vocabularyWordIds = $this->example->vocabularyWords->pluck('id')->toArray();
        $this->grammarTopicIds = $this->example->grammarTopics->pluck('id')->toArray();

        // $this->example->example is because that's how it is in the database instead of 'text' //
    }

    public function updateWrittenExample($id)
    {
        $this->validate([
            'text' => 'required|string|max:255',
        ]);

        $example = $this->lesson->writtenExamples()->find($id);
        $example->update([
            'example' => $this->text,
        ]);

        if($this->vocabularyWordIds) {
            $this->example->vocabularyWords()->sync($this->vocabularyWordIds);
        }

        if($this->grammarTopicIds) {
            $this->example->grammarTopics()->sync($this->grammarTopicIds);
        }



        session()->flash('success', 'Written example updated');
        $this->dispatch('writtenExampleEdited');
        $this->dispatchTo('admin.lessons.written-examples.create','writtenExampleEdited');
    }

    public function render()
    {
        return view('livewire.admin.lessons.written-examples.edit');
    }
}
