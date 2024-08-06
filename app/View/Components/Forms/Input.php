<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Input extends Component
{
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
     * The input type.
     *
     * @var string
     */
    public $type;

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
     * The input value.
     *
     * @var string
     */
    public $value;

    /**
     * Optional wire:model attribute.
     *
     * @var string
     */
    public $wireModel;

    /**
     * Optional x-model attribute.
     *
     * @var string
     */
    public $xModel;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $for, $type, $id, $wireModel = null, $xModel = null, $name = null, $value = null)
    {
        $this->label = $label;
        $this->for = $for;
        $this->type = $type;
        $this->name = $name;
        $this->id = $id;
        $this->value = $value;
        $this->wireModel = $wireModel;
        $this->xModel = $xModel;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.input');
    }
}
