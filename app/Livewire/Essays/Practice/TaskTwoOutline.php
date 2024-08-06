<?php

namespace App\Livewire\Essays\Practice;

use Livewire\Component;
use Illuminate\Support\Facades\Log;
use App\Jobs\GenerateTextResponseWithOpenAi;

class TaskTwoOutline extends Component
{
    public $userId;
    public $thesis;
    public $thesisSaved = false;
    public $thesisReason1;
    public $thesisReason2;
    public $thesisReasonsSaved = false;
    public $thesisReasonsFeedback;
    public $thesisReasonsFeedbackGenerating = false;
    public $thesisReasonsFeedbackGenerated = false;
    public $topicSentence1Instruction;
    public $topicSentence1InstructionGenerating = false;
    public $topicSentence1InstructionGenerated = false;
    public $topicSentence1;
    public $topicSentence1Feedback;
    public $topicSentence1FeedbackGenerating;
    public $topicSentence1FeedbackGenerated = false;
    public $topicSentence1Saved = false;
    public $topicSentence2Instruction;
    public $topicSentence2InstructionGenerating = false;
    public $topicSentence2InstructionGenerated = false;
    public $topicSentence2;
    public $topicSentence2Feedback;
    public $topicSentence2FeedbackGenerating;
    public $topicSentence2FeedbackGenerated = false;
    public $topicSentence2Saved = false;
    public $topic1Reason1;
    public $topic1Reason2;
    public $topic1ReasonsFeedback;
    public $topic1ReasonsFeedbackGenerating = false;
    public $topic1ReasonsFeedbackGenerated = false;
    public $topic1ReasonsSaved = false;
    public $topic1ExampleInstructionsGenerating;
    public $topic1ExampleInstructions;
    public $topic1ExampleInstructionsGenerated = false;
    public $topic1Example;
    public $topic1ExampleSaved = false;
    public $topic1ExampleFeedback;
    public $topic1ExampleFeedbackGenerating = false;
    public $topic1ExampleFeedbackGenerated = false;
    public $topic2Reason1;
    public $topic2Reason2;
    public $topic2ReasonsFeedback;
    public $topic2ReasonsFeedbackGenerating = false;
    public $topic2ReasonsFeedbackGenerated = false;
    public $topic2ReasonsSaved = false;    
    public $topic2Example;
    public $topic2ExampleSaved = false;
    public $topic2ExampleFeedback;
    public $topic2ExampleFeedbackGenerating = false;
    public $topic2ExampleFeedbackGenerated = false;
    
    public function saveThesisReasons()
    {
        $this->validate([
            'thesis' => 'required',
            'thesisReason1' => 'required',
            'thesisReason2' => 'required',
        ]);

        $this->thesisReasonsSaved = true;
    }

    public function checkForThesis()
    {
        if(session('thesis')) {
            $this->thesis = session('thesis');
            $this->thesisSaved = true;
        }        
    }

    public function saveThesis()
    {
        $this->validate([
            'thesis' => 'required',
        ]);

        $this->thesisSaved = true;
    
    }

    public function generateThesisReasonsFeedback()
    {
        $this->thesisReasonsFeedbackGenerating = true;
        $prompt = "An IELTS student is writing a thesis-driven outline for their Task 2 Essay.
        They have written the following thesis statement: '{$this->thesis}'. 
        I assigned them with the task of providing two reasons to support their thesis.
        Here are the reasons they provided: '{$this->thesisReason1}', and '{$this->thesisReason2}'.
        Provide them with clear and concise feedback on the reasons they provided and whether they directly support
        their thesis statement. If they don't, guide them in the right direction.
        IMPORTANT! You are only giving them feedback regarding the closeness of the relationship between the reasons and the thesis, 
        don't instruct them to give more explanation or examples, that's coming later.
        Address the student directly using 'you' and keep your English level at a 7th grade level so non-native speakers can easily understand.
        Don't write any kind of introduction, signature, or closing.
        Format your response as markdown, use bold and italics where needed, but don't include any outer wrapping like body or html tags.";
        $this->generateTextResponse($prompt, 'thesisReasonsFeedback');

    }

    public function handleThesisReasonsFeedback($responseText)
    {        
        $this->thesisReasonsFeedback = $responseText;
        $this->thesisReasonsFeedbackGenerating = false;
        $this->thesisReasonsFeedbackGenerated = true;
    }

