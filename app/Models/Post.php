<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Post extends Model
{
    // use HasMediaTrait;

    protected $guarded = [];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($post) {
            if (!$post->author_id) {
                $post->author_id = Auth::id();
            }
        });
    }

    // public function author()
    // {
    //     return $this->belongsTo('App\Models\User');
    // }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function subcategory() {
        return $this->belongsTo(Subcategory::class);
    }
}
