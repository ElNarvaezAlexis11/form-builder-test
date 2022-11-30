{{-- Formulario para agregar pinturas a la base de datos --}}
<x-jet-form-section submit="save">
    <x-slot name="title">
        {{ __('Agregar una nueva pintura') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Rellene todos los campos requeridos.') }}
    </x-slot>

    <x-slot name="form">
        <!-- BEGIN INPUT OF ID_PAINTER -->
        <section class="col-span-5 flex flex-wrap w-full ">
            <x-jet-label class="w-full mb-3" for="name">Search painter's name</x-jet-label>
            <!-- BEGIN VALUE SELECTED -->
            @if ($painting['idPainter'])
            <small class="text-slate-500 flex justify-between items-center">
                <span>
                    Id selected is {{ __($painting['idPainter']) }}
                </span>
            </small>
            @endif
            <!-- END VALUE SELECTED -->
            <x-jet-input type="text" class="w-full" id="idPainter" wire:model="searchPainterTo" placeholder="Search painter's name" />
            <!-- Sub list of painter-->
            <div class="w-full my-3">
                <ul>
                    @foreach ($painters as $painter)
                    <li wire:click="$set('painting.idPainter',{{$painter->id}})" class="cursor-pointer hover:bg-gray-200 px">
                        <small class="text-slate-500 flex justify-between items-center">
                            <span>
                                {{ __($painter->id) }} {{ __($painter->name) }}
                            </span>
                            @if ($painting['idPainter'] == $painter->id)
                            <span class="mr-3 text-base text-green-500">
                                <i class="bi bi-check"></i>
                            </span>
                            @endif
                        </small>
                    </li>
                    @endforeach
                </ul>
            </div>
            <!-- Sub list of painter-->
            <x-jet-input-error for="painting.idPainter" />
        </section>
        <!-- END INPUT OF ID_PAINTER -->

        <!--BEGIN INPUT OF NAME -->
        <section class="col-span-5 flex flex-wrap w-full ">
            <x-jet-label class="w-full mb-3" for="name">Name</x-jet-label>
            <x-jet-input type="text" class="w-full" id="name" wire:model.lazy="painting.name" value="{{$painting['name']}}" />
            <x-jet-input-error for="painting.name" />
        </section>
        <!-- END INPUT OF NAME -->

        <!-- BEGIN INPUT OF WIDTH -->
        <section class="col-span-5 flex flex-wrap w-full ">
            <x-jet-label class="w-full mb-3" for="width">Width</x-jet-label>
            <x-jet-input type="number" class="w-full" id="width" wire:model.lazy="painting.width" />
            <x-jet-input-error for="painting.width" />
        </section>
        <!-- END INPUT OF WIDTH -->

        <!-- BEGIN INPUT OF HEIGHT -->
        <section class="col-span-5 flex flex-wrap w-full ">
            <x-jet-label class="w-full mb-3" for="height">Height</x-jet-label>
            <x-jet-input type="number" class="w-full" id="height" wire:model.lazy="painting.height" />
            <x-jet-input-error for="painting.height" />
        </section>
        <!-- END INPUT OF HEIGHT -->

    </x-slot>
    <x-slot name="actions">
        <section class="flex flex-wrap justify-end w-full px-2 pb-3">
            <x-jet-action-message on="paintingSaved" class="flex items-center pr-3">
                <x-jet-label class="text-green-500 my-auto">La pintura se a gaurdado exitosamente :)</x-jet-label>
            </x-jet-action-message>
            <x-jet-action-message on="save" class="flex items-center pr-3" wire:loading.delay wire:target="save">
                <x-jet-label class="text-orange-500 my-auto">Loading...</x-jet-label>
            </x-jet-action-message>
            <x-jet-button>Enviar datos</x-jet-button>
        </section>
    </x-slot>
</x-jet-form-section>