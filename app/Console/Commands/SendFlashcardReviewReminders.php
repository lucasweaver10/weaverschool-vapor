<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Mail\FlashcardReviewReminder;
use Illuminate\Console\Command;

class SendFlashcardReviewReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-flashcard-review-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle() {
        $today = now()->startOfDay();  // Sets the time to 00:00:00 for accurate comparison

        $users = User::with(['flashcardProgresses' => function ($query) use ($today) {
            $query->whereDate('next_review_date', '=', $today);
        }])->get();

        foreach ($users as $user) {
            $flashcardsDueForReview = $user->flashcardProgresses->filter(function ($progress) {
                $reviewDate = \Carbon\Carbon::parse($progress->next_review_date);
                return $reviewDate->isToday();
            });

            if ($flashcardsDueForReview->isNotEmpty()) {
                \Illuminate\Support\Facades\Mail::to($user->email)->send(new FlashcardReviewReminder($user, $flashcardsDueForReview));
            }
        }
    }
}
