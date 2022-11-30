<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class SelectMultiple extends Component
{
    public $baseName;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($baseName)
    {
        $this->baseName = $baseName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.select-multiple');
    }
}
