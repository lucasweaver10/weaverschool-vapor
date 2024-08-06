<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Course;

class Feature extends Model
{
    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }
}
