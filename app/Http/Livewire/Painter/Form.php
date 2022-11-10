<?php

namespace App\Http\Livewire\Painter;

use App\Http\Requests\PainterRequest;
use App\Models\Painter;
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
    public $painter;
    /**
     * | ----------------------------------- |
     * | 
     * | Variables de pivote 
     * | 
     * | ----------------------------------- |
     */
    public $editing = false;

    /**
     * | -------------------------------------- |
     * |
     * | Reglas de Validacion
     * |
     * | -------------------------------------- |
     */
    public function rules()
    {
        return (new PainterRequest())->rules();
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
            $painter = Painter::find($this->painter['id']);
            $painter->fill($this->painter);
            $painter->save();
        } else {
            Painter::create($this->painter);
        }
        $this->emit('painterSaved');
        $this->painter = $this->initEmptyProperties();
        $this->resetErrorBag();

        if ($this->editing) {
            $this->redirect(route('painters.index'));
        }
    }

    public function convertToArray($painter): array
    {
        if (!is_null($painter->attributesToArray())  && $painter->attributesToArray() != []) {
            return $painter->attributesToArray();
        }
        return $this->initEmptyProperties();
    }

    private function initEmptyProperties(): array
    {
        return [
            'name' => '',
            'age' => '',
            'awards' => ''
        ];
    }
    /**
     * | -------------------------------------- |
     * | 
     * |  Ciclo de vida del componente
     * | 
     * | -------------------------------------- |
     */
    public function mount($painter)
    {
        $this->painter = $this->convertToArray($painter);
    }

    public function render()
    {
        return view('livewire.painter.form');
    }
}
