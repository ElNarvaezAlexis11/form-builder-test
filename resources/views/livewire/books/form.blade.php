{{-- Formulario para agregar libros a la base de datos --}}
<x-jet-form-section submit="save">
    <x-slot name="title">
        {{ __('Agregar un nuevo libro') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Rellene todos los campos requeridos.') }}
    </x-slot>

    <x-slot name="form">
        <!--BEGIN INPUT OF TITLE -->
        <section class="col-span-5 flex flex-wrap w-full ">
            <x-jet-label class="w-full mb-3" for="title">Title</x-jet-label>
            <x-jet-input type="text" class="w-full" id="title" wire:model.lazy="book.title" value="{{$book['title']}}" />
            <x-jet-input-error for="book.title" />
        </section>
        <!-- END INPUT OF TITLE -->
        <!-- BEGIN INPUT OF RELEASE -->
        <section class="col-span-5 flex flex-wrap w-full ">
            <x-jet-label class="w-full mb-3" for="release">Release</x-jet-label>
            <x-jet-input type="date" class="w-full" id="release" wire:model.lazy="book.release" value="{{date('Y-m-d',strtotime($book['release']))}}" />
            <x-jet-input-error for="book.release" />
        </section>
        <!-- END INPUT OF RELEASE -->

        <section class="col-span-5 flex flex-wrap w-full ">
            <x-jet-label class="w-full mb-3" for="resume">Resume</x-jet-label>
            <x-forms.textarea id="resume" class="w-full" wire:model.lazy="book.resume">{{$book['resume']}}</x-forms.textarea>
            <x-jet-input-error for="book.resume" />
        </section>
    </x-slot>
    <x-slot name="actions">
        <section class="flex flex-wrap justify-end w-full px-2 pb-3">
            <x-jet-action-message on="bookSaved" class="flex items-center pr-3">
                <x-jet-label class="text-green-500 my-auto">El libro se a gaurdado exitosamente :)</x-jet-label>
            </x-jet-action-message>
            <x-jet-action-message on="save" class="flex items-center pr-3" wire:loading.delay wire:target="save" >
                <x-jet-label class="text-orange-500 my-auto">Loading...</x-jet-label>
            </x-jet-action-message>
            <x-jet-button>Enviar datos</x-jet-button>
        </section>
    </x-slot>
</x-jet-form-section>