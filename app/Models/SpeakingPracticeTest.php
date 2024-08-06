<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpeakingPracticeTest extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function questions()
    {
        return $this->hasMany(SpeakingPracticeTestQuestion::class, 'speaking_practice_test_id');
    }

    public function submissions()
    {
        return $this->hasMany(SpeakingPracticeTestSubmission::class, 'speaking_practice_test_id');
    }
}
