<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFlashcardProgress extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = ['next_review_date'];


    public function flashcard()
    {
        return $this->belongsTo(Flashcard::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static $reviewSchedule = [
        1 => 1,  // After the first learning, review in 1 day
        2 => 6,  // After the second learning, review in 6 days
        3 => 11, // After the third learning, review in 11 days
        4 => 8   // After the fourth learning, review in 8 days
    ];

    public static function updateNextReviewDate($progressId) {
        $progress = UserFlashcardProgress::find($progressId);
        $timesLearned = $progress->times_learned;
        // Check if the times_learned value is in the review schedule
        if (array_key_exists($timesLearned, self::$reviewSchedule)) {
            $daysToAdd = self::$reviewSchedule[$timesLearned];
            $progress->next_review_date = now()->addDays($daysToAdd);
        } else {
            // Handle cases where times_learned exceeds the schedule
            // For example, keep the last interval or mark as mastered
            $progress->next_review_date = null; // Or a logic of your choice
        }
        $progress->save();
    }

}
