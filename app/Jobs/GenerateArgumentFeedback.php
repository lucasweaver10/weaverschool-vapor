<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Models\EssaySubmission;
use App\Services\OpenAiService;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GenerateArgumentFeedback implements ShouldQueue
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

        if ($submission->task !== 'Task One') {
            $prompt = "Analyze the argument made in this {$submission->type} essay from a coherence and cohesion perspective. 
            Give me a breakdown of the thesis statement, main ideas, and supporting points.
            Break them down by relevance, logic, evidence, and development. 

            Your response should be formatted as markdown (not code) and include:

            1. A breakdown of the coherence of the argument.
            2. Analysis of how relevant all support was to the thesis statement.
            3. A summary of key changes needed for improvement.

            Focus on building skills for relevant argument construction in academic essays.
            Avoid recommending more specific examples; instead, guide on improving argument structure and relevance.
            Keep in mind, this is a {$submission->type} essay, so the focus should be on academic argumentation, as they
            don't have that much room to develop super elaborate arguments.

            Format your response with markdown. Do not format the response as a code block! Here is the essay: '$essayContent'.";

            $model = 'gpt-4o-mini';

            $openAiService = new OpenAiService();
            $response = $openAiService->generateTextResponse($prompt, $model);
            if(!$response) {
                throw new \Exception('Failed to generate response from OpenAI');
            }
            $submission->update(['argument_feedback' => $response]);
        } else {
            $submission->update(['argument_feedback' => 'Not applicable for this type of essay.']);
        }
    }
}
