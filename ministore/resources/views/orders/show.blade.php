<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight max-w-4xl mx-auto">
            Détails de la Commande #{{ $order->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-8 border border-gray-200">
                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-sm font-bold text-gray-400 uppercase mb-2">Client</h3>
                        <p class="text-lg font-semibold text-gray-900">{{ $order->client->name }}</p>
                        <p class="text-gray-600">{{ $order->client->email }}</p>
                    </div>

                    <div class="text-right">
                        <h3 class="text-sm font-bold text-gray-400 uppercase mb-2">Statut</h3>
                        <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-bold capitalize">
                            {{ $order->status }}
                        </span>
                    </div>

                    <div class="col-span-2 border-t pt-6 mt-4">
                        <h3 class="text-sm font-bold text-gray-400 uppercase mb-4">Produit Commandé</h3>
                        <div class="flex justify-between items-center bg-gray-50 p-4 rounded-lg">
                            <div>
                                <p class="font-bold text-gray-800">{{ $order->product->name }}</p>
                                <p class="text-sm text-gray-500">Prix unitaire: {{ number_format($order->product->price, 2) }} DH</p>
                            </div>
                            <div class="text-right">
                                <p class="text-gray-600">Quantité: <span class="font-bold">{{ $order->quantity }}</span></p>
                                <p class="text-xl font-bold text-green-600">{{ number_format($order->total_price, 2) }} DH</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-10 flex space-x-4 border-t pt-6">
                    <a href="{{ route('orders.index') }}" class="text-gray-600 hover:underline text-sm font-bold pt-2">Retour à la liste</a>
                    <a href="{{ route('orders.edit', $order->id) }}" class="bg-indigo-600 text-white px-6 py-2 rounded-md font-bold hover:bg-indigo-700 transition">
                        Modifier la Commande
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>