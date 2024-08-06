<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;

class OptimizeImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $file;
    
    /**
     * Create a new job instance.
     */
    public function __construct($file)
    {
        $this->file = $file;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $disk = Storage::disk('s3-public');
        
        // Download the image
        $tempPath = tempnam(sys_get_temp_dir(), 'optimize') . '.' . pathinfo($this->file, PATHINFO_EXTENSION);
        file_put_contents($tempPath, $disk->get($this->file));

        $originalSize = filesize($tempPath);        

        // Optimize the image                
        ImageOptimizer::optimize($tempPath);

        // Log file size after
        clearstatcache(); // Clear file status cache to get correct size
        $optimizedSize = filesize($tempPath);     

        // Upload the optimized image back to S3
        $disk->put($this->file, fopen($tempPath, 'r+'), 's3-public');                        

        // Clean up the temporary file
        unlink($tempPath);        
    }      
}
