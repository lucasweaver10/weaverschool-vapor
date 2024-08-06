<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class ImageUpload extends Model implements HasMedia
{
    use HasMediaTrait;

    public function registerMediaCollections()
    {
        $this->addMediaCollection('ImageUploads');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('hero-image')
            ->greyscale()
            ->width(1008)
            ->height(384)
            ->sharpen(10);

        $this->addMediaConversion('square')
            ->greyscale()
            ->width(412)
            ->height(412)
            ->sharpen(10);

        $this->addMediaConversion('card-third')
            ->greyscale()
            ->width(382)
            ->height(216)
            ->sharpen(10);

        $this->addMediaConversion('thumb')
            ->greyscale()
            ->width(200)
            ->height(200)
            ->sharpen(10);
    }

    protected $guarded = [];
}