    public function generateTopicSentence1Instruction()
    {
        $this->topicSentence1InstructionGenerating = true;
        $prompt = "An IELTS student is in the process of writing a thesis-driven outline for their Task 2 Essay.
        They have written this supporting reason: '{$this->thesisReason1}' for this thesis '{$this->thesis}'.
        Their task now is to turn that reason into a topic sentence for a body paragraph.
        Please give them clear and concise instructions on how to turn their reason into a topic sentence.
        Address the student directly using 'you' and keep your English level at a 7th grade level so non-native speakers can easily understand.
        Don't write any kind of introduction, signature, or closing.
        Format your response as markdown, use bold and italics where needed, but don't include any outer wrapping like body or html tags.";
        $this->generateTextResponse($prompt, 'topicSentence1Instruction');
    }

    public function handleTopicSentence1Instruction($responseText)
    {
        $this->topicSentence1Instruction = $responseText;
        $this->topicSentence1InstructionGenerating = false;
        $this->topicSentence1InstructionGenerated = true;
    }

    public function generateTopicSentence1Feedback()
    {
        $this->topicSentence1FeedbackGenerating = true;
        $this->validate([
            'topicSentence1' => 'required',
        ]);
        $prompt = "An IELTS student is in the process of writing a thesis-driven outline for their Task 2 Essay.
        They have written this topic sentence: '{$this->topicSentence1}' for this supporting reason: '{$this->thesisReason1}'.
        Please give them clear and concise feedback on the quality of their topic sentence and suggest improvements so they can effectively score highly on Task Achievement 
        and Coherence and Cohesion. Focus here on helping them improve their clarity and addressing the topic, rather than length or their lack of explanation.
        Address the student directly using 'you' and keep your English level at a 7th grade level so non-native speakers can easily understand.
        Don't write any kind of introduction, signature, or closing.
        Format your response as markdown, use bold and italics where needed, but don't include any outer wrapping like body or html tags.";
        $this->generateTextResponse($prompt, 'topicSentence1Feedback');

    }

    public function handleTopicSentence1Feedback($responseText)
    {
        $this->topicSentence1Feedback = $responseText;
        $this->topicSentence1FeedbackGenerating = false;
        $this->topicSentence1FeedbackGenerated = true;
    }

    public function saveTopicSentence1()
    {
        $this->validate([
            'topicSentence1' => 'required',
        ]);

        $this->topicSentence1Saved = true;
    }

    public function generateTopic1ReasonsFeedback()
    {
        $this->topic1ReasonsFeedbackGenerating = true;
        $prompt = "An IELTS student is in the process of writing a thesis-driven outline for their Task 2 Essay.
        They have written the following thesis statement: '{$this->thesis}'.
        For their first body paragraph, they have written the following topic sentence: '{$this->topicSentence1}'. 
        I assigned them with the task of providing two reasons to support this topic sentence.
        Here are the reasons they provided: '{$this->topic1Reason1}', and '{$this->topic1Reason2}'.
        Provide them with clear and concise feedback on the reasons they provided and whether they directly support
        their topic sentence and thesis statement. If they don't, guide them in the right direction.
        IMPORTANT! You are only giving them feedback regarding the closeness of the relationship between the reasons and the thesis, 
        don't instruct them to give more explanation or examples, that's coming later.
        Address the student directly using 'you' and keep your English level at a 7th grade level so non-native speakers can easily understand.
        Don't write any kind of introduction, signature, or closing.
        Format your response as markdown, use bold and italics where needed, but don't include any outer wrapping like body or html tags.";
        $this->generateTextResponse($prompt, 'topic1ReasonsFeedback');
    }

    public function handleTopic1ReasonsFeedback($responseText)
    {
        $this->topic1ReasonsFeedback = $responseText;
        $this->topic1ReasonsFeedbackGenerating = false;
        $this->topic1ReasonsFeedbackGenerated = true;
    }

    public function saveTopic1Reasons()
    {
        $this->topic1Reason1 = $this->topic1Reason1;
        $this->topic1Reason2 = $this->topic1Reason2;
        $this->topic1ReasonsSaved = true;
    }

    public function generateTopic1ExampleInstructions()
    {
        $this->topic1ExampleInstructionsGenerating = true;
        $prompt = "An IELTS student is in the process of writing a thesis-driven outline for their Task 2 Essay.
        They have written the following thesis statement: '{$this->thesis}'.
        For their first body paragraph, they have written the following topic sentence: '{$this->topicSentence1}'. 
        They have provided the following reasons to support this topic sentence: '{$this->topic1Reason1}', and '{$this->topic1Reason2}'.
        Now, they need to provide a concise example, one or two sentences, to support their points.
        Please give them clear and concise instructions on how to provide a relevant example to support their reasons.
        Right now, the student is focused on clarity and relevance, making sure their example directly supports their reasons, topic sentence, and thesis statement.
        Address the student directly using 'you' and keep your English level at a 7th grade level so non-native speakers can easily understand.
        Don't write any kind of introduction, signature, or closing.
        Format your response as markdown, use bold and italics where needed, but don't include any outer wrapping like body or html tags.";
        $this->generateTextResponse($prompt, 'topic1ExampleInstructions');
    }

