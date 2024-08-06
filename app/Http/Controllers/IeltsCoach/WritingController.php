<?php

namespace App\Http\Controllers\IeltsCoach;

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
        return view('dashboard.exam-prep.ielts.writing.submit', compact('basic', 'pro'));
    }

    public function index()
    {
        $essays = EssaySubmission::where('user_id', auth()->user()->id)
            ->where('type', 'ielts')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard.exam-prep.ielts.writing.index', compact('essays'));
    }

    public function show($locale, $id)
    {
        $essay = EssaySubmission::findOrFail($id);
        return view('dashboard.exam-prep.ielts.writing.show', compact('essay'));
    }

    public function progress()
    {
        $userId = auth()->id();

        $submissions = EssaySubmission::selectRaw('avg(score) as avg_score, MONTH(created_at) as month')
        ->where('user_id', $userId)
            ->where('type', 'ielts')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();


        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $scores = array_fill(0, 12, null); // Initialize all months with 0

        foreach ($submissions as $submission) {
            $scores[$submission->month - 1] = $submission->avg_score;
        }

        return view('dashboard.exam-prep.ielts.writing.progress.show', ['labels' => $months, 'values' => $scores]);
    }

    public function thesis()
    {
        $product = Product::find(1001);
        return view('dashboard.exam-prep.ielts.writing.practice.thesis', compact('product'));
    }

    public function introduction()
    {
        $product = Product::find(1001);
        return view('dashboard.exam-prep.ielts.writing.practice.introduction', compact('product'));
    }

    public function taskTwoOutline()
    {
        $product = Product::find(1001);
        return view('dashboard.exam-prep.ielts.writing.practice.task-two-outline', compact('product'));
    }

    public function success()
    {
        $basic = Product::find(3001);
        $pro = Product::find(5001);

        return view('dashboard.exam-prep.ielts.writing.success', compact('basic', 'pro'));
    }

}
