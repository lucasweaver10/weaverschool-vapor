<?php

namespace App\Livewire\Admin\Lessons\DiscussionQuestions;

use Livewire\Component;

class Create extends Component
{
    public $lesson;
    public $discussion_questions;

    protected $listeners = ['discussionQuestionsUpdated' => '$refresh', 'discussionQuestionEdited' => '$refresh'];

    public function mount($lesson)
    {
        $this->lesson = $lesson;
    }

    public function storeDiscussionQuestions()
    {
        $data = $this->validate([
            'discussion_questions' => 'required',
        ]);

        $discussionQuestions = array_diff(preg_split("/\r\n|\n|\r/", $this->discussion_questions), ['']);
        foreach ($discussionQuestions as $question) {
            $this->lesson->discussionQuestions()->create(['question' => $question]);
        }

        session()->flash('success', 'Discussion questions added successfully!');

        $this->discussion_questions = [''];
        $this->dispatch('discussionQuestionsUpdated');
    }

    public function render()
    {
        return view('livewire.admin.lessons.discussion-questions.create');
    }
}
