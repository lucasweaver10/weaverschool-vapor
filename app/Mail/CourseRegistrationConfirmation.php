<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CourseRegistrationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $registration;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($registration)
    {
        $this->registration = $registration;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.course-registration-confirmation')
            ->from('lucas@weaverschool.com', 'The Weaver School')
            ->subject('Registration Successful')
            ->with(['registration' => $this->registration])
            ->withSwiftMessage(function ($swiftMessage) {
                $subject = 'Registration Successful';
                $uniqueArgs = [
                    'subject' => $subject,
                ];
                $smtpApiHeader = json_encode([
                    'unique_args' => $uniqueArgs,
                ]);
                $swiftMessage->getHeaders()->addTextHeader('X-SMTPAPI', $smtpApiHeader);
            });
    }
}
