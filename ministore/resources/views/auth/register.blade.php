<x-guest-layout>
    <div class="p-4 bg-white rounded-2xl shadow-xl border-2 border-purple-100 relative overflow-hidden">
        <!-- Decorative Stickers (Background) -->
        <div class="absolute -top-4 -right-4 text-5xl opacity-10 rotate-12 select-none">✨</div>
        <div class="absolute -bottom-4 -left-4 text-5xl opacity-10 -rotate-12 select-none">🔐</div>

        <h2 class="text-2xl font-black text-black mb-6 text-center flex items-center justify-center gap-2">
            <span>📝</span> Inscription
        </h2>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <!-- Name -->
            <div>
                <label class="block mb-1 font-black text-black text-sm flex items-center gap-2">
                    <span>👤</span> Nom Complet
                </label>
                <x-text-input id="name" class="w-full border-2 border-purple-200 rounded-xl p-2 text-black font-bold focus:border-blue-500 focus:ring-4 focus:ring-purple-100 transition-all placeholder-gray-400" 
                              type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Ex: Jean Dupont" />
                <x-input-error :messages="$errors->get('name')" class="mt-1" />
            </div>

            <!-- Email Address -->
            <div>
                <label class="block mb-1 font-black text-black text-sm flex items-center gap-2">
                    <span>✉️</span> Email
                </label>
                <x-text-input id="email" class="w-full border-2 border-purple-200 rounded-xl p-2 text-black font-bold focus:border-blue-500 focus:ring-4 focus:ring-purple-100 transition-all placeholder-gray-400" 
                              type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="exemple@email.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>

            <!-- Password -->
            <div>
                <label class="block mb-1 font-black text-black text-sm flex items-center gap-2">
                    <span>🔒</span> Mot de passe
                </label>
                <x-text-input id="password" class="w-full border-2 border-purple-200 rounded-xl p-2 text-black font-bold focus:border-blue-500 focus:ring-4 focus:ring-purple-100 transition-all placeholder-gray-400"
                              type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
                <x-input-error :messages="$errors->get('password')" class="mt-1" />
            </div>

            <!-- Confirm Password -->
            <div>
                <label class="block mb-1 font-black text-black text-sm flex items-center gap-2">
                    <span>✅</span> Confirmation
                </label>
                <x-text-input id="password_confirmation" class="w-full border-2 border-purple-200 rounded-xl p-2 text-black font-bold focus:border-blue-500 focus:ring-4 focus:ring-purple-100 transition-all placeholder-gray-400"
                              type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
            </div>

            <div class="flex items-center justify-between mt-6 gap-4">
                <a class="text-sm text-gray-600 hover:text-purple-700 font-bold underline decoration-2 decoration-purple-200 underline-offset-4 transition-colors" href="{{ route('login') }}">
                    Déjà inscrit ?
                </a>

                <button type="submit" class="bg-gradient-to-r from-purple-600 via-purple-500 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white font-black py-2 px-6 rounded-xl shadow-md transform hover:scale-[1.02] transition-all duration-200 flex items-center gap-2">
                    <span>S'inscrire</span>
                    <span>🚀</span>
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
