<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpeakingPracticeTestSubmission extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function questionSubmissions()
    {
        return $this->hasMany(SpeakingPracticeTestQuestionSubmission::class, 'speaking_practice_test_submission_id');
    }

    public function test()
    {
        return $this->belongsTo(SpeakingPracticeTest::class, 'speaking_practice_test_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
