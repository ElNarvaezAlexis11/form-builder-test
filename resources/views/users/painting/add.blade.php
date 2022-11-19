{{-- Vista para agregar un nueva pintura a la base de datos --}}
@extends('users.painting.main')
@section('body')
    <livewire:painting.form :painting="new App\Models\Paintings()" />
@endsection
