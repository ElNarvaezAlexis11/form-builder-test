<?php

namespace App\Http\Livewire\Painting;

use Livewire\Component;

class Form extends Component
{
    /**
     * | ----------------------------------- |
     * | 
     * | Variables principales 
     * | 
     * | ----------------------------------- |
     */
    public $painting;
    /**
     * | ----------------------------------- |
     * | 
     * | Variables de pivote 
     * | 
     * | ----------------------------------- |
     */
    public $editing = false;


    public function convertToArray($painting): array
    {
        if (!is_null($painting->attributesToArray())  && $painting->attributesToArray() != []) {
            return $painting->attributesToArray();
        }
        return $this->initEmptyProperties();
    }

    private function initEmptyProperties(): array
    {
        return [
            'name'  => '',
            'width'  => '',
            'height' => '',
            'idPainter' => ''
        ];
    }

    /**
     * | -------------------------------------- |
     * | 
     * |  Ciclo de vida del componente
     * | 
     * | -------------------------------------- |
     */
    public function mount($painting)
    {
        $this->painting = $this->convertToArray($painting);
    }

    public function render()
    {
        return view('livewire.painting.form');
    }
}
