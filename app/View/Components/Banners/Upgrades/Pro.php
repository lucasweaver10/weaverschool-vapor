<?php

namespace App\View\Components\Banners\Upgrades;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Pro extends Component
{
    protected $product;
    public $description;
    /**
     * Create a new component instance.
     */
    public function __construct($description = 'Unlock all features by upgrading to Weaver School Pro')
    {
        $this->product = Product::find(5001);
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.banners.upgrades.pro', [
            'product' => $this->product
        ]);
    }
}
