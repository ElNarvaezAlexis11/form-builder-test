@extends('users.books.main')
@section('body')
<x-jet-section-title>
    <x-slot name="title"> {{ __('Tabla de libros') }}</x-slot>
    <x-slot name="description">{{ __('Listado de todos los libros') }}</x-slot>
    <x-slot name="aside">
        <livewire:books.table />
    </x-slot>
</x-jet-section-title>
@endsection
