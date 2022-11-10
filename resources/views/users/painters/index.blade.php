@extends('users.painters.main')
@section('body')
<x-jet-section-title>
    <x-slot name="title"> {{ __('Tabla de Pintores') }}</x-slot>
    <x-slot name="description">{{ __('Listado de todos los Pintores') }}</x-slot>
    <x-slot name="aside">
        <livewire:painter.table />
    </x-slot>
</x-jet-section-title>
@endsection