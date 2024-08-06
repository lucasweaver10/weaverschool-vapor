<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Assignment;
use App\Models\Teacher;
use App\Models\PrivateLesson;
use App\Models\Course;

class Dashboard extends Component
{
    public $registrations;
    public $subscriptions;
    public $user;
    public $levelTest;
    public $questions;
    public $levelTestId;
    public $tab = 'dashboard';
    public $content;
    public $openAssignments;
    public $gradedAssignments;
    public $subcategories;

    protected $listeners = ['refreshDashboard' => '$refresh', 'contentSelected', 'tabSelected'];

    protected $queryString = [
        'tab',
        'content',
    ];

    public function tabSelected($newTab)
    {
        $this->tab = $newTab;
//        $this->content = 'overview';
    }

    public function contentSelected($choice)
    {
        $this->content = $choice;
    }

    public function render()
    {
        $privateLessons = PrivateLesson::where('available', true)->get();
        $teachers = Teacher::where('active', 1)->get();
        $courses = Course::where('available', true)->with('plans')->get();

        return view('livewire.dashboard.dashboard', ['teachers' => $teachers, 'subcategories' => $this->subcategories, 'privateLessons' => $privateLessons, 'courses' => $courses]);
    }
}
