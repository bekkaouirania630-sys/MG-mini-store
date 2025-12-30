<x-app-layout>
    <div class="max-w-md mx-auto mt-10 p-8 bg-white rounded-2xl shadow-xl border-2 border-purple-100 relative overflow-hidden">
        <!-- Decorative Stickers (Background) -->

        <h2 class="text-3xl font-black text-black mb-8 text-center flex items-center justify-center gap-3">
            <span>📂</span> Nouvelle Catégorie
        </h2>

        <form action="{{ route('categories.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block mb-2 font-black text-black text-lg flex items-center gap-2">
                    <span>🏷️</span> Nom de la catégorie
                </label>
                <input type="text" name="name" 
                       class="w-full border-2 border-purple-200 rounded-xl p-3 text-black font-bold focus:border-blue-500 focus:ring-4 focus:ring-purple-100 transition-all placeholder-gray-400" 
                       placeholder="Entrez le nom ici..."
                       required>
            </div>

            <button type="submit" 
                    class="w-full bg-gradient-to-r from-purple-600 via-purple-500 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-black font-black py-4 rounded-xl shadow-lg transform hover:scale-[1.02] transition-all duration-200 flex justify-center items-center gap-2 text-lg">
                <span>Enregistrer</span>
                <span>🚀</span>
            </button>
        </form>
    </div>
</x-app-layout>