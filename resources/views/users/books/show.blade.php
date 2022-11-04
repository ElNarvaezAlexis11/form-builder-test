{{-- Vista para mostrar la informacion del libro registrado en la base de datos  --}}
@extends('users.books.main')
@section('body')
<x-jet-action-section>
    <x-slot name="title">
        {{ __('Información de libro') }} - {{$book->id}}
    </x-slot>
    <x-slot name="description">
        {{ __('Resumen de la informacion del libro.') }}
    </x-slot>
    <x-slot name="content">
        <section class="">
            <h3 class="text-lg font-medium text-gray-900">Titulo</h3>
            <div class="mt-3 max-w-xl text-sm text-gray-600">
                <p>{{__($book->title)}}</p>
            </div>
        </section>
        <section class="mt-5">
            <h4 class="text-md font-medium text-gray-900">Resume</h4>
            <div class="mt-3 max-w-xl text-sm text-gray-600">
                <p>{{__($book->resume)}}</p>
            </div>
        </section>
        <section class="mt-5">
            <h5 class="text-base font-medium text-gray-900">Record Date</h5>
            <div class="mt-3 max-w-xl text-sm text-gray-600">
                <p>{{$book->created_at}}</p>
            </div>
        </section>
        <section class="mt-5">
            <x-jet-button type="button" x-init={} @click="window.location.href=`{{route('books.index')}}`">Regresar</x-jet-button>
        </section>
    </x-slot>
</x-jet-action-section>
@endsection
