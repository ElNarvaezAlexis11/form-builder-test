{{-- Vista para mostrar la informacion del libro registrado en la base de datos  --}}
@extends('users.painters.main')
@section('body')
<x-jet-action-section>
    <x-slot name="title">
        {{ __('Información del pintor') }} - {{$painter->id}}
    </x-slot>
    <x-slot name="description">
        {{ __('Resumen de la informacion del pintor.') }}
    </x-slot>
    <x-slot name="content">
        <section class="">
            <h3 class="text-lg font-medium text-gray-900">Name</h3>
            <div class="mt-3 max-w-xl text-sm text-gray-600">
                <p>{{__($painter->name)}}</p>
            </div>
        </section>
        <!-- BEGIN CONTAINER NANEM, AWARDS AND RECORD DATE -->
        <div class="flex justify-between mt-5">
            <section class="">
                <h4 class="text-md font-medium text-gray-900">Age</h4>
                <div class="mt-3 max-w-xl text-sm text-gray-600">
                    <p>{{__($painter->age)}}</p>
                </div>
            </section>
            <section class="">
                <h4 class="text-md font-medium text-gray-900">Awards</h4>
                <div class="mt-3 max-w-xl text-sm text-gray-600">
                    <p>{{__($painter->awards)}}</p>
                </div>
            </section>
            <section class="">
                <h4 class="text-md font-medium text-gray-900">Record Date</h4>
                <div class="mt-3 max-w-xl text-sm text-gray-600">
                    <p>{{$painter->created_at}}</p>
                </div>
            </section>
        </div>
        <!-- END CONTAINER NANEM, AWARDS AND RECORD DATE -->
        
        <!-- BEGIN CONATINER BUTTON -->
        <section class="mt-5">
            <x-jet-button type="button" x-init={} @click="window.location.href=`{{route('painters.index')}}`">Regresar</x-jet-button>
        </section>
        <!-- END CONATINER BUTTON -->
    </x-slot>
</x-jet-action-section>
@endsection