<?php

namespace App\Mail\Welcome\Ielts;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationReminder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "Special bonus to register for your IELTS course today";
        $uniqueArgs = [
            'subject' => $subject,
        ];

        $smtpApiHeader = json_encode([
            'unique_args' => $uniqueArgs,
        ]);

        return $this->markdown('mail.welcome.ielts.registration-reminder')
            ->from('lucas@weaverschool.com', 'Lucas Weaver')
            ->subject($subject)
            ->with(['user' => $this->user])
            ->withSwiftMessage(function ($swiftMessage) use ($subject, $uniqueArgs, $smtpApiHeader) {
                $swiftMessage->getHeaders()->addTextHeader('X-SMTPAPI', $smtpApiHeader);
        });
    }
}
