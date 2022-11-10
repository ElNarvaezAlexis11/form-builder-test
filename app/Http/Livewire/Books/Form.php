<?php

namespace App\Http\Livewire\Books;

use App\Http\Requests\BookRequest;
use App\Models\Book;
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
    public $book;
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
        return (new BookRequest())->rules();
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
            $book = Book::find($this->book['id']);
            $book->fill($this->book);
            $book->save();
        }else{
            Book::create($this->book);
        }
        $this->emit('bookSaved');
        $this->book = $this->initEmptyProperties();
        $this->resetErrorBag();

        if ($this->editing) {
            $this->redirect(route('books.index'));
        }
    }

    public function convertToArray($book) : array
    {
        if(!is_null($book->attributesToArray())  && $book->attributesToArray() != []){
            return $book->attributesToArray();
        }
        return $this->initEmptyProperties();
    }

    private function initEmptyProperties() : array
    {
        return [
            'title' => '',
            'release' => '',
            'resume' => ''
        ];
    }

    /**
     * | -------------------------------------- |
     * | 
     * |  Ciclo de vida del componente
     * | 
     * | -------------------------------------- |
     */
    public function mount($book)
    {
        $this->book = $this->convertToArray($book);
    }

    public function render()
    {
        return view('livewire.books.form');
    }
}
