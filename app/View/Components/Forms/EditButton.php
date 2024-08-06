<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class EditButton extends Component
{
    /**
     * The button text.
     *
     * @var string
     */
    public $text;

    /**
     * The button type.
     *
     * @var string
     */
    public $type;

    /**
     * The livewire click function.
     *
     * @var string
     */
    public $livewireFunction;

    /**
     * The alpine click function.
     *
     * @var string
     */
    public $alpineFunction;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($text, $type = null, $livewireFunction = null, $alpineFunction = null)
    {
        $this->text = $text;
        $this->type = $type;
        $this->livewireFunction = $livewireFunction;
        $this->alpineFunction = $alpineFunction;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.edit-button');
    }
}
