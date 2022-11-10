<x-app-layout>
    @section('header-scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @endsection
    <x-slot name="header">
        <div class="container-sub-header flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Documents') }}
            </h2>
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex h-100">
                <x-jet-nav-link href="{{ route('documents.index') }}" :active="request()->routeIs('documents.index')">
                    {{ __('Main') }}
                </x-jet-nav-link>
                <x-jet-nav-link href="{{ route('documents.create') }}" :active="request()->routeIs('documents.create')">
                    {{ __('Add') }}
                </x-jet-nav-link>
                @if(request()->routeIs('documents.edit'))
                <x-jet-nav-link href="" :active="true">
                    {{ __('Edit') }}
                </x-jet-nav-link>
                @endif
                @if(request()->routeIs('documents.show'))
                <x-jet-nav-link href="" :active="true">
                    {{ __('Show') }}
                </x-jet-nav-link>
                @endif
            </div>
        </div>
    </x-slot>
    <x-app.main-container>
        <div class="p-7">
            @yield('body')
        </div>
    </x-app.main-container>

    @section('end-scripts')
    
    @vite('resources/js/events/documents/index.js') 

    @endsection

</x-app-layout>
