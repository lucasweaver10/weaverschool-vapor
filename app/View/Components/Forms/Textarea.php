<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Textarea extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    /**
     * The input label.
     *
     * @var string
     */
    public $label;

    /**
     * The input label for.
     *
     * @var string
     */
    public $for;

    /**
     * The input name.
     *
     * @var string
     */
    public $name;

    /**
     * The input id.
     *
     * @var string
     */
    public $id;

    /**
     * The textarea content.
     *
     * @var string
     */
    public $text;

    public function __construct($label, $for, $name, $id, $text)
    {
        $this->label = $label;
        $this->for = $for;
        $this->name = $name;
        $this->id = $id;
        $this->text =  $text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.textarea');
    }
}
