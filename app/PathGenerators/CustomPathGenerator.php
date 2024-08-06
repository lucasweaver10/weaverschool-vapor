<?php

namespace App\PathGenerators;

use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CustomPathGenerator implements PathGenerator
{
    /*
     * Get the path for the given media, relative to the root storage path.
     */
    public function getPath(Media $media): string
    {
        return 'images/media-library/' . config('services.media.prefix') . '/' . $media->id . '/';
    }

    /*
     * Get the path for conversions of the given media, relative to the root storage path.
     */
    public function getPathForConversions(Media $media): string
    {
        return 'images/media-library/' . config('services.media.prefix') . '/' . $media->id . '/conversions/';
    }

    /*
     * Get the path for responsive images of the given media, relative to the root storage path.
     */
    public function getPathForResponsiveImages(Media $media): string
    {
        return 'images/media-library/' . config('services.media.prefix') . '/' . $media->id . '/responsive/';
    }
}
