<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseQuestion extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }
}
