<?php

namespace App\Http\Controllers;

use App\Models\EssayCorrection;
use Illuminate\Http\Request;

class EssayCorrectionController extends Controller
{
    public function index()
    {
        $corrections = EssayCorrection::where('user_id', auth()->user()->id)->get();
        return view('dashboard.essays.corrections.index', compact('corrections'));
    }

    public function show($locale, $id)
    {
        $correction = EssayCorrection::findOrFail($id);
        return view('dashboard.essays.corrections.show', compact('correction'));
    }
}
