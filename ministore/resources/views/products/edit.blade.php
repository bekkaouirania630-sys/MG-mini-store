<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifier le Produit : {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                @if ($errors->any())
                    <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>- {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('products.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT') <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Nom du Produit</label>
                            <input type="text" name="name" value="{{ old('name', $product->name) }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block font-medium text-sm text-gray-700">Prix (DH)</label>
                                <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                            </div>
                            <div>
                                <label class="block font-medium text-sm text-gray-700">Quantité</label>
                                <input type="number" name="quantity" value="{{ old('quantity', $product->quantity) }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                            </div>
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700">Catégorie</label>
                            <select name="category_id" class="w-full border-gray-300 rounded-md shadow-sm">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mt-8 flex items-center space-x-4">
                        <button type="submit" class="bg-blue-600 text-black px-6 py-2 rounded font-bold hover:bg-blue-700 transition">
                            Mettre à jour
                        </button>
                        <a href="{{ route('products.index') }}" class="text-gray-600 hover:underline text-sm">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>