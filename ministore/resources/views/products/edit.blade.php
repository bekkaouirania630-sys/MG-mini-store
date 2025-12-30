<x-app-layout>
    <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0 bg-gray-50 relative overflow-hidden">
        
        <!-- Decorative Background Stickers -->
        <div class="absolute top-20 left-10 text-9xl opacity-5 rotate-12 select-none">📦</div>
        <div class="absolute bottom-20 right-10 text-9xl opacity-5 -rotate-12 select-none">🏷️</div>

        <div class="w-full sm:max-w-2xl mt-10 px-6 py-8 bg-white shadow-2xl overflow-hidden sm:rounded-2xl border-2 border-purple-100 relative z-10">
            
            <!-- Header -->
            <div class="mb-8 text-center">
                <h2 class="text-3xl font-black text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-blue-500 mb-2">
                    Modifier le Produit
                </h2>
                <p class="text-gray-500 font-bold">Mettez à jour les informations de {{ $product->name }}</p>
            </div>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-r-xl">
                    <div class="flex items-center">
                        <span class="text-red-500 text-xl mr-2">⚠️</span>
                        <p class="text-red-700 font-bold">Oups ! Quelques erreurs à corriger :</p>
                    </div>
                    <ul class="mt-2 list-disc list-inside text-sm text-red-600 font-medium ml-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('products.update', $product->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Nom du Produit -->
                <div>
                    <label class="block text-sm font-black text-gray-700 mb-2">📦 Nom du Produit</label>
                    <input type="text" name="name" value="{{ old('name', $product->name) }}" 
                           class="w-full rounded-xl border-2 border-purple-100 focus:border-blue-500 focus:ring-4 focus:ring-purple-100 transition-all font-bold text-gray-800 placeholder-gray-400" 
                           placeholder="Ex: iPhone 15 Pro" required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Prix -->
                    <div>
                        <label class="block text-sm font-black text-gray-700 mb-2">💰 Prix (DH)</label>
                        <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" 
                               class="w-full rounded-xl border-2 border-purple-100 focus:border-blue-500 focus:ring-4 focus:ring-purple-100 transition-all font-bold text-gray-800" 
                               placeholder="0.00" required>
                    </div>

                    <!-- Quantité -->
                    <div>
                        <label class="block text-sm font-black text-gray-700 mb-2">🔢 Quantité</label>
                        <input type="number" name="quantity" value="{{ old('quantity', $product->quantity) }}" 
                               class="w-full rounded-xl border-2 border-purple-100 focus:border-blue-500 focus:ring-4 focus:ring-purple-100 transition-all font-bold text-gray-800" 
                               placeholder="0" required>
                    </div>
                </div>

                <!-- Catégorie -->
                <div>
                    <label class="block text-sm font-black text-gray-700 mb-2">🏷️ Catégorie</label>
                    <div class="relative">
                        <select name="category_id" 
                                class="w-full rounded-xl border-2 border-purple-100 focus:border-blue-500 focus:ring-4 focus:ring-purple-100 transition-all font-bold text-gray-800 appearance-none bg-white">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
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
                    <a href="{{ route('products.index') }}" class="text-gray-500 font-bold hover:text-gray-800 transition-colors flex items-center gap-1 group">
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