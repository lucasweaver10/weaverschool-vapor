<?php

namespace App\Livewire\Essays\Practice;

use Livewire\Component;
use Illuminate\Support\Facades\Log;
use App\Jobs\GenerateTextResponseWithOpenAi;

class Introduction extends Component
{
    public $exam;
    public $userId;
    public $topic = 'Most artists earn low salaries and should therefore receive funding from the government in order for them to continue with their work.
    To what extent do you agree or disagree?';
    public $introduction;
    public $introductionProcessing = false;
    public $introductionFeedback;
    public $introductionFeedbackGenerated = false;
    
    public function getListeners()
    {
        return [
            "echo:text-responses.{$this->userId},TextResponseGenerated" => "handleTextResponse",
        ];
    }

    public function generateTextResponse($prompt, $textType)
    {
        $this->userId = $this->userId;
        GenerateTextResponseWithOpenAi::dispatch($prompt, $this->userId, $textType);        
    }

    public function handleTextResponse($event)
    {        
        $textType = $event['textType'];
        $responseText = $event['response'];

        switch ($textType) {
            case 'introduction':                
                $this->handleIntroductionFeedback($responseText);
                break;            
        }
    }

    public function processIntroduction()
    {
        $this->introductionProcessing = true;
        $prompt = "An IELTS writing student is learning how to write an introduction for an IELTS essay. Their focus is on learning how to rewrite the question using synonyms to improve their scores in Lexical Resource.
        They have been givent his topic: {$this->topic}. They wrote this introduction: '{$this->introduction}'. Please address the student using 'you' and provide feedback on their introduction (specifically their synonym usage).
        Please keep your response at a 7th grade English level. Don't include any greeting or signoff! Format your response as markdown, using italics and bold where helpful.";
        $this->generateTextResponse($prompt, 'introduction');
    }

    public function handleIntroductionFeedback($responseText)
    {
        $this->introductionFeedback = $responseText;        
        $this->introductionFeedbackGenerated = true;
        $this->introductionProcessing = false;
    }

    public function mount()
    {
        $this->userId = auth()->id();
    }
    
    public function render()
    {
        return view('livewire.essays.practice.introduction');
    }
}
