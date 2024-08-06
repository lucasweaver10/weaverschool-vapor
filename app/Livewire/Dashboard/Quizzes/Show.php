<?php

namespace App\Livewire\Dashboard\Quizzes;

use Carbon\Carbon;
use App\Models\Quiz;
use Livewire\Component;
use App\Models\QuizAnswer;
use App\Models\BonusPoints;
use App\Models\Registration;
use App\Models\LessonProgress;
use App\Models\QuizAssignment;
use App\Models\QuizSubmission;

class Show extends Component
{
    public $quiz;
    public $answerChoice;
    public $answerChoiceId;
    public $answerChoiceValue;
    public $correctAnswer;
    public $userAnswerText;
    public $visibleQuestion = 0;
    public $answerChoices = [];
    public $totalPoints;
    public $pointValue;
    public $totalQuestions;
    public $assignmentId;
    public $bonusQuestionIds;
    public $earnedBonusPoints = 0;
    public $score = 0;
    public $total = 0;

    protected $queryString = ['assignmentId'];

    protected $rules = [
        'answerChoiceId' => 'required|min:2',
        'userAnswerText' => 'required|min:1'
    ];

    public function processAnswerChoice()
    {
        $this->validateOnly('answerChoiceId');

        $this->answerChoice = QuizAnswer::where('id', $this->answerChoiceId)->with('question')->first();
        $this->correctAnswer = QuizAnswer::where('quiz_question_id', $this->answerChoice->question->id)->where('point_value', 1)->first();

        $newAnswer = [
          'question' => $this->answerChoice->question->text,
          'answer' => $this->answerChoice->text,
          'correct_answer' => $this->correctAnswer->text,
          'points' => $this->answerChoice->point_value,
          'possible_points' => $this->answerChoice->question->possible_points,
          'is_correct' => ($this->answerChoice->point_value == $this->answerChoice->question->possible_points),
        ];

        $this->answerChoices[] = $newAnswer;

        $this->total++;

            if ($newAnswer['is_correct']) {
                $this->score++;
            }

        if($this->answerChoice->point_value == $this->answerChoice->question->possible_points)
        {
            $this->showCorrectResponse();

            if($this->bonusQuestionIds->contains($this->answerChoice->question->id))
            {
                $this->showBonus();

                $this->addBonusPoint();
            }

        }
        else
        {
            $this->showIncorrectResponse();
        }

        $this->totalPoints = $this->totalPoints + $this->answerChoice->point_value;

        $this->answerChoiceId = '';

        $this->visibleQuestion = $this->visibleQuestion + 1;

    }

    public function processTextAnswerChoice($id)
    {
        $this->validateOnly('userAnswerText');

        $answerChoice = QuizAnswer::where('id', $id)->with('question')->first();
        $this->correctAnswer = QuizAnswer::where('quiz_question_id', $answerChoice->question->id)->where('point_value', 1)->first();

        if(strtoupper(trim($this->userAnswerText)) === strtoupper($answerChoice->text)) {
            $this->totalPoints = $this->totalPoints + $answerChoice->point_value;
            $this->pointValue = $answerChoice->point_value;

            $this->showCorrectResponse();

            if($this->bonusQuestionIds->contains($this->answerChoice->question->id))
            {
                $this->showBonus();

                $this->addBonusPoint();
            }
        }
        else  {
            $this->pointValue = 0;
            $this->showIncorrectResponse();
        }

        $newAnswer = [
            'question' => $answerChoice->question->text,
            'answer' => $this->userAnswerText,
            'correct_answer' => $this->correctAnswer->text,
            'points' => $this->pointValue,
            'possible_points' => $answerChoice->question->possible_points,
            'is_correct' => ($this->pointValue === $answerChoice->question->possible_points),
        ];

        $this->answerChoices[] = $newAnswer;

        $this->total++;

            if ($newAnswer['is_correct']) {
                $this->score++;
            }

        $this->userAnswerText = '';

        $this->pointValue = '';

        $this->visibleQuestion = $this->visibleQuestion + 1;
    }

    public function submitQuiz()
    {
        if($this->answerChoices)
        {
            $grade = $this->score / $this->total * 10;

            $submission = new QuizSubmission();
            $submission->quiz_id = $this->quiz->id;
            $submission->user_id = auth()->user()->id;
            $submission->results = json_encode($this->answerChoices);
            $submission->grade = $grade;
            $submission->save();

            $progress = LessonProgress::where('lesson_id', $submission->quiz->lesson_id)->where('user_id', auth()->id())->firstOrFail();

            $progress->update([
                'quiz_grade' => $submission->grade,
                'lesson_grade' => ($progress->guided_practice_grade * 0.15 + $progress->free_practice_grade * 0.35 + $submission->grade * 0.5),
            ]);
        }

        session()->flash('success', 'Quiz submitted!');

        return redirect()->to('/' . session('locale', 'en') . '/dashboard/courses/' . $this->quiz->lesson->course->id . '/lessons/' . $this->quiz->lesson->id . '/quiz/results');
    }

    public function showCorrectResponse()
    {
        $this->dispatch('answered-correctly');

        session()->flash('answered-correctly');
    }

    public function showIncorrectResponse()
    {
        $this->dispatch('answered-incorrectly');

        session()->flash('answered-incorrectly');
    }

    public function addBonusPoint()
    {
        $this->earnedBonusPoints++;
    }

    public function showBonus()
    {
        session()->flash('bonus', 'Congrats, you earned a bonus point!');
    }

    public function storeBonusPoints()
    {
        $quizAssignment = QuizAssignment::find($this->assignmentId);

        $bonusPoints = BonusPoints::where('registration_id', $quizAssignment->registration_id)->first();

        if ($bonusPoints == null)
            {
                BonusPoints::create([
                    'total' => $this->earnedBonusPoints,
                    'registration_id' => $quizAssignment->registration_id,
                ]);
            }
        else
            {
                $bonusPoints->update([
                    'total' => $bonusPoints->total + $this->earnedBonusPoints,
                ]);
            }

    }

    public function mount()
    {
        if($this->quiz->questions->count() > 1 )
        {
            $this->bonusQuestionIds = $this->quiz->questions->random(2)->pluck('id');
        }
        else {
            $this->bonusQuestionIds = $this->quiz->questions->random(1)->pluck('id');
        }
    }

    public function render()
    {
        $this->totalQuestions = count($this->quiz->questions);

        return view('livewire.dashboard.quizzes.show');
    }
}
