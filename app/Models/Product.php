<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['oneoff_price', 'monthly_price', 'annual_price'];

    protected $guarded = [];

    public function prices()
    {
        return $this->hasMany('App\Models\ProductPrice');
    }

    public function subscriptions()
    {
        return $this->hasMany(StripeSubscription::class, 'product_id');
    }
}
