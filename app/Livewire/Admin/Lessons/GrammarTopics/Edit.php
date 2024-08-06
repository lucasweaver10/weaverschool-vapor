<?php

namespace App\Livewire\Admin\Lessons\GrammarTopics;

use Livewire\Component;

class Edit extends Component
{
    public $topic;
    public $title;
    public $lesson;

//    protected $listeners = ['grammarTopicEdited' => '$refresh'];

    public function mount($lesson, $topic)
    {
        $this->lesson = $lesson;
        $this->topic = $topic;
        $this->title = $this->topic->title;
    }

    public function updateGrammarTopic($id)
    {
        $this->validate([
            'title' => 'required|string|max:255',
        ]);

        $topic = $this->lesson->grammarTopics()->find($id);
        $topic->update([
            'title' => $this->title,
        ]);

        session()->flash('success', 'Grammar topic updated');
        $this->dispatch('grammarTopicEdited');
        $this->dispatchTo('admin.lessons.grammar-topics.create','grammarTopicEdited');
    }

    public function render()
    {
//        $this->title = $this->topic->title;
        return view('livewire.admin.lessons.grammar-topics.edit');
    }
}
