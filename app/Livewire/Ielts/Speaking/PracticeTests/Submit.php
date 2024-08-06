<?php

namespace App\Livewire\Ielts\Speaking\PracticeTests;

use App\Livewire\AudioRecorder;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;
use App\Models\SpeakingPracticeTestSubmission;
use App\Models\SpeakingPracticeTestQuestionSubmission;

class Submit extends Component
{
    
    public $test;
    public $testSubmission = null;
    public $identifier;

    #[On('audio-processed')]
    public function handleAudio($audioPath, $identifier)
    {
        $user = auth()->user();
        $submissionCount = count(auth()->user()->speakingPracticeTestSubmissions()->get());
        if ($submissionCount >= 1) {
            if (!($user->hasSubscriptionLevel($user->id, 'pro'))) {
                return redirect()
                    ->route('exam-prep.' . strtolower($this->test->type) . '-coach.info', ['locale' => session('locale', 'en')])
                    ->with('error', "You're out of trial submissions. Upgrade to Pro to continue using this tool.");
            }
        }
        
        $question =  $this->test->questions->find($identifier);
        
        $speechSuperService = new \App\Services\SpeechSuperService();

        $questionPrompt =  $question->text;
        $testType = 'ielts';
        $taskType = $question->part;
        $userId = auth()->user()->id;        

        $response = json_decode($speechSuperService->assessPronunciation($audioPath, $questionPrompt, $testType, $taskType, $userId), true);

        if (isset($response['error'])) {            
            $this->dispatch('audio-error', identifier: $this->identifier);
            $this->dispatch('error', message: $response['error']);           
            return;
        }
        
        if(!$this->testSubmission) {
            $this->testSubmission = SpeakingPracticeTestSubmission::create([
                'speaking_practice_test_id' => $this->test->id,
                'type' => $this->test->type,
                'exam' => $this->test->exam,                
                'user_id' => $userId,                
            ]);            
        }

        $questionSubmission = SpeakingPracticeTestQuestionSubmission::create([
            'speaking_practice_test_submission_id' => $this->testSubmission->id,
            'speaking_practice_test_id' => $this->test->id,
            'speaking_practice_test_question_id' => $identifier,
            'user_id' => $userId,
            'audio_path' => $audioPath,            
            'score' => $response['result']['overall'],
            'transcription' => $response['result']['transcription'],
            'evaluation' => json_encode($response['result']),
        ]);

        $this->dispatch('audio-saved', identifier: $identifier)->to(AudioRecorder::class);
        $this->dispatch('success', message: 'Answer saved');

    }

    public function submitTest()
    {        
        if(!$this->testSubmission) {
            $this->dispatch('success', message: 'Please record your answers before submitting');            
        } elseif ($this->checkCompletion()) {            
            $this->dispatch('success', message: 'Test submitted successfully');
            $this->redirectRoute('dashboard.exam-prep.' . strtolower($this->test->type) . '.speaking.practice-tests.feedback.show', ['locale' => session('locale', 'en'), 'id' => $this->testSubmission->id]);
        } else {
            $this->dispatch('success', message: 'Please complete all questions before submitting');
        }
    }

    public function checkCompletion()
    {
        if (count($this->testSubmission->questionSubmissions) == $this->test->questions->count()) {
            // All questions have been submitted
            return true;
        } else {
            return false;
        }
    }
    
    public function render()
    {
        return view('livewire.ielts.speaking.practice-tests.submit');
    }
}
