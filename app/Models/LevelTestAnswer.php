<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LevelTestAnswer extends Model
{
    public function question()
    {
        return $this->belongsTo(LevelTestQuestion::class);
    }

    public function test()
    {
        return $this->hasOneThrough(levelTest::class, levelTestQuestion::class);
    }

}
