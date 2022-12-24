<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MultiSelect extends Component
{
    public $id;
    public $selecteds;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $selecteds = [])
    {
        $this->id = $id;
        $this->selecteds = json_encode($selecteds);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.multi-select');
    }
}
