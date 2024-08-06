<?php

namespace App\Mail\Welcome\Thai;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class First extends Mailable
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
        $subject = "Welcome to the Weaver School – Your guide to learning Thai";
        $uniqueArgs = [
            'subject' => $subject,
        ];

        $smtpApiHeader = json_encode([
            'unique_args' => $uniqueArgs,
        ]);

        return $this->markdown('mail.welcome.thai.first')
            ->from('lucas@weaverschool.com', 'Lucas Weaver')
            ->subject('Welcome to the Weaver School – Your guide to learning Thai')
            ->with(['user' => $this->user])
            ->withSwiftMessage(function ($swiftMessage) use ($subject, $uniqueArgs, $smtpApiHeader) {
                $swiftMessage->getHeaders()->addTextHeader('X-SMTPAPI', $smtpApiHeader);
        });
    }
}
