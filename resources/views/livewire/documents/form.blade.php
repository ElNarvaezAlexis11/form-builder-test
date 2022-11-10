{{-- Formulario para agregar Documenbtos a la base de datos --}}
<x-jet-form-section submit="save">
    <x-slot name="title">
        {{ __('Agregar un nuevo Documento') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Rellene todos los campos requeridos.') }}
    </x-slot>

    <x-slot name="form">
        <!--BEGIN INPUT OF TITLE -->
        <section class="col-span-5 flex flex-wrap w-full ">
            <x-jet-label class="w-full mb-3" for="title">Title</x-jet-label>
            <x-jet-input type="text" class="w-full" id="title" wire:model.lazy="document.title" value="{{$document['title']}}" />
            <x-jet-input-error for="document.title" />
        </section>
        <!-- END INPUT OF TITLE -->
    </x-slot>
    <x-slot name="actions">
        <section class="flex flex-wrap justify-end w-full px-2 pb-3">
            <x-jet-action-message on="documentSaved" class="flex items-center pr-3">
                <x-jet-label class="text-green-500 my-auto">El documento se a gaurdado exitosamente :)</x-jet-label>
            </x-jet-action-message>
            <x-jet-action-message on="save" class="flex items-center pr-3" wire:loading.delay wire:target="save" >
                <x-jet-label class="text-orange-500 my-auto">Loading...</x-jet-label>
            </x-jet-action-message>
            <x-jet-button>Enviar datos</x-jet-button>
        </section>
    </x-slot>
</x-jet-form-section>