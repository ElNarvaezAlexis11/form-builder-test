{{-- Vista para agregar un nuevo libro a la base de datos --}}
@extends('users.books.main')
@section('body')
    <livewire:books.form :book="new App\Models\Book()" />
@endsection
