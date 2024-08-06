<?php

namespace App\Http\Controllers;

use App\Models\IeltsEssaySubmission;
use Illuminate\Http\Request;

class EssayController extends Controller
{
    public function index()
    {
        $essays = IeltsEssaySubmission::where('user_id', auth()->user()->id)->get();
        return view('dashboard.essays.index', compact('essays'));
    }

    public function show($locale, $id)
    {
        $essay = IeltsEssaySubmission::findOrFail($id);
        return view('dashboard.essays.show', compact('essay'));
    }
}
