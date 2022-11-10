@extends('users.forms.main')
@section('body')
<x-jet-section-title>
    <x-slot name="title"> {{ __('Forms Table') }}</x-slot>
    <x-slot name="description">{{ __('List of all the forms') }}</x-slot>
    <x-slot name="aside">
        <livewire:forms.table />
    </x-slot>
</x-jet-section-title>
@endsection