<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $payment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $payment)
    {
        $this->user = $user;
        $this->payment = $payment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.payment-received')
            ->from('lucas@weaverschool.com', 'The Weaver School')
            ->subject('Thank you for your payment')
            ->with(['user' => $this->user, 'payment' => $this->payment])
            ->withSwiftMessage(function ($swiftMessage) {
                $subject = 'Thank you for your payment';
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
