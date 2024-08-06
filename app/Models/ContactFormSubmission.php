<?php

namespace App\Models;

use Segment\Segment;
use App\Mail\ContactFormMail;
use App\Mail\ContactFormResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactFormSubmission extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','message'];

    public static function sendContactFormSubmissionResponse($data, $request)
    {
        Mail::to($request->email)->bcc('2144262@bcc.hubspot.com')->send(new ContactFormResponse($data));
    }

    public static function sendAdminContactFormSubmissionNotification($data)
    {
        Mail::to('lucas@weaverschool.com')->send(new ContactFormMail($data));
    }

    public static function identify($request, $uniqueId)
    {    
        Segment::identify([
            "anonymousId" => $uniqueId,
            "traits" => [
                "email" => $request->email,
            ],
        ]);

        Segment::track([        
            "userId" => $uniqueId,
            "event"       => "Contact Form Submitted",
            "properties"  => [
                "email" => $request->email,                
                "name" => $request->firstName,        
            ],
        ]);
    }
}
