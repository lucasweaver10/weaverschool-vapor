<?php

namespace App\Jobs;

use App\Events\TestEventFired;
use Illuminate\Bus\Queueable;
use App\Services\OpenAiService;
use Illuminate\Support\Facades\Log;
use App\Events\TextResponseGenerated;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\ThesisInstructionsGenerated;
use App\Models\Event;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GenerateTextResponseWithOpenAi implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    public $timeout = 120;
    public $prompt;
    public $userId;
    public $textType;

    /**
     * Create a new job instance.
     */
    public function __construct($prompt, $userId, $textType)
    {
        $this->prompt = $prompt;
        $this->userId = $userId;
        $this->textType = $textType;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Call OpenAI service to generate text response
        $openAiService = new OpenAiService();
        $response = $openAiService->generateTextResponse($this->prompt);
        Event::create([
            'name' => 'AI Text Generated',
            'user_id' => $this->userId,
            'properties' => json_encode(['textType' => $this->textType]),
        ]);

        // Broadcast the response to the user                
        event(new TextResponseGenerated($response, $this->userId, $this->textType));        
    }
}
