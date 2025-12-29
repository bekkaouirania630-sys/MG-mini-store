<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight max-w-xl mx-auto">
            {{ __('Passer une Nouvelle Commande') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-200">
                
                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                        <ul class="list-disc ml-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf
                    
                    <div class="space-y-6">
                        <div>
                            <label class="block font-bold text-gray-700 mb-2">Choisir le Client</label>
                            <select name="client_id" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500" required>
                                <option value="">-- Sélectionner un client --</option>
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block font-bold text-gray-700 mb-2">Choisir le Produit</label>
                            <select name="product_id" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500" required>
                                <option value="">-- Sélectionner un produit --</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">
                                        {{ $product->name }} ({{ number_format($product->price, 2) }} DH)
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block font-bold text-gray-700 mb-2">Quantité</label>
                            <input type="number" name="quantity" min="1" value="1" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500" required>
                        </div>
                    </div>

                    <div class="mt-8 flex items-center justify-between">
                        <a href="{{ route('orders.index') }}" class="bg-indigo-600 text-black px-6 py-2 rounded-md font-bold hover:bg-indigo-700 transition">Annuler</a>
                        <button type="submit" class="bg-indigo-600 text-black px-6 py-2 rounded-md font-bold hover:bg-indigo-700 transition">
                            Confirmer la Commande
                        </button>
               
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>