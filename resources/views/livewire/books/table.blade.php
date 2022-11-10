<section class="max-w-screen-md">
    <div class="px-4 mb-3 flex items-center justify-end w-full container-serach-field" x-data="{ focus: false }">
        <x-jet-input type="text" placeholder="buscar elementos" id="search-field" x-on:blur="focus = (document.getElementById('search-field').value)? true :false" x-show="focus" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-x-90" x-transition:enter-end="opacity-100 scale-x-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-x-100" x-transition:leave-end="opacity-0 scale-x-90" />
        <x-jet-label class="ml-4" for="search-field" @click="focus = true">
            <x-icons.search />
        </x-jet-label>
    </div>
    <x-table.table>
        <x-slot name="header">
            <th class="px-4 py-3 cursor-pointer" colspan="1"></th>
            <th class="px-4 py-3 cursor-pointer" colspan="1" wire:click="$set('orderBy','id')">
                <div class="w-full flex justify-between items-center">
                    <span>ID</span>
                    @if($orderBy === 'id')
                    <x-icons.sort-alpha-down />
                    @else
                    <x-icons.sort-alpha-down-alt />
                    @endif
                </div>
            </th>
            <th class="px-4 py-3 cursor-pointer" colspan="1" wire:click="$set('orderBy','title')">
                <div class="w-full flex justify-between items-center">
                    <span>Title</span>
                    @if($orderBy === 'title')
                    <x-icons.sort-alpha-down />
                    @else
                    <x-icons.sort-alpha-down-alt />
                    @endif
                </div>
            </th>
            <th class="px-4 py-3 cursor-pointer" colspan="1" wire:click="$set('orderBy','resume')">
                <div class="w-full flex justify-between items-center">
                    <span>Resume</span>
                    @if($orderBy === 'resume')
                    <x-icons.sort-alpha-down />
                    @else
                    <x-icons.sort-alpha-down-alt />
                    @endif
                </div>
            </th>
            <th class="px-4 py-3 cursor-pointer" colspan="1" wire:click="$set('orderBy','created_at')">
                <div class="w-full flex justify-between items-center">
                    <span>Record Date</span>
                    @if($orderBy === 'created_at')
                    <x-icons.sort-numeric-down />
                    @else
                    <x-icons.sort-numeric-down-alt />
                    @endif
                </div>
            </th>
            <th class="px-4 py-3 cursor-pointer" colspan="1"></th>
        </x-slot>
        <x-slot name="content">
            @forelse($books as $book)
            <x-table.trow type="">
                <x-table.tdata>
                    <x-jet-checkbox />
                </x-table.tdata>
                <x-table.tdata>{{$book->id}}</x-table.tdata>
                <x-table.tdata>{{$book->title}}</x-table.tdata>
                <x-table.tdata>{{substr($book->resume,0,75)}}...</x-table.tdata>
                <x-table.tdata>{{$book->created_at}}</x-table.tdata>
                <x-table.tdata>
                    <x-jet-dropdown align="right" width="60" dropdownClasses="!z-50">
                        <x-slot name="trigger">
                            <x-icons.three-dots-vertical />
                        </x-slot>
                        <x-slot name="content">
                            <div class="">
                                <x-jet-dropdown-link href="{{route('books.edit',$book->id )}}" class="flex">
                                    <x-icons.pen class="text-xs mr-1 text-yellow-400 font-black" />{{ __('Edit') }}
                                </x-jet-dropdown-link>
                                <x-jet-dropdown-link href="{{route('books.show',$book->id)}}" class="flex">
                                    <x-icons.eye class="text-xs mr-1 text-blue-400 font-black" />{{ __('Show') }}
                                </x-jet-dropdown-link>
                                <x-jet-dropdown-link wire:click="delete({{$book->id}})" class="flex cursor-pointer">
                                    <x-icons.trash class="text-xs mr-1 text-red-400 font-black" />{{__('Delete') }}
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
        {{$books->links()}}
    </section>
</section>