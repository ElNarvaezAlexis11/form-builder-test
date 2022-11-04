 <div class="pt-2 pb-3 space-y-1">
     <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
         {{ __('Dashboard') }}
     </x-jet-responsive-nav-link>

     <x-jet-responsive-nav-link href="{{ route('books.index') }}" :active="request()->routeIs('books.*')">
         {{ __('Books') }}
     </x-jet-responsive-nav-link>
     <x-jet-responsive-nav-link href="{{ route('painters.index') }}" :active="request()->routeIs('painters.*')">
         {{ __('Painters') }}
     </x-jet-responsive-nav-link>
     <x-jet-responsive-nav-link href="{{ route('documents.index') }}" :active="request()->routeIs('documents.*')">
         {{ __('Documents') }}
     </x-jet-responsive-nav-link>
 </div>
