<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-gray-900 leading-tight">
                {{ __('Mes Commandes') }}
            </h2>
            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-5 py-2.5 bg-gray-900 border border-transparent rounded-full font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-600 active:bg-indigo-700 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150 shadow-md flex gap-2">
                <span>🛍️</span> Retour à la boutique
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-2xl border border-gray-100">
                <div class="p-8 text-gray-900">
                    <div class="flex items-center justify-between mb-8">
                        <h3 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
                            <span class="bg-indigo-100 text-indigo-600 p-2 rounded-lg text-xl">📄</span> 
                            Historique de vos commandes
                        </h3>
                    </div>
                    
                    @if(session('success'))
                        <div class="mb-6 p-4 rounded-xl bg-green-50 border border-green-200 text-green-700 flex items-center gap-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-200 text-red-700 flex items-center gap-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            {{ session('error') }}
                        </div>
                    @endif

                    @if($orders->isEmpty())
                        <div class="text-center py-16 bg-gray-50 rounded-2xl border border-dashed border-gray-200">
                            <div class="text-6xl mb-4">🛍️</div>
                            <p class="text-gray-500 text-lg mb-4">Vous n'avez pas encore passé de commande.</p>
                            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-6 py-3 bg-indigo-600 border border-transparent rounded-xl font-bold text-white hover:bg-indigo-700 transition duration-150 shadow-md">
                                Commencer vos achats
                            </a>
                        </div>
                    @else
                        <div class="overflow-hidden rounded-xl border border-gray-200 shadow-sm">
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">ID Commande</th>
                                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Date</th>
                                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Montant Total</th>
                                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Statut</th>
                                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-100">
                                        @foreach($orders as $order)
                                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                                <td class="px-6 py-4 whitespace-nowrap font-mono text-sm text-gray-600">
                                                    #{{ $order->id }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                    {{ $order->created_at->format('d/m/Y') }} 
                                                    <span class="text-gray-400 text-xs ml-1">{{ $order->created_at->format('H:i') }}</span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span class="font-bold text-gray-900">{{ number_format($order->total_price, 2) }} DH</span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full border 
                                                        {{ $order->status === 'en attente' ? 'bg-yellow-50 text-yellow-700 border-yellow-200' : '' }}
                                                        {{ $order->status === 'validée' ? 'bg-green-50 text-green-700 border-green-200' : '' }}
                                                        {{ $order->status === 'refusée' ? 'bg-red-50 text-red-700 border-red-200' : '' }}
                                                        {{ $order->status === 'annulée' ? 'bg-gray-50 text-gray-700 border-gray-200' : '' }}">
                                                        <span class="w-1.5 h-1.5 rounded-full mr-2 self-center
                                                            {{ $order->status === 'en attente' ? 'bg-yellow-500' : '' }}
                                                            {{ $order->status === 'validée' ? 'bg-green-500' : '' }}
                                                            {{ $order->status === 'refusée' ? 'bg-red-500' : '' }}
                                                            {{ $order->status === 'annulée' ? 'bg-gray-500' : '' }}
                                                        "></span>
                                                        {{ ucfirst($order->status) }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                    @if($order->status === 'en attente')
                                                        <form action="{{ route('customer.order.cancel', $order) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir annuler cette commande ?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="text-red-500 hover:text-red-700 font-bold bg-red-50 hover:bg-red-100 px-3 py-1 rounded-lg transition-colors border border-transparent hover:border-red-200">
                                                                Annuler
                                                            </button>
                                                        </form>
                                                    @else
                                                        <span class="text-gray-400 italic text-xs">Aucune action</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
