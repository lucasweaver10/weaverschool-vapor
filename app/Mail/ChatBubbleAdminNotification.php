<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class ChatBubbleAdminNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $message;
    public $user;

    /**
     * Create a new message instance.
     */
    public function __construct($subject, $message, $user)
    {
        $this->subject = $subject;
        $this->message = $message;
        $this->user = $user;
    }    

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('notifications@weaverschool.com', 'Weaver School Notifications'),
            subject: 'New User Chat Bubble Message',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.admin.chat-bubble-admin-notification',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
