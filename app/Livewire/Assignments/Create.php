<?php

namespace App\Livewire\Assignments;

use App\Models\Assignment;
use App\Models\AssignmentAttachment;
use App\Models\Group;
use App\Models\Registration;
use App\Models\Teacher;
use App\Notifications\AssignmentCreated;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Segment\Segment;

class Create extends Component
{
    use WithFileUploads;

    public $title;
    public $content;
    public $selectedDate;
    public $selectedRegistrationId;
    public $selectedGroupId;
    public $dueDate;
    public $file;
    public $attachments = [];
    public $groups;
    public $registrations;
    public $registration;

    public function store()
    {
        $dueDate = date_create_from_format('Y-m-d H:i:s', $this->selectedDate . ' ' . '22:00:00');

        $registration = Registration::find($this->selectedRegistrationId);

        $data = [
            'teacher_id' => $registration->teacher_id,
            'user_id' => $registration->user_id,
            'registration_id' => $this->selectedRegistrationId,
            'title' => $this->title,
            'content' => $this->content,
            'due_date' => $dueDate
        ];

        $assignment = Assignment::create($data);

        $registration->user->notify(new AssignmentCreated($assignment));

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

        Segment::track([
            "event" => "Assignment Created",
            "userId" => $registration->teacher_id,
            "properties" => [
                "assignmentId" => $assignment->id,
                "assignmentTitle" => $assignment->title,
            ]
        ]);

        $this->title = '';
        $this->content = '';
        $this->selectedDate = '';
        $this->dueDate = '';
        $this->file = '';
        $this->attachments = [];

        session()->flash('success', 'Assignment created!');

        $this->dispatch('refreshAssignmentsIndex');

    }

    public function storeGroupAssignments()
    {
        $dueDate = date_create_from_format('Y-m-d H:i:s', $this->selectedDate . ' ' . '22:00:00');

        $teacher = Teacher::where('user_id', Auth::id())->first();

        $group = Group::find($this->selectedGroupId);

        foreach($group->registrations as $registration)
        {

//            $registration = Registration::find($this->selectedRegistrationId);

            $data = [
                'teacher_id' => $teacher->id,
                'user_id' => $registration->user_id,
                'registration_id' => $registration->id,
                'title' => $this->title,
                'content' => $this->content,
                'due_date' => $dueDate
            ];

            $assignment = Assignment::create($data);

            $registration->user->notify(new AssignmentCreated($assignment));

            if ($this->attachments)
            {

                foreach ($this->attachments as $attachment)
                {

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

            Segment::track([
                "event" => "Assignment Created",
                "userId" => $teacher->id,
                "properties" => [
                    "assignmentId" => $assignment->id,
                    "assignmentTitle" => $assignment->title,
                ]
            ]);

        }

        $this->title = '';
        $this->content = '';
        $this->selectedDate = '';
        $this->dueDate = '';
        $this->file = '';
        $this->attachments = [];

        session()->flash('success', 'Assignment created!');

        $this->dispatch('refreshAssignmentsIndex');
    }

    public function render()
    {
        return view('livewire.assignments.create');
    }
}
