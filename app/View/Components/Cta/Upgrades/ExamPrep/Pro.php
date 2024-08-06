<?php

namespace App\View\Components\Cta\Upgrades\ExamPrep;

use Closure;
use App\Models\Product;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Pro extends Component
{    
   
    /**
     * Create a new component instance.
     */
    public function __construct()
    {        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $basic = Product::find('3001');
        $pro = Product::find('5001');
        return view('components.cta.upgrades.exam-prep.pro', ['basic' => $basic, 'pro' => $pro]);
    }
}
