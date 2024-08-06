<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseImage extends Model
{
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    protected $guarded = [];
}
