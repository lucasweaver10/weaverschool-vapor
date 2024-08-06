<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Assignment;
use App\Models\CompletedHomework;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;

class HomeworkUploader extends Component
{
    use WithFileUploads;

    public $uploads = [];
    public $assignmentId;

    public function store() {
        if ($this->uploads) {

            foreach ($this->uploads as $upload) {

                $extension = $upload->getClientOriginalExtension();

                $originalFileName = pathinfo($upload->getClientOriginalName(), PATHINFO_FILENAME);

                $filename = $originalFileName . '_' . now()->timestamp . '.' . $extension;

                $upload->storeAs('/completed-homework/', $filename, 's3');

                $homework = [
                    'assignment_id' => $this->assignmentId,
                    'filename' => $filename,
                    'extension' => $extension,
                    'size' => $upload->getSize(),
                ];

                CompletedHomework::create($homework);
            }

            session()->flash('success', 'Homework uploaded');

            $this->uploads = '';

            $this->dispatchUp('refreshAssignment');
        }

    }

    public function render()
    {
        return view('livewire.homework-uploader');
    }
}
