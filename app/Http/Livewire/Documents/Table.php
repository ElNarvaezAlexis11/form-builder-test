<?php

namespace App\Http\Livewire\Documents;

use App\Models\Document;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * @author Narvaez Ruiz Alexis
 */
class Table extends Component
{
    use WithPagination;
    
    public $orderBy;

    public function delete(Document $document)
    {
        if (!is_null($document)) {
            $document->delete();
            $this->emit('documentDeleted');
        }
    }

    public function loadDocuments()
    {
        return Document::orderBy($this->orderBy, 'asc')->paginate(10);
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
        return view('livewire.documents.table',[
            'documents' => $this->loadDocuments()
        ]);
    }
}
