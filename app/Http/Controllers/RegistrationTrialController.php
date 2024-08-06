<?php

namespace App\Http\Controllers;

use App\Models\RegistrationTrial;
use Illuminate\Http\Request;

class RegistrationTrialController extends Controller
{
    public function cancel(Request $request)
    {
        $trial = RegistrationTrial::findOrFail($request->trialId);
        $trial->status = 'Cancelled';
        $trial->cancelled_at = now();
        $trial->save();

        return redirect()->route('dashboard.payments', ['locale' => session('locale')])
            ->with('success', 'Trial cancelled successfully.');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RegistrationTrial  $registrationTrial
     * @return \Illuminate\Http\Response
     */
    public function show(RegistrationTrial $registrationTrial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegistrationTrial  $registrationTrial
     * @return \Illuminate\Http\Response
     */
    public function edit(RegistrationTrial $registrationTrial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RegistrationTrial  $registrationTrial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegistrationTrial $registrationTrial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegistrationTrial  $registrationTrial
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegistrationTrial $registrationTrial)
    {
        //
    }

    public function thankYou()
    {
        return view('trials.thank-you');
    }
}
