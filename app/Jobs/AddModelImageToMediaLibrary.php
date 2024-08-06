<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Models\VocabularyWord;
use App\Models\KeyPhrase;

class AddModelImageToMediaLibrary implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    // add the $model and $imageUrl properties
    protected $object;
    protected $property;

    /**
     * Create a new job instance.
     */
    public function __construct($object, $property)
    {
        $this->object = $object;
        $this->property = $property;
    }    

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $imageUrl = $this->object->{$this->property};
        
        if ($imageUrl) {
            try {
                $this->object->addMediaFromUrl($imageUrl)
                    ->toMediaCollection('images');
            } catch (\Exception $e) {
                Log::error('Failed to store the image in the media library', ['error' => $e->getMessage()]);                
            }
        }
    }
}
