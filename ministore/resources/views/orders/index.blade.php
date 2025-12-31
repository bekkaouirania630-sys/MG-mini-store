<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen relative overflow-hidden">
        
        <!-- Decorative Background -->
        <div class="absolute top-20 left-10 text-9xl opacity-5 rotate-45 select-none">🛒</div>
        <div class="absolute bottom-20 right-10 text-9xl opacity-5 -rotate-12 select-none">📦</div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative z-10">
            
            <!-- Header Section -->
            <div class="flex justify-between items-center mb-8 px-4">
                <div>
                    <h2 class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-blue-500">
                        Gestion des Commandes
                    </h2>
                    <p class="text-gray-500 font-bold mt-1">Suivez les achats en temps réel</p>
                </div>
                <a href="{{ route('orders.create') }}" 
                   class="bg-gradient-to-r from-purple-600 to-blue-600 text-white px-6 py-3 rounded-xl font-black shadow-lg hover:shadow-xl hover:scale-105 transition-all flex items-center gap-2">
                    <span>➕</span> Nouvelle Commande
                </a>
            </div>

            <!-- Table Card -->
            <div class="bg-white rounded-3xl shadow-2xl border border-purple-100 overflow-hidden">
                <table class="min-w-full divide-y divide-gray-100">
                    <thead>
                        <tr class="bg-gradient-to-r from-purple-600 to-blue-600 text-white">
                            <th class="px-6 py-5 text-left text-sm font-black uppercase tracking-wider">
                                👤 Client
                            </th>
                            <th class="px-6 py-5 text-left text-sm font-black uppercase tracking-wider">
                                📦 Produit
                            </th>
                            <th class="px-6 py-5 text-center text-sm font-black uppercase tracking-wider">
                                🔢 Qté
                            </th>
                            <th class="px-6 py-5 text-center text-sm font-black uppercase tracking-wider">
                                💰 Total
                            </th>
                            <th class="px-6 py-5 text-center text-sm font-black uppercase tracking-wider">
                                📊 Statut
                            </th>
                            <th class="px-6 py-5 text-right text-sm font-black uppercase tracking-wider">
                                ⚙️ Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @forelse($orders as $order)
                        <tr class="hover:bg-purple-50/50 transition-colors duration-200 group">
                            <td class="px-6 py-5 whitespace-nowrap">
                                <span class="text-sm font-bold text-gray-800">{{ $order->client->name }}</span>
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap">
                                <span class="text-sm font-medium text-gray-600">{{ $order->products->first()->name ?? 'N/A' }}</span>
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap text-center">
                                <span class="bg-purple-100 text-purple-700 font-bold px-3 py-1 rounded-full text-xs">
                                    {{ $order->products->first()->pivot->quantity ?? 0 }}
                                </span>
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap text-center">
                                <span class="text-green-600 font-black text-lg">
                                    {{ number_format($order->total_price, 2) }} <span class="text-xs">DH</span>
                                </span>
                            </td>
                             <td class="px-6 py-5 whitespace-nowrap text-center">
                                <span class="px-3 py-1 rounded-full text-xs font-bold
                                    {{ $order->status === 'en attente' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                    {{ $order->status === 'validée' ? 'bg-green-100 text-green-800' : '' }}
                                    {{ $order->status === 'refusée' ? 'bg-red-100 text-red-800' : '' }}
                                    {{ $order->status === 'annulée' ? 'bg-gray-100 text-gray-800' : '' }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap text-right text-sm font-medium flex justify-end gap-2">
                                @if($order->status === 'en attente')
                                    <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST" class="inline">
                                        @csrf @method('PATCH')
                                        <input type="hidden" name="status" value="validée">
                                        <button class="bg-green-50 text-green-600 px-3 py-1 rounded-lg hover:bg-green-100 transition-colors shadow-sm font-bold flex items-center gap-1">
                                            ✅ Valider
                                        </button>
                                    </form>
                                    <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST" class="inline">
                                        @csrf @method('PATCH')
                                        <input type="hidden" name="status" value="refusée">
                                        <button class="bg-red-50 text-red-600 px-3 py-1 rounded-lg hover:bg-red-100 transition-colors shadow-sm font-bold flex items-center gap-1">
                                            ❌ Refuser
                                        </button>
                                    </form>
                                @else
                                     <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="inline" onsubmit="return confirm('Annuler définitivement cette commande ?')">
                                        @csrf @method('DELETE')
                                        <button class="text-gray-400 hover:text-red-500 transition-colors" title="Supprimer">
                                            🗑️
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center">
                                    <span class="text-6xl mb-4 opacity-50">🛒</span>
                                    <p class="text-xl font-bold text-gray-500">Aucune commande passée.</p>
                                    <p class="text-gray-400 text-sm mt-2">Les nouvelles commandes apparaîtront ici !</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="mt-6 text-center">
                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">MiniStore System System</p>
            </div>
        </div>
    </div>
</x-app-layout>