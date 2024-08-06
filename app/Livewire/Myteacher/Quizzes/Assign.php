<?php

namespace App\Livewire\Myteacher\Quizzes;

use App\Models\Group;
use App\Models\Quiz;
use App\Models\QuizAssignment;
use App\Models\Registration;
use App\Models\User;
use App\Notifications\QuizAssigned;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Assign extends Component
{
    public $selectedQuiz;
    public $selectedStudent;
    public $selectedRegistrationId;
    public $selectedGroupId;
    public $selectedDate;
    public $teacherId;
    public $teacher;

    public function assignQuiz()
    {
        $dueDate = date_create_from_format('Y-m-d H:i:s', $this->selectedDate . ' ' . '22:00:00');

        $registration = Registration::find($this->selectedRegistrationId);

        $data = [
            'quiz_id' => $this->selectedQuiz,
            'registration_id' => $registration->id,
            'user_id' => $registration->user_id,
            'teacher_id' => $this->teacherId,
            'due_at' => $dueDate,
        ];

        $quizAssignment = QuizAssignment::create($data);

        $registration->user->notify(new QuizAssigned($quizAssignment));

        session()->flash('success', 'Quiz assigned');

        $this->selectedQuiz = '';
        $this->selectedStudent = '';
        $this->selectedDate = '';
    }

    public function assignGroupQuiz()
    {
        $dueDate = date_create_from_format('Y-m-d H:i:s', $this->selectedDate . ' ' . '22:00:00');

//        $registration = Registration::find($this->selectedRegistrationId);

        $group = Group::find($this->selectedGroupId);

        foreach($group->registrations as $registration)
        {

            $data = [
                'quiz_id' => $this->selectedQuiz,
                'registration_id' => $registration->id,
                'user_id' => $registration->user_id,
                'teacher_id' => $this->teacher->id,
                'due_at' => $dueDate,
            ];

            $quizAssignment = QuizAssignment::create($data);

            $registration->user->notify(new QuizAssigned($quizAssignment));
        }

        session()->flash('success', 'Quiz assigned');

        $this->selectedQuiz = '';
        $this->selectedStudent = '';
        $this->selectedDate = '';
    }

    public function render()
    {
        $userId = Auth::id();

        $user = User::find($userId);

        $quizzes = Quiz::where('user_id', $userId)->get();

        $this->teacherId = $user->teacher_id;

        $registrations = Registration::where('teacher_id', $user->teacher_id)->where('active', '1')->get();

        return view('livewire.myteacher.quizzes.assign', ['quizzes' => $quizzes, 'registrations' => $registrations]);
    }
}
