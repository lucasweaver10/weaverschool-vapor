<?php

namespace App\Livewire\Admin\Lessons\SpeakingTopics;

use Livewire\Component;


class Edit extends Component
{
    public $topic;
    public $title;
    public $lesson;

//    protected $listeners = ['speakingTopicEdited' => '$refresh'];

    public function mount($lesson, $topic)
    {
        $this->lesson = $lesson;
        $this->topic = $topic;
        $this->title = $this->topic->title;
    }

    public function updateSpeakingTopic($id)
    {
        $this->validate([
            'title' => 'required|string|max:255',
        ]);

        $topic = $this->lesson->speakingTopics()->find($id);
        $topic->update([
            'title' => $this->title,
        ]);

        session()->flash('success', 'Speaking topic updated');
        $this->dispatch('speakingTopicEdited');
        $this->dispatchTo('admin.lessons.speaking-topics.create','speakingTopicEdited');
    }

    public function render()
    {
        return view('livewire.admin.lessons.speaking-topics.edit');
    }
}
