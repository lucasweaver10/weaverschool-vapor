<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Models\EssaySubmission;
use App\Services\OpenAiService;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GenerateTransitionsFeedback implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    public $timeout = 120;
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
        $prompt = "Analyze the following essay for use of transitions and provide an improved version with more higher level transitions. 
        Use the following emoji system to mark different sentence types:

        🔵 C2
        🟠 C1
        🟢 B2
        🔴 B1
        🟡 A1/A2

        Your response should be formatted with markdown (not code) and include:

        1. A breakdown of the current transitions used in the original essay.
        2. A list of suggested higher-level transitions that can be used to improve the lower level transitions, using the emoji system to mark each transition level.
        3. A summary of key changes the writer can make to improve transition quality.

        Format your response in markdown (not code) as follows:

        Transition Analysis:
        [Level breakdown of transitions]

        Transition Improvements:
        [List of suggested improved transitions]

        Key Changes:
        [List of 2-3 major changes that can be made to improve transition quality]

        Here's the essay to analyze: '{$essayContent}'.
        
        Format your response as markdown. Do not format the response as a code block!";

        $model = 'gpt-4o-mini';

        $openAiService = new OpenAiService();
        $response = $openAiService->generateTextResponse($prompt, $model);
        if(!$response) {
            throw new \Exception('Failed to generate response from OpenAI');
        }
        $submission->update(['transitions_feedback' => $response]);
    }
}
