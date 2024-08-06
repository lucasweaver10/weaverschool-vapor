<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LevelTestQuestion extends Model
{
    public function test()
    {
        return $this->belongsTo(LevelTest::class);
    }

    public function answers()
    {
        return $this->hasMany(LevelTestAnswer::class);
    }
}
