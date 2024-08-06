<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EssayProcessedNotification extends Notification
{
    use Queueable;

    public $type;
    private $exam;
    public $submissionId;
    public $locale;

    /**
     * Create a new notification instance.
     */
    public function __construct($type, $exam, $submissionId, $locale = 'en')
    {
        $this->type = $type;
        $this->exam = $exam;
        $this->submissionId = $submissionId;
        $this->locale = $locale;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the database representation of the notification.
     */

    public function toDatabase(object $notifiable): array
    {
        return [
            'notification_title' => $this->exam . ' essay graded',
            'notification_message' => '<a href="' . route('dashboard.exam-prep.'. strtolower($this->type) . '.writing.feedback.show', ['locale' => $this->locale, 'id' => $this->submissionId]) . '" class="text-teal-700">Click here to view</a>',
        ];
    }
    
}
