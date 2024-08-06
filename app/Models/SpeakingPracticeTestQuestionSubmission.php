<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpeakingPracticeTestQuestionSubmission extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function testSubmission()
    {
        return $this->belongsTo(SpeakingPracticeTestSubmission::class, 'speaking_practice_test_submission_id');
    }

    public function question()
    {
        return $this->belongsTo(SpeakingPracticeTestQuestion::class, 'speaking_practice_test_question_id');
    }
}
