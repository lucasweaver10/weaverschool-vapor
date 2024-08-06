<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrivateLesson extends Model
{
    protected $guarded = [];

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
