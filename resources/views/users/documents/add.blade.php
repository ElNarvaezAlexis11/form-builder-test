{{-- Vista para agregar un nuevo documento a la base de datos --}}
@extends('users.documents.main')
@section('body')
    <livewire:documents.form :document="new App\Models\Document()" />
@endsection