<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight italic">
            Tableau de Bord
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center hover:shadow-md transition">
                    <div class="p-4 bg-green-50 rounded-xl mr-4">
                        <span class="text-2xl text-green-600">💰</span>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-1000 uppercase tracking-wider">Revenu Total</p>
                        <p class="text-xl font-black text-gray-800">{{ number_format($stats['total_revenue'], 2) }} DH</p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center hover:shadow-md transition">
                    <div class="p-4 bg-blue-50 rounded-xl mr-4">
                        <span class="text-2xl text-blue-600">📦</span>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-1000 uppercase tracking-wider">Commandes</p>
                        <p class="text-xl font-black text-gray-800">{{ $stats['orders_count'] }}</p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center hover:shadow-md transition">
                    <div class="p-4 bg-orange-50 rounded-xl mr-4">
                        <span class="text-2xl text-orange-600">🏷️</span>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-1000 uppercase tracking-wider">Produits</p>
                        <p class="text-xl font-black text-gray-800">{{ $stats['products_count'] }}</p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center hover:shadow-md transition">
                    <div class="p-4 bg-purple-50 rounded-xl mr-4">
                        <span class="text-2xl text-purple-600">👥</span>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-1000 uppercase tracking-wider">Clients</p>
                        <p class="text-xl font-black text-gray-800">{{ $stats['clients_count'] }}</p>
                    </div>
                </div>

            </div>

            
                <div class="absolute -right-10 -bottom-10 opacity-20 transform rotate-12">
                    <svg class="w-40 h-40" fill="currentColor" viewBox="0 0 20 20"><path d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z"></path></svg>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>