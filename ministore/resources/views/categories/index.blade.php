<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen relative overflow-hidden">
        
        <!-- Decorative Background -->
        <div class="absolute top-20 left-10 text-9xl opacity-5 rotate-45 select-none">📂</div>
        <div class="absolute bottom-20 right-10 text-9xl opacity-5 -rotate-12 select-none">✨</div>

        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 relative z-10">
            
            <!-- Header Section -->
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 shadow-md rounded-r-lg flex items-center gap-3">
                    <span class="text-xl">✅</span>
                    <p class="font-bold">{{ session('success') }}</p>
                </div>
            @endif

            <div class="flex justify-between items-center mb-8 px-4">
                <div>
                    <h2 class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-blue-500">
                        Gestion des Catégories
                    </h2>
                    <p class="text-gray-500 font-bold mt-1">Organisez vos produits efficacement</p>
                </div>
                <a href="{{ route('categories.create') }}" 
                   class="bg-gradient-to-r from-purple-600 to-blue-600 text-white px-6 py-3 rounded-xl font-black shadow-lg hover:shadow-xl hover:scale-105 transition-all flex items-center gap-2">
                    <span>➕</span> Ajouter
                </a>
            </div>

            <!-- Table Card -->
            <div class="bg-white rounded-3xl shadow-2xl border border-purple-100 overflow-hidden">
                <table class="min-w-full divide-y divide-gray-100">
                    <thead>
                        <tr class="bg-gradient-to-r from-purple-600 to-blue-600 text-white">
                            <th class="px-6 py-5 text-left text-sm font-black uppercase tracking-wider">
                                📂 Nom de la catégorie
                            </th>
                            <th class="px-6 py-5 text-right text-sm font-black uppercase tracking-wider">
                                ⚙️ Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @forelse($categories as $category)
                        <tr class="hover:bg-purple-50/50 transition-colors duration-200 group">
                            <td class="px-6 py-5 whitespace-nowrap">
                                <span class="text-lg font-bold text-gray-800 group-hover:text-purple-700 transition-colors">
                                    {{ $category->name }}
                                </span>
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap text-right">
                                <div class="flex justify-end items-center gap-3">
                                    <a href="{{ route('categories.edit', $category->id) }}" 
                                       class="bg-blue-50 text-blue-600 p-2 rounded-lg hover:bg-blue-100 hover:scale-110 transition-all shadow-sm"
                                       title="Modifier">
                                        ✏️
                                    </a>
                                    
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Supprimer cette catégorie ?')" class="inline">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="bg-red-50 text-red-600 p-2 rounded-lg hover:bg-red-100 hover:scale-110 transition-all shadow-sm"
                                                title="Supprimer">
                                            🗑️
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center">
                                    <span class="text-6xl mb-4 opacity-50">📂</span>
                                    <p class="text-xl font-bold text-gray-500">Aucune catégorie trouvée.</p>
                                    <p class="text-gray-400 text-sm mt-2">Commencez par en ajouter une nouvelle !</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination / Footer decorative -->
            <div class="mt-6 text-center">
                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">MiniStore System System</p>
            </div>
        </div>
    </div>
</x-app-layout>