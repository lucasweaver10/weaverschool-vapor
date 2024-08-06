<?php

namespace App\Livewire\Registrations;

use App\Jobs\SendPaymentReminder;
use App\Jobs\SendToSegment;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\PrivateLesson;
use Illuminate\Support\Facades\Auth;
use App\Models\Registration;
use App\Models\Teacher;
use Segment\Segment;

class PrivateLessons extends Component
{
    public $courses;
    public $privateLessons;
    public $subcategories;
    public $teachers;
    public $teacher;
    public $selectedTeacherId;
    public $selectedCourseType = 'Private Lessons';
    public $step = 1;
    public $progress = 25;
    public $totalHours = '12';
    public $weeklyLessons = '1';
    public $hourlyRate;
    public $planTimes;
    public $planMonthlyPrice;
    public $selectedSubcategory;
    public $selectedSubcategoryId;
    public $selectedPrivateLessonsId = '';
    public $selectedPrivateLessons;
    public $totalPrice;

    protected $listeners = ['courseTypeSelected' => 'processCourseTypeSelection'];

    public function processSubcategorySelection()
    {
        $this->selectedSubcategory = Subcategory::where('id', $this->selectedSubcategoryId)->first();

        $this->selectedTeacherId = strval($this->teachers
            ->where('subcategory_id', $this->selectedSubcategoryId)->random(1)->first()->id);

        $this->step = 2;

        $this->progress = ($this->step / 5) * 100;
    }

    public function processPrivateLessonSelection()
    {
        $this->selectedPrivateLessons = PrivateLesson::where('id', $this->selectedPrivateLessonsId)->first();

//        $this->selectedTeacherId = Teacher::where('active', 1)->first()->id;

        $this->step = 3;

        $this->progress = ($this->step / 5) * 100;
    }

    public function processTeacher()
    {
        $this->teacher = Teacher::where('id', $this->selectedTeacherId)->first();
        $this->hourlyRate = $this->teacher->gross_hourly_rate;
        $this->step = 4;
        $this->progress = ($this->step / 5) * 100;
    }

    public function processPrivateLessons()
    {
        $this->totalPrice = $this->hourlyRate * $this->totalHours;
        $this->planTimes = round($this->totalHours / ($this->weeklyLessons * 4));
        $this->planMonthlyPrice = $this->totalPrice / $this->planTimes;
        $this->step = 5;
        $this->progress = ($this->step / 5) * 100;
    }

    public function registerPrivateLessons()
    {
        $this->step = 'completed';

        $user = Auth::user();

        $data = [
            'type' => 'Private Lessons',
            'private_lessons_id' => $this->selectedPrivateLessons->id,
            'private_lessons_name' => $this->selectedPrivateLessons->name,
            'subcategory_id' => $this->selectedPrivateLessons->subcategory_id,
            'teacher_id' => $this->teacher->id,
            'status' => 'Pending',
            'experience' => $this->selectedPrivateLessons->experience,
            'user_id' => $user->id,
            'user_name' => $user->first_name . ' ' . $user->last_name,
            'total_hours' => $this->totalHours,
            'hourly_rate' => $this->hourlyRate,
            'weekly_lessons' => $this->weeklyLessons,
            'outstanding_balance' => $this->totalPrice,
            'plan_name' => $this->selectedPrivateLessons->name,
            'plan_id' => '2181',
            'plan_times' => $this->planTimes,
            'plan_interval' => '4 weeks',
            'plan_monthly_price' => $this->planMonthlyPrice,
            'total_paid' => 0.00,
        ];

        $registration = Registration::create($data);

        session()->flash('success', 'Registration successful!');

        $this->sendMails($registration, $user);

        Segment::track([
            "userId" => $user->id,
            "event" => "Private Lessons Registration",
            "properties" => [
                "course" => "$this->selectedPrivateLessons->name",
                "registrationId" => "$registration->id"
            ],
        ]);

        return redirect()->to('/' . session('locale', 'en') . '/dashboard/courses');
    }

    public function sendMails($registration, $user)
    {
        Registration::sendMails($registration, $user);

        SendPaymentReminder::dispatch($user, $registration)
            ->delay(now()->addSeconds(86400));
    }

    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.registrations.private-lessons');
    }
}
