<?php

namespace App\Notifications;

use App\Models\Assignment;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;


class AssignmentCreated extends Notification
{
    use Queueable;

    public $assignment;
    public $dueDate;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Assignment $assignment)
    {
        $this->assignment = $assignment;
        $this->dueDate = Carbon::parse($assignment->due_date)->toDayDateTimeString();

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('New assignment')
                    ->markdown('mail.assignment-created',
                    [
                        'assignment' => $this->assignment,
                        'dueDate' => $this->dueDate,
                    ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'notification_title' => 'New assignment',
            'assignment_title' => $this->assignment->title,
            'assignment_content' => $this->assignment->content,
            'assignment_due_date' => $this->assignment->due_date
        ];
    }
}
