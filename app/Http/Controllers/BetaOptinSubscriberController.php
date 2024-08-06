<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\LearningPaths\BetaOffer;
use App\Mail\AdminNotification;
use App\Models\BetaOptinSubscriber;
use Illuminate\Support\Facades\Mail;

class BetaOptinSubscriberController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'first_name' => 'nullable|string',
            'product_id' => 'nullable|integer',
        ]);        

        $subscriber = BetaOptinSubscriber::create($request->all());

        // send an email to the admin         
        $emailTo = 'lucas@weaverschool.com';
        $subject = "New Beta Opt-in Subscriber for {$request->product_id}";
        $message = "A new user has opted into the beta program for {$request->product_id}: " . $subscriber->email;
        Mail::send(new AdminNotification($emailTo, $subject, $message));        
        Mail::to($request->email)->send(new BetaOffer());      
        
        // return the user back to the same page with a success message
        return back()->with('success', "Success! Check your email now for next steps.");
    }
}
