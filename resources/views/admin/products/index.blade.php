<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <a href="{{ route('admin.products.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 mb-4">Add Product</a>
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr>
                            <th class="border-b py-2">Image</th>
                            <th class="border-b py-2">Name</th>
                            <th class="border-b py-2">Collection</th>
                            <th class="border-b py-2">Price</th>
                            <th class="border-b py-2">Qty</th>
                            <th class="border-b py-2">Status</th>
                            <th class="border-b py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td class="border-b py-2">
                                    @if($product->image_data)
                                        <img src="{{ $product->image_data }}" width="50" height="50">
                                    @endif
                                </td>
                                <td class="border-b py-2">{{ $product->name }}</td>
                                <td class="border-b py-2">{{ optional($product->collection)->name }}</td>
                                <td class="border-b py-2">{{ $product->price }} dh</td>
                                <td class="border-b py-2">{{ $product->quantity }}</td>
                                <td class="border-b py-2">{{ $product->is_active ? 'Active' : 'Inactive' }}</td>
                                <td class="border-b py-2">
                                    <a href="{{ route('admin.products.edit', $product) }}" class="text-blue-500">Edit</a>
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 ml-2" onclick="return confirm('Delete this product?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
