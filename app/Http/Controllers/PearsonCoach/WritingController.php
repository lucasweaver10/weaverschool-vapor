<?php

namespace App\Http\Controllers\PearsonCoach;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\EssaySubmission;
use App\Http\Controllers\Controller;

class WritingController extends Controller
{
    public function create()
    {
        $basic = Product::find(3001);
        $pro = Product::find(5001);
        return view('dashboard.exam-prep.pearson.writing.submit', compact('basic', 'pro'));
    }

    public function index()
    {
        // get all essays submitted by the authenticated user
        $essays = EssaySubmission::where('user_id', auth()->user()->id)
            ->where('type', 'pearson')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard.exam-prep.pearson.writing.index', compact('essays'));
    }

    public function show($locale, $id)
    {
        // get essay with id $id
        $essay = EssaySubmission::findOrFail($id);
        return view('dashboard.exam-prep.pearson.writing.show', compact('essay'));
    }

    public function progress()
    {
        // get authenticated user id
        $userId = auth()->id();

        // get average score of essays submitted by the authenticated user
        $submissions = EssaySubmission::selectRaw('avg(score) as avg_score, MONTH(created_at) as month')
            ->where('user_id', $userId)
            ->where('type', 'pearson')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // months array
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        // scores array
        $scores = array_fill(0, 12, null); // Initialize all months with 0

        // fill scores array with average scores
        foreach ($submissions as $submission) {
            $scores[$submission->month - 1] = $submission->avg_score;
        }

        return view('dashboard.exam-prep.pearson.writing.progress.show', ['labels' => $months, 'values' => $scores]);
    }

    public function success()
    {
        $basic = Product::find(3001);
        $pro = Product::find(5001);
        return view('dashboard.exam-prep.pearson.writing.success', compact('basic', 'pro'));
    }
}
