<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseProgress extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'course_progresses';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function lessonProgresses()
    {
        return $this->hasMany(LessonProgress::class);
    }

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }
}
