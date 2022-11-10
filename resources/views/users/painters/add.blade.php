{{-- Vista para agregar un nuevo pintor a la base de datos --}}
@extends('users.painters.main')
@section('body')
    <livewire:painter.form :painter="new App\Models\Painter()" />
@endsection