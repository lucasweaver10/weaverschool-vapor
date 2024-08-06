<?php

namespace App\Livewire\Registrations;

use App\Models\Subcategory;
use Livewire\Component;
use App\Models\Course;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth;
use App\Models\Registration;
use App\Models\Teacher;
use Segment\Segment;

class GroupCourse extends Component
{
    public $courses;
    public $plans = [];
    public $selectedCourseType = 'Group Course';
    public $step = 1;
    public $selectedCourseId = '1401';
    public $selectedCourse;
    public $course;
    public $selectedSubcategory;
    public $selectedSubcategoryId;
    public $subcategories;
    public $progress = 25;

    protected $listeners = ['courseTypeSelected' => 'processCourseTypeSelection'];

    public function processSubcategorySelection()
    {
        $this->selectedSubcategory = Subcategory::where('id', $this->selectedSubcategoryId)->first();

//        $this->selectedTeacherId = strval($this->teachers
//            ->where('subcategory_id', $this->selectedSubcategoryId)->random(1)->first()->id);

        $this->step = 2;

        $this->progress = ($this->step / 5) * 100;
    }

    public function processCourseSelection()
    {
        $this->course = Course::where('id', $this->selectedCourseId)->first();

        $this->step = 3;

        $this->progress = ($this->step / 5) * 100;
    }

    public function registerCourse()
    {
        $user = Auth::user();

        $data = [
            'type' => 'Group Course',
            'course_id' => $this->course->id,
            'course_name' => $this->course->name,
            'experience' => $this->course->experience,
            'subcategory_id' => $this->selectedSubcategoryId,
            'status' => 'Pending',
            'user_id' => $user->id,
            'user_name' => $user->first_name . ' ' . $user->last_name,
            'total_paid' => 0.00,
            'total_hours' => $this->course->total_hours,
            'outstanding_balance' => $this->course->price
        ];

        $registration = Registration::create($data);

        Registration::sendGroupCourseMails($user, $registration);

        Segment::track([
            "userId" => $user->id,
            "event" => "In-Person Course Registration",
            "properties" => [
                "course_id" => "$this->course->id",
//                "plan_id" => "$this->plan->id",
                "registration_id" => "$registration->id"
            ],
        ]);

        return redirect()->to('/' . session('locale', 'en') . '/dashboard');

    }

    public function render()
    {
        return view('livewire.registrations.group-course');
    }
}
