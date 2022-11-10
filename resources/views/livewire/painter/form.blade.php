{{-- Formulario para agregar pintores a la base de datos --}}
<x-jet-form-section submit="save">
    <x-slot name="title">
        {{ __('Agregar un nuevo pintor') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Rellene todos los campos requeridos.') }}
    </x-slot>

    <x-slot name="form">
        <!--BEGIN INPUT OF NAME -->
        <section class="col-span-5 flex flex-wrap w-full ">
            <x-jet-label class="w-full mb-3" for="name">Name</x-jet-label>
            <x-jet-input type="text" class="w-full" id="name" wire:model.lazy="painter.name" value="{{$painter['name']}}" />
            <x-jet-input-error for="painter.name" />
        </section>
        <!-- END INPUT OF NAME -->
        <!-- BEGIN INPUT OF AGE -->
        <section class="col-span-5 flex flex-wrap w-full ">
            <x-jet-label class="w-full mb-3" for="age">Age</x-jet-label>
            <x-jet-input type="number" class="w-full" id="age" wire:model.lazy="painter.age" value="{{$painter['age']}}" />
            <x-jet-input-error for="painter.age" />
        </section>
        <!-- END INPUT OF AGE -->
       <!-- BEGIN INPUT OF AWARDS -->
       <section class="col-span-5 flex flex-wrap w-full ">
            <x-jet-label class="w-full mb-3" for="awards">Awards</x-jet-label>
            <x-jet-input type="number" class="w-full" id="awards" wire:model.lazy="painter.awards" value="{{$painter['awards']}}" />
            <x-jet-input-error for="painter.awards" />
        </section>
        <!-- END INPUT OF AWARDS -->

    </x-slot>
    <x-slot name="actions">
        <section class="flex flex-wrap justify-end w-full px-2 pb-3">
            <x-jet-action-message on="painterSaved" class="flex items-center pr-3">
                <x-jet-label class="text-green-500 my-auto">El pintor se a registrado exitosamente :) </x-jet-label>
            </x-jet-action-message>
            <x-jet-action-message on="save" class="flex items-center pr-3" wire:loading.delay wire:target="save" >
                <x-jet-label class="text-orange-500 my-auto">Loading...</x-jet-label>
            </x-jet-action-message>
            <x-jet-button>Enviar datos</x-jet-button>
        </section>
    </x-slot>
</x-jet-form-section>
