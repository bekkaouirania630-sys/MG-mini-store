<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center max-w-5xl mx-auto">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Gestion des Commandes</h2>
            <a href="{{ route('orders.create') }}" class="bg-indigo-600 text-black px-4 py-2 rounded-md text-sm font-bold hover:bg-indigo-700 transition">
                + Nouvelle Commande
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase">Client</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase">Produit</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase">Qté</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase">Total</th>
                            <th class="px-6 py-4 text-right text-xs font-bold text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @forelse($orders as $order)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $order->client->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $order->products->first()->name ?? 'N/A' }}</td>
                            <td class="px-6 py-4 text-sm text-center">{{ $order->products->first()->pivot->quantity ?? 0 }}</td>
                            <td class="px-6 py-4 text-sm text-center font-bold text-green-600">{{ number_format($order->total_price, 2) }} DH</td>
                            <td class="px-6 py-4 text-right">
                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button class="text-red-500 hover:text-red-700 text-sm font-bold">Annuler</button>
                                </form>
                            </td>
                        
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-gray-400 italic">Aucune commande passée.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>