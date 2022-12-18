{{-- Vista para agregar un nuevo formulario a la base de datos --}}
@extends('users.forms.main')
@section('body')

    @section('header-scripts')
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css'>
        <link rel='stylesheet' href='https://cdn.form.io/formiojs/formio.full.min.css'>
        @vite('resources/js/users/forms/formio.full.min.js')
    @endsection

    <livewire:forms.form :form="new App\Models\Form()" />

    @section('end-scripts')
        @vite('resources/js/events/forms/index.js')
    @endsection
    
@endsection