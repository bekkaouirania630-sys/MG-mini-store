<x-app-layout>
    <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0 bg-gray-50 relative overflow-hidden">
        
        <!-- Decorative Background -->
        <div class="absolute top-20 left-10 text-9xl opacity-5 rotate-12 select-none">🛒</div>
        <div class="absolute bottom-20 right-10 text-9xl opacity-5 -rotate-12 select-none">📦</div>

        <div class="w-full sm:max-w-xl mt-10 px-6 py-8 bg-white shadow-2xl overflow-hidden sm:rounded-2xl border-2 border-purple-100 relative z-10">
            
            <div class="mb-8 text-center">
                <h2 class="text-3xl font-black text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-blue-500 mb-2">
                    Modifier la Commande
                </h2>
                <p class="text-gray-500 font-bold">Commande #{{ $order->id }}</p>
            </div>

            <form action="{{ route('orders.update', $order->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Info Résumé -->
                <div class="p-5 bg-purple-50 rounded-xl border border-purple-100 flex flex-col space-y-2">
                    <div class="flex items-center justify-between">
                        <span class="text-gray-500 font-bold text-sm">👤 Client</span>
                        <span class="text-gray-800 font-black text-lg">{{ $order->client->name }}</span>
                    </div>
                    <div class="w-full h-px bg-purple-100"></div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-500 font-bold text-sm">📦 Produit</span>
                        <span class="text-gray-800 font-black text-lg">{{ $order->product->name ?? 'N/A' }}</span>
                    </div>
                </div>

                <!-- Quantité -->
                <div>
                    <label class="block text-sm font-black text-gray-700 mb-2">🔢 Quantité</label>
                    <input type="number" name="quantity" value="{{ old('quantity', $order->quantity) }}" min="1" 
                           class="w-full rounded-xl border-2 border-purple-100 focus:border-blue-500 focus:ring-4 focus:ring-purple-100 transition-all font-bold text-gray-800" 
                           required>
                </div>

                <!-- Statut -->
                <div>
                    <label class="block text-sm font-black text-gray-700 mb-2">📊 Statut de la commande</label>
                    <div class="relative">
                        <select name="status" 
                                class="w-full rounded-xl border-2 border-purple-100 focus:border-blue-500 focus:ring-4 focus:ring-purple-100 transition-all font-bold text-gray-800 appearance-none bg-white">
                            <option value="en attente" {{ $order->status == 'en attente' ? 'selected' : '' }}>⏳ En attente</option>
                            <option value="payée" {{ $order->status == 'payée' ? 'selected' : '' }}>✅ Payée</option>
                            <option value="annulée" {{ $order->status == 'annulée' ? 'selected' : '' }}>🚫 Annulée</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                            <svg class="h-5 w-5 fill-current" viewBox="0 0 20 20">
                                <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between pt-4">
                    <a href="{{ route('orders.index') }}" class="text-gray-500 font-bold hover:text-gray-800 transition-colors flex items-center gap-1 group">
                        <span class="group-hover:-translate-x-1 transition-transform">⬅️</span> Retour
                    </a>
                    
                    <button type="submit" class="bg-gradient-to-r from-purple-600 via-purple-500 to-blue-600 text-white font-black py-3 px-8 rounded-xl shadow-lg transform hover:scale-[1.02] transition-all hover:shadow-xl flex items-center gap-2">
                        <span>💾</span> Mettre à jour
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>