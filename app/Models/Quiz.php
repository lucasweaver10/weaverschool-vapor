<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function questions() {
        return $this->hasMany(QuizQuestion::class);
    }

    public function answers() {
        return $this->hasManyThrough(QuizAnswer::class, QuizQuestion::class);
    }

    public function submissions() {
        return $this->hasMany(QuizSubmission::class);
    }

    public function quizAssignments() {
        return $this->hasMany(QuizAssignment::class);
    }

    public function quizSubmissions() {
        return $this->hasMany(QuizSubmission::class);
    }

    public function lesson() {
        return $this->belongsTo(Lesson::class);
    }
}
