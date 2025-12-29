<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Détails du Produit : {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="mb-6">
                    <h3 class="text-lg font-medium text-gray-900">Informations Générales</h3>
                    <p class="mt-1 text-sm text-gray-600">Consultez les détails techniques de ce produit.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 border-t pt-6">
                    <div>
                        <p><strong>Nom :</strong> {{ $product->name }}</p>
                        <p class="mt-2"><strong>Prix :</strong> {{ number_format($product->price, 2) }} DH</p>
                    </div>
                    <div>
                        <p><strong>Quantité en Stock :</strong> {{ $product->quantity }}</p>
                        <p class="mt-2"><strong>Catégorie :</strong> {{ $product->category->name ?? 'Aucune' }}</p>
                    </div>
                </div>

                <div class="mt-8 flex space-x-4 border-t pt-6">
                    <a href="{{ route('products.index') }}" class="bg-gray-500 text-black px-4 py-2 rounded hover:bg-gray-600 transition">
                        Retour à la liste
                    </a>
                    <a href="{{ route('products.edit', $product->id) }}" class="bg-indigo-600 text-black px-4 py-2 rounded hover:bg-indigo-700 transition">
                        Modifier le produit
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>