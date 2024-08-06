<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiKeyController extends Controller
{
    public function create()
    {
        $user = auth()->user();
        return view('dashboard.account.api-keys.create', compact('user'));
    }

    public function show($locale, $token)
    {
        $user = auth()->user();                        

        return view('dashboard.account.api-keys.show', ['user' => $user, 'token' => $token]);
    }

    public function generate(Request $request) {
        $token = $request->user()->createToken('api-key');
        if($token == null) {
            return back()->with('error', 'There was a problem generating your token. Please contact customer support for assistance.');
        } else {            
            $tokenParts = explode('|', $token->plainTextToken);
            $token = end($tokenParts);
        }
        return redirect()->route('api-keys.show', ['locale' => session('locale', 'en'), 'token' => $token]);
    }
}
