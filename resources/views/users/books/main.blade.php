<x-app-layout>
    @section('header-scripts')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @endsection
    <x-slot name="header">
        <div class="container-sub-header flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Books') }}
            </h2>
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex h-100">
                <x-jet-nav-link href="{{ route('books.index') }}" :active="request()->routeIs('books.index')">
                    {{ __('Main') }}
                </x-jet-nav-link>
                <x-jet-nav-link href="{{ route('books.create') }}" :active="request()->routeIs('books.create')">
                    {{ __('Add') }}
                </x-jet-nav-link>
            </div>
        </div>
    </x-slot>
    <x-app.main-container>
        <div class="p-7">
            @yield('body')
        </div>
    </x-app.main-container>

    @section('end-scripts')
        <script>
        Livewire.on('book-deleted',e=>{
            Swal.fire({
                position: 'bottom-end',
                icon: 'success',
                title: 'Libro eliminado',
                showConfirmButton: false,
                timer: 1500,
                toast:true
            });
        });
        </script>
    @endsection

</x-app-layout>
