<x-app-layout>
    <x-slot name="header">
        <div class="container-sub-header flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Forms') }}
            </h2>
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex h-100">
                <x-jet-nav-link href="{{ route('forms.index') }}" :active="request()->routeIs('forms.index')">
                    {{ __('Main') }}
                </x-jet-nav-link>
                <x-jet-nav-link href="{{ route('forms.create') }}" :active="request()->routeIs('forms.create')">
                    {{ __('Add') }}
                </x-jet-nav-link>
                @if(request()->routeIs('forms.edit'))
                <x-jet-nav-link href="" :active="true">
                    {{ __('Edit') }}
                </x-jet-nav-link>
                @endif
                @if(request()->routeIs('forms.show'))
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

</x-app-layout>