<x-app-layout>
    <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0 bg-gray-50 relative overflow-hidden">
        
        <!-- Decorative Background -->
        <div class="absolute top-20 left-10 text-9xl opacity-5 rotate-12 select-none">📂</div>
        <div class="absolute bottom-20 right-10 text-9xl opacity-5 -rotate-12 select-none">✨</div>

        <div class="w-full sm:max-w-md mt-10 px-6 py-8 bg-white shadow-2xl overflow-hidden sm:rounded-2xl border-2 border-purple-100 relative z-10">
            
            <div class="mb-8 text-center">
                <h2 class="text-3xl font-black text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-blue-500 mb-2">
                    Modifier Catégorie
                </h2>
                <p class="text-gray-500 font-bold">Mise à jour de {{ $category->name }}</p>
            </div>

            <form action="{{ route('categories.update', $category->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-black text-gray-700 mb-2">📂 Nom de la catégorie</label>
                    <input type="text" name="name" value="{{ $category->name }}" 
                           class="w-full rounded-xl border-2 border-purple-100 focus:border-blue-500 focus:ring-4 focus:ring-purple-100 transition-all font-bold text-gray-800" 
                           required>
                </div>

                <div class="flex items-center justify-between pt-4">
                    <a href="{{ route('categories.index') }}" class="text-gray-500 font-bold hover:text-gray-800 transition-colors flex items-center gap-1 group">
                        <span class="group-hover:-translate-x-1 transition-transform">⬅️</span> Retour
                    </a>
                    
                    <button type="submit" class="bg-gradient-to-r from-purple-600 via-purple-500 to-blue-600 text-white font-black py-3 px-8 rounded-xl shadow-lg transform hover:scale-[1.02] transition-all hover:shadow-xl flex items-center gap-2">
                        <span>💾</span> Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>