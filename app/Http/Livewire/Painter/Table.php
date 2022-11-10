<?php

namespace App\Http\Livewire\Painter;

use App\Models\Painter;
use Illuminate\Pagination\LengthAwarePaginator;
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
    public function loadPainters(): LengthAwarePaginator
    {
        return Painter::orderBy($this->orderBy)
            ->paginate(10);
    }

    public function delete(Painter $painter)
    {
        if(!is_null($painter)){
            $painter->delete();
            $this->emit('painterDeleted');
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
        return view('livewire.painter.table', [
            'painters' => $this->loadPainters()
        ]);
    }
}
