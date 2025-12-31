<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center py-2">
            <div>
                <h2 class="font-serif text-3xl text-slate-900 tracking-wide">
                    {{ __('BOUTIQUE') }}
                </h2>
                <p class="text-xs text-slate-500 uppercase tracking-widest mt-1">Collection Exclusive</p>
            </div>
            <a href="{{ route('customer.orders') }}" class="inline-flex items-center px-6 py-3 bg-slate-900 border border-transparent rounded-none font-medium text-xs text-white uppercase tracking-widest hover:bg-slate-800 transition-all duration-300 shadow-lg hover:shadow-xl">
                Mes Commandes
            </a>
        </div>
    </x-slot>

    {{-- Hero/Brand Section --}}
    <div class="relative bg-slate-900 text-white overflow-hidden mb-12">
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1441986300917-64674bd600d8?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80')] bg-cover bg-center opacity-20"></div>
        <div class="relative max-w-7xl mx-auto px-6 lg:px-8 py-24 text-center">
            <h1 class="font-serif text-4xl md:text-6xl text-white mb-6 tracking-tight">
                L'Excellence au Quotidien
            </h1>
            <p class="text-lg text-slate-300 max-w-2xl mx-auto font-light tracking-wide mb-8">
                Une sélection rigoureuse de produits pour ceux qui ne font aucun compromis sur la qualité.
            </p>
            <div class="w-24 h-1 bg-white mx-auto"></div>
        </div>
    </div>

    <div class="pb-24 bg-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Feedback Messages --}}
            @if(session('success'))
                <div class="mb-10 text-center">
                    <div class="inline-block px-6 py-3 bg-green-50 text-green-800 text-sm font-medium border border-green-100 rounded-full">
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            
            @if(session('error'))
                <div class="mb-10 text-center">
                    <div class="inline-block px-6 py-3 bg-red-50 text-red-800 text-sm font-medium border border-red-100 rounded-full">
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            <div class="flex items-end justify-between mb-12 border-b border-gray-100 pb-4">
                <h3 class="font-serif text-2xl text-slate-900">Nos Produits</h3>
                <span class="text-sm font-mono text-slate-400">{{ $products->count() }} ARTICLES</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-8 gap-y-16">
                @foreach($products as $product)
                    <div class="group flex flex-col h-full bg-white">
                        {{-- Image Container --}}
                        <div class="relative aspect-[3/4] overflow-hidden bg-gray-100 mb-6">
                            @if($product->image)
                                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover object-center transform transition-transform duration-700 ease-in-out group-hover:scale-110">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-200">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                            
                            {{-- Overlay Actions --}}
                            <div class="absolute inset-x-0 bottom-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out">
                                <form action="{{ route('customer.order.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="w-full bg-white text-slate-900 font-medium text-xs uppercase tracking-widest py-3 hover:bg-slate-900 hover:text-white transition-colors shadow-lg" {{ $product->quantity == 0 ? 'disabled' : '' }}>
                                        {{ $product->quantity > 0 ? 'Ajouter au Panier' : 'Indisponible' }}
                                    </button>
                                </form>
                            </div>
                            
                            {{-- Badge --}}
                            @if($product->category)
                                <div class="absolute top-4 left-4">
                                    <span class="bg-white/90 backdrop-blur px-3 py-1 text-[10px] font-bold uppercase tracking-widest text-slate-900">
                                        {{ $product->category->name }}
                                    </span>
                                </div>
                            @endif
                        </div>

                        {{-- Content --}}
                        <div class="flex-grow flex flex-col items-center text-center px-2">
                            <h3 class="text-lg font-medium text-slate-900 mb-2 font-serif group-hover:text-slate-600 transition-colors">
                                {{ $product->name }}
                            </h3>
                            <p class="text-sm text-gray-500 mb-4 line-clamp-2 max-w-[90%] font-light">
                                {{ $product->description }}
                            </p>
                            
                            <div class="mt-auto space-y-2 w-full">
                                <p class="text-lg font-semibold text-slate-900">
                                    {{ number_format($product->price, 2) }} DH
                                </p>
                                
                                {{-- Stock Indicator --}}
                                <div class="text-[10px] font-bold uppercase tracking-widest {{ $product->quantity > 0 ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $product->quantity > 0 ? 'En Stock' : 'Rupture de stock' }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>
