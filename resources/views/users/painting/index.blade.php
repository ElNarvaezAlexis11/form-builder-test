@extends('users.painting.main')
@section('body')
<x-jet-section-title>
    <x-slot name="title"> {{ __('Tabla de pinturas') }}</x-slot>
    <x-slot name="description">{{ __('Listado de todos las pinturas') }}</x-slot>
    <x-slot name="aside">
        <livewire:painting.table />
    </x-slot>
</x-jet-section-title>
@endsection