<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OldSubscription extends Model
{
    protected $guarded = [];

    // public function user()
    // {
    //     return $this->belongsTo('App\Models\User');
    // }

    public function registrations()
    {
        return $this->belongsTo('App\Models\Registration');
    }
}
