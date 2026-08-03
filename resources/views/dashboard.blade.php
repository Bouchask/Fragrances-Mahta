<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-light text-2xl text-black uppercase tracking-widest">
                {{ __('Tableau de Bord Admin') }}
            </h2>
            <span class="text-xs font-mono font-bold uppercase tracking-wider text-emerald-700 bg-emerald-50 px-3 py-1 rounded-none border border-emerald-200">
                ● En ligne
            </span>
        </div>
    </x-slot>

    <div class="py-8 bg-[#fafafa] min-h-[calc(100vh-140px)] text-gray-900 font-sans">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            
            <!-- Clean Welcome Banner (Normal Boutique Website Aesthetic) -->
            <div class="bg-white border border-gray-200 p-6 sm:p-8 rounded-none shadow-2xs">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                    <div class="space-y-2">
                        <span class="inline-block text-[11px] uppercase tracking-widest font-bold text-gray-500">
                            Fragrances Mahta • Espace de Gestion
                        </span>
                        <h3 class="text-2xl sm:text-3xl font-light text-black tracking-tight uppercase">
                            Bienvenue, {{ Auth::user()->name }}
                        </h3>
                        <p class="text-gray-600 text-sm max-w-xl leading-relaxed">
                            Gérez vos commandes, produits et collections dans une interface épurée, cohérente avec l'expérience de votre boutique en ligne.
                        </p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3 sm:shrink-0">
                        <a href="{{ route('admin.orders.index') }}" 
                           class="inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-black hover:bg-gray-800 text-white font-bold uppercase text-xs tracking-wider transition rounded-none text-center">
                            <span>📦 Commandes Reçues</span>
                        </a>
                        <a href="{{ route('admin.products.index') }}" 
                           class="inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-white hover:bg-gray-50 text-black border border-black font-bold uppercase text-xs tracking-wider transition rounded-none text-center">
                            <span>✨ Catalogue</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Minimalist Stats Overview Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <!-- Orders Stat -->
                <a href="{{ route('admin.orders.index') }}" class="group block bg-white border border-gray-200 p-6 rounded-none hover:border-black transition">
                    <p class="text-[11px] text-gray-500 font-mono uppercase font-bold tracking-widest">Commandes</p>
                    <div class="mt-2 flex items-baseline justify-between">
                        <h3 class="text-4xl font-light text-black tracking-tight">{{ $stats['orders'] }}</h3>
                        <span class="text-xs font-bold uppercase tracking-wider text-gray-400 group-hover:text-black transition">Voir &rarr;</span>
                    </div>
                </a>

                <!-- Products Stat -->
                <a href="{{ route('admin.products.index') }}" class="group block bg-white border border-gray-200 p-6 rounded-none hover:border-black transition">
                    <p class="text-[11px] text-gray-500 font-mono uppercase font-bold tracking-widest">Produits</p>
                    <div class="mt-2 flex items-baseline justify-between">
                        <h3 class="text-4xl font-light text-black tracking-tight">{{ $stats['products'] }}</h3>
                        <span class="text-xs font-bold uppercase tracking-wider text-gray-400 group-hover:text-black transition">Gérer &rarr;</span>
                    </div>
                </a>

                <!-- Collections Stat -->
                <a href="{{ route('admin.collections.index') }}" class="group block bg-white border border-gray-200 p-6 rounded-none hover:border-black transition">
                    <p class="text-[11px] text-gray-500 font-mono uppercase font-bold tracking-widest">Collections</p>
                    <div class="mt-2 flex items-baseline justify-between">
                        <h3 class="text-4xl font-light text-black tracking-tight">{{ $stats['collections'] }}</h3>
                        <span class="text-xs font-bold uppercase tracking-wider text-gray-400 group-hover:text-black transition">Gérer &rarr;</span>
                    </div>
                </a>
            </div>

            <!-- Quick Navigation -> Clean Grid -->
            <div class="bg-white border border-gray-200 p-6 sm:p-8 rounded-none">
                <h4 class="text-xs font-bold text-black uppercase tracking-widest mb-6">Accès Rapide</h4>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                    <a href="{{ route('admin.orders.index') }}" class="p-4 bg-[#fafafa] hover:bg-gray-100 border border-gray-200 transition text-center flex flex-col items-center justify-center gap-2">
                        <span class="text-xl font-mono text-black">📦</span>
                        <span class="font-bold text-xs uppercase tracking-wider text-gray-800">Commandes</span>
                    </a>
                    <a href="{{ route('admin.products.index') }}" class="p-4 bg-[#fafafa] hover:bg-gray-100 border border-gray-200 transition text-center flex flex-col items-center justify-center gap-2">
                        <span class="text-xl font-mono text-black">💄</span>
                        <span class="font-bold text-xs uppercase tracking-wider text-gray-800">Produits</span>
                    </a>
                    <a href="{{ route('admin.collections.index') }}" class="p-4 bg-[#fafafa] hover:bg-gray-100 border border-gray-200 transition text-center flex flex-col items-center justify-center gap-2">
                        <span class="text-xl font-mono text-black">📂</span>
                        <span class="font-bold text-xs uppercase tracking-wider text-gray-800">Collections</span>
                    </a>
                    <a href="{{ route('admin.banners.index') }}" class="p-4 bg-[#fafafa] hover:bg-gray-100 border border-gray-200 transition text-center flex flex-col items-center justify-center gap-2">
                        <span class="text-xl font-mono text-black">🖼️</span>
                        <span class="font-bold text-xs uppercase tracking-wider text-gray-800">Bannières</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
