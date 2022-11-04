<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
        {{ __('Dashboard') }}
    </x-jet-nav-link>
    <x-jet-nav-link href="{{ route('books.index') }}" :active="request()->routeIs('books.*')">
        {{ __('Books') }}
    </x-jet-nav-link>
    <x-jet-nav-link href="{{ route('painters.index') }}" :active="request()->routeIs('painters.index')">
        {{ __('Painters') }}
    </x-jet-nav-link>
    <x-jet-nav-link href="{{ route('documents.index') }}" :active="request()->routeIs('documents.index')">
        {{ __('Documents') }}
    </x-jet-nav-link>
</div>
