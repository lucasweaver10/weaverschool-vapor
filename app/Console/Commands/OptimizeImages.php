<?php

namespace App\Console\Commands;

use App\Jobs\OptimizeImage;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class OptimizeImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:optimize-images {path}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $path = $this->argument('path');
        $disk = Storage::disk('s3-public');
        $files = $disk->allFiles($path);

        $this->info("Found " . count($files) . " files.");
        foreach ($files as $file) {
            $this->line($file);
        }  

        foreach ($files as $file) {
            if ($this->isImage($file)) {
                OptimizeImage::dispatch($file);
            }
        }

        $this->info('All images have been queued for optimizing.');
    }

    private function isImage($filename)
    {
        return in_array(strtolower(pathinfo($filename, PATHINFO_EXTENSION)), ['jpeg', 'jpg', 'png', 'gif', 'svg', 'webp']);
    }
}
