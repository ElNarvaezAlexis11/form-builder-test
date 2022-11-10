<?php

namespace App\Http\Livewire\Forms;

use App\Models\Form;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * @author Narvaez Ruiz Alexis
 */
class Table extends Component
{

    use WithPagination;
    
    public $orderBy;

    public function delete(Form $form)
    {
        if (!is_null($form)) {
            $form->delete();
            $this->emit('formDeleted');
        }
    }

    public function loadForms()
    {
        return Form::orderBy($this->orderBy, 'asc')->paginate(10);
    }

    /**
     * | ---------------------------------------| 
     * | 
     * | Funciones del ciclo de vida 
     * | 
     * | ---------------------------------------| 
     */

    public function mount()
    {
        $this->orderBy = 'id';
    }

    public function render()
    {
        return view('livewire.forms.table',[
            'forms' => $this->loadForms()
        ]);
    }
}
