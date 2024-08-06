<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FlashcardReviewReminder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $user;
    public $flashcards;

    public function __construct($user, $flashcards)
    {
        $this->user = $user;
        $this->flashcards = $flashcards;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: 'reminders@weaverschool.com',
            subject: 'Flashcard Review Reminder',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.flashcard-reminder',
            with:[
                'flashcards' => $this->flashcards,
            ]
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
