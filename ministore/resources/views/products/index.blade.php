<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen relative overflow-hidden">
        
        <!-- Decorative Background -->
        <div class="absolute top-20 left-10 text-9xl opacity-5 rotate-45 select-none">📦</div>
        <div class="absolute bottom-20 right-10 text-9xl opacity-5 -rotate-12 select-none">🏷️</div>

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 relative z-10">
            
            <!-- Header Section -->
            <div class="flex justify-between items-center mb-8 px-4">
                <div>
                    <h2 class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-blue-500">
                        Liste des Produits
                    </h2>
                    <p class="text-gray-500 font-bold mt-1">Gérez votre inventaire</p>
                </div>
                <a href="{{ route('products.create') }}" 
                   class="bg-gradient-to-r from-purple-600 to-blue-600 text-white px-6 py-3 rounded-xl font-black shadow-lg hover:shadow-xl hover:scale-105 transition-all flex items-center gap-2">
                    <span>➕</span> Nouveau Produit
                </a>
            </div>

            <!-- Table Card -->
            <div class="bg-white rounded-3xl shadow-2xl border border-purple-100 overflow-hidden">
                <table class="min-w-full divide-y divide-gray-100">
                    <thead>
                        <tr class="bg-gradient-to-r from-purple-600 to-blue-600 text-white">
                            <th class="px-6 py-5 text-left text-sm font-black uppercase tracking-wider">
                                📦 Nom
                            </th>
                            <th class="px-6 py-5 text-center text-sm font-black uppercase tracking-wider">
                                💰 Prix
                            </th>
                            <th class="px-6 py-5 text-center text-sm font-black uppercase tracking-wider">
                                🔢 Quantité
                            </th>
                            <th class="px-6 py-5 text-center text-sm font-black uppercase tracking-wider">
                                📂 Catégorie
                            </th>
                            <th class="px-6 py-5 text-right text-sm font-black uppercase tracking-wider">
                                ⚙️ Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @foreach($products as $product)
                        <tr class="hover:bg-purple-50/50 transition-colors duration-200 group">
                            <td class="px-6 py-5 whitespace-nowrap">
                                <span class="text-lg font-bold text-gray-800 group-hover:text-purple-700 transition-colors">
                                    {{ $product->name }}
                                </span>
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap text-center">
                                <span class="text-green-600 font-black text-lg">
                                    {{ number_format($product->price, 2) }} <span class="text-xs">DH</span>
                                </span>
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap text-center">
                                <span class="bg-blue-100 text-blue-700 font-bold px-3 py-1 rounded-full text-xs">
                                    {{ $product->quantity }}
                                </span>
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap text-center">
                                <span class="px-3 py-1 text-xs font-bold bg-purple-100 text-purple-700 rounded-lg uppercase tracking-wider">
                                    {{ $product->category->name ?? 'Non classé' }}
                                </span>
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap text-right">
                                <div class="flex justify-end items-center gap-3">
                                    <a href="{{ route('products.edit', $product->id) }}" 
                                       class="bg-blue-50 text-blue-600 p-2 rounded-lg hover:bg-blue-100 hover:scale-110 transition-all shadow-sm"
                                       title="Modifier">
                                        ✏️
                                    </a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Supprimer ce produit ?')" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" 
                                                class="bg-red-50 text-red-600 p-2 rounded-lg hover:bg-red-100 hover:scale-110 transition-all shadow-sm"
                                                title="Supprimer">
                                            🗑️
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        
                        @if($products->isEmpty())
                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center">
                                    <span class="text-6xl mb-4 opacity-50">📦</span>
                                    <p class="text-xl font-bold text-gray-500">Aucun produit en stock.</p>
                                    <p class="text-gray-400 text-sm mt-2">Ajoutez vos produits pour les voir ici !</p>
                                </div>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            
            <div class="mt-6 text-center">
                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">MiniStore System System</p>
            </div>
        </div>
    </div>
</x-app-layout>