<x-app-layout>
    <x-slot name="header">
        <div class="header flex justify-between items-center max-w-5xl mx-auto p-6">
            <h2 class="header-title">Gestion des Commandes</h2>
            <a href="{{ route('orders.create') }}" class="btn-primary text-white">
                + Nouvelle Commande
            </a>
        </div>
    </x-slot>

    <div class="py-12 body-bg">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="card-white">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="table-header">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Client</th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Produit</th>
                            <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider">Qté</th>
                            <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider">Total</th>
                            <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @forelse($orders as $order)
                        <tr class="hover:bg-indigo-50 transition-colors duration-200">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $order->client->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $order->products->first()->name ?? 'N/A' }}</td>
                            <td class="px-6 py-4 text-sm text-center">{{ $order->products->first()->pivot->quantity ?? 0 }}</td>
                            <td class="px-6 py-4 text-sm text-center font-bold text-green-600">{{ number_format($order->total_price, 2) }} DH</td>
                            <td class="px-6 py-4 text-right">
                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button class="text-red-500 hover:text-red-700 text-sm font-bold transition-colors">Annuler</button>
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