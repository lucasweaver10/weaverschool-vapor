<?php

namespace App\View\Components\Buttons\Subscriptions;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StartPro extends Component
{
    public $text;
    public $class;

    public function __construct($text = 'Unlock Pro', $class)
    {
        $this->text = $text;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.buttons.subscriptions.start-pro');
    }
}
