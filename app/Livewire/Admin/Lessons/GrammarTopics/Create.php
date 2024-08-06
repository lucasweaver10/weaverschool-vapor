<?php

namespace App\Livewire\Admin\Lessons\GrammarTopics;

use Livewire\Component;

class Create extends Component
{
    public $lesson;
    public $title;
    public $grammar_topics;

    protected $listeners = ['grammarTopicsCreated' => '$refresh', 'grammarTopicEdited' => '$refresh'];

    public function mount($lesson)
    {
        $this->lesson = $lesson;
    }

    public function storeGrammarTopics()
    {
        $data = $this->validate([
            'grammar_topics' => 'required',
        ]);

        $grammarTopics = array_diff(preg_split("/\r\n|\n|\r/", $this->grammar_topics), ['']);
        foreach ($grammarTopics as $topic) {
            $topic = trim($topic, '"\'');
            $this->lesson->grammarTopics()->create(['title' => $topic]);
        }

        session()->flash('success', 'Grammar topics added successfully!');

        $this->grammar_topics = [''];
        $this->dispatch('grammarTopicsCreated');
    }

    public function render()
    {
        return view('livewire.admin.lessons.grammar-topics.create');
    }
}
