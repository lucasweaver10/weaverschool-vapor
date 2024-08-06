<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CompanyEmployeeInvitation extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $invitation;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $invitation)
    {
        $this->user = $user;
        $this->invitation = $invitation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.company-employee-invitation')
            ->from('contact@weaverschool.com', 'The Weaver School')
            ->subject('Invitation to the Weaver School')
            ->with(['user' => $this->user, 'invitation' => $this->invitation]);
    }
}
