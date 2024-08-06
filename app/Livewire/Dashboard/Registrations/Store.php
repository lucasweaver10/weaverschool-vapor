<?php

namespace App\Livewire\Dashboard\Registrations;

use Livewire\Component;
use Segment\Segment;
use App\Jobs\SendToSegment;
use App\Models\Registration;
use App\Jobs\SendPaymentReminder;
use Illuminate\Support\Facades\Auth;

class Store extends Component
{
    public $user;
    public $course;
    public $plan;

    public function register()
    {

        $registered = Registration::where('course_id', $this->course->id)
                           ->where('user_id', $this->user->id)
                           ->count();

        if($registered > 0) {
            return redirect()->back()->with('error', 'You have already registered for this course.');
        }

        $data = [
        'type' => 'Private Lessons',
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

        session()->flash('success', 'Registration successful!');

        $this->sendMails($registration, $this->user);

        Segment::track([
            "userId" => $this->user->id,
            "event" => "Private Lessons Registration",
            "properties" => [
                "course" => $this->course->name,
                "registrationId" => $registration->id,
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

    public function render()
    {
        return view('livewire.dashboard.registrations.store');
    }
}
