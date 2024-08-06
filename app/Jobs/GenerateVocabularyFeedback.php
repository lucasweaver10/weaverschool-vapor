<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Models\EssaySubmission;
use App\Services\OpenAiService;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GenerateVocabularyFeedback implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    public $timeout = 60;
    public $submissionId;

    /**
     * Create a new job instance.
     */
    public function __construct($submissionId)
    {
        $this->submissionId = $submissionId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $submission = EssaySubmission::find($this->submissionId);
        $essayContent = $submission->essay_content;

        $prompt = "Analyze the Lexical Resource of this essay. Give the user a percentage breakdown of the use of vocabulary by CEFR level of that vocabulary word. 
        Use the following emoji system to mark different sentence types:

        🔵 C2
        🟠 C1
        🟢 B2
        🔴 B1

        Your response should be formatted with markdown (not code) and include:

        1. A percentage breakdown of the vocabulary used by level.
        2. A word by word breakdown of the vocabulary used by level.
        3. Analysis of appropriateness of vocabulary used.
        4. A summary of key changes needed for improvement of the Lexical Resource quality.

        Format your response as markdown. Do not format the response as a code block! Here is the essay: '$essayContent'";

        $model = 'gpt-4o-mini';
        
        $openAiService = new OpenAiService();
        $response = $openAiService->generateTextResponse($prompt, $model);
        if(!$response) {
            throw new \Exception('Failed to generate response from OpenAI');
        }
        $submission->update(['vocabulary_feedback' => $response]);
        
    }
}
