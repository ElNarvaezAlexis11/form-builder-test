<section class="max-w-screen-md">
    <!-- BEGIN INPUT SEARCH -->
    <div class="px-4 mb-3 flex items-center justify-end w-full container-serach-field" x-data="{ focus: false }">
        <x-jet-input type="text" placeholder="buscar elementos" id="search-field" x-on:blur="focus = (document.getElementById('search-field').value)? true :false" x-show="focus" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-x-90" x-transition:enter-end="opacity-100 scale-x-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-x-100" x-transition:leave-end="opacity-0 scale-x-90" />
        <x-jet-label class="ml-4" for="search-field" @click="focus = true">
            <i class="bi bi-search"></i>
        </x-jet-label>
    </div>
    <!-- END INPUT SEARCH -->
    <x-table.table>
        <x-slot name="header">
            <th class="px-4 py-3 cursor-pointer" colspan="1"></th>
            <th class="px-4 py-3 cursor-pointer" colspan="1" wire:click="$set('orderBy','id')">
                <div class="w-full flex justify-between items-center">
                    <span>ID</span>
                    @if($orderBy === 'id')
                    <i class="bi bi-sort-alpha-down"></i>
                    @else
                    <i class="bi bi-sort-alpha-down-alt"></i>
                    @endif
                </div>
            </th>
            <th class="px-4 py-3 cursor-pointer" colspan="1" wire:click="$set('orderBy','name')">
                <div class="w-full flex justify-between items-center">
                    <span>Name</span>
                    @if($orderBy === 'name')
                    <i class="bi bi-sort-alpha-down"></i>
                    @else
                    <i class="bi bi-sort-alpha-down-alt"></i>
                    @endif
                </div>
            </th>
            <th class="px-4 py-3 cursor-pointer" colspan="1" wire:click="$set('orderBy','width')">
                <div class="w-full flex justify-between items-center">
                    <span>Width</span>
                    @if($orderBy === 'width')
                    <i class="bi bi-sort-alpha-down"></i>
                    @else
                    <i class="bi bi-sort-alpha-down-alt"></i>
                    @endif
                </div>
            </th>
            <th class="px-4 py-3 cursor-pointer" colspan="1" wire:click="$set('orderBy','height')">
                <div class="w-full flex justify-between items-center">
                    <span>Height</span>
                    @if($orderBy === 'height')
                    <i class="bi bi-sort-alpha-down"></i>
                    @else
                    <i class="bi bi-sort-alpha-down-alt"></i>
                    @endif
                </div>
            </th>
            <th class="px-4 py-3 cursor-pointer" colspan="1" wire:click="$set('orderBy','idPainter')">
                <div class="w-full flex justify-between items-center">
                    <span>Painter ID</span>
                    @if($orderBy === 'idPainter')
                    <i class="bi bi-sort-numeric-down"></i>
                    @else
                    <i class="bi bi-sort-numeric-down-alt"></i>
                    @endif
                </div>
            </th>
            <th class="px-4 py-3 cursor-pointer" colspan="1" wire:click="$set('orderBy','created_at')">
                <div class="w-full flex justify-between items-center">
                    <span>Record Date</span>
                    @if($orderBy === 'created_at')
                    <i class="bi bi-sort-numeric-down"></i>
                    @else
                    <i class="bi bi-sort-numeric-down-alt"></i>
                    @endif
                </div>
            </th>
            <th class="px-4 py-3 cursor-pointer" colspan="1"></th>
        </x-slot>
        <x-slot name="content">
            @forelse($paintings as $painting)
            <x-table.trow type="">
                <x-table.tdata>
                    <x-jet-checkbox />
                </x-table.tdata>
                <x-table.tdata>{{$painting->id}}</x-table.tdata>
                <x-table.tdata>{{$painting->name}}</x-table.tdata>
                <x-table.tdata>{{$painting->width}}</x-table.tdata>
                <x-table.tdata>{{$painting->height}}</x-table.tdata>
                <x-table.tdata>
                    <a href="{{ route('painters.show',$painting->idPainter) }}" target="_blank" class="hover:text-blue-500 hover:underline">
                        {{$painting->idPainter}}
                    </a>
                </x-table.tdata>
                <x-table.tdata>{{$painting->created_at}}</x-table.tdata>
                <x-table.tdata>
                    <x-jet-dropdown align="right" width="60" dropdownClasses="!z-50">
                        <x-slot name="trigger">
                            <i class="bi bi-three-dots-vertical"></i>
                        </x-slot>
                        <x-slot name="content">
                            <div class="">
                                <x-jet-dropdown-link href="{{route('paintings.edit',$painting->id )}}" class="flex">
                                    <span class="text-base mr-1 text-yellow-400 font-black">
                                        <i class="bi bi-pen"></i>
                                    </span>{{ __('Edit') }}
                                </x-jet-dropdown-link>
                                <x-jet-dropdown-link href="{{route('paintings.show',$painting->id)}}" class="flex">
                                    <span class="text-base mr-1 text-blue-400 font-black">
                                        <i class="bi bi-eye"></i>
                                    </span>{{ __('Show') }}
                                </x-jet-dropdown-link>
                                <x-jet-dropdown-link wire:click="delete({{$painting->id}})" class="flex cursor-pointer">
                                    <span class="text-base mr-1 text-red-400 font-black">
                                        <i class="bi bi-trash"></i>
                                    </span>{{__('Delete') }}
                                </x-jet-dropdown-link>
                            </div>
                        </x-slot>
                    </x-jet-dropdown>
                </x-table.tdata>
            </x-table.trow>
            @empty
            <x-jet-label>{{__('No hay nada por mostrar')}}</x-jet-label>
            @endforelse
        </x-slot>
    </x-table.table>
    <section class="mt-5">
        {{$paintings->links()}}
    </section>
</section>