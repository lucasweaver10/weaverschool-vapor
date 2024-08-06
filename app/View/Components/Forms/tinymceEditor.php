<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class tinymceEditor extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $name;
    public $greeting;
    public $content;

    public function __construct($name, $greeting, $content = null)
    {
        $this->name = $name;
        $this->greeting = $greeting;
        $this->content = $content;
    }



    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.tinymce-editor');
    }
}
