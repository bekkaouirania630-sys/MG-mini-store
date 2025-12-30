<x-app-layout>
    <x-slot name="header">
        <div class="header max-w-7xl mx-auto p-6">
            <h2 class="header-title">
                Tableau de Bord
            </h2>
        </div>
    </x-slot>

    <div class="py-12 body-bg min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                
                <!-- Card Revenu -->
                <div class="relative overflow-hidden bg-gradient-to-br from-green-400 to-emerald-600 rounded-3xl p-8 shadow-2xl transform hover:scale-[1.02] transition-all duration-300">
                    <div class="absolute -right-6 -top-6 text-9xl opacity-20 rotate-12 select-none">💰</div>
                    <div class="relative z-10 flex flex-col justify-between h-full text-white">
                        <div>
                            <p class="text-sm font-black uppercase tracking-widest opacity-80 mb-2">Revenu Total</p>
                            <h3 class="text-5xl font-black drop-shadow-md">{{ number_format($stats['total_revenue'], 2) }} <span class="text-3xl">DH</span></h3>
                        </div>
                        <div class="mt-6 flex items-center gap-2 opacity-90 font-bold">
                            <span class="bg-white/20 p-2 rounded-lg">📈 +12% ce mois</span>
                        </div>
                    </div>
                </div>

                <!-- Card Commandes -->
                <div class="relative overflow-hidden bg-gradient-to-br from-blue-400 to-indigo-600 rounded-3xl p-8 shadow-2xl transform hover:scale-[1.02] transition-all duration-300">
                    <div class="absolute -right-6 -bottom-6 text-9xl opacity-20 -rotate-12 select-none">📦</div>
                    <div class="relative z-10 flex flex-col justify-between h-full text-white">
                        <div>
                            <p class="text-sm font-black uppercase tracking-widest opacity-80 mb-2">Commandes</p>
                            <h3 class="text-5xl font-black drop-shadow-md">{{ $stats['orders_count'] }}</h3>
                        </div>
                        <div class="mt-6 flex items-center gap-2 opacity-90 font-bold">
                            <span class="bg-white/20 p-2 rounded-lg">🚀 En cours de traitement</span>
                        </div>
                    </div>
                </div>

                <!-- Card Produits -->
                <div class="relative overflow-hidden bg-gradient-to-br from-orange-400 to-red-500 rounded-3xl p-8 shadow-2xl transform hover:scale-[1.02] transition-all duration-300">
                    <div class="absolute -right-6 -top-6 text-9xl opacity-20 rotate-12 select-none">🏷️</div>
                    <div class="relative z-10 flex flex-col justify-between h-full text-white">
                        <div>
                            <p class="text-sm font-black uppercase tracking-widest opacity-80 mb-2">Produits en stock</p>
                            <h3 class="text-5xl font-black drop-shadow-md">{{ $stats['products_count'] }}</h3>
                        </div>
                        <div class="mt-6 flex items-center gap-2 opacity-90 font-bold">
                            <span class="bg-white/20 p-2 rounded-lg">🔥 Top ventes</span>
                        </div>
                    </div>
                </div>

                <!-- Card Clients -->
                <div class="relative overflow-hidden bg-gradient-to-br from-purple-400 to-pink-600 rounded-3xl p-8 shadow-2xl transform hover:scale-[1.02] transition-all duration-300">
                    <div class="absolute -left-6 -bottom-6 text-9xl opacity-20 -rotate-12 select-none">👥</div>
                    <div class="relative z-10 flex flex-col justify-between h-full text-white">
                        <div class="text-left">
                            <p class="text-sm font-black uppercase tracking-widest opacity-80 mb-2">Clients Actifs</p>
                            <h3 class="text-5xl font-black drop-shadow-md">{{ $stats['clients_count'] }}</h3>
                        </div>
                        <div class="mt-6 flex items-center gap-2 opacity-90 font-bold">
                            <span class="bg-white/20 p-2 rounded-lg">❤️ Fidélité</span>
                        </div>
                    </div>
                </div>

            </div>
            
            <!-- Section Bienvenue Décorative -->
            <div class="relative bg-white rounded-3xl p-8 shadow-xl border-2 border-indigo-50 overflow-hidden">
                <div class="absolute top-0 right-0 p-4 opacity-10 text-9xl transform translate-x-10 -translate-y-10">🌟</div>
                <h3 class="text-2xl font-black text-gray-800 mb-2">Bon retour, {{ Auth::user()->name }} ! 👋</h3>
                <p class="text-gray-600">Prêt à gérer votre mini-store aujourd'hui ?</p>
            </div>

        </div>
    </div>
</x-app-layout>
