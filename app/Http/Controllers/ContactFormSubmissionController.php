<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactFormSubmission;

class ContactFormSubmissionController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $data = array(
            'name' => $request->name,
            'email' => $request->email,        
            'message' => $request->message,
        );

        ContactFormSubmission::create($request->all());

        ContactFormSubmission::sendContactFormSubmissionResponse($data, $request);

        ContactFormSubmission::sendAdminContactFormSubmissionNotification($data);

        $uniqueId = $request->session()->get('uniqueID');

        ContactFormSubmission::identify($request, $uniqueId);

        return back()->with('success', 'Thanks for contacting us! We will get back to you soon.');
    }
}
