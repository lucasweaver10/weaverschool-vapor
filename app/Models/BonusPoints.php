<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonusPoints extends Model
{
    protected $guarded = [];

    use HasFactory;

    public function registration()
    {
        return $this->belongsTo('App\Models\Registration');
    }

}
