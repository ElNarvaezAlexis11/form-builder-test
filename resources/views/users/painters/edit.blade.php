{{-- Vista para agregar un nuevo libro a la base de datos --}}
@extends('users.painters.main')
@section('body')
    <livewire:painter.form :painter="$painter" :editing="true" />
@endsection