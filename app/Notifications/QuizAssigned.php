<?php

namespace App\Notifications;

use App\Models\QuizAssignment;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class QuizAssigned extends Notification
{
    use Queueable;

    public $quizAssignment;
    public $dueDate;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(QuizAssignment $quizAssignment)
    {
        $this->quizAssignment = $quizAssignment;
        $this->dueDate = Carbon::parse($quizAssignment->due_at)->toDayDateTimeString();
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
                    ->subject('New quiz assignment')
                    ->markdown('mail.quizzes.quiz-assigned',
                    [
                        'quizAssignment' => $this->quizAssignment,
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
            'notification_title' => 'New quiz assignment',
            'assignment_title' => $this->quizAssignment->quiz->name,
            'assignment_content' => $this->quizAssignment->quiz->description,
            'assignment_due_date' => $this->quizAssignment->due_at
        ];
    }
}
