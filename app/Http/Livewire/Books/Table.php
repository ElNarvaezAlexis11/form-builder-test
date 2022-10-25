<?php

namespace App\Http\Livewire\Books;

use App\Models\Book;
use Livewire\Component;

/**
 * @author Narvaez Ruiz Alexis
 */
class Table extends Component
{
    public $books;


    public function delete(Book $book)
    {
        if (!is_null($book)) {
            $book->delete();
            $this->emit('book-deleted');
            $this->books = Book::all();
        }
    }

    public function load()
    {
        $this->books = Book::all();
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
        // $this->books = null;
        $this->load();

    }

    public function render()
    {
        return view("livewire.books.table");
    }
}
