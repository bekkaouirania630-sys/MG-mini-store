<x-app-layout>


    <div class="max-w-md mx-auto mt-10 p-8 bg-white rounded-2xl shadow-xl border-2 border-purple-100 relative overflow-hidden">
        
        <h2 class="text-3xl font-black text-black mb-8 text-center flex items-center justify-center gap-3">
            <span>🛒</span> Nouvelle Commande
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

        <form action="{{ route('orders.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div>
                <label class="block mb-2 font-black text-black text-lg flex items-center gap-2">
                    <span>👤</span> Choisir le Client
                </label>
                <select name="client_id" class="w-full border-2 border-purple-200 rounded-xl p-3 text-black font-bold focus:border-blue-500 focus:ring-4 focus:ring-purple-100 transition-all bg-white" required>
                    <option value="">-- Sélectionner un client --</option>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-2 font-black text-black text-lg flex items-center gap-2">
                    <span>📦</span> Choisir le Produit
                </label>
                <select name="product_id" class="w-full border-2 border-purple-200 rounded-xl p-3 text-black font-bold focus:border-blue-500 focus:ring-4 focus:ring-purple-100 transition-all bg-white" required>
                    <option value="">-- Sélectionner un produit --</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">
                            {{ $product->name }} ({{ number_format($product->price, 2) }} DH)
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-2 font-black text-black text-lg flex items-center gap-2">
                    <span>🔢</span> Quantité
                </label>
                <input type="number" name="quantity" min="1" value="1" 
                        class="w-full border-2 border-purple-200 rounded-xl p-3 text-black font-bold focus:border-blue-500 focus:ring-4 focus:ring-purple-100 transition-all" 
                        required>
            </div>

            <div class="mt-8 flex items-center justify-between gap-4">
                <a href="{{ route('orders.index') }}" class="w-1/3 text-center bg-gray-200 text-gray-700 px-6 py-4 rounded-xl font-bold hover:bg-gray-300 transition-all">Annuler</a>
                <button type="submit" 
                        class="w-2/3 bg-gradient-to-r from-purple-600 via-purple-500 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-black font-black py-4 rounded-xl shadow-lg transform hover:scale-[1.02] transition-all duration-200 flex justify-center items-center gap-2 text-lg">
                    <span>Confirmer</span>
                    <span>🚀</span>
                </button>
            </div>
        </form>
    </div>
</x-app-layout>