<nav x-data="{ open: false }" class="w-64 min-h-screen sidebar-bg border-r border-gray-200 flex flex-col">
    <div class="h-20 flex items-center justify-center px-6 border-b border-purple-100/50 shrink-0 bg-white/50 backdrop-blur-sm">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-2 group">
            <div class="bg-gradient-to-br from-indigo-600 to-purple-600 text-white p-2 rounded-xl shadow-lg transform group-hover:rotate-12 transition-transform duration-300">
                <span class="text-xl">🛍️</span>
            </div>
            <span class="text-2xl font-black bg-gradient-to-r from-indigo-700 to-purple-600 bg-clip-text text-transparent tracking-tight">
                MiniStore
            </span>
        </a>
    </div>
    

    <div class="flex-1 px-4 py-6 space-y-4">
        
        <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider px-4">
            Menu Principal
        </div>
        
        <div class="flex flex-col space-y-2">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" 
                       class="group flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-lg' : 'text-gray-600 hover:bg-purple-50 hover:text-purple-700' }}">
                <span class="text-xl group-hover:scale-110 transition-transform">📊</span>
                <span class="font-bold">Tableau de Bord</span>
            </x-nav-link>

            <x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.*')" 
                       class="group flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('categories.*') ? 'bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-lg' : 'text-gray-600 hover:bg-purple-50 hover:text-purple-700' }}">
                <span class="text-xl group-hover:scale-110 transition-transform">📂</span>
                <span class="font-bold">Catégories</span>
            </x-nav-link>

            <x-nav-link :href="route('products.index')" :active="request()->routeIs('products.*')" 
                       class="group flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('products.*') ? 'bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-lg' : 'text-gray-600 hover:bg-purple-50 hover:text-purple-700' }}">
                <span class="text-xl group-hover:scale-110 transition-transform">📦</span>
                <span class="font-bold">Produits</span>
            </x-nav-link>

            <x-nav-link :href="route('clients.index')" :active="request()->routeIs('clients.*')" 
                       class="group flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('clients.*') ? 'bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-lg' : 'text-gray-600 hover:bg-purple-50 hover:text-purple-700' }}">
                <span class="text-xl group-hover:scale-110 transition-transform">👥</span>
                <span class="font-bold">Clients</span>
            </x-nav-link>

            <x-nav-link :href="route('orders.index')" :active="request()->routeIs('orders.*')" 
                       class="group flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('orders.*') ? 'bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-lg' : 'text-gray-600 hover:bg-purple-50 hover:text-purple-700' }}">
                <span class="text-xl group-hover:scale-110 transition-transform">🛒</span>
                <span class="font-bold">Commandes</span>
            </x-nav-link>
        </div>
    </div>
           
    <div class="p-4 border-t border-purple-100 bg-white/50 backdrop-blur-sm">
        <div class="bg-gradient-to-br from-white to-purple-50 rounded-2xl p-4 shadow-lg border border-purple-100">
            <!-- User Info -->
            <div class="flex items-center gap-3 mb-4">
                <div class="bg-gradient-to-tr from-purple-500 to-blue-500 text-white rounded-full p-2 w-10 h-10 flex items-center justify-center font-black shadow-md">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div class="overflow-hidden">
                    <p class="text-sm font-black text-gray-800 truncate">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-gray-500 font-bold truncate">{{ Auth::user()->email }}</p>
                </div>
            </div>

            <!-- Profile Link -->
            <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 w-full px-3 py-2 text-sm font-bold text-gray-700 bg-white rounded-xl hover:bg-purple-50 hover:text-purple-700 transition-all mb-2 border border-gray-100 shadow-sm group">
                <span class="group-hover:scale-110 transition-transform">⚙️</span> Mon Profil
            </a>
            
            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center gap-2 w-full px-3 py-2 text-sm font-black text-white bg-gradient-to-r from-red-500 to-pink-600 rounded-xl hover:from-red-600 hover:to-pink-700 hover:shadow-lg transform hover:translate-y-[-1px] transition-all shadow-md">
                    <span>🚪</span> Déconnexion
                </button>
            </form>
        </div>
    </div>
</nav>