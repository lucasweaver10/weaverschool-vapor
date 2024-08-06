<?php

namespace App\Console\Commands;

use App\Jobs\AddModelImageToMediaLibrary;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Models\VocabularyWord;
use App\Models\KeyPhrase;

class AddModelImagesToMediaLibrary extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:add-model-images-to-media-library {model} {property} {startId} {endId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add the image files for a model to the media library for that model';

    /**
     * Execute the console command.
     */
    public function handle()
    {                
        $modelClass = 'App\\Models\\' . $this->argument('model');        
        $property = $this->argument('property'); // this is the column name that contains the image file path
        $startId = $this->argument('startId');
        $endId = $this->argument('endId');

        // Ensure the laravel model exists
        if (!is_subclass_of($modelClass, 'Illuminate\Database\Eloquent\Model')) {
            $this->error("Model class $modelClass is not a valid Eloquent model.");
            return 1;
        }

        // Retrieve the model instances in the given ID range
        $objects = $modelClass::whereBetween('id', [$startId, $endId])->get();        

        foreach ($objects as $object) {
            AddModelImageToMediaLibrary::dispatch($object, $property);
        }

        $this->info('Jobs have been dispatched for the specified range of IDs, model, and property.');

        return 0;
    }
}
