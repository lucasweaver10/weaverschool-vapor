<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class EssayPracticeController extends Controller
{
    public function thesis()
    {
        $product = Product::find(1001);
        return view('dashboard.essays.practice.thesis', compact('product'));
    }

    public function introduction()
    {
        $product = Product::find(1001);
        return view('dashboard.essays.practice.introduction', compact('product'));
    } 

    public function taskTwoOutline()
    {
        $product = Product::find(1001);
        return view('dashboard.essays.practice.task-two-outline', compact('product'));
    }
}
