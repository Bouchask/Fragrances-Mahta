<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label class="block text-gray-700">Name</label>
                            <input type="text" name="name" class="w-full border-gray-300 rounded" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Collection</label>
                            <select name="collection_id" class="w-full border-gray-300 rounded" required>
                                <option value="">Select Collection</option>
                                @foreach($collections as $col)
                                    <option value="{{ $col->id }}">{{ $col->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Price (dh)</label>
                            <input type="number" step="0.01" name="price" class="w-full border-gray-300 rounded" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Original Price (dh - optional)</label>
                            <input type="number" step="0.01" name="original_price" class="w-full border-gray-300 rounded">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Quantity</label>
                            <input type="number" name="quantity" class="w-full border-gray-300 rounded" required value="0">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Image</label>
                            <input type="file" name="image" class="w-full" accept="image/*">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Description</label>
                        <textarea name="description" class="w-full border-gray-300 rounded" rows="3"></textarea>
                    </div>
                    <div class="mb-4 flex items-center">
                        <input type="checkbox" name="is_active" value="1" class="mr-2" checked>
                        <label class="text-gray-700">Active (Visible on site)</label>
                    </div>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
