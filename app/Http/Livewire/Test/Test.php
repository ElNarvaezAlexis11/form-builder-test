<?php

namespace App\Http\Livewire\Test;

use Livewire\Component;

class Test extends Component
{
    public $props;

    public function mount($props = [])
    {
        $this->props = $props;
    }

    public function render()
    {
        return view('livewire.test.test');
    }
}
