<?php

namespace App\Http\Livewire\Books;

use App\Models\Book;
use Livewire\Component;

/**
 *@author Narvaez Ruiz Alexis
 */
class Table extends Component
{
    public Book $books;

    public function render()
    {
        \Faker\Factory::create()->uuid();

        return view("livewire.books.table");
    }
}
