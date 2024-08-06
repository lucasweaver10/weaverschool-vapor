<?php

namespace App\Jobs;

use Exception;
use App\Models\Event;
use App\Models\Flashcard;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use App\Http\Controllers\OpenAiController;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Google\Cloud\Translate\V2\TranslateClient;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;

class CreateFlashcardImageWithOpenAI implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 300;
    public $tries = 3;
    public $backoff = 60;

    protected $flashcardId;

    /**
     * Create a new job instance.
     */
    public function __construct($flashcardId)
    {
        $this->flashcardId = $flashcardId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $flashcard = Flashcard::find($this->flashcardId);
        if(!$flashcard->example) {
            $example = $flashcard->term;
        } 
        else {
            $example = $flashcard->example;
        }
        
        $googleCloudTranslationApiKey = config('services.google_cloud.api_key');


        $response = Http::post("https://translation.googleapis.com/language/translate/v2?key={$googleCloudTranslationApiKey}", [
            'q' => $example,
            'target' => 'en',
        ]);

        if ($response->successful()) {
            $translatedExample = $response->json()['data']['translations'][0]['translatedText'];
        } else {
            // Handle the error appropriately.
            Log::error('Google Cloud Translation error: Unsuccessful response', [
                'status' => $response->status(),
                'response' => $response->body(),
            ]);               
            $translatedExample = $example;
        }        

        $openAiController = new OpenAiController();
        $imageUrl = $openAiController->createFlashcardImage($translatedExample);
        $parsedUrl = parse_url($imageUrl, PHP_URL_PATH);

        if($imageUrl) {
            // Retrieve the image content
            $imageContent = file_get_contents($imageUrl);
            if ($imageContent === false) {
                throw new Exception('Failed to retrieve the image from the URL');
            }
    
            // Generate a filename
            $extension = pathinfo($parsedUrl, PATHINFO_EXTENSION);
            $originalFileName = md5($imageUrl);
            $filename = $originalFileName . '_' . now()->timestamp . '.' . $extension;

            // Define the path for the temporary file
            $tempPath = sys_get_temp_dir() . '/' . $filename;

            // Save the image content to the temporary file
            file_put_contents($tempPath, $imageContent);            

            // Optimize the image
            ImageOptimizer::optimize($tempPath);

            // Read the optimized image content
            $optimizedImageContent = file_get_contents($tempPath);
    
            // Define the path where the image will be stored in the S3 bucket
            $path = '/images/flashcards/flashcard-images/' . $filename;
    
            // Store the image in the S3 bucket
            try {
                Storage::disk('s3-public')->put($path, $optimizedImageContent, 's3-public');
            } catch (\Exception $e) {
                
            }

            // Get the final public image url then update the flashcard //
            $flashcardImageUrl = 'https://we-public.s3.eu-north-1.amazonaws.com/images/flashcards/flashcard-images/' . $filename;
            $flashcard->update(['image_url' => $flashcardImageUrl]);

            Event::create([
                'user_id' => $flashcard->set->user_id,                
                'name' => 'Flashcard AI image created',
                'properties' => json_encode(['url' => $flashcardImageUrl]),
            ]);
            
        }
    }
}
