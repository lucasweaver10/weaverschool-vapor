<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\User;
use Segment\Segment;
use App\Models\Course;
use App\Models\Subcategory;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function create()
    {
        $user = auth()->user();
//        $courses = Course::where('available', true)->get();
        $subcategories = Subcategory::all()->where('id', '!==', 2);

        return view('dashboard.registrations.create', [
            'user' => $user,
//            'courses' => $courses,
            'subcategories' => $subcategories,
        ]);
    }

    public function confirm(Request $request)
    {
        // Check if the user is authenticated
        if (!auth()->check()) {            
            session(['url.intended' => url()->previous()]);
            return redirect()->route('login')->with('error', 'Please login or create an account to register for a course.');
        }
        
        $user = User::find(auth()->user()->id);

        if($request->course_id) {
            $course = Course::find($request->course_id);
            $plan = Plan::find($request->plan_id);
            }
        elseif(session('course_id')) {
            $course = Course::find(session('course_id'));
            $plan = Plan::find(session('plan_id'));
        }

        return view('registrations.confirm', [
            'user' => $user,
            'course' => $course,
            'plan' => $plan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function courseRegistration()
    {
        $courses = Course::all();

        $plans = Plan::all();

        return view('dashboard.course-registration', [
            'courses' => $courses,
            'plans' => $plans,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $user = Auth::user();
        $course = Course::find($request->course_id);
        $plan = Plan::find($request->plan_id);

        $data = [
            'course_id' => $course->id,
            'course_name' => $course->name,
            'status' => 'Pending',
            'plan_id' => $plan->id,
            'plan_name' => $plan->name,
            'user_id' => $user->id,
            'user_name' => $user->first_name . $user->last_name,
            'total_paid' => 0.00,
            'plan_total_price' => $plan->total_price,
            'plan_monthly_price' => $plan->monthly_price,
            'plan_type' => $plan->type,
            'plan_interval' => $plan->interval,
            'plan_times' => $plan->times,
            'outstanding_balance' => $plan->total_price
        ];

        $registration = Registration::create($data);

        Registration::sendMails($registration, $course, $user);

        Segment::track([
            "userId" => $user->id,
            "event" => "In-Person Course Registration",
            "properties" => [
                "course_id" => "$request->course_id",
                "plan_id" => "$request->plan_id",
                "registration_id" => "$registration->id"
            ],
        ]);

        return redirect('dashboard')->with('registration-success', 'Thank you. Your registration was successful.');
    }

    public function storeOnline(Request $request)
    {
        $userId = Auth::user()->id;
        $total_price = Course::find($request->course_id)->price;
        $course_name = Course::find($request->course_id)->name;

        $data = [
            'course_id' => $request->course_id,
            'course_name' => $course_name,
            'plan_total_price' => $total_price,
            'outstanding_balance' => $total_price,
            'total_paid' => 0.00,
            'user_id' => $userId
        ];

        $registration = Registration::create($data);

        Segment::track([
            "userId" => $userId,
            "event" => "Online Course Registration",
            "properties" => [
                "course" => "$request->course",
                "registrationId" => "$registration->id"
            ],
        ]);

        return redirect('dashboard')->with('registration-success', 'Thank you. Your registration was successful.');
    }

    public function addToGroup(Request $request)
    {
        $registration = Registration::where('id', request('registration_id'))
              ->update([
                  'group_id' => request('group_id')
        ]);

        $user = User::find(request('user_id'));

        $groups = request('group_id');

        $user->groups()->sync($groups, false);

        // $user->groups()->attach(request('group_id'));

        return redirect('/admin/registrations');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function show(Registration $registration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function edit(Registration $registration)
    {
        return view('registrations.edit', compact ('registration'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, Registration $registration)
    {
        $registration = Registration::find($id);

        $registration->hours_completed = ( $registration->hours_completed + $request->lesson_hours );

        $registration->save();

        return redirect('/myteacher');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Registration $registration)
    {
        $registration = Registration::where('id', $id);

        $registration->delete();

        return redirect('/' . session('locale', 'en') . '/dashboard');
    }

    // public function calculateHours($lesson_hours)
    // {

    // }
}
