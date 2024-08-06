<?php

namespace App\Livewire;

use App\Models\DutchLevelTestSubmission;
use App\Models\LevelTestAnswerSubmission;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Models\User;
//use App\Models\LevelTest;
use App\Models\LevelTestAnswer;
use App\Models\LevelTestSubmission;
use Illuminate\Support\Collection;

class LevelTest extends Component
{
    public $step = -1;
    public $score;
    public $level;
    public $maxPoints;
    public $progress = 0;
    public $questions;
    public $levelTest;
    public $levelTestId;
    public $selectedAnswer;
    public $answerChoice;
    public $answerChoices = [];

    protected $listeners = [];

    public function addAnswerChoice($question)
    {
        if ($question['type'] === 'text') {
            $answerChoice = [
                'question_text' => $question['text'],
                'text' => $this->selectedAnswer,
                'point_value' => '0'
            ];
        }

        else {
            $answer = LevelTestAnswer::find($this->selectedAnswer);
            $answerChoice = [
                'question_text' => $question['text'],
                'text' => $answer->text,
                'point_value' => $answer->point_value
            ];
        }

        $this->answerChoices[$question['id']] = $answerChoice;
        $this->updateProgress();
        $this->selectedAnswer = '';
    }

    public function updateScore()
    {
        $this->maxPoints = $this->levelTest->questions->sum('possible_points');
        $answerCollection = collect($this->answerChoices);
        $this->score = $answerCollection->sum('point_value');

        if($this->levelTestId == 1) {
            $this->calculateLevel($this->score);
        }
        else {
            $this->calculateDutchLevel($this->score);
        }
    }

    public function updateProgress()
    {
        $this->progress = count($this->answerChoices)/count($this->levelTest->questions) * 100;
    }

    public function submitForm()
    {
        $this->updateScore();
        $this->step = 'submitted';
        $this->saveForm();
    }

    public function saveForm()
    {
        $answerCollection = collect($this->answerChoices);
        $keyed = $answerCollection->mapWithKeys(function ($fields)
        {
            return [$fields['question_text'] => $fields['text']];
        });

        $fields = ($keyed->all());

//        dd($answerCollection);

        if ($this->levelTest->id == 1)
        {
            $data = [
                'level_test_id' => $this->levelTest->id,
                'email' => $fields['What is your email?'],
                'score' => $this->score,
                'level' => $this->level
            ];

            foreach($answerCollection as $answer)
            {
                LevelTestAnswerSubmission::create([
                    'level_test_id' => $this->levelTest->id,
                    'email' => $fields['What is your email?'],
                    'question' => $answer['question_text'],
                    'answer' => $answer['text'],
                    'point_value' => $answer['point_value'],
                ]);
            }

        } else
        {
            $data = [
                'level_test_id' => $this->levelTest->id,
                'email' => $fields['Wat is jouw e-mail?'],
                'score' => $this->score,
                'level' => $this->level
            ];

            foreach($answerCollection as $answer)
            {
                LevelTestAnswerSubmission::create([
                    'level_test_id' => $this->levelTest->id,
                    'email' => $fields['Wat is jouw e-mail?'],
                    'question' => $answer['question_text'],
                    'answer' => $answer['text'],
                    'point_value' => $answer['point_value'],
                ]);
            }
        }

        $levelTestSubmission = LevelTestSubmission::create($data);

//        $this->emailResults($data);

//        $this->saveToAirTable($fields, $data);

//        User::saveLevelTestResult($data);

    }

    public function emailResults($data) {
        LevelTestSubmission::emailLevelTestResults($data);
    }

    public function saveToAirtable($fields, $data)
    {
        $key = env('AIRTABLE_KEY');
        $baseUrl = 'https://api.airtable.com/v0/';
        $baseId = 'appWtsuiDkivAgvjq';
        $submissionsUrl = '/Submissions';
        $scoresUrl = '/Scores';

        $response = Http::withToken($key)->post($baseUrl . $baseId . $submissionsUrl, [ "fields" => $fields ]);

        // Save Scores to airtable: Currently get 422 unprocessable entity: Will fix later //
        // $response = Http::withToken($key)->post($baseUrl . $baseId . $scoresUrl, [ "fields" => $data ]);
    }

    public function calculateLevel($score)
    {
        if ($score > 22 ) {
            $this->level =  'C1';
        }
        elseif ($score < 23 and $score > 17) {
            $this->level = 'B2';
        }
        elseif ($score < 18 and $score > 13) {
            $this->level = 'B1';
        }
        elseif ($score < 14 and $score > 9)
        {
            $this->level = 'A2';
        }
        elseif ($score < 10 and $score > 5) {
            $this->level = 'A1';
        }
        elseif ($score < 6 or $score == 0) {
            $this->level = 'A0';
        }
        else {
            $this->level = 'Unknown';
        }
    }

    public function calculateDutchLevel($score)
    {
        if ($score > 34 ) {
            $this->level =  'C1';
        }
        elseif ($score < 35 and $score > 26) {
            $this->level = 'B2';
        }
        elseif ($score < 27 and $score > 21) {
            $this->level = 'B1';
        }
        elseif ($score < 22 and $score > 15)
        {
            $this->level = 'A2';
        }
        elseif ($score < 16 and $score > 8) {
            $this->level = 'A1';
        }
        elseif ($score < 9 ) {
            $this->level = 'A0';
        }
        else {
            $this->level = 'Unknown';
        }
    }

    public function render()
    {
        return view('livewire.level-test');
    }
}

// $table->unsignedInteger('level_test_id');
//             $table->string('first_name');
//             $table->string('last_name');
//             $table->string('email');
//             $table->unsignedInteger('score');
