<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use App\Services\OpenAiService;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use App\Notifications\EssayProcessedNotification;
use App\Http\Controllers\EssaySubmissionController;
use App\Models\EssaySubmission;

class ProcessEssaySubmission implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $validatedData;
    protected $userId;
    protected $locale;
    protected $submissionId;    
    public $tries = 3;
    public $timeout = 120;

    /**
     * Create a new job instance.
     */    
    public function __construct($validatedData, $userId, $submissionId, $locale = 'en')
    {
        $this->validatedData = $validatedData;
        $this->userId = $userId;
        $this->locale = $locale;
        $this->submissionId = $submissionId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $submission = EssaySubmission::find($this->submissionId);        
        
        $type = $this->validatedData['type'];
        $exam = $this->validatedData['exam'];
        $task = $this->validatedData['task'];
        $topic = $this->validatedData['topic'];
        $essay = $this->validatedData['essay_content'];
        $image_url = $this->validatedData['image_url'] ?? null;        

        if ($type == 'PTE') {
            $scoreRange = "0 and 90";
            $gradingCriteria = 'Content (Relevance and Coherence, Completion), Form (Format, Structure), Grammar (Accuracy, Complexity), Vocabulary (Range, Accuracy), Spelling and Punctuation (Spelling, Punctuation)';
        } elseif ($type == 'TOEFL') {
            $scoreRange = "0 and 30";
            $gradingCriteria = 'Task Achievement (Response to the Task), Coherence and Cohesion (Organization, Logical Flow), Language Use (Grammar, Vocabulary, Spelling and Punctuation), Content (Relevance and Detail)';
        } elseif ($type == 'Cambridge') {
            $scoreRange = "80 and 230";
            $gradingCriteria = 'Content (Relevance and Adequacy, Task Fulfillment), Communicative Achievement (Appropriacy of Register and Tone, Clarity of Message), Organization (Coherence and Cohesion, Structure), Language (Lexical Resource, Grammatical Range and Accuracy, Spelling and Punctuation)';
        } else {
            $scoreRange = "0 and 9";
            $gradingCriteria = 'Task Response, Coherence and Cohesion, Lexical Resource, and Grammatical Range and Accuracy';
        }

        $openAi = new OpenAiService();

        if ($image_url) {
            try {
                $exampleJson = [
                    "evaluation" => [
                        "feedback" => "Your feedback formatted with markdown using **bold**, *italics*, and others when necessary.",
                        "score" => 6
                    ]
                ];

                $exampleJsonString = json_encode($exampleJson, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                $userPrompt = "You are an AI essay checker specialized in grading {$exam} essays. You are giving direct feedback to a student on their {$task} essay. Your feedback should include their band score, detailed comments on their mistakes, and suggestions for improvement focusing on the following aspects: {$gradingCriteria}. Address the student directly as 'you' in your response. Here is their writing topic: {$topic}. Here is their essay: {$essay}. The image  for their topic is attached. Format your response as a valid JSON object named 'evaluation'. The text in the 'feedback' field should be formatted with markdown, making new paragraphs after each sentence. Use *italics* and **bold** where appropriate. The 'score' field must be a band score as a number between {$scoreRange} in accordance with the {$exam} exam scoring system. Structure your JSON according to this example:\n" . $exampleJsonString;
                $model = 'gpt-4o';                

                $response = $openAi->generateImageResponse($userPrompt, $image_url, $model);                

                if (
                    isset($response['evaluation']) &&
                    isset($response['evaluation']['feedback']) &&
                    isset($response['evaluation']['score'])
                ) {
                    $feedback = $response['evaluation']['feedback'];
                    $score = $response['evaluation']['score'];
                } elseif (isset($response['feedback']) && isset($response['score'])) {
                    $feedback = $response['feedback'];
                    $score = $response['score'];
                } else {
                    throw new \Exception('Error. Response from AI vision call did not match specs. Please try again.');
                }
            } catch (\Exception $e) {
                Log::error('Exception in AI essay checking', ['error' => $e->getMessage(), 'response' => $response]);                
            }
        } else {
            $exampleJson = [
                "evaluation" => [
                    "feedback" => "Your proposal demonstrates a good understanding of the task requirements and shows clear organization. However, there are various areas that you could improve to enhance the quality of your writing further. Below is a detailed feedback on your essay: 

                    **Structure and Organization:** Your proposal is well-structured, but it would benefit from clearer topic sentences. This would make it easier for the reader to follow your writing and your arguments, as you naturally lead them through your own thoughts. For instance, if you started a paragaph with something like:
                    - 'If we look at proposals for equal pay among the genders, for instance...' this would let the reader know you are now going to talk about equal pay, helping them mentally shift gears.

                    **Content:** You address the main points of the task, but you could expand more on how the trip will specifically benefit your studies. For instance, mention specific companies or events in Silicon Valley that you plan to visit and how they relate directly to your coursework. You also stray from the topic in a few sentences. It would be better if you stuck closer to answering the question in your topic as much as possible. 

                    **Language and Style:** Your language is reasonably formal but could be more consistent. For instance, 'from the heart' sounds a bit too informal for a proposal. You could replace it with 'sincerely' or 'wholeheartedly'. 

                    **Grammar and Punctuation:** There are several grammatical errors: 
                    - 'I am writing in the line with the funds' should be 'I am writing **in line** with the funds'.
                    - 'destinantion' should be 'destination'.
                    - 'disrespect you **by** any way' should be 'disrespect you **in** any way'.
                    - 'the great majority **them**' should be 'the great majority **of them**'.
                    - 'destination speak for it self' should be 'destination **speaks** for itself'.
                    - 'a the culture' should be just 'the culture'.
                    - 'heavyweigh' should be 'heavyweight'.
                    - 'one in a lifetime' should be 'once in a lifetime'.
                    - 'heistate' should be 'hesitate'. 

                    **Spelling and Vocabulary:** Some of your vocabulary choices could be improved for clarity. For example:
                    - 'further to this' could be simplified to 'additionally' or 'moreover'. 
                    - 'recogniced' should be 'recognized.
                    - 'under the impreshion' should be 'under the impression'.

                    **Conclusion:** You could make your conclusion stand out more by summarizing the main points and finishing with a strong call to action that you want the reader to take. For example, 'I trust this proposal outlines the significant benefits of such a trip, and I eagerly await your positive response.",
                    "score" => 6
                ]
            ];

            $exampleJsonString = json_encode($exampleJson, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
            $systemPrompt = "You are an AI {$type} essay examiner specialized in grading {$exam} essays. Your primary focus is on evaluating the use of English language and provide detailed and structured feedback on their essays, focusing on the following aspects: {$gradingCriteria}. While content relevance is important, your main task is to assess language proficiency rather than the depth of arguments or specific examples. Your response must be a valid JSON object containing an 'evaluation' object with separate fields for 'feedback' and 'score'. Ensure that the feedback is well-organized, using headings and bullet points where appropriate. Use markdown formatting, including **bold** and *italics*, to emphasize important points. Here is an example of the desired JSON output:\n" . $exampleJsonString;
            $userPrompt = "You are an AI {$type} essay examiner specialized in grading {$exam} essays. You are giving feedback to a student on their {$task} essay. Your feedback should include their band score, detailed comments on their mistakes, and suggestions for improvement. Address the student directly as 'you' in your response. Important: Do not suggest that the student needs to provide more specific examples unless it directly relates to demonstrating language skills. Focus on how they express their ideas using English, rather than the depth of their content. Here is their writing topic: {$topic}. Here is their essay: {$essay}. Format your response as a valid JSON object named 'evaluation'. The text in the 'feedback' field should be formatted with markdown, making new paragraphs after each sentence. Use *italics* and **bold** where appropriate. The 'score' field must be a band score as a number between {$scoreRange} in accordance with the {$exam} exam scoring system. No yapping.";
            
            $user = User::find($this->userId);

            if(!$user->hasSubscriptionLevel($this->userId, 'essays'))
            { 
                $model = 'gpt-4o'; 
            } else {
                $model = 'gpt-4o-mini';
            }
            
            $response = $openAi->generateArrayResponseWithSystemInstructions($userPrompt, $systemPrompt, $model);            

            if (
                isset($response['evaluation']) &&
                isset($response['evaluation']['feedback']) &&
                isset($response['evaluation']['score'])
            ) {
                $feedback = $response['evaluation']['feedback'];
                $score = $response['evaluation']['score'];
            } elseif (isset($response['feedback']) && isset($response['score'])) {
                $feedback = $response['feedback'];
                $score = $response['score'];
            } else {
                Log::error('Response from OpenAI does not match array specification', ['response' => json_encode($response)]);
                throw new \Exception('Error. Response from AI did not match specs. Please try again.');
            }    
        }    
    
    $updatedSubmission = EssaySubmission::updateWithFeedback($feedback, $score, $submission->id);
    
    // Dispatch jobs for the rest of the feedback areas
    DispatchAdditionalEssayFeedbackJobs::dispatch($submission->id);

    // if the difference between $submission->updated_at and $submission->created_at is more than 5 minutes, log an error
    if ($updatedSubmission->updated_at->diffInMinutes($updatedSubmission->created_at) > 5) {
        Log::error('The essay feedback for submission ' . $updatedSubmission->id . ' took longer than 5 minutes to process.');
    }        

    $user = User::find($this->userId);
    $user->notify(new EssayProcessedNotification($type, $exam, $submission->id, $this->locale));
    }
}
