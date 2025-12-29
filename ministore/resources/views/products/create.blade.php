<x-app-layout>
    <div class="max-w-xl mx-auto mt-10 p-6 bg-white rounded shadow">
        <h2 class="text-xl font-bold mb-4">Ajouter un Produit</h2>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded border border-red-200">
                <ul class="list-disc ml-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block font-bold mb-1">Nom</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full border-gray-300 rounded" required>
            </div>
            
            <div class="mb-4">
                <label class="block font-bold mb-1">Prix</label>
                <input type="number" step="0.01" name="price" value="{{ old('price') }}" class="w-full border-gray-300 rounded" required>
            </div>
            
            <div class="mb-4">
                <label class="block font-bold mb-1">Quantité</label>
                <input type="number" name="quantity" value="{{ old('quantity') }}" class="w-full border-gray-300 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-bold mb-1">Catégorie</label>
                <select name="category_id" class="w-full border-gray-300 rounded">
                    @forelse($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @empty
                        <option disabled>⚠️ Aucune catégorie trouvée !</option>
                    @endforelse
                </select>
            </div>

            <button type="submit" class="bg-blue-600 text-black px-4 py-2 rounded font-bold hover:bg-blue-700">
                Créer le Produit
            </button>
        </form>
    </div>
</x-app-layout>