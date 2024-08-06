<?php

namespace App\Livewire\Dashboard\Registrations;

use Segment\Segment;
use Livewire\Component;
use App\Jobs\SendToSegment;
use App\Models\Registration;
use App\Jobs\SendPaymentReminder;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Plan;

class Create extends Component
{
    public $user;
    public $courseImage;
    public $planDescription;
    public $subcategoryId;
    public $courseId;
    public $course = null;
    public $plan = null;
    public $planId;
    public $subcategory = null;
    public $subcategories;
    public $courses = [];
    public $plans = [];

    protected $casts = [
        'courseid' => 'integer',
        'planId' => 'integer',
    ];

    public function register()
    {
        $data = [
            'course_id' => $this->course->id,
            'course_name' => $this->course->name,
            'subcategory_id' => $this->course->subcategory_id,
            'status' => 'Pending',
            'experience' => $this->plan->experience,
            'type' => $this->course->type,
            'user_id' => $this->user->id,
            'user_name' => $this->user->first_name . ' ' . $this->user->last_name,
            'total_hours' => $this->course->total_hours,
            'weekly_lessons' => $this->plan->weekly_lessons,
            'outstanding_balance' => $this->plan->total_price,
            'plan_name' => $this->plan->name,
            'plan_id' => $this->plan->id,
            'plan_times' => $this->plan->times,
            'plan_interval' => $this->plan->interval,
            'plan_monthly_price' => $this->plan->monthly_price,
            'total_paid' => 0.00,
    ];

        $registration = Registration::create($data);

        Segment::track([
            "userId" => $this->user->id,
            "event" => "New course registration",
            "properties" => [
                "course" => $this->course->name,
                "registrationId" => $registration->id,
                "location" => "Create",
            ],
        ]);

        $this->sendMails($registration, $this->user);

        session()->flash('success', 'Registration successful!');

        return redirect()->to($this->plan->stripe_payment_link . '?prefilled_email=' . $this->user->email . '&client_reference_id=' . $registration->id . '&locale=' . session('locale'));
    }

    public function updateCourseId($courseId)
    {
        $this->courseId = $courseId;
    }

    public function updateCourses()
    {
        if ($this->subcategoryId == 0) {
            // Handle the case when the default option is selected
            $this->courses = [];
            $this->plans = [];
            $this->cousre = null;
            $this->plan = null;
            $this->subcategory = null;
        } else {
        $this->courses = Course::where('subcategory_id', $this->subcategoryId)->where('available', 1)->get();
        $this->courseId = $this->courses->first()->id;
        $this->courseImage = $this->courses->first()->image;
        $this->course = $this->courses->first();
        $this->subcategory = $this->course->subcategory;
        $this->updatePlans();

        }
    }

    public function updateCourse()
    {
        $this->course = Course::find($this->courseId);
        $this->updatePlans();
    }

    public function updatePlans()
    {
        $this->plans = $this->course->plans;
        $this->planId = $this->plans->first()->id;
        $this->plan = $this->plans->first();
    }

    public function updatePlan()
    {
        $this->plan = Plan::find($this->planId);
    }

    public function goToRegistration()
    {
        session()->put('course_id', $this->courseId);
        session()->put('plan_id', $this->planId);

        Segment::track([
            "userId" => $this->user->id,
            "event" => "Course registration started",
            "properties" => [
                "course_id" => $this->courseId,
                "plan_id" => $this->planId,
            ],
        ]);

        return redirect()->to('/' . session('locale', 'en') . '/dashboard/registrations/confirm?' . 'course_id=' . $this->courseId . '&plan_id=' . $this->planId);
    }

    public function sendMails($registration, $user)
    {
        Registration::sendMails($registration, $user);
    }

    public function render()
    {
        return view('livewire.dashboard.registrations.create');
    }
}
