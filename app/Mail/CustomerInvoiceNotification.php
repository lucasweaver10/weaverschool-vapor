<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomerInvoiceNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $invoicingDetails;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $invoicingDetails)
    {
        $this->user = $user;
        $this->invoicingDetails = $invoicingDetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.invoices.customer-invoice-notification')
            ->from('contact@weaverschool.com', 'The Weaver School')
            ->subject('Your invoice from The Weaver School')
            ->with(['user' => $this->user, 'invoicingDetails' => $this->invoicingDetails ]);
    }
}
