<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-gray-800 leading-tight tracking-tight">
                {{ __('Gestion des Commandes') }}
            </h2>
            <span class="text-sm font-semibold text-gray-500 bg-gray-100 px-3 py-1 rounded-full border border-gray-200">
                Total : {{ $orders->total() }} commande(s)
            </span>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Filter Section (10/10 Design) -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-6 border border-gray-200">
                <h3 class="text-sm font-bold text-gray-700 uppercase tracking-wider mb-4 flex items-center gap-2">
                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                    </svg>
                    Filtrer les commandes
                </h3>

                <form method="GET" action="{{ route('admin.orders.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 items-end">
                    <!-- Date -->
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 mb-1">Date de création</label>
                        <input type="date" name="date" value="{{ request('date') }}" 
                               class="w-full text-sm bg-gray-50 border border-gray-300 text-gray-800 rounded-lg focus:ring-2 focus:ring-blue-500 focus:bg-white transition p-2.5">
                    </div>

                    <!-- Statut -->
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 mb-1">Statut</label>
                        <select name="status" class="w-full text-sm bg-gray-50 border border-gray-300 text-gray-800 rounded-lg focus:ring-2 focus:ring-blue-500 focus:bg-white transition p-2.5">
                            <option value="">Tous les statuts</option>
                            <option value="Créé" {{ request('status') == 'Créé' ? 'selected' : '' }}>🔵 Créé</option>
                            <option value="Validation de confirmation" {{ request('status') == 'Validation de confirmation' ? 'selected' : '' }}>🟡 Confirmé</option>
                            <option value="Livré" {{ request('status') == 'Livré' ? 'selected' : '' }}>🟢 Livré</option>
                            <option value="Retour" {{ request('status') == 'Retour' ? 'selected' : '' }}>🔴 Retour</option>
                        </select>
                    </div>

                    <!-- Produit -->
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 mb-1">Produit</label>
                        <select name="product_id" class="w-full text-sm bg-gray-50 border border-gray-300 text-gray-800 rounded-lg focus:ring-2 focus:ring-blue-500 focus:bg-white transition p-2.5">
                            <option value="">Tous les produits</option>
                            @foreach($products as $prod)
                                <option value="{{ $prod->id }}" {{ request('product_id') == $prod->id ? 'selected' : '' }}>{{ $prod->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Collection -->
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 mb-1">Collection</label>
                        <select name="collection_id" class="w-full text-sm bg-gray-50 border border-gray-300 text-gray-800 rounded-lg focus:ring-2 focus:ring-blue-500 focus:bg-white transition p-2.5">
                            <option value="">Toutes les collections</option>
                            @foreach($collections as $col)
                                <option value="{{ $col->id }}" {{ request('collection_id') == $col->id ? 'selected' : '' }}>{{ $col->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Buttons -->
                    <div class="flex items-center gap-2 pt-1">
                        <button type="submit" class="flex-grow inline-flex justify-center items-center gap-1 bg-slate-800 hover:bg-slate-900 text-white font-semibold px-4 py-2.5 rounded-lg shadow-sm transition text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            Filtrer
                        </button>
                        @if(request()->hasAny(['date', 'status', 'product_id', 'collection_id']))
                            <a href="{{ route('admin.orders.index') }}" class="px-3 py-2.5 text-sm font-medium text-gray-500 hover:text-gray-800 bg-gray-100 hover:bg-gray-200 rounded-lg transition" title="Réinitialiser">
                                ↺ Reset
                            </a>
                        @endif
                    </div>
                </form>
            </div>

            <!-- Orders Table Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-200">
                <div class="p-6">
                    @if(session('success'))
                        <div class="mb-6 p-4 text-sm font-medium text-emerald-800 rounded-lg bg-emerald-50 border border-emerald-200 shadow-xs flex items-center gap-2">
                            <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50 border-b border-gray-200 text-xs font-bold text-gray-600 uppercase tracking-wider">
                                    <th class="py-3.5 px-4 rounded-tl-lg">ID</th>
                                    <th class="py-3.5 px-4">Date & Heure</th>
                                    <th class="py-3.5 px-4">Client</th>
                                    <th class="py-3.5 px-4">Produit(s)</th>
                                    <th class="py-3.5 px-4 text-right">Total</th>
                                    <th class="py-3.5 px-4 text-center">Statut</th>
                                    <th class="py-3.5 px-4 text-center rounded-tr-lg">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 text-sm text-gray-800">
                                @forelse($orders as $order)
                                    @php
                                        // Format phone number for WhatsApp Morocco (convert leading 0 to 212)
                                        $cleanPhone = preg_replace('/[^0-9]/', '', $order->phone);
                                        if (str_starts_with($cleanPhone, '0')) {
                                            $cleanPhone = '212' . substr($cleanPhone, 1);
                                        }

                                        // Build compact Arabic confirmation message with order details
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
                                    <tr class="hover:bg-gray-50 transition duration-150">
                                        <td class="py-3.5 px-4 font-bold text-slate-700">#{{ $order->id }}</td>
                                        <td class="py-3.5 px-4 text-xs font-medium text-gray-500 whitespace-nowrap">
                                            {{ $order->created_at->format('Y-m-d') }}<br>
                                            <span class="text-gray-400">{{ $order->created_at->format('H:i') }}</span>
                                        </td>
                                        <td class="py-3.5 px-4">
                                            <div class="flex items-center gap-2 mb-1">
                                                <span class="font-bold text-gray-900">{{ $order->name }}</span>
                                                <a href="{{ $wtsUrl }}" target="_blank" title="Envoyer confirmation par WhatsApp" 
                                                   class="inline-flex items-center gap-1 px-2 py-0.5 bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-xs rounded-full shadow-2xs transition hover:scale-105 shrink-0">
                                                    <svg viewBox="0 0 24 24" width="13" height="13" fill="currentColor">
                                                        <path d="M11.944 0A12 12 0 0 0 0 12a11.96 11.96 0 0 0 1.944 6.556L.067 24l5.63-1.852A11.96 11.96 0 0 0 11.944 24c6.627 0 12-5.373 12-12s-5.373-12-12-12zm6.98 17.15c-.295.83-1.72 1.583-2.38 1.66-.662.08-1.52.122-4.9-1.28-4.32-1.79-7.085-6.215-7.302-6.505-.215-.29-1.74-2.32-1.74-4.426 0-2.107 1.11-3.14 1.503-3.57.393-.43.86-.54 1.147-.54.286 0 .573.004.823.018.266.015.623-.1.977.75.365.88 1.253 3.053 1.36 3.277.108.225.18.485.036.776-.143.29-.215.473-.43.725-.215.253-.448.56-.642.753-.215.215-.443.45-.194.88.25.43 1.11 1.83 2.382 2.966 1.636 1.46 3.017 1.91 3.447 2.126.43.215.68.18.932-.108.25-.29 1.075-1.253 1.36-1.685.287-.43.574-.358.968-.215.394.143 2.508 1.182 2.937 1.397.43.215.717.323.823.502.108.18.108 1.039-.187 1.87z"/>
                                                    </svg>
                                                    <span>WhatsApp</span>
                                                </a>
                                            </div>
                                            <div class="text-xs text-gray-500 flex items-center gap-1.5 mt-0.5">
                                                <span class="font-mono bg-gray-100 px-1.5 py-0.5 rounded text-gray-700 font-medium">{{ $order->phone }}</span>
                                                <span>•</span>
                                                <span class="truncate max-w-xs">{{ $order->city }}</span>
                                            </div>
                                        </td>
                                        <td class="py-3.5 px-4">
                                            <div class="space-y-1">
                                                @foreach($order->items as $item)
                                                    <div class="text-xs font-medium text-gray-700 flex items-center gap-1">
                                                        <span class="w-1.5 h-1.5 rounded-full bg-blue-500 shrink-0"></span>
                                                        <span>{{ optional($item->product)->name ?? 'Produit Supprimé' }}</span>
                                                        <span class="font-bold text-slate-900 ml-0.5">(x{{ $item->quantity }})</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td class="py-3.5 px-4 text-right font-bold text-emerald-600 whitespace-nowrap">
                                            {{ number_format($order->total_price, 2) }} dh
                                        </td>
                                        <td class="py-3.5 px-4 text-center whitespace-nowrap">
                                            @if($order->status == 'Créé')
                                                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-bold bg-blue-50 text-blue-700 border border-blue-200 shadow-xs">
                                                    <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                                                    Créé
                                                </span>
                                            @elseif($order->status == 'Validation de confirmation')
                                                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-bold bg-amber-50 text-amber-700 border border-amber-200 shadow-xs">
                                                    <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                                                    Confirmé
                                                </span>
                                            @elseif($order->status == 'Livré')
                                                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 shadow-xs">
                                                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                                    Livré
                                                </span>
                                            @elseif($order->status == 'Retour')
                                                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-bold bg-red-50 text-red-700 border border-red-200 shadow-xs">
                                                    <span class="w-2 h-2 rounded-full bg-red-500"></span>
                                                    Retour
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-gray-100 text-gray-700 border border-gray-200">
                                                    {{ $order->status }}
                                                </span>
                                            @endif
                                        </td>
                                        <td class="py-3.5 px-4 text-center whitespace-nowrap">
                                            <div class="flex items-center justify-center gap-2">
                                                <!-- Update Status Form -->
                                                <form action="{{ route('admin.orders.update', $order) }}" method="POST" class="flex items-center gap-1">
                                                    @csrf
                                                    @method('PUT')
                                                    <select name="status" onchange="this.form.submit()" title="Changer le statut en un clic"
                                                            class="text-xs bg-white border border-gray-300 rounded-lg py-1.5 px-2 font-medium text-gray-700 shadow-2xs hover:border-gray-400 focus:ring-2 focus:ring-blue-500 cursor-pointer transition">
                                                        <option value="Créé" {{ $order->status == 'Créé' ? 'selected' : '' }}>Créé</option>
                                                        <option value="Validation de confirmation" {{ $order->status == 'Validation de confirmation' ? 'selected' : '' }}>Confirmé</option>
                                                        <option value="Livré" {{ $order->status == 'Livré' ? 'selected' : '' }}>Livré</option>
                                                        <option value="Retour" {{ $order->status == 'Retour' ? 'selected' : '' }}>Retour</option>
                                                    </select>
                                                </form>

                                                <!-- Delete Order Form -->
                                                <form action="{{ route('admin.orders.destroy', $order) }}" method="POST" onsubmit="return confirm('⚠️ Voulons-vous vraiment supprimer définitivement la commande #{{ $order->id }} et tous ses articles ?');" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="p-1.5 rounded-lg bg-red-50 hover:bg-red-100 text-red-600 hover:text-red-800 border border-red-200 transition shadow-xs focus:ring-2 focus:ring-red-400" title="Supprimer définitivement">
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
                                        <td colspan="7" class="py-12 text-center text-gray-400 font-medium">
                                            <svg class="mx-auto h-12 w-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                            </svg>
                                            Aucune commande trouvée correspondant à vos critères de recherche.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($orders->hasPages())
                        <div class="mt-6 border-t border-gray-100 pt-4">
                            {{ $orders->links() }}
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
