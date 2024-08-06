<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Plan extends Model
{
    use HasTranslations;
    public $translatable = ['total_price', 'monthly_price', 'discounted_total_price', 'discounted_monthly_price'];
    protected $guarded = [];

    public function courses()
    {
        return $this->belongsToMany('App\Models\Course');
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

}
