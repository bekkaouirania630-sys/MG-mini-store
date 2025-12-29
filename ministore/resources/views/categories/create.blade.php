<x-app-layout>
    <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded-lg shadow">
        <h2 class="text-xl font-bold mb-4">Nouvelle Catégorie</h2>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block mb-2">Nom de la catégorie</label>
                <input type="text" name="name" class="w-full border-gray-300 rounded" required>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-black py-2 rounded">Enregistrer</button>
        </form>
    </div>
</x-app-layout>