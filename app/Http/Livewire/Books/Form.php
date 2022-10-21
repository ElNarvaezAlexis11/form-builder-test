<?php

namespace App\Http\Livewire\Books;

use App\Models\Book;
use Livewire\Component;

/**
 * @author Narvaez 
 */
class Form extends Component
{
    public Book $book; # new Book();

    protected $rules = [
        'book.title' => 'required',
        'book.release' => 'required',
        'book.resume' => 'required'
    ];

    public function save()
    {
        $this->validate();
        $this->book->save();
        $this->emit('bookSaved');
        $this->book = new Book();
        $this->resetErrorBag();
        //$this->reset('book.title','book.release','book.resume');
    }

    public function mount()
    {
        $this->book = new Book();
    }

    public function render()
    {
        return view('livewire.books.form');
    }
}