    public function hanldeTopic1ExampleInstructions($responseText)
    {
        $this->topic1ExampleInstructionsGenerating = false;
        $this->topic1ExampleInstructions = $responseText;
        $this->topic1ExampleInstructionsGenerated = true;
    }

    public function generateTopic1ExampleFeedback()
    {
        $this->topic1ExampleFeedbackGenerating = true;
        $prompt = "An IELTS student is in the process of writing a thesis-driven outline for their Task 2 Essay.
        They have written the following thesis statement: '{$this->thesis}'.
        For their first body paragraph, they have written the following topic sentence: '{$this->topicSentence1}'. 
        They have provided the following reasons to support this topic sentence: '{$this->topic1Reason1}', and '{$this->topic1Reason2}'.
        They have also provided the following example to support their reasons: '{$this->topic1Example}'.
        Please give them clear and concise feedback on the quality of their example and suggest improvements so they can effectively score highly on Task Achievement 
        and Coherence and Cohesion.
        Focus here on helping them improve their clarity and relevance, rather than length or their lack of explanation.
        Address the student directly using 'you' and keep your English level at a 7th grade level so non-native speakers can easily understand.
        Don't write any kind of introduction, signature, or closing.
        Format your response as markdown, use bold and italics where needed, but don't include any outer wrapping like body or html tags.";
        $this->generateTextResponse($prompt, 'topic1ExampleFeedback');
    }

    public function handleTopic1ExampleFeedback($responseText)
    {
        $this->topic1ExampleFeedback = $responseText;
        $this->topic1ExampleFeedbackGenerating = false;
        $this->topic1ExampleFeedbackGenerated = true;
    }

    public function saveTopic1Example()
    {
        $this->topic1Example = $this->topic1Example;
        $this->topic1ExampleSaved = true;
    }

    public function generateTopicSentence2Instruction()
    {
        $this->topicSentence2InstructionGenerating = true;
        $prompt = "An IELTS student is in the process of writing a thesis-driven outline for their Task 2 Essay.
        They have written this supporting reason: '{$this->thesisReason2}' for this thesis '{$this->thesis}'.
        Their task now is to turn that reason into a topic sentence for a body paragraph.
        Please give them clear and concise instructions on how to turn their reason into a topic sentence.
        Address the student directly using 'you' and keep your English level at a 7th grade level so non-native speakers can easily understand.
        Don't write any kind of introduction, signature, or closing.
        Format your response as markdown, use bold and italics where needed, but don't include any outer wrapping like body or html tags.";
        $this->generateTextResponse($prompt, 'topicSentence2Instruction');
    }

    public function handleTopicSentence2Instruction($responseText)
    {
        $this->topicSentence2Instruction = $responseText;
        $this->topicSentence2InstructionGenerating = false;
        $this->topicSentence2InstructionGenerated = true;
    }

    public function generateTopicSentence2Feedback()
    {
        $this->topicSentence2FeedbackGenerating = true;
        // $this->validate([
        //     'topicSentence2' => 'required',
        // ]);
        $prompt = "An IELTS student is in the process of writing a thesis-driven outline for their Task 2 Essay.
        They have written this topic sentence: '{$this->topicSentence2}' for this supporting reason: '{$this->thesisReason2}'.
        Please give them clear and concise feedback on the quality of their topic sentence and suggest improvements so they can effectively score highly on Task Achievement 
        and Coherence and Cohesion. Focus here on helping them improve their clarity and addressing the topic, rather than length or their lack of explanation.
        Address the student directly using 'you' and keep your English level at a 7th grade level so non-native speakers can easily understand.
        Don't write any kind of introduction, signature, or closing.
        Format your response as markdown, use bold and italics where needed, but don't include any outer wrapping like body or html tags.";
        $this->generateTextResponse($prompt, 'topicSentence2Feedback');
    }

    public function handleTopicSentence2Feedback($responseText)
    {
        $this->topicSentence2Feedback = $responseText;
        $this->topicSentence2FeedbackGenerating = false;
        $this->topicSentence2FeedbackGenerated = true;
    }

    public function saveTopicSentence2()
    {
        $this->validate([
            'topicSentence2' => 'required',
        ]);

        $this->topicSentence2 = $this->topicSentence2;

        $this->topicSentence2Saved = true;
    }

