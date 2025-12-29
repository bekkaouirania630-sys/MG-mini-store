<x-app-layout>
    <div class="max-w-xl mx-auto mt-10 p-6 bg-white rounded shadow">
        <h2 class="text-xl font-bold mb-4">Ajouter un Client</h2>
        
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('clients.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label>Nom Complet</label>
                <input type="text" name="name" class="w-full border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label>Email</label>
                <input type="email" name="email" class="w-full border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label>Téléphone</label>
                <input type="text" name="phone" class="w-full border-gray-300 rounded">
            </div>
            <button type="submit" class="bg-indigo-600 text-black px-4 py-2 rounded">Créer le Client</button>
        </form>
    </div>
</x-app-layout>