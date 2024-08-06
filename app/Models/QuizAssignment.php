<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizAssignment extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'due_at' => 'datetime:Y-m-d H:i:s',
        'completed_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function quiz() {
        return $this->belongsTo(Quiz::class);
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function teacher() {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function registration() {
        return $this->belongsTo(Registration::class, 'registration_id');
    }
}
