<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommunicationPreference;

class CommunicationPreferencesController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $preferences = $user->communicationPreferences;
        return view('dashboard.account.communications.index', compact('user', 'preferences'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $validatedData = $request->validate([
            'general_updates' => 'boolean',
            'promotional_offers' => 'boolean',
            'newsletter' => 'boolean',
            'spaced_repetition' => 'boolean',
            'processing_notifications' => 'boolean',
        ]);

        $preference = CommunicationPreference::updateOrCreate(
            ['user_id' => $user->id],
            array_merge(['email' => $user->email], $validatedData)
        );
        
        return redirect()->route('communications.index', ['locale' => session('locale', 'en')])->with('success', 'Preferences updated successfully!');
    }

}
