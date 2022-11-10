{{-- Vista para responder un formulario a la base de datos --}}
@extends('users.forms.main')
@section('body')

@section('header-scripts')
<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdn.form.io/formiojs/formio.full.min.css'>
<script src='https://cdn.form.io/formiojs/formio.full.min.js'></script>
@endsection

<section class="main">
    <div class="container-form" id="container-form">
        <h3 class="text-lg font-medium text-gray-900">{{$form->title}}</h3>
        <div class="formio" id="formio"></div>
        <livewire:forms.store-hidden />
    </div>
</section>

@section('end-scripts')
    @vite('resources/js/events/forms/create.js')
    <script type="module">
        import createForm from "{{ Vite::asset('resources/js/events/forms/create.js') }}";

        const FORM_ID_CURRENT = "{{$form->id}}";
        
        document.addEventListener('DOMContentLoaded', function() {
            createForm.initFormDOM( @json($form->form) , FORM_ID_CURRENT );
        });
    </script>
@endsection

@endsection