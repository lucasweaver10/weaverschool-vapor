<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Laravel\Cashier\Billable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Authenticatable;



class UserController extends Controller
{
    public function index()  // displays all user with orders
    {
        $id = auth()->guard('user')->user()->id;
        return view()->with(User::find($id)->with(['orders'])->get());
    }

    public function login(Request $request, User $user)  // authenticates the user
    {
        $status = 401;
        $response = ['error' => 'Unauthorised'];

        if (Auth::attempt($request->only(['email', 'password']))) {

            return view('user.dashboard');
        }

        return redirect()->back();
    }

    public function register(Request $request)  //create user account
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'company_name' => 'nullable|max:50',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors();
        }

        $data = $request->only(['first_name', 'last_name', 'company_name', 'email', 'password']);
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);
        $user->is_admin = 0;

        return response()->json([
            'user' => $user,
            'token' => $user->createToken('bagisto')->accessToken,
        ]);
    }

    public function show(User $user)  // fetch details of users
    {
        return response()->json($user);
    }

    public function showOrders(User $user)  // fetch the orders of the users
    {
        return response()->json($user->orders()->with(['product'])->get());
    }

    public function updatePersonalInformation(Request $request)
    {
        $user = auth()->user();

        $user->update([
            'first_name' => $request->first_name ?? '',
            'last_name' => $request->last_name ?? '',
        ]);

        return back()->with('success', 'Your information has been updated!');
    }

    public function changePassword()
    {
        $user = auth()->user(); // Get the currently authenticated user

        // Generate a password reset token
        $token = Str::random(60);

        // Store the token in the password resets table
        DB::table('password_resets')->updateOrInsert(
            ['email' => $user->email],
            ['token' => $token, 'created_at' => now()]
        );

        return redirect()->route('password.reset', ['token' => $token]);

    }
    
    public function updateEmailAddress(Request $request)
    {
        $user = auth()->user();        
        $user->update(['email' => $request->email]);

        return back()->with('success', 'Your email has been updated!');
    }
}
