<?php

namespace App\Livewire\Admin\Lessons\WrittenExamples;

use Livewire\Component;

class Index extends Component
{
    public $lesson;
    public $example;
    public $written_examples;

    protected $listeners = ['writtenExamplesUpdated' => '$refresh'];

    public function mount($lesson)
    {
        $this->lesson = $lesson;
    }

    public function storeWrittenExamples()
    {
        $data = $this->validate([
            'written_examples' => 'required',
        ]);

        $writtenExamples = array_diff(preg_split("/\r\n|\n|\r/", $this->written_examples), ['']);
        foreach ($writtenExamples as $example) {
            $example = trim($example, '"\'');
            $this->lesson->writtenExamples()->create(['example' => $example]);
        }

        session()->flash('success', 'Written examples added successfully!');

        $this->written_examples = [''];
        $this->dispatch('writtenExamplesUpdated');
    }

    public function render()
    {
        return view('livewire.admin.lessons.written-examples.index');
    }
}
