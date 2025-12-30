<nav x-data="{ open: false }" class="w-64 min-h-screen sidebar-bg border-r border-gray-200 flex flex-col">
    <div class="h-16 flex items-center px-6 border-b border-gray-100 shrink-0">
        <a href="{{ route('dashboard') }}">
            <span class="text-lg font-bold text-gray-800">Ministore</span>
        </a>
    </div>
    

    <div class="flex-1 px-4 py-6 space-y-4">
        
        <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider px-4">
            Menu Principal
        </div>
        
        <div class="flex flex-col space-y-1">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" :class="request()->routeIs('dashboard') ? 'sidebar-link sidebar-link-active' : 'sidebar-link'">
                Dashboard
            </x-nav-link>

            <x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.*')" :class="request()->routeIs('categories.*') ? 'sidebar-link sidebar-link-active' : 'sidebar-link'">
                Catégories
            </x-nav-link>

            <x-nav-link :href="route('products.index')" :active="request()->routeIs('products.*')" :class="request()->routeIs('products.*') ? 'sidebar-link sidebar-link-active' : 'sidebar-link'">
                Produits
            </x-nav-link>

            <x-nav-link :href="route('clients.index')" :active="request()->routeIs('clients.*')" :class="request()->routeIs('clients.*') ? 'sidebar-link sidebar-link-active' : 'sidebar-link'">
                Clients
            </x-nav-link>

            <x-nav-link :href="route('orders.index')" :active="request()->routeIs('orders.*')" :class="request()->routeIs('orders.*') ? 'sidebar-link sidebar-link-active' : 'sidebar-link'">
                Commandes
            </x-nav-link>
        </div>
    </div>
           
    <div class="p-4 border-t border-gray-200">
        <x-dropdown-link :href="route('profile.edit')" class="rounded-md">
                Profil 
            </x-dropdown-link>
        <div class="flex flex-col space-y-2">
            <div class="px-4 py-2">
                <p class="text-sm font-bold text-gray-700">{{ Auth::user()->name }}</p>
                <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</p>
            </div>
            
          
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-dropdown-link :href="route('logout')" 
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="text-red-600 rounded-md">
                    Déconnexion
                </x-dropdown-link>
            </form>
        </div>
    </div>
</nav>