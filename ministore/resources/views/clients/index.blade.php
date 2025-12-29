<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center max-w-4xl mx-auto">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Gestion des Clients') }}
            </h2>
            <a href="{{ route('clients.create') }}" class="bg-indigo-600 text-black px-4 py-2 rounded-md text-sm font-bold hover:bg-indigo-700 transition">
                + Nouveau Client
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50 font-bold">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs text-gray-500 uppercase">NOM</th>
                            <th class="px-6 py-4 text-center text-xs text-gray-500 uppercase">EMAIL</th>
                            <th class="px-6 py-4 text-right text-xs text-gray-500 uppercase">TELEPHONE</th>
                            <th class="px-6 py-4 text-right text-xs text-gray-500 uppercase">ACTIONS</th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @forelse($clients as $client)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $client->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-600">
                                {{ $client->email }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-right text-gray-600">
                                {{ $client->phone ?? 'N/A' }}
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end space-x-3">
                                    <a href="{{ route('clients.edit', $client->id) }}" class="text-indigo-600 hover:text-indigo-900 font-bold">Modifier</a>
                                    
                                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST" onsubmit="return confirm('Supprimer ce client ?')">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 font-bold">
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