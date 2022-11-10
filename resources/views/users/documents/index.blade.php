@extends('users.documents.main')
@section('body')
<x-jet-section-title>
    <x-slot name="title"> {{ __('Documents Table') }}</x-slot>
    <x-slot name="description">{{ __('List of all the documents') }}</x-slot>
    <x-slot name="aside">
        <livewire:documents.table />
    </x-slot>
</x-jet-section-title>
@endsection