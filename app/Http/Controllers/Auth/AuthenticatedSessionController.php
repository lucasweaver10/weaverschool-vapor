<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Event;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();
        $userId = Auth::user()->id;
        $uniqueID = $request->session()->get('uniqueID');
        Event::where('anonymous_id', $uniqueID)->update(['user_id' => $userId]);
        $request->session()->regenerate();
        $locale = session('locale', 'en');
        // Imported from old LoginController //
        $role = User::find($userId)->roles()->first();
        if ($role != null)
        {
            // Check user role
            switch ($role->name) {
                case 'Owner':
                        return redirect('/admin') ;
                    break;
//                case 'Employee':
//                        return redirect ('/admin');
//                    break;
                case 'Teacher':
                        return redirect ('/myteacher');
                    break;
                default:
                        return redirect ('/');
                    break;
            }
        }
        else {
            return redirect()->intended('/' . session('locale', 'en') . '/dashboard');
        }
        // End import //
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $locale = session('locale', 'en');

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/' . $locale );
    }
}
