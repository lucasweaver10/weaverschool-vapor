<?php

namespace App\Livewire\Myteacher\Courses\Assignments;

use App\Models\AssignmentAttachment;
use App\Notifications\AssignmentGradeUpdated;
use Livewire\Component;
use App\Models\Assignment;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Show extends Component
{
    use WithFileUploads;

    public $assignment;
    public $content;
    public $completed;
    public $assignmentId;
    public $score;
    public $feedback;
    public $loading;
    public $editMode = false;
    public $title;
    public $selectedDate;
    public $dueDate;
    public $file;
    public $attachments = [];

    protected $listeners = [
        'refreshAssignment' => '$refresh',
        'editModeToggled' => 'editModeToggled'
    ];

    public function editModeToggled()
    {
        $this->editMode = !$this->editMode;
    }

    public function save()
    {
        $assignment = Assignment::find($this->assignment->id);

        $assignment->update([
            'score' => $this->score,
            'feedback' => $this->feedback,
            'status' => 'graded',
        ]);

        $this->score = '';
        $this->feedback = '';

        session()->flash('success', 'Score and feedback saved.');

    }

    public function update()
    {
        $dueDate = date_create_from_format('Y-m-d H:i:s', $this->selectedDate . ' ' . '22:00:00');

        $assignment = Assignment::find($this->assignment->id);

        $assignment->update([
            'title' => $this->title,
            'content' => $this->content,
            'due_date' => $dueDate,
        ]);

        if ($this->attachments) {

            foreach ($this->attachments as $attachment) {

                $extension = $attachment->getClientOriginalExtension();

                $originalFileName = pathinfo($attachment->getClientOriginalName(), PATHINFO_FILENAME);

                $filename = $originalFileName . '_' . now()->timestamp . '.' . $extension;

                $attachment->storeAs('/attachments/', $filename, 's3');

                $assignmentAttachment = [
                    'assignment_id' => $assignment->id,
                    'filename' => $filename,
                    'extension' => $extension,
                    'size' => $attachment->getSize(),
                ];

                AssignmentAttachment::create($assignmentAttachment);

            }

        }

        session()->flash('success', 'Assignment updated');

//        $this->editMode = !$this->editMode;

        return redirect('/myteacher/courses/' . $this->assignment->registration_id . '?status=open&content=viewAssignments');
    }

    public function edit()
    {
        $this->editMode = true;
    }

    public function cancel()
    {
        $this->editMode = false;
    }

    public function updateGrade()
    {
        $assignment = Assignment::find($this->assignment->id);

        $assignment->update([
            'score' => $this->score,
            'feedback' => $this->feedback,
        ]);

        $assignment->user->notify(new AssignmentGradeUpdated($assignment));

        session()->flash('success', 'Score and feedback saved.');

        $this->dispatchSelf('refreshAssignment');

        $this->editMode = false;


    }

    public function mount()
    {
        $this->title = $this->assignment->title;
        $this->content = $this->assignment->content;
        $this->dueDate = substr($this->assignment->due_date, 0, 10);
    }

    public function render()
    {
        $this->completed = $this->assignment->completed;
//        $this->content = Str::of($this->assignment->content)->markdown();
        return view('livewire.myteacher.courses.assignments.show');
    }
}
