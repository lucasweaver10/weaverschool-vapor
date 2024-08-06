<?php

namespace App\View\Components\Carousels;

use App\Models\Teacher;
use Illuminate\View\Component;

class Teachers extends Component
{
    public $subcategoryId;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($subcategoryId)
    {        
        $this->subcategoryId = $subcategoryId;
    }
    
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {   
        $teachers = Teacher::where('active', true)->where('subcategory_id', $this->subcategoryId)->get()->shuffle();

        return view('components.carousels.teachers', ['teachers' => $teachers]);
    }
}
