<section>
<x-table.table class="">
    <x-slot name="header">
        <th class="px-4 py-3"></th>
        <th class="px-4 py-3">ID</th>
        <th class="px-4 py-3">Title</th>
        <th class="px-4 py-3">Resume</th>
        <th class="px-4 py-3">Record Date</th>
        <th class="px-4 py-3"></th>
    </x-slot>
    <x-slot name="content">
        @forelse($books as $book)
            <x-table.trow type="">
                    <x-table.tdata>
                        <x-jet-checkbox />
                    </x-table.tdata>
                    <x-table.tdata>{{$book->id}}</x-table.tdata>
                    <x-table.tdata>{{$book->title}}</x-table.tdata>
                    <x-table.tdata>{{$book->resume}}</x-table.tdata>
                    <x-table.tdata>{{$book->created_at}}</x-table.tdata>
                    <x-table.tdata>
                        <x-jet-dropdown align="right" width="60" dropdownClasses="!z-50">
                            <x-slot name="trigger">
                                <x-icons.three-dots-vertical />
                            </x-slot>
                            <x-slot name="content">
                                <div class="">
                                    <x-jet-dropdown-link href="" class="flex">
                                        <x-icons.pen class="text-xs mr-1 text-yellow-400"/>{{ __('Edit') }}
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="" class="flex">
                                        <x-icons.eye class="text-xs mr-1 text-blue-400"  />{{ __('Show') }}
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link wire:click="delete({{$book->id}})" class="flex cursor-pointer">
                                        <x-icons.trash class="text-xs mr-1 text-red-400" />{{__('Delete') }}
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
        {{__("Paginacion")}}
    </section>
</section>
