<?php

namespace App\Mail\Welcome;

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
        $subject = "Welcome to the Weaver School – Your simplified path to language learning";
        $uniqueArgs = [
            'subject' => $subject,
        ];

        $smtpApiHeader = json_encode([
            'unique_args' => $uniqueArgs,
        ]);

        return $this->markdown('mail.welcome.first')
            ->from('lucas@weaverschool.com', 'Lucas Weaver')
            ->subject('Welcome to the Weaver School – Your simplified path to language learning')
            ->with(['user' => $this->user])
            ->withSwiftMessage(function ($swiftMessage) {
                $subject = 'Welcome to the Weaver School – Your simplified path to language learning';
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
