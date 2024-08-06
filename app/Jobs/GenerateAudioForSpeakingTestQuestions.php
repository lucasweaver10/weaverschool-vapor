<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Models\SpeakingPracticeTest;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GenerateAudioForSpeakingTestQuestions implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 120;
    public $tries = 3;

    public $testId;
    public $voiceId;

    /**
     * Create a new job instance.
     */
    public function __construct($testId, $voiceId)
    {
        $this->testId = $testId;
        $this->voiceId = $voiceId;
    }    

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $test = SpeakingPracticeTest::find($this->testId);
        foreach($test->questions as $question) {
            GenerateTestQuestionAudioWithElevenLabs::dispatch($question->id, $this->voiceId);
        }
    }
}
