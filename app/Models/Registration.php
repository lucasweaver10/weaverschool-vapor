<?php

namespace App\Models;

use App\Mail\OnlineGroupCourseRegistrationConfirmation;
use Illuminate\Database\Eloquent\Model;
use App\Events\RegistrationCreated;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\CourseRegistrationNotification;
use App\Mail\CourseRegistrationConfirmation;
use App\Mail\OnlineCourseRegistrationConfirmation;
use App\Models\User;

class Registration extends Model
{
    protected $guarded = [];

    protected $dispatchesEvents = [
        'created' => RegistrationCreated::class
    ];

    public static function hasAlreadyRegistered($userId, $courseId) {
        return static::where('course_id', $courseId)
            ->where('user_id', $userId)
            ->exists();
    }

    public static function sendMails($registration, $user)
    {
        Mail::to('lucas@weaverschool.com')->send(new CourseRegistrationNotification($registration));

        Mail::to($user->email)->bcc('2144262@bcc.hubspot.com')->send(new CourseRegistrationConfirmation($registration, $user));
    }

    public static function register()
    {
        $data = [
            'course_id' => $course->id,
            'course_name' => $course->name,
            'subcategory_id' => $course->subcategory_id,
            'status' => 'Active',
            'experience' => $plan->experience,
            'type' => $course->type,
            'user_id' => $user->id,
            'user_name' => $user->first_name . ' ' . $user->last_name,
            'total_hours' => $course->total_hours,
            'weekly_lessons' => $plan->weekly_lessons,
            'outstanding_balance' => $plan->total_price,
            'plan_name' => $plan->name,
            'plan_id' => $plan->id,
            'plan_times' => $plan->times,
            'plan_interval' => $plan->interval,
            'plan_monthly_price' => $plan->monthly_price,
            'total_paid' => 0.00,
        ];
    }

    public static function registerForBonusCourse($userId, $bonusCourseId)
    {
        $user = User::find($userId);
        $course = Course::find($bonusCourseId);
        $plan = $course->plans->first();        

        $registered = Registration::where('course_id', $course->id)
            ->where('user_id', $user->id)
            ->count();

        if($registered > 0) {
            return 'User has already registered for this course.';
        }
        else {
            $data = [
                'course_id' => $course->id,
                'course_name' => $course->name,
                'subcategory_id' => $course->subcategory_id,
                'status' => 'Active',
                'experience' => $plan->experience,
                'type' => $course->type,
                'user_id' => $user->id,
                'user_name' => $user->first_name . ' ' . $user->last_name,
                'total_hours' => $course->total_hours,
                'weekly_lessons' => $plan->weekly_lessons,
                'outstanding_balance' => 0.00,
                'plan_name' => $plan->name,
                'plan_id' => $plan->id,
                'plan_times' => $plan->times,
                'plan_interval' => $plan->interval,
                'plan_monthly_price' => $plan->monthly_price,
                'total_paid' => 0.00,
            ];
        }

        $registration = Registration::create($data);

        return 'success';
    }


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function group()
    {
        return $this->belongsTo('App\Models\Group');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher');
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function quizAssignments()
    {
        return $this->hasMany(QuizAssignment::class, 'registration_id');
    }

    public function bonusPoints()
    {
        return $this->hasOne(BonusPoints::class);
    }

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function courseProgress()
    {
        return $this->hasOne(CourseProgress::class);
    }

    public function lessonProgresses()
    {
        return $this->hasMany(LessonProgress::class);
    }

    public function trial()
    {
        return $this->hasOne(RegistrationTrial::class);
    }

}
