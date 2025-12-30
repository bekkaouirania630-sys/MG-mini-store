<x-app-layout>
    <x-slot name="header">
        <div class="header flex justify-between items-center max-w-4xl mx-auto p-6">
            <h2 class="header-title">
                {{ __('Gestion des Catégories') }}
            </h2>
            <a href="{{ route('categories.create') }}" class="btn-primary text-white">
                + Ajouter une Catégorie
            </a>
        </div>
    </x-slot>

    <div class="py-12 body-bg">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="card-white">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="table-header">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">
                                NOM DE LA CATÉGORIE
                            </th>
                            <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wider">
                                ACTIONS
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @forelse($categories as $category)
                        <tr class="hover:bg-indigo-50 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $category->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end space-x-4">
                                    <a href="{{ route('categories.edit', $category->id) }}" class="text-indigo-600 hover:text-indigo-900 font-bold transition-colors">
                                        Modifier
                                    </a>
                                    
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Supprimer cette catégorie ?')" class="inline">
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
                            <td colspan="2" class="px-6 py-10 text-center text-gray-500 italic">
                                Aucune catégorie trouvée.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>