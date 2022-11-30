<?php

namespace App\Http\Livewire\Painting;

use App\Http\Requests\StorePaintingRequest;
use App\Models\Painter;
use App\Models\Paintings;
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
    public $searchPainterTo = ''; 
    /**
     * | -------------------------------------- |
     * |
     * | Cadenas de Consultas 
     * |
     * | -------------------------------------- |
     */
    protected $queryString = [
        'searchPainterTo' => ['except' => ''],
    ];

    /**
     * | -------------------------------------- |
     * |
     * | Reglas de Validacion
     * |
     * | -------------------------------------- |
     */
    public function rules()
    {
        return (new StorePaintingRequest())->rules();
    }
    /**
     * | -------------------------------------- |
     * |
     * | Funciones
     * |
     * | -------------------------------------- |
     */
    public function save()
    {
        $this->validate();
        if ($this->editing) {
            $painting = Paintings::find($this->painting['id']);
            dump($painting);
            $painting->fill($this->painting);
            $painting->save();
        } else {
            Paintings::create($this->painting);
        }
        $this->emit('paintingSaved');
        $this->painting = $this->initEmptyProperties();
        $this->resetErrorBag();

        if ($this->editing) {
            $this->redirect(route('paintings.index'));
        }
    }

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

    public function loadPainters()
    {
        return Painter::where('name', 'like', '%' . $this->searchPainterTo . '%')
                    ->limit(5)
                    ->get();
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
        return view('livewire.painting.form',[
            'painters' => $this->loadPainters()
        ]);
    }
}
