{{-- Vista para editar formulario a la base de datos --}}
@extends('users.forms.main')
@section('body')

    @section('header-scripts')
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css'>
        <link rel='stylesheet' href='https://cdn.form.io/formiojs/formio.full.min.css'>
        <script src='https://cdn.form.io/formiojs/formio.full.min.js'></script>
    @endsection

    <livewire:forms.form :form="$form" :editing="true"/>

    @section('end-scripts')
        @vite('resources/js/events/forms/index.js')
    @endsection
    
@endsection