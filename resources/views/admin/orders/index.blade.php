<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Commandes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Filter Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6">
                <form method="GET" action="{{ route('admin.orders.index') }}" class="flex gap-4 items-end flex-wrap">
                    <div>
                        <label class="block text-sm">Date</label>
                        <input type="date" name="date" value="{{ request('date') }}" class="border-gray-300 rounded">
                    </div>
                    <div>
                        <label class="block text-sm">Produit</label>
                        <select name="product_id" class="border-gray-300 rounded">
                            <option value="">Tous les produits</option>
                            @foreach($products as $prod)
                                <option value="{{ $prod->id }}" {{ request('product_id') == $prod->id ? 'selected' : '' }}>{{ $prod->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm">Collection</label>
                        <select name="collection_id" class="border-gray-300 rounded">
                            <option value="">Toutes les collections</option>
                            @foreach($collections as $col)
                                <option value="{{ $col->id }}" {{ request('collection_id') == $col->id ? 'selected' : '' }}>{{ $col->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded">Filtrer</button>
                        <a href="{{ route('admin.orders.index') }}" class="ml-2 text-gray-500">Réinitialiser</a>
                    </div>
                </form>
            </div>

            <!-- Orders Table -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if(session('success'))
                    <div class="mb-4 text-green-600">{{ session('success') }}</div>
                @endif
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr>
                            <th class="border-b py-2">ID</th>
                            <th class="border-b py-2">Date</th>
                            <th class="border-b py-2">Client</th>
                            <th class="border-b py-2">Produits</th>
                            <th class="border-b py-2">Total</th>
                            <th class="border-b py-2">Statut</th>
                            <th class="border-b py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                            <tr>
                                <td class="border-b py-2">#{{ $order->id }}</td>
                                <td class="border-b py-2">{{ $order->created_at->format('Y-m-d H:i') }}</td>
                                <td class="border-b py-2">
                                    {{ $order->name }}<br>
                                    <small>{{ $order->phone }} | {{ $order->city }}</small>
                                </td>
                                <td class="border-b py-2">
                                    @foreach($order->items as $item)
                                        - {{ optional($item->product)->name }} (x{{ $item->quantity }})<br>
                                    @endforeach
                                </td>
                                <td class="border-b py-2">{{ $order->total_price }} dh</td>
                                <td class="border-b py-2">
                                    <span class="px-2 py-1 rounded text-xs text-white 
                                        {{ $order->status == 'Créé' ? 'bg-blue-500' : '' }}
                                        {{ $order->status == 'Validation de confirmation' ? 'bg-yellow-500' : '' }}
                                        {{ $order->status == 'Livré' ? 'bg-green-500' : '' }}
                                    ">
                                        {{ $order->status }}
                                    </span>
                                </td>
                                <td class="border-b py-2">
                                    <form action="{{ route('admin.orders.update', $order) }}" method="POST" class="inline flex gap-2">
                                        @csrf
                                        @method('PUT')
                                        <select name="status" class="text-sm border-gray-300 rounded py-1">
                                            <option value="Créé" {{ $order->status == 'Créé' ? 'selected' : '' }}>Créé</option>
                                            <option value="Validation de confirmation" {{ $order->status == 'Validation de confirmation' ? 'selected' : '' }}>Confirmé</option>
                                            <option value="Livré" {{ $order->status == 'Livré' ? 'selected' : '' }}>Livré</option>
                                        </select>
                                        <button type="submit" class="bg-blue-600 text-white px-2 py-1 rounded text-sm">Mettre à jour</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="py-4 text-center text-gray-500">Aucune commande trouvée.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
