<?php

namespace App\Livewire\Myteacher\Assignments;

use Livewire\Component;
use App\Models\Registration;

class Index extends Component
{
//    public $registrations;
//    public $assignments;
    public $user;
    public $teacher;
    public $status = 'open';

    protected $queryString = [
        'status',
    ];

    public function setStatus($newStatus)
    {
        $this->status = $newStatus;
    }

    public function render()
    {
//        $registrations = Registration::with('subscriptions')->where('teacher_id', $this->user->teacher_id)->with('teacher')->with('assignments')->get();

        return view('livewire.myteacher.assignments.index');
    }
}
