<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OnlineGroupCourseRegistrationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $registration;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($registration, $user)
    {
        $this->registration = $registration;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.online-group-course-registration-confirmation')
            ->from('contact@weaverschool.com', 'The Weaver School')
            ->subject('Registration Successful')
            ->with(['registration' => $this->registration, 'user' => $this->user ]);
    }
}
