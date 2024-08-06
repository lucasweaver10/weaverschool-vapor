<?php

namespace App\Models;

use Stripe\Stripe;
use App\Models\QuickNote;
use App\Scopes\UserScope;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Laravel\Cashier\Billable;
use Illuminate\Support\Carbon;
use App\Enums\SubscriptionTypes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Notifications\Notifiable;
use App\Mail\Subscriptions\Confirmations\Pro;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use Billable;
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function booted()
    {
        static::addGlobalScope(new UserScope);
    }    

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function communicationPreferences()
    {
        return $this->hasOne('App\Models\CommunicationPreference');
    }

    public static function updatePaymentMethod($userId, $setupIntent) {
        try {
            // Get the payment method type from the setupIntent //
            $paymentMethodType = $setupIntent['payment_method_types'][0]; // Access the first payment method type
            $paymentMethodId = $setupIntent['payment_method'];
            // Get the user //
            $user = User::find($userId);
            // Update the user's payment method type and id //
            $user->pm_type = $paymentMethodType;
            $user->pm_id = $paymentMethodId;

            $user->save();        

            if (!$user->pm_id) {
                Log::error('Payment method id not found for user: ' . $user->id);
                return null;
            }

            return $user->pm_id;
            
        } catch (\Exception $e) {
            return $e;
        }
    }

    public static function saveLevelTestResult($data)
    {
        $user = User::where('email', $data['email'])->first();

        if ( $user !== null ) {
            $user->update([
                'level_test_score' => $data['score'],
                'level' => $data['level']
            ]);
        }
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    // public function subscriptions()
    // {
    //     return $this->hasMany(Subscription::class);
    // }

    public function groups()
    {
        return $this->belongsToMany('App\Models\Group');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function assignRole($role)
    {
        if (is_string($role)) {
            $role = Role::whereName($role)->firstOrFail();
        }

        $this->roles()->sync($role, false);
    }

    public function hasRole($name)
    {
        foreach ($this->roles as $role)
        {
            if ($role->name == $name) return true;
        }

        return false;
    }

    public function abilities()
    {
        return $this->roles->map->abilities->flatten()->pluck('name')->unique();
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }

    public function teachers()
    {
        return $this->hasManyThrough(Teacher::class, Registration::class, 'teacher_id', 'user_id');
    }

//    public function quizAssignments()
//    {
//        return $this->hasManyThrough(QuizAssignment::class, Registration::class, 'user_id', 'registration_id');
//    }

    public function quizAssignments()
    {
        return $this->hasMany(QuizAssignment::class);
    }

    public function lessonProgresses()
    {
        return $this->hasMany(LessonProgress::class);
    }

    public function flashcardSets() {
        return $this->hasMany(FlashcardSet::class);
    }

    public function flashcardSetsStudying()
    {
        return $this->belongsToMany(FlashcardSet::class, 'user_flashcard_sets');
    }

    public function quickNotes()
    {
        return $this->hasMany(QuickNote::class);
    }

    public function quickNoteSet()
    {
        return $this->hasOne(QuickNoteSet::class);
    }

    public function userTrackingData()
    {
        return $this->hasOne(UserTrackingData::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function generateReferralCode()
    {
        do {
            $code = Str::random(10);
        } while ($this->isCodeTaken($code));

        $this->referral_code = $code;
        $this->save();
    }

    private function isCodeTaken(string $code): bool
    {
        return User::where('referral_code', $code)->exists();
    }


    public function stripeSubscriptions()
    {
        return $this->hasMany(StripeSubscription::class);
    }

    public function hasCourseRegistrations()
    {
        return $this->registrations()->where('status', 'active')->exists();
    }    

    public function hasFlashcardsAccess(): bool
    {
        // Check if the user is in their trial period or is subscribed or has course registrations
        if ($this->getDaysLeftInTrial() > 0 || $this->subscribed('pro') || $this->hasCourseRegistrations()) {
            return true;
        }

        return false;
    }    

    public static function hasSubscriptionLevel($userId, $requiredType)
    {
        $user = User::find($userId);              
        $subscriptions = $user->subscriptions;

        if($subscriptions->isEmpty()) {
            return false;
        }

        $subscription = $subscriptions->whereIn('stripe_status', ['active', 'trialing'])->first();

        if($subscription === null) {
            return false;
        }

        $currentType = $subscription->type;        
        $hierarchy = SubscriptionTypes::getHierarchy();        

        return $hierarchy[$currentType] >= $hierarchy[$requiredType];
    }

    public static function automateSubscriptionEmails($subscription)
    {
        $user = User::find($subscription->user_id);
        
        if($subscription->type === 'pro') 
        {
            Mail::to($user->email)
                ->send(new Pro());
        }
    }

    /**
     * Calculate the number of days left in the free trial.
     *
     * @return int
     */
    public function getDaysLeftInTrial()
    {
        $trialDays = 7; // Total number of trial days
        $created = new Carbon($this->created_at);
        $now = Carbon::now();
        $daysSinceCreation = $created->diffInDays($now);
        return max(0, $trialDays - $daysSinceCreation);
    }

    public function essaySubmissions()
    {
        return $this->hasMany(EssaySubmission::class);
    }

    public function speakingPracticeTestSubmissions()
    {
        return $this->hasMany(SpeakingPracticeTestSubmission::class, 'user_id');
    }

    public function flashcardProgresses()
    {
        return $this->hasMany(UserFlashcardProgress::class);
    }

    public function learningPaths()
    {
        return $this->belongsToMany(LearningPath::class, 'user_learning_paths')
        ->withPivot('native_locale', 'target_locale', 'voice_gender', 'started_at', 'completed_at', 'last_accessed')
        ->withTimestamps();
    }

    public function referrer()
    {
        return $this->belongsTo(User::class, 'referred_by');
    }

    public function referrals()
    {
        return $this->hasMany(User::class, 'referred_by');
    }
}
