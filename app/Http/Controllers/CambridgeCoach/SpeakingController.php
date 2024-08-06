<?php

namespace App\Http\Controllers\CambridgeCoach;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SpeakingPracticeTest;
use App\Models\SpeakingPracticeTestSubmission;

class SpeakingController extends Controller
{
    public function index()
    {
        $pro = Product::find(5001);
        $tests = SpeakingPracticeTest::where('exam', 'cambridge')->get();
        return view('dashboard.exam-prep.cambridge.speaking.practice-tests.index', compact('tests', 'pro'));
    }

    public function submit($locale, $id)
    {
        $test = SpeakingPracticeTest::with('questions')->findOrFail($id);

        return view('dashboard.exam-prep.cambridge.speaking.practice-tests.submit', compact('test'));
    }

    public function feedbackIndex()
    {
        $submissions = auth()->user()->speakingPracticeTestSubmissions()->with('test')->where('exam', 'Cambridge')->get();
        return view('dashboard.exam-prep.cambridge.speaking.practice-tests.feedback.index', compact('submissions'));
    }

    public function feedbackShow($locale, $id)
    {
        $user = auth()->user();
        $submissionCount = count(auth()->user()->speakingPracticeTestSubmissions()->get());
        if ($submissionCount > 1) {
            if (!($user->hasSubscriptionLevel($user->id, 'pro'))) {
                return redirect()
                    ->route('exam-prep.cambridge-coach.info', ['locale' => session('locale', 'en')])
                    ->with('error', 'You need to upgrade to Weaver School Pro to continue using this tool.');
            }
        }

        $submission = SpeakingPracticeTestSubmission::with(['test', 'questionSubmissions'])->find($id);
        $overallScores = [];
        $relevanceScores = [];
        $pronunciationScores = [];
        $lexicalResourceScores = [];
        $grammarScores = [];

        foreach ($submission->questionSubmissions as $questionSubmission) {
            if ($questionSubmission->evaluation) {
                $evaluation = json_decode($questionSubmission->evaluation);

                $overallScores[] = $evaluation->overall;
                $relevanceScores[] = $evaluation->relevance;
                $pronunciationScores[] = $evaluation->pronunciation;
                $lexicalResourceScores[] = $evaluation->lexical_resource;
                $grammarScores[] = $evaluation->grammar;
                $fluencyScores[] = $evaluation->fluency_coherence;
            }
        }

        $averageScores = [
            'overall' => $overallScores ? array_sum($overallScores) / count($overallScores) : null,
            'relevance' => $relevanceScores ? array_sum($relevanceScores) / count($relevanceScores) : null,
            'pronunciation' => $pronunciationScores ? array_sum($pronunciationScores) / count($pronunciationScores) : null,
            'lexical_resource' => $lexicalResourceScores ? array_sum($lexicalResourceScores) / count($lexicalResourceScores) : null,
            'grammar' => $grammarScores ? array_sum($grammarScores) / count($grammarScores) : null,
            'fluency_coherence' => $grammarScores ? array_sum($fluencyScores) / count($fluencyScores) : null,
        ];

        return view('dashboard.exam-prep.cambridge.speaking.practice-tests.feedback.show', compact('submission', 'averageScores'));
    }
}
