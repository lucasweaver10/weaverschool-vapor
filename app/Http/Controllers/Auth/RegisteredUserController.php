<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\CommunicationPreference;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use App\Models\CompanyEmployeeInvitation;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        if ($request->get('course_id') !== null) {
            session(['course_id' => $request->get('course_id')]);
        }
        if ($request->get('plan_id') !== null) {
            session(['plan_id' => $request->get('plan_id')]);
        }
        session(['convertingPageUrl' => url()->previous()]);
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {       
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Check if referral_code is present and not empty
        if ($request->has('referral_code') && !empty($request->referral_code)) {
            // Fetch the referrer based on the provided referral code
            $referrer = User::where('referral_code', $request->referral_code)->first();

            if ($referrer) {
                // Associate the referrer with the new user
                $user->referred_by = $referrer->id;
                $user->save();

                // Increment the referral count for the referrer
                $referrer->increment('referral_count');
            } else {
                // Log a warning if the referral code is invalid
                Log::warning("Invalid referral code used: " . $request->referral_code);
            }
        }

        $user->generateReferralCode();

        CommunicationPreference::create([
            'user_id' => $user->id,
            'email' => $user->email,
        ]);

        event(new Registered($user));
        $locale = session('locale', 'en');
        Auth::login($user);
        
        return redirect()->intended('/' . $locale . '/dashboard');
    }

    public function createTeacher()
    {
        return view('auth.teachers.register');
    }

    public function storeTeacher(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->roles()->attach(61);
        Auth::login($user);
        return redirect('/myteacher');
    }

    public function acceptCompanyEmployeeInvitation($inviteToken)
    {
        return view('auth.accept-invitation', ['inviteToken' => $inviteToken]);
    }

    public function storeInvitedCompanyEmployee(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $inviteToken = $request->input('inviteToken');
        if (!$invite = CompanyEmployeeInvitation::where('token', $inviteToken)->first()) {
            return back()->with('status', 'Your invitation is not valid. Please contact us at contact@weaverschool.com for support.');
        }
        $invite = CompanyEmployeeInvitation::where('token', $inviteToken)->first();
        $user = User::create([
            'email' => $request->email,
            'company_id' => $invite->company_id,
            'password' => Hash::make($request->password),
        ]);
        $invite->update([
            'status' => 'Accepted',
        ]);
        $mollie = new \Mollie\Api\MollieApiClient();
        $mollie->setApiKey(env('MOLLIE_KEY'));
        $customer = $mollie->customers->create([
            "email" => $user->email,
        ]);
//        Invoice::createBasicContact($user);
        event(new Registered($user));
        $locale = session('locale', 'en');
        Auth::login($user);
        return redirect('/' . $locale . '/dashboard');
    }
}
