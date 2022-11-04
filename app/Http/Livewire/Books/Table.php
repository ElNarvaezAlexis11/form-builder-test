<?php

namespace App\Http\Livewire\Books;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * @author Narvaez Ruiz Alexis
 */
class Table extends Component
{
    use WithPagination;

    public $orderBy;

    public function delete(Book $book)
    {
        if (!is_null($book)) {
            $book->delete();
            $this->emit('book-deleted');
            // $this->books = Book::all();
        }
    }

    public function loadBooks()
    {
        return Book::orderBy($this->orderBy, 'asc')->paginate(10);
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
        return view("livewire.books.table", [
            'books' => $this->loadBooks()
        ]);
    }
}
