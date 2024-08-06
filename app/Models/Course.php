<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];

    public function features()
    {
        return $this->hasMany('App\Models\Feature');
    }

    public function lessonPlans()
    {
        return $this->hasOne('App\Models\LessonPlan');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher');
    }

    public function plans()
    {
        return $this->belongsToMany('App\Models\Plan')
        ->as('plan');
    }

    public function groups()
    {
        return $this->hasMany('App\Models\Group');
    }

    public function faqs()
    {
        return $this->hasMany('App\Models\CourseFaq');
    }

    public function registrations()
    {
        return $this->hasMany('App\Models\Registration');
    }

    public function progress()
    {
        return $this->hasMany(CourseProgress::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function lessonProgresses()
    {
        return $this->hasManyThrough(LessonProgress::class, Lesson::class);
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }

    public function promoVideos()
    {
        return $this->hasMany(CoursePromoVideo::class);
    }

    public function subcategory() {
        return $this->belongsTo(Subcategory::class);
    }

    public function bonusCourses()
    {
        return $this->belongsToMany(Course::class, 'bonus_courses', 'main_course_id', 'bonus_course_id');
    }

    public function contentBlocks()
    {
        return $this->hasMany(CourseContentBlock::class);
    }

    public function bundles()
    {
        return $this->belongsToMany(Bundle::class);
    }

    public function discounts()
    {
        return $this->morphMany(Discount::class, 'discountable');
    }

    public function lesson_videos()
    {
        return $this->hasManyThrough(LessonVideo::class, Lesson::class);
    }

}
