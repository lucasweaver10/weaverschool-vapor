<?php

namespace App\Models;

use Illuminate\Support\Facades\Log;
use App\Jobs\SendProEssaysNotification;
use Illuminate\Database\Eloquent\Model;
use App\Jobs\SendBasicEssaysDiscountOffer;
use App\Jobs\SendProEssaysDiscountOffer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Jobs\Subscriptions\Upgrades\SendBasicEssaysOffer;

class EssaySubmission extends Model
{
    use HasFactory;

    protected $guarded = [];

    const MAX_FREE_SUBMISSIONS = 2;
    const MAX_BASIC_SUBMISSIONS = 10;
    const MAX_PRO_SUBMISSIONS = 10;
    const MAX_PREMIUM_SUBMISSIONS = 25;

    public static function updateWithFeedback($feedback, $score, $submissionId)
    {
        $submission = EssaySubmission::find($submissionId);
        
        $submission->update([
            'feedback' => $feedback,
            'score' => $score
        ]);

        return $submission;
    }

    public static function sendAutomatedEmails($userId)
    {        
        $user = User::find($userId);
        $submissions = EssaySubmission::where('user_id', $userId)->count();

        // If the user doesn't have the basic subscription and submissions equals MAX_FREE_SUBMISSIONS, dispatch a job
        if (!$user->hasSubscriptionLevel($user->id, 'essays') && $submissions == self::MAX_FREE_SUBMISSIONS) {
            SendBasicEssaysOffer::dispatch($user->id)->delay(now()->addDay(1));
            SendBasicEssaysDiscountOffer::dispatch($user->id)->delay(now()->addDay(3));
        }

        // if the user has a basic subscription and submissions equals MAX_BASIC_SUBMISSIONS, dispatch a job
        if ($user->hasSubscriptionLevel($user->id, 'basic') && !$user->hasSubscriptionLevel($user->id, 'pro') && $submissions == self::MAX_BASIC_SUBMISSIONS) {
            SendProEssaysNotification::dispatch($user->id);
            SendProEssaysDiscountOffer::dispatch($user->id)->delay(now()->addDay(3));
        }

        // if the user has a pro subscription and submissions equals MAX_PRO_SUBMISSIONS, dispatch a job
        if ($user->hasSubscriptionLevel($user->id, 'pro') && !$user->hasSubscriptionLevel($user->id, 'premium') && $submissions == self::MAX_PRO_SUBMISSIONS) {
            // dispatch a job
        }
    }



    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function corrections() {
        return $this->hasMany(EssayCorrection::class, 'essay_submission_id');
    }
}
