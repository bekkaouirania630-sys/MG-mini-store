<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight max-w-xl mx-auto">
            Modifier la Commande #{{ $order->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6 border border-gray-200">
                <form action="{{ route('orders.update', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="space-y-6">
                        <div class="p-4 bg-gray-50 rounded-md">
                            <p class="text-sm text-gray-500">Client: <span class="font-bold text-gray-800">{{ $order->client->name }}</span></p>
                            <p class="text-sm text-gray-500">Produit: <span class="font-bold text-gray-800">{{ $order->product->name }}</span></p>
                        </div>

                        <div>
                            <label class="block font-bold text-gray-700 mb-2">Quantité</label>
                            <input type="number" name="quantity" value="{{ old('quantity', $order->quantity) }}" min="1" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <div>
                            <label class="block font-bold text-gray-700 mb-2">Statut de la commande</label>
                            <select name="status" class="w-full border-gray-300 rounded-md shadow-sm">
                                <option value="en attente" {{ $order->status == 'en attente' ? 'selected' : '' }}>En attente</option>
                                <option value="payée" {{ $order->status == 'payée' ? 'selected' : '' }}>Payée</option>
                                <option value="annulée" {{ $order->status == 'annulée' ? 'selected' : '' }}>Annulée</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-8 flex items-center justify-between">
                        <a href="{{ route('orders.index') }}" class="text-gray-600 hover:underline text-sm">Annuler</a>
                        <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-md font-bold hover:bg-indigo-700">
                            Mettre à jour
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>