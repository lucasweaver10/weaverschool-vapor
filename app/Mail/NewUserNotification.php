<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewUserNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

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
        $subject = "New user signup";
        $uniqueArgs = [
            'subject' => $subject,
        ];

        $smtpApiHeader = json_encode([
            'unique_args' => $uniqueArgs,
        ]);

        return $this->markdown('mail.new-user-notification')
            ->from('admin@weaverschool.com', 'The Weaver School')
            ->subject($subject)
            ->with(['user' => $this->user])
            ->withSwiftMessage(function ($swiftMessage) use ($subject, $uniqueArgs, $smtpApiHeader)
            {
                $swiftMessage->getHeaders()->addTextHeader('X-SMTPAPI', $smtpApiHeader);
            });
    }
}
