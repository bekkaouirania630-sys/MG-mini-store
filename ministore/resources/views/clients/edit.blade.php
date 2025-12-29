<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight max-w-xl mx-auto">
            Modifier le Client : {{ $client->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-200">
                
                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>- {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('clients.update', $client->id) }}" method="POST">
                    @csrf
                    @method('PUT') <div class="space-y-4">
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Nom Complet</label>
                            <input type="text" name="name" value="{{ old('name', $client->name) }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500" required>
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700">Email</label>
                            <input type="email" name="email" value="{{ old('email', $client->email) }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500" required>
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700">Téléphone</label>
                            <input type="text" name="phone" value="{{ old('phone', $client->phone) }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500">
                        </div>
                    </div>

                    <div class="mt-8 flex items-center space-x-4">
                        <button type="submit" class="bg-indigo-600 text-black px-6 py-2 rounded-md font-bold hover:bg-indigo-700 transition">
                            Mettre à jour
                        </button>
                        <a href="{{ route('clients.index') }}" class="bg-indigo-600 text-black px-6 py-2 rounded-md font-bold hover:bg-indigo-700 transition">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>