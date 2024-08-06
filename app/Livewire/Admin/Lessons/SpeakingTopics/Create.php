<?php

namespace App\Livewire\Admin\Lessons\SpeakingTopics;

use Livewire\Component;

class Create extends Component
{
    public $lesson;
    public $title;
    public $speaking_topics;

    protected $listeners = ['speakingTopicsCreated' => '$refresh', 'speakingTopicEdited' => '$refresh'];

    public function mount($lesson)
    {
        $this->lesson = $lesson;
    }

    public function storeSpeakingTopics()
    {
        $data = $this->validate([
            'speaking_topics' => 'required',
        ]);

        $speakingTopics = explode(',', $this->speaking_topics);
        foreach ($speakingTopics as $topic) {
            $this->lesson->speakingTopics()->create(['title' => trim($topic)]);
        }

        $this->title = '';

        session()->flash('success', 'Speaking topics added successfully!');

        $this->dispatch('speakingTopicsCreated');
    }

    public function render()
    {
        return view('livewire.admin.lessons.speaking-topics.create');
    }
}
