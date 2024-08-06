<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LevelTest extends Model
{
    public function questions()
    {
        return $this->hasMany(LevelTestQuestion::class);
    }

    public function answers()
    {
        return $this->hasManyThrough(levelTestAnswer::class, levelTestQuestion::class);
    }

}
