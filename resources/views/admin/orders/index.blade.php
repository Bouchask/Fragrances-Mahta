<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-light text-2xl text-black uppercase tracking-widest">
                {{ __('Gestion des Commandes') }}
            </h2>
            <span class="text-xs font-mono uppercase tracking-widest text-gray-500">
                Fragrances Mahta Admin
            </span>
        </div>
    </x-slot>

    <div class="py-8 bg-[#fafafa] min-h-[calc(100vh-140px)] text-gray-900 font-sans">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            <!-- Collapsible Minimalist Filter Section -->
            <div x-data="{ showFilters: false }" class="bg-white border border-gray-200 p-6 shadow-2xs">
                <div class="flex items-center justify-between cursor-pointer sm:cursor-default" @click="showFilters = !showFilters">
                    <h3 class="text-xs font-bold text-black uppercase tracking-widest flex items-center gap-2">
                        <span>🔍 Recherche & Filtres</span>
                        @if(request()->hasAny(['date', 'status', 'product_id', 'collection_id']))
                            <span class="px-2 py-0.5 text-[10px] font-mono bg-black text-white font-bold uppercase">Actif</span>
                        @endif
                    </h3>
                    <button type="button" class="sm:hidden text-xs uppercase tracking-wider font-bold text-black border-b border-black pb-0.5">
                        <span x-text="showFilters ? 'Masquer' : 'Afficher les filtres'">Afficher les filtres</span>
                    </button>
                </div>

                <div class="mt-6 sm:mt-6 transition-all duration-200" :class="showFilters ? 'block' : 'hidden sm:block'">
                    <form method="GET" action="{{ route('admin.orders.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 items-end">
                        <!-- Date -->
                        <div>
                            <label class="block text-[11px] font-mono font-bold uppercase tracking-wider text-gray-500 mb-1">Date</label>
                            <input type="date" name="date" value="{{ request('date') }}" 
                                   class="w-full text-xs bg-white border border-gray-300 text-black rounded-none focus:border-black focus:ring-0 p-2.5">
                        </div>

                        <!-- Statut -->
                        <div>
                            <label class="block text-[11px] font-mono font-bold uppercase tracking-wider text-gray-500 mb-1">Statut</label>
                            <select name="status" class="w-full text-xs bg-white border border-gray-300 text-black rounded-none focus:border-black focus:ring-0 p-2.5">
                                <option value="">Tous les statuts</option>
                                <option value="Créé" {{ request('status') == 'Créé' ? 'selected' : '' }}>Créé</option>
                                <option value="Validation de confirmation" {{ request('status') == 'Validation de confirmation' ? 'selected' : '' }}>Confirmé</option>
                                <option value="Livré" {{ request('status') == 'Livré' ? 'selected' : '' }}>Livré</option>
                                <option value="Retour" {{ request('status') == 'Retour' ? 'selected' : '' }}>Retour</option>
                            </select>
                        </div>

                        <!-- Produit -->
                        <div>
                            <label class="block text-[11px] font-mono font-bold uppercase tracking-wider text-gray-500 mb-1">Produit</label>
                            <select name="product_id" class="w-full text-xs bg-white border border-gray-300 text-black rounded-none focus:border-black focus:ring-0 p-2.5">
                                <option value="">Tous les produits</option>
                                @foreach($products as $prod)
                                    <option value="{{ $prod->id }}" {{ request('product_id') == $prod->id ? 'selected' : '' }}>{{ $prod->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Collection -->
                        <div>
                            <label class="block text-[11px] font-mono font-bold uppercase tracking-wider text-gray-500 mb-1">Collection</label>
                            <select name="collection_id" class="w-full text-xs bg-white border border-gray-300 text-black rounded-none focus:border-black focus:ring-0 p-2.5">
                                <option value="">Toutes les collections</option>
                                @foreach($collections as $col)
                                    <option value="{{ $col->id }}" {{ request('collection_id') == $col->id ? 'selected' : '' }}>{{ $col->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Buttons -->
                        <div class="flex items-center gap-2 pt-1">
                            <button type="submit" class="flex-grow inline-flex justify-center items-center bg-black hover:bg-gray-800 text-white font-bold uppercase text-xs tracking-widest px-4 py-2.5 rounded-none transition">
                                Filtrer
                            </button>
                            @if(request()->hasAny(['date', 'status', 'product_id', 'collection_id']))
                                <a href="{{ route('admin.orders.index') }}" class="px-3 py-2.5 text-xs uppercase tracking-wider font-bold text-gray-500 hover:text-black bg-gray-100 hover:bg-gray-200 rounded-none transition" title="Réinitialiser">
                                    Reset
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

            @if(session('success'))
                <div class="p-4 text-xs font-mono uppercase tracking-wider font-bold text-emerald-800 bg-emerald-50 border border-emerald-300">
                    ✓ {{ session('success') }}
                </div>
            @endif

            <!-- 1. MOBILE CARDS VIEW (Clean Minimalist Theme - md:hidden) -->
            <div class="md:hidden space-y-4">
                @forelse($orders as $order)
                    @php
                        $cleanPhone = preg_replace('/[^0-9]/', '', $order->phone);
                        if (str_starts_with($cleanPhone, '0')) {
                            $cleanPhone = '212' . substr($cleanPhone, 1);
                        }
                        $wtsItems = "";
                        foreach($order->items as $i) {
                            $wtsItems .= "▪️ " . (optional($i->product)->name ?? 'Produit') . " (x" . $i->quantity . ")\n";
                        }
                        $wtsMsg = "تم تأكيد طلبك بنجاح، السيد(ة) " . $order->name . ". 🌸\n\n";
                        $wtsMsg .= "📦 *معلومات الطلب:* \n" . $wtsItems;
                        $wtsMsg .= "📍 *العنوان:* " . $order->city . "\n";
                        $wtsMsg .= "💰 *المجموع:* *" . number_format($order->total_price, 2) . " درهم* (توصيل مجاني)\n\n";
                        $wtsMsg .= "شكرًا لثقتك بنا، وسيتم التواصل معك قريبًا من طرف شركة التوصيل لتأكيد موعد الاستلام. نتمنى لك تجربة ممتازة مع منتجنا. 💖";
                        $wtsUrl = "https://api.whatsapp.com/send?phone=" . $cleanPhone . "&text=" . rawurlencode($wtsMsg);
                    @endphp
                    <div class="bg-white border border-gray-200 p-5 rounded-none shadow-2xs space-y-4">
                        <!-- Header: ID + Date + Status -->
                        <div class="flex items-center justify-between border-b border-gray-100 pb-3">
                            <div class="flex items-center gap-2">
                                <span class="px-2.5 py-1 bg-black text-white font-mono font-bold text-xs uppercase tracking-wider">
                                    #{{ $order->id }}
                                </span>
                                <span class="text-xs font-mono text-gray-500">
                                    {{ $order->created_at->format('d/m/Y - H:i') }}
                                </span>
                            </div>
                            <div>
                                @if($order->status == 'Créé')
                                    <span class="px-2 py-0.5 text-[10px] font-mono uppercase font-bold text-blue-800 bg-blue-50 border border-blue-200">Créé</span>
                                @elseif($order->status == 'Validation de confirmation')
                                    <span class="px-2 py-0.5 text-[10px] font-mono uppercase font-bold text-amber-800 bg-amber-50 border border-amber-200">Confirmé</span>
                                @elseif($order->status == 'Livré')
                                    <span class="px-2 py-0.5 text-[10px] font-mono uppercase font-bold text-emerald-800 bg-emerald-50 border border-emerald-200">Livré</span>
                                @elseif($order->status == 'Retour')
                                    <span class="px-2 py-0.5 text-[10px] font-mono uppercase font-bold text-red-800 bg-red-50 border border-red-200">Retour</span>
                                @else
                                    <span class="px-2 py-0.5 text-[10px] font-mono uppercase font-bold bg-gray-100 text-gray-800">{{ $order->status }}</span>
                                @endif
                            </div>
                        </div>

                        <!-- Customer & WhatsApp -->
                        <div class="space-y-2">
                            <div class="flex items-center justify-between gap-2">
                                <h4 class="font-bold text-sm uppercase tracking-wider text-black truncate">
                                    {{ $order->name }}
                                </h4>
                                <a href="{{ $wtsUrl }}" target="_blank" 
                                   class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-[#25D366] hover:bg-emerald-600 text-white font-bold uppercase text-[10px] tracking-widest rounded-none shadow-2xs transition shrink-0">
                                    <svg viewBox="0 0 24 24" width="13" height="13" fill="currentColor"><path d="M11.944 0A12 12 0 0 0 0 12a11.96 11.96 0 0 0 1.944 6.556L.067 24l5.63-1.852A11.96 11.96 0 0 0 11.944 24c6.627 0 12-5.373 12-12s-5.373-12-12-12zm6.98 17.15c-.295.83-1.72 1.583-2.38 1.66-.662.08-1.52.122-4.9-1.28-4.32-1.79-7.085-6.215-7.302-6.505-.215-.29-1.74-2.32-1.74-4.426 0-2.107 1.11-3.14 1.503-3.57.393-.43.86-.54 1.147-.54.286 0 .573.004.823.018.266.015.623-.1.977.75.365.88 1.253 3.053 1.36 3.277.108.225.18.485.036.776-.143.29-.215.473-.43.725-.215.253-.448.56-.642.753-.215.215-.443.45-.194.88.25.43 1.11 1.83 2.382 2.966 1.636 1.46 3.017 1.91 3.447 2.126.43.215.68.18.932-.108.25-.29 1.075-1.253 1.36-1.685.287-.43.574-.358.968-.215.394.143 2.508 1.182 2.937 1.397.43.215.717.323.823.502.108.18.108 1.039-.187 1.87z"/></svg>
                                    <span>WhatsApp</span>
                                </a>
                            </div>
                            <div class="flex flex-wrap items-center gap-2 text-xs text-gray-600">
                                <span class="bg-gray-100 px-2 py-0.5 font-mono text-black font-bold">{{ $order->phone }}</span>
                                <span class="text-gray-400">•</span>
                                <span class="font-medium text-gray-800">{{ $order->city }}</span>
                            </div>
                        </div>

                        <!-- Items & Total -->
                        <div class="bg-[#fafafa] p-3.5 border border-gray-200 space-y-2">
                            <div class="text-xs text-gray-700 space-y-1.5 font-sans">
                                @foreach($order->items as $item)
                                    <div class="flex items-center justify-between">
                                        <span class="font-medium text-gray-800">{{ optional($item->product)->name ?? 'Produit Supprimé' }}</span>
                                        <span class="font-mono font-bold text-black bg-white px-2 py-0.5 border border-gray-200">x{{ $item->quantity }}</span>
                                    </div>
                                @endforeach
                            </div>
                            <div class="pt-2 border-t border-gray-200 flex items-center justify-between">
                                <span class="text-[11px] font-mono uppercase font-bold text-gray-500">Total :</span>
                                <span class="text-sm font-black font-mono text-black">{{ number_format($order->total_price, 2) }} DH</span>
                            </div>
                        </div>

                        <!-- Quick Action Footer (Status & Delete) -->
                        <div class="flex items-center gap-2 pt-1 border-t border-gray-100">
                            <form action="{{ route('admin.orders.update', $order) }}" method="POST" class="flex-grow">
                                @csrf
                                @method('PUT')
                                <select name="status" onchange="this.form.submit()" 
                                        class="w-full text-xs font-bold uppercase tracking-wider bg-white border border-gray-300 rounded-none py-2 px-3 text-black focus:border-black focus:ring-0 cursor-pointer transition">
                                    <option value="Créé" {{ $order->status == 'Créé' ? 'selected' : '' }}>Statut : Créé</option>
                                    <option value="Validation de confirmation" {{ $order->status == 'Validation de confirmation' ? 'selected' : '' }}>Statut : Confirmé</option>
                                    <option value="Livré" {{ $order->status == 'Livré' ? 'selected' : '' }}>Statut : Livré</option>
                                    <option value="Retour" {{ $order->status == 'Retour' ? 'selected' : '' }}>Statut : Retour</option>
                                </select>
                            </form>
                            <form action="{{ route('admin.orders.destroy', $order) }}" method="POST" onsubmit="return confirm('Supprimer la commande #{{ $order->id }} ?');" class="shrink-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 bg-white hover:bg-red-50 text-gray-400 hover:text-red-600 border border-gray-300 transition flex items-center justify-center rounded-none" title="Supprimer">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="py-12 text-center text-gray-400 font-mono text-xs uppercase border border-gray-200 bg-white">
                        Aucune commande trouvée.
                    </div>
                @endforelse
            </div>

            <!-- 2. DESKTOP ORDERS TABLE (Clean Minimalist Theme - hidden md:block) -->
            <div class="hidden md:block bg-white border border-gray-200 shadow-2xs">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-[#fafafa] border-b border-gray-200 text-[11px] font-mono font-bold text-gray-600 uppercase tracking-wider">
                                <th class="py-3.5 px-4">ID</th>
                                <th class="py-3.5 px-4">Date</th>
                                <th class="py-3.5 px-4">Client & WhatsApp</th>
                                <th class="py-3.5 px-4">Produits</th>
                                <th class="py-3.5 px-4 text-right">Total</th>
                                <th class="py-3.5 px-4 text-center">Statut</th>
                                <th class="py-3.5 px-4 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 text-sm text-gray-800">
                            @forelse($orders as $order)
                                @php
                                    $cleanPhone = preg_replace('/[^0-9]/', '', $order->phone);
                                    if (str_starts_with($cleanPhone, '0')) {
                                        $cleanPhone = '212' . substr($cleanPhone, 1);
                                    }
                                    $wtsItems = "";
                                    foreach($order->items as $i) {
                                        $wtsItems .= "▪️ " . (optional($i->product)->name ?? 'Produit') . " (x" . $i->quantity . ")\n";
                                    }
                                    $wtsMsg = "تم تأكيد طلبك بنجاح، السيد(ة) " . $order->name . ". 🌸\n\n";
                                    $wtsMsg .= "📦 *معلومات الطلب:* \n" . $wtsItems;
                                    $wtsMsg .= "📍 *العنوان:* " . $order->city . "\n";
                                    $wtsMsg .= "💰 *المجموع:* *" . number_format($order->total_price, 2) . " درهم* (توصيل مجاني)\n\n";
                                    $wtsMsg .= "شكرًا لثقتك بنا، وسيتم التواصل معك قريبًا من طرف شركة التوصيل لتأكيد موعد الاستلام. نتمنى لك تجربة ممتازة مع منتجنا. 💖";
                                    $wtsUrl = "https://api.whatsapp.com/send?phone=" . $cleanPhone . "&text=" . rawurlencode($wtsMsg);
                                @endphp
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="py-4 px-4 font-mono font-bold text-black text-xs">#{{ $order->id }}</td>
                                    <td class="py-4 px-4 text-xs font-mono text-gray-500 whitespace-nowrap">
                                        {{ $order->created_at->format('Y-m-d') }}<br>
                                        <span class="text-gray-400">{{ $order->created_at->format('H:i') }}</span>
                                    </td>
                                    <td class="py-4 px-4">
                                        <div class="flex items-center gap-2 mb-1">
                                            <span class="font-bold text-black text-sm">{{ $order->name }}</span>
                                            <a href="{{ $wtsUrl }}" target="_blank" title="Envoyer WhatsApp" 
                                               class="inline-flex items-center gap-1 px-2 py-0.5 bg-[#25D366] hover:bg-emerald-600 text-white font-bold text-[10px] uppercase tracking-widest rounded-none transition shrink-0">
                                                <span>WhatsApp</span>
                                            </a>
                                        </div>
                                        <div class="text-xs text-gray-500 flex items-center gap-2">
                                            <span class="font-mono text-gray-800">{{ $order->phone }}</span>
                                            <span>•</span>
                                            <span class="truncate max-w-xs">{{ $order->city }}</span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4">
                                        <div class="space-y-1">
                                            @foreach($order->items as $item)
                                                <div class="text-xs text-gray-700 flex items-center gap-1.5">
                                                    <span>{{ optional($item->product)->name ?? 'Produit Supprimé' }}</span>
                                                    <span class="font-mono font-bold text-black">(x{{ $item->quantity }})</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td class="py-4 px-4 text-right font-mono font-black text-black whitespace-nowrap">
                                        {{ number_format($order->total_price, 2) }} DH
                                    </td>
                                    <td class="py-4 px-4 text-center whitespace-nowrap">
                                        @if($order->status == 'Créé')
                                            <span class="px-2.5 py-1 text-xs font-mono font-bold uppercase text-blue-800 bg-blue-50 border border-blue-200">Créé</span>
                                        @elseif($order->status == 'Validation de confirmation')
                                            <span class="px-2.5 py-1 text-xs font-mono font-bold uppercase text-amber-800 bg-amber-50 border border-amber-200">Confirmé</span>
                                        @elseif($order->status == 'Livré')
                                            <span class="px-2.5 py-1 text-xs font-mono font-bold uppercase text-emerald-800 bg-emerald-50 border border-emerald-200">Livré</span>
                                        @elseif($order->status == 'Retour')
                                            <span class="px-2.5 py-1 text-xs font-mono font-bold uppercase text-red-800 bg-red-50 border border-red-200">Retour</span>
                                        @else
                                            <span class="px-2.5 py-1 text-xs font-mono font-bold uppercase bg-gray-100 text-gray-800">{{ $order->status }}</span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-4 text-center whitespace-nowrap">
                                        <div class="flex items-center justify-center gap-2">
                                            <form action="{{ route('admin.orders.update', $order) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <select name="status" onchange="this.form.submit()" 
                                                        class="text-xs uppercase font-bold bg-white border border-gray-300 rounded-none py-1.5 px-2 text-black focus:border-black focus:ring-0 cursor-pointer">
                                                    <option value="Créé" {{ $order->status == 'Créé' ? 'selected' : '' }}>Créé</option>
                                                    <option value="Validation de confirmation" {{ $order->status == 'Validation de confirmation' ? 'selected' : '' }}>Confirmé</option>
                                                    <option value="Livré" {{ $order->status == 'Livré' ? 'selected' : '' }}>Livré</option>
                                                    <option value="Retour" {{ $order->status == 'Retour' ? 'selected' : '' }}>Retour</option>
                                                </select>
                                            </form>
                                            <form action="{{ route('admin.orders.destroy', $order) }}" method="POST" onsubmit="return confirm('Supprimer la commande #{{ $order->id }} ?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-1.5 bg-white hover:bg-red-50 text-gray-400 hover:text-red-600 border border-gray-300 transition rounded-none" title="Supprimer">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="py-12 text-center font-mono text-xs uppercase text-gray-400">
                                        Aucune commande trouvée.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            @if($orders->hasPages())
                <div class="mt-6 border-t border-gray-200 pt-4">
                    {{ $orders->links() }}
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
