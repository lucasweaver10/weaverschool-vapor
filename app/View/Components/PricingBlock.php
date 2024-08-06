<?php

namespace App\View\Components;

use Closure;
use App\Models\Product;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class PricingBlock extends Component
{    
    public $basic;
    public $pro;
    public $premium;
    
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->basic = Product::find(3001);
        $this->pro = Product::find(5001);
        $this->premium = Product::find(7001);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.pricing-block');
    }
}
