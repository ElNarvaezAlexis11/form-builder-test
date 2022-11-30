<?php

namespace App\Http\Livewire\Painting;

use App\Models\Paintings;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $orderBy;

    /**
     * | ---------------------------------------| 
     * | 
     * | Funciones 
     * | 
     * | ---------------------------------------| 
     */

    public function loadPaintings(): LengthAwarePaginator
    {
        return Paintings::orderBy($this->orderBy)
            ->paginate(10);
    }

    public function delete(Paintings $painter)
    {
        if (!is_null($painter)) {
            $painter->delete();
            $this->emit('paintingDeleted');
        }
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
        return view('livewire.painting.table', [
            'paintings' => $this->loadPaintings()
        ]);
    }
}
