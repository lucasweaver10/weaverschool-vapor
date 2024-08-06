<?php

namespace App\Livewire\Admin\Lessons\DiscussionQuestions;

use Livewire\Component;

class Edit extends Component
{
    public $question;
    public $text;
    public $lesson;
    public $vocabularyWordIds = [];
    public $grammarTopicIds = [];
    public $speakingTopicIds = [];

//    protected $listeners = ['discussionQuestionEdited' => '$refresh'];

    public function mount($lesson, $question)
    {
        $this->lesson = $lesson;
        $this->question = $question;
        $this->text = $this->question->question;
        $this->vocabularyWordIds = $this->question->vocabularyWords->pluck('id')->toArray();
        $this->grammarTopicIds = $this->question->grammarTopics->pluck('id')->toArray();
        $this->speakingTopicIds = $this->question->speakingTopics->pluck('id')->toArray();
    }

    public function updateDiscussionQuestion($id)
    {
        $this->validate([
            'text' => 'required|string|max:255',
        ]);

        $question = $this->lesson->discussionQuestions()->find($id);
        $question->update([
            'question' => $this->text,
        ]);

        if($this->vocabularyWordIds) {
            $this->question->vocabularyWords()->sync($this->vocabularyWordIds);
        }

        if($this->grammarTopicIds) {
            $this->question->grammarTopics()->sync($this->grammarTopicIds);
        }
        if($this->speakingTopicIds) {
            $this->question->speakingTopics()->sync($this->speakingTopicIds);
        }



        session()->flash('success', 'Discussion question updated');
        $this->dispatch('discussionQuestionEdited');
        $this->dispatchTo('admin.lessons.discussion-questions.create','discussionQuestionEdited');
    }

    public function render()
    {
        return view('livewire.admin.lessons.discussion-questions.edit');
    }
}
