<?php

namespace App\Http\Livewire\Documents;

use App\Http\Requests\DocumentRequest;
use App\Models\Document;
use Livewire\Component;

/**
 * @author Narvaez 
 */
class Form extends Component
{
     /**
     * | ----------------------------------- |
     * | 
     * | Variables principales 
     * | 
     * | ----------------------------------- |
     */
    public $document;
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
        return (new DocumentRequest())->rules();
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
            $document = Document::find($this->document['id']);
            $document->fill($this->document);
            $document->save();
        }else{
            $this->document['id'] = \Faker\Factory::create()->uuid;
            Document::create($this->document);
        }
        $this->emit('documentSaved');
        $this->document = $this->initEmptyProperties();
        $this->resetErrorBag();

        if ($this->editing) {
            $this->redirect(route('documents.index'));
        }
    }

    public function convertToArray($document) : array
    {
        if(!is_null($document->attributesToArray())  && $document->attributesToArray() != []){
            return $document->attributesToArray();
        }
        return $this->initEmptyProperties();
    }

    private function initEmptyProperties() : array
    {
        return [
            'title' => '',
        ];
    }
     /**
     * | -------------------------------------- |
     * | 
     * |  Ciclo de vida del componente
     * | 
     * | -------------------------------------- |
     */
    public function mount($document)
    {
        $this->document = $this->convertToArray($document);
    }

    public function render()
    {
        return view('livewire.documents.form');
    }
}
