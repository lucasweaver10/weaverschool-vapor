<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Models\EssaySubmission;
use App\Services\OpenAiService;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GenerateSentenceStructureFeedback implements ShouldQueue
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
        
        $prompt = "Analyze the following essay for sentence structure and provide an improved version with more varied sentence types. 
        Use the following emoji system to mark different sentence types:

        🔵 Simple
        🟠 Compound
        🟢 Complex
        🟣 Compound-Complex

        Your response should be formatted in markdown and include:

        1. A breakdown of the current sentence types used in the original essay, with emojis and including percentages.
        2. An evaluation of the sentence structure in the essay with focus on their variance, or over-reliance on too simple of structures.
        3. 2 or 3 examples from their essay of key changes that can be made to improve sentence variety.        

        Your response should be formatted as markdown (not code) as follows:

        Sentence Structure Analysis:
        [Percentage breakdown of sentence types]

        Sentence Structure Evaluation:
        [Evaluation of their sentence structure choices with with emoji markers. If their percentages are within the Band 7 or Band 8 ranges below, commend them. ]

        Key Changes for Improvment:
        [List of 2-3 rewritten sentences with better sentence structure, including the emojis to show the new sentence types.]        

        Here's the essay to analyze: '{$essayContent}'.
        Aim for a target distribution suitable for a Band 8 score on the IELTS (or equivalent advanced level of academic writing):        
        Band 8: Simple: 15-25% | Compound: 20-30% | Complex: 35-45% | Compound-Complex: 10-20%
        
        Format your response as markdown. Do not format the response as a code block!";

        $model = 'gpt-4o-mini';

        $openAiService = new OpenAiService();
        $response = $openAiService->generateTextResponse($prompt, $model);
        if(!$response) {
            throw new \Exception('Failed to generate response from OpenAI');
        }
        $submission->update(['sentence_structure_feedback' => $response]);
    }
}