    public function generateTopic2ReasonsFeedback()
    {
        $this->topic2ReasonsFeedbackGenerating = true;
        $prompt = "An IELTS student is in the process of writing a thesis-driven outline for their Task 2 Essay.
        They have written the following thesis statement: '{$this->thesis}'.
        For their second body paragraph, they have written the following topic sentence: '{$this->topicSentence2}'. 
        I assigned them with the task of providing two reasons to support this topic sentence.
        Here are the reasons they provided: '{$this->topic2Reason1}', and '{$this->topic2Reason2}'.
        Provide them with clear and concise feedback on the reasons they provided and whether they directly support
        their topic sentence and thesis statement. If they don't, guide them in the right direction.
        IMPORTANT! You are only giving them feedback regarding the closeness of the relationship between the reasons and the thesis, 
        don't instruct them to give more explanation or examples, that's coming later.
        Address the student directly using 'you' and keep your English level at a 7th grade level so non-native speakers can easily understand.
        Don't write any kind of introduction, signature, or closing.
        Format your response as markdown, use bold and italics where needed, but don't include any outer wrapping like body or html tags.";
        $this->generateTextResponse($prompt, 'topic2ReasonsFeedback');
    }

    public function handleTopic2ReasonsFeedback($responseText)
    {
        $this->topic2ReasonsFeedback = $responseText;
        $this->topic2ReasonsFeedbackGenerating = false;
        $this->topic2ReasonsFeedbackGenerated = true;
    }

    public function saveTopic2Reasons()
    {
        $this->topic2Reason1 = $this->topic2Reason1;
        $this->topic2Reason2 = $this->topic2Reason2;
        $this->topic2ReasonsSaved = true;
    }

    public function generateTopic2ExampleFeedback()
    {
        $this->topic2ExampleFeedbackGenerating = true;
        $prompt = "An IELTS student is in the process of writing a thesis-driven outline for their Task 2 Essay.
        They have written the following thesis statement: '{$this->thesis}'.
        For their first body paragraph, they have written the following topic sentence: '{$this->topicSentence2}'. 
        They have provided the following reasons to support this topic sentence: '{$this->topic1Reason1}', and '{$this->topic2Reason2}'.
        They have also provided the following example to support their reasons: '{$this->topic2Example}'.
        Please give them clear and concise feedback on the quality of their example and suggest improvements so they can effectively score highly on Task Achievement 
        and Coherence and Cohesion. Focus here on helping them improve their clarity and relevance, rather than length or their lack of explanation.
        Address the student directly using 'you' and keep your English level at a 7th grade level so non-native speakers can easily understand.
        Don't write any kind of introduction, signature, or closing.
        Format your response as markdown, use bold and italics where needed, but don't include any outer wrapping like body or html tags.";
        $this->generateTextResponse($prompt, 'topic2ExampleFeedback');
    }

    public function handleTopic2ExampleFeedback($responseText)
    {
        $this->topic2ExampleFeedback = $responseText;
        $this->topic2ExampleFeedbackGenerating = false;
        $this->topic2ExampleFeedbackGenerated = true;
    }

    public function saveTopic2Example()
    {
        $this->topic2Example = $this->topic2Example;
        $this->topic2ExampleSaved = true;
    }

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
            case 'thesisReasonsFeedback':                
                $this->handleThesisReasonsFeedback($responseText);
                break;
            case 'topicSentence1Instruction':
                $this->handleTopicSentence1Instruction($responseText);
                break;
            case 'topicSentence2Instruction':
                $this->handleTopicSentence2Instruction($responseText);
                break;
            case 'topicSentence1Feedback':
                $this->handleTopicSentence1Feedback($responseText);
                break;
            case 'topicSentence2Feedback':
                $this->handleTopicSentence2Feedback($responseText);
                break;                        
            case 'topic1ReasonsFeedback':
                $this->handleTopic1ReasonsFeedback($responseText);
                break;
            case 'topic2ReasonsFeedback':
                $this->handleTopic2ReasonsFeedback($responseText);
                break;             
            case 'topic1ExampleInstructions':
                $this->hanldeTopic1ExampleInstructions($responseText);
                break;
            case 'topic1ExampleFeedback':
                $this->handleTopic1ExampleFeedback($responseText);
                break;
            case 'topic2ExampleFeedback':
                $this->handleTopic2ExampleFeedback($responseText);
                break;            
        }
    }

    public function mount()
    {
        $this->checkForThesis();
        $this->userId = auth()->id();
    }
    
    public function render()
    {
        return view('livewire.essays.practice.task-two-outline');
    }
}
