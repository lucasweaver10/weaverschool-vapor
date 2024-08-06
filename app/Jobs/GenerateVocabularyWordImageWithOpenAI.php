<?php

namespace App\Jobs;

use Exception;
use Illuminate\Bus\Queueable;
use App\Models\VocabularyWord;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use App\Http\Controllers\OpenAiController;
use App\Services\OpenAiService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;

class GenerateVocabularyWordImageWithOpenAI implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 300;
    public $tries = 3;
    public $backoff = 60;

    protected $vocabularyWordId;

    /**
     * Create a new job instance.
     */
    public function __construct($vocabularyWordId)
    {
        $this->vocabularyWordId = $vocabularyWordId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $vocabularyWord = VocabularyWord::find($this->vocabularyWordId);
        if (!$vocabularyWord->getTranslations('example')) {
            $example = collect($vocabularyWord->getTranslations('word'))->first();
        } else {
            $example = collect($vocabularyWord->getTranslations('example'))->first();
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

        $openAiService = new OpenAiService();
        $prompt = "Create an image for the following sentence: {$translatedExample}. IMPORTANT: ABSOLUTELY DO NOT USE TEXT IN THE IMAGE.";
        $imageUrl = $openAiService->generateImage($prompt);        

        if ($imageUrl) {                       
            $vocabularyWord->addMediaFromUrl($imageUrl)->toMediaCollection('images');
            $vocabularyWord->refresh();
            $vocabularyWord->image_url = $vocabularyWord->getFirstMediaUrl('images');
            $vocabularyWord->save();                              
        } else {
            throw new Exception('Failed to retrieve the image from the URL');
        }
    }
}
