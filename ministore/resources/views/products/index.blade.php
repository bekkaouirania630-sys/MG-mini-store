<x-app-layout>
    <x-slot name="header">
        <div class="header flex justify-between items-center max-w-4xl mx-auto p-6">
            <h2 class="header-title">
                {{ __('Liste des Produits') }}
            </h2>
            <a href="{{ route('products.create') }}" class="btn-primary text-white">
                + Nouveau Produit
            </a>
        </div>
    </x-slot>

    <div class="py-12 body-bg">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="card-white">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="table-header">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">NOM</th>
                            <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider">PRIX</th>
                            <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider">QUANTITY</th>
                            <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider">CATÉGORIE</th>
                            <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wider">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @foreach($products as $product)
                        <tr class="hover:bg-indigo-50 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $product->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-center font-bold text-green-600">{{ number_format($product->price, 2) }} DH</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-600">{{ $product->quantity }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-center">
                                <span class="px-2 py-1 text-xs font-semibold bg-blue-50 text-blue-700 rounded-md">
                                    {{ $product->category->name ?? 'N/A' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end space-x-3">
                                    <a href="{{ route('products.edit', $product->id) }}" class="text-indigo-600 hover:text-indigo-900 font-bold transition-colors">Modifier</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Supprimer ce produit ?')" class="inline">
                                        @csrf @method('DELETE')
                                        <button class="text-red-500 hover:text-red-700 font-bold transition-colors">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>