<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonWorksheet extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function lesson()
    {
        return $this->belongsTo('App\Models\Lesson');
    }
}
