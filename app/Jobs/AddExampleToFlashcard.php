<?php

namespace App\Jobs;

use App\Models\Flashcard;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use App\Http\Controllers\OpenAiController;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class AddExampleToFlashcard implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $id;

    /**
     * Create a new job instance.
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $flashcard = Flashcard::find($this->id);
        $term = $flashcard->term;

        if(!$flashcard) {            
            return;
        }

        if(!$flashcard->example) {
            $openAi = new OpenAiController();
            $example = $openAi->createFlashcardExampleWithOpenAI($term);
            $flashcard->example = $example;
            $flashcard->save();            
        } else {
            $example = $flashcard->example;
        }                
    }
}
