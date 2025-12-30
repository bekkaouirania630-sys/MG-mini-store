<x-app-layout>
    <x-slot name="header">
        <div class="header flex justify-between items-center max-w-4xl mx-auto p-6">
            <h2 class="header-title">
                {{ __('Gestion des Clients') }}
            </h2>
            <a href="{{ route('clients.create') }}" class="btn-primary text-white">
                + Nouveau Client
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
                            <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider">EMAIL</th>
                            <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wider">TELEPHONE</th>
                            <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wider">ACTIONS</th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @forelse($clients as $client)
                        <tr class="hover:bg-indigo-50 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $client->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-600">
                                {{ $client->email }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-right text-gray-600">
                                {{ $client->phone ?? 'N/A' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end space-x-3">
                                    <a href="{{ route('clients.edit', $client->id) }}" class="text-indigo-600 hover:text-indigo-900 font-bold transition-colors">Modifier</a>
                                    
                                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST" onsubmit="return confirm('Supprimer ce client ?')" class="inline">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 font-bold transition-colors">
                                            Supprimer
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-6 py-10 text-center text-gray-400 italic">
                                Aucun client dans la base.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>