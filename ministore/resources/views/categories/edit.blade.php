<x-app-layout>
    <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded-lg shadow">
        <h2 class="text-xl font-bold mb-4">Modifier Catégorie</h2>
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-4">
                <label class="block mb-2">Nom</label>
                <input type="text" name="name" value="{{ $category->name }}" class="w-full border-gray-300 rounded" required>
            </div>
            <button type="submit" class="w-full bg-green-800 text-black py-2 rounded">Mettre à jour</button>
        </form>
    </div>
</x-app-layout>