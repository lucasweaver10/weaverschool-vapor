<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Translatable\HasTranslations;

class Teacher extends Model
{
    use HasTranslations;
    use Notifiable;

    protected $guarded = [];

    public $translatable = ['about', 'nationality'];

    public function courses()
    {
        return $this->hasMany('App\Models\Course');
    }

    public function groups()
    {
        return $this->hasMany('App\Models\Group');
    }

    public function registrations()
    {
        return $this->hasMany('App\Models\Registration');
    }

    public function subcategories()
    {
        return $this->hasMany('App\Models\Subcategory');
    }

    public function quizzes()
    {
        return $this->hasMany(QuizAssignment::class);
    }

    public function specialties()
    {
        return $this->belongsToMany(TeachingSpecialty::class, 'specialty_teacher');
    }

    public function students()
    {
        return $this->hasManyThrough(User::class, Registration::class, 'user_id', 'teacher_id');
    }

    public function assignments()
    {
        return $this->hasManyThrough(Assignment::class, Registration::class, 'teacher_id', 'registration_id');
    }
}
