<x-app-layout>
    <div class="max-w-md mx-auto mt-10 p-8 bg-white rounded-2xl shadow-xl border-2 border-purple-100 relative overflow-hidden">
        
        <h2 class="text-3xl font-black text-black mb-8 text-center flex items-center justify-center gap-3">
            <span>📦</span> Ajouter un Produit
        </h2>

        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-100 text-red-700 rounded-xl border border-red-200 font-bold">
                <ul class="list-disc ml-5">
                    @foreach ($errors->all() as $error)
                        <li>⚠️ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block mb-2 font-black text-black text-lg flex items-center gap-2">
                    <span>🏷️</span> Nom
                </label>
                <input type="text" name="name" value="{{ old('name') }}" 
                       class="w-full border-2 border-purple-200 rounded-xl p-3 text-black font-bold focus:border-blue-500 focus:ring-4 focus:ring-purple-100 transition-all placeholder-gray-400" 
                       required>
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2 font-black text-black text-lg flex items-center gap-2">
                        <span>💰</span> Prix
                    </label>
                    <input type="number" step="0.01" name="price" value="{{ old('price') }}" 
                           class="w-full border-2 border-purple-200 rounded-xl p-3 text-black font-bold focus:border-blue-500 focus:ring-4 focus:ring-purple-100 transition-all" 
                           required>
                </div>
                
                <div>
                    <label class="block mb-2 font-black text-black text-lg flex items-center gap-2">
                        <span>🔢</span> Quantité
                    </label>
                    <input type="number" name="quantity" value="{{ old('quantity') }}" 
                           class="w-full border-2 border-purple-200 rounded-xl p-3 text-black font-bold focus:border-blue-500 focus:ring-4 focus:ring-purple-100 transition-all" 
                           required>
                </div>
            </div>

            <div>
                <label class="block mb-2 font-black text-black text-lg flex items-center gap-2">
                    <span>📂</span> Catégorie
                </label>
                <select name="category_id" class="w-full border-2 border-purple-200 rounded-xl p-3 text-black font-bold focus:border-blue-500 focus:ring-4 focus:ring-purple-100 transition-all bg-white">
                    @forelse($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @empty
                        <option disabled>⚠️ Aucune catégorie trouvée !</option>
                    @endforelse
                </select>
            </div>

            <button type="submit" 
                    class="w-full bg-gradient-to-r from-purple-600 via-purple-500 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-black font-black py-4 rounded-xl shadow-lg transform hover:scale-[1.02] transition-all duration-200 flex justify-center items-center gap-2 text-lg">
                <span>Créer le Produit</span>
                <span>🚀</span>
            </button>
        </form>
    </div>
</x-app-layout>