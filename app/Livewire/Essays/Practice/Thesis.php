<?php

namespace App\Livewire\Essays\Practice;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Events\TestEventFired;
use App\Services\OpenAiService;
use Illuminate\Support\Facades\Log;
use App\Jobs\GenerateThesisInstructions;
use App\Jobs\GenerateTextResponseWithOpenAi;

class Thesis extends Component
{
    public $type;
    public $topic;
    public $loading = false;
    public $topicAndTypeProcessing = false;
    public $topicAndTypeSet = false;
    public $thesisOne;
    public $thesisTwo;
    public $thesisThree;
    public $thesisFeedbackOne;
    public $thesisFeedbackTwo;
    public $thesisPrompt;
    public $thesisInstructions = "";    
    public $thesisInstructionsProcessing = false;
    public $thesisFeedbackOneProcessing = false;
    public $thesisFeedbackTwoProcessing = false;
    public $thesisFeedbackOneGenerated = false;
    public $thesisFeedbackTwoGenerated = false;  
    public $thesisThreeProcessed = false;  
    public $userId;

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
            case 'thesisInstructions':                
                $this->handleThesisInstructions($responseText);
                break;
            case 'thesisFeedbackOne':
                $this->handleThesisFeedbackOne($responseText);
                break;
            case 'thesisFeedbackTwo':
                $this->handleThesisFeedbackTwo($responseText);
                break;
        }
    }
    
    public function setTopicAndType()
    {
        $this->topicAndTypeProcessing = true;
        $this->type = $this->type;
        $this->topic = $this->topic;        
        $this->topicAndTypeSet = true;
        $this->topicAndTypeProcessing = false;
        $this->dispatch('refresh');
        $this->generateThesisInstructions(); 
    }

    public function generateThesisInstructions()
    {        
        $this->thesisInstructionsProcessing = true;
        $prompt = "A student is writing an {$this->type} essay about this topic: '{$this->topic}'.
        Give them instructions for writing a clear, one-sentence thesis statement for this topic that will fully satisfy the 'Task Achievement' criteria.
        Our focus here is teaching them how to address the topic and create a thesis statement that will guide them through writing the rest of their essay.
        Address the student directly using 'you' and keep your English level at a 7th grade level so non-native speakers can easily understand.
        Don't write any kind of introduction, signature, or closing.
        Format your response as markdown but don't include any outer wrapping like body or html tags.";
        $this->generateTextResponse($prompt, 'thesisInstructions');
    }

    public function generateThesisFeedbackOne()
    {
        $this->thesisFeedbackOneProcessing = true;
        $this->thesisOne = $this->thesisOne;   
        $prompt = "A student is writing a thesis statement for an {$this->type} essay about this topic: '{$this->topic}'.
        Please give them feedback on the quality of their thesis statement and suggest improvements so they can effectively 
        score highly on Task Achievement. Focus here on helping them improve their clarity and addressing the topic, rather than length or their lack of explanation. 
        We'll help them with that later. 
        Here is their thesis statement: '{$this->thesisOne}'.
        Address the student directly using 'you' and keep your English level at a 7th grade level so non-native speakers can easily understand.
        Don't write any kind of introduction, signature, or closing.
        Format your response as markdown but don't include any outer wrapping like body or html tags.";
        $this->generateTextResponse($prompt, 'thesisFeedbackOne');                  
    }

    public function generateThesisFeedbackTwo()
    {
        $this->thesisFeedbackTwoProcessing = true;
        $this->thesisOne = $this->thesisOne;
        $prompt = "A {$this->type} student has just updated their thesis statement for an essay about this topic: '{$this->topic}', based on your previous feedback.
        Their focus now is trying to improve clarity and address the topic effectively.
        Please give them feedback on the quality of their updated thesis statement and an analysis on how it stands regarding Task Achievement.
        If there are any remaining issues, suggest any minor improvements they can make.
        Here is their first thesis statement: '{$this->thesisOne}'.
        Here is their updated thesis statement: '{$this->thesisTwo}'.
        Address the student directly using 'you' and keep your English level at a 7th grade level so non-native speakers can easily understand.
        Don't write any kind of introduction, signature, or closing.
        Format your response as markdown but don't include any outer wrapping like body or html tags.";
        $this->generateTextResponse($prompt, 'thesisFeedbackTwo');
    }

    public function processThesisThree()
    {
        $this->thesisThree = $this->thesisThree;
        session()->put('thesis', $this->thesisThree);
        $this->thesisThreeProcessed = true;
    }
        

    public function handleThesisInstructions($responseText)
    {                     
        $this->thesisInstructions = $responseText;        
        $this->thesisInstructionsProcessing = false;
    }
    
    public function handleThesisFeedbackOne($responseText)
    {
        $this->thesisFeedbackOne = $responseText;        
        $this->thesisFeedbackOneProcessing = false;
        $this->thesisFeedbackOneGenerated = true;
    }

    public function handleThesisFeedbackTwo($responseText)
    {
        $this->thesisFeedbackTwo = $responseText;        
        $this->thesisFeedbackTwoProcessing = false;
        $this->thesisFeedbackTwoGenerated = true;
    }

    public function mount()
    {        
        $this->userId = auth()->id();
    }

    
    public function render()
    {
        return view('livewire.essays.practice.thesis');
    }
}
