<x-app-layout>
    <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0 bg-gray-50 relative overflow-hidden">
        
        <!-- Decorative Background -->
        <div class="absolute top-20 left-10 text-9xl opacity-5 rotate-12 select-none">👤</div>
        <div class="absolute bottom-20 right-10 text-9xl opacity-5 -rotate-12 select-none">📞</div>

        <div class="w-full sm:max-w-xl mt-10 px-6 py-8 bg-white shadow-2xl overflow-hidden sm:rounded-2xl border-2 border-purple-100 relative z-10">
            
            <div class="mb-8 text-center">
                <h2 class="text-3xl font-black text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-blue-500 mb-2">
                    Modifier le Client
                </h2>
                <p class="text-gray-500 font-bold">Mise à jour de {{ $client->name }}</p>
            </div>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-r-xl">
                    <div class="flex items-center">
                        <span class="text-red-500 text-xl mr-2">⚠️</span>
                        <p class="text-red-700 font-bold">Erreurs détectées :</p>
                    </div>
                    <ul class="mt-2 list-disc list-inside text-sm text-red-600 font-medium ml-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('clients.update', $client->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Nom -->
                <div>
                    <label class="block text-sm font-black text-gray-700 mb-2">👤 Nom Complet</label>
                    <input type="text" name="name" value="{{ old('name', $client->name) }}" 
                           class="w-full rounded-xl border-2 border-purple-100 focus:border-blue-500 focus:ring-4 focus:ring-purple-100 transition-all font-bold text-gray-800"
                           required>
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-black text-gray-700 mb-2">✉️ Email</label>
                    <input type="email" name="email" value="{{ old('email', $client->email) }}" 
                           class="w-full rounded-xl border-2 border-purple-100 focus:border-blue-500 focus:ring-4 focus:ring-purple-100 transition-all font-bold text-gray-800"
                           required>
                </div>

                <!-- Téléphone -->
                <div>
                    <label class="block text-sm font-black text-gray-700 mb-2">📞 Téléphone</label>
                    <input type="text" name="phone" value="{{ old('phone', $client->phone) }}" 
                           class="w-full rounded-xl border-2 border-purple-100 focus:border-blue-500 focus:ring-4 focus:ring-purple-100 transition-all font-bold text-gray-800">
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between pt-4">
                    <a href="{{ route('clients.index') }}" class="text-gray-500 font-bold hover:text-gray-800 transition-colors flex items-center gap-1 group">
                        <span class="group-hover:-translate-x-1 transition-transform">⬅️</span> Retour
                    </a>
                    
                    <button type="submit" class="bg-gradient-to-r from-purple-600 via-purple-500 to-blue-600 text-white font-black py-3 px-8 rounded-xl shadow-lg transform hover:scale-[1.02] transition-all hover:shadow-xl flex items-center gap-2">
                        <span>💾</span> Mettre à jour
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>