<section>
    <x-jet-form-section submit="save">
        <x-slot name="title">
            {{ __('Agregar un nuevo Fomrulario') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Rellene todos los campos requeridos.') }}
        </x-slot>

        <x-slot name="form">
            <!--BEGIN INPUT OF TITLE -->
            <section class="col-span-5 flex flex-wrap w-full ">
                <x-jet-label class="w-full mb-3" for="title">Title</x-jet-label>
                <x-jet-input type="text" class="w-full" id="title" wire:model.lazy="form.title" value="{{$form['title']}}" />
                <x-jet-input-error for="form.title" />
            </section>
            <!-- END INPUT OF TITLE -->
            <!--BEGIN INPUT OF FORM-JSON -->
            <section class="col-span-5 flex flex-wrap w-full ">
                <x-jet-label class="w-full mb-3" for="form-json">Form</x-jet-label>
                <x-jet-input type="hidden" class="w-full" id="form-json" wire:model="form.form" value="{{$form['form']}}" />
                <x-jet-input-error for="form.form" />
            </section>
            <!-- END INPUT OF FORM-JSON -->
        </x-slot>
        <x-slot name="actions">
            <section class="flex flex-wrap justify-end w-full px-2 pb-3">
                <x-jet-action-message on="documentSaved" class="flex items-center pr-3">
                    <x-jet-label class="text-green-500 my-auto">El formulario se a guardado exitosamente :)</x-jet-label>
                </x-jet-action-message>
                <x-jet-action-message on="save" class="flex items-center pr-3" wire:loading.delay wire:target="save">
                    <x-jet-label class="text-orange-500 my-auto">Loading...</x-jet-label>
                </x-jet-action-message>
                <x-jet-button>Enviar datos</x-jet-button>
            </section>
        </x-slot>
    </x-jet-form-section>
    <div class="container w-full mt-12" wire:ignore>
        <div class="formio" id="formio"></div>
    </div>
</section>
@section('end-scripts')
    @vite('resources/js/events/forms/index.js')
    <script type="module">
        import formProperties from "{{ Vite::asset('resources/js/events/forms/index.js') }}";
        
        document.addEventListener('DOMContentLoaded', function() {
            let livewireComponent = @this; 
            formProperties.initForm(livewireComponent);
        });
    </script>
@endsection