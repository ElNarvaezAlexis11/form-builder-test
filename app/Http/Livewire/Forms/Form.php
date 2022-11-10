<?php

namespace App\Http\Livewire\Forms;

use App\Http\Requests\StoreFormRequest;
use App\Models\Form as ModelsForm;
use Livewire\Component;

class Form extends Component
{
    public $form;

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
        return (new StoreFormRequest())->rules();
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
        if($this->editing){
            $form = ModelsForm::find($this->form['id']);
            $form->fill($this->form);
            $form->save();
        }else{
            $this->form['id'] = \Faker\Factory::create()->uuid;
            ModelsForm::create($this->form);
        }
        $this->emit('formSaved');
        $this->form = $this->initEmptyProperties();
        $this->resetErrorBag();

        if ($this->editing) {
            $this->redirect(route('form.index'));
        }
    }

    public function convertToArray($form) : array
    {
        if(!is_null($form->attributesToArray())  && $form->attributesToArray() != []){
            return $form->attributesToArray();
        }
        return $this->initEmptyProperties();
    }

    private function initEmptyProperties() : array
    {
        return [
            'title' => '',
            'form' => '',
        ];
    }

    /**
     * | -------------------------------------- |
     * | 
     * |  Ciclo de vida del componente
     * | 
     * | -------------------------------------- |
     */
    public function mount($form)
    {
        $this->form = $this->convertToArray($form);
    }

    public function render()
    {
        return view('livewire.forms.form');
    }
}
