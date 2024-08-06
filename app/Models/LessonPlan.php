<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Events\LessonPlanCreated;

class LessonPlan extends Model
{
    protected $guarded = [];

    protected $dispatchesEvents = [
        'created' => LessonPlanCreated::class
    ];

    public function lessons()
    {
        return $this->hasMany('App\Models\Lesson');
    }

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }
}
