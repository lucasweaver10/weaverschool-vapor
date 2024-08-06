<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpeakingPracticeTestQuestion extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function test()
    {
        return $this->belongsTo(SpeakingPracticeTest::class, 'speaking_practice_test_id');
    }

    public function submissions()
    {
        return $this->hasMany(SpeakingPracticeTestQuestionSubmission::class, 'speaking_practice_test_question_id');
    }
}
