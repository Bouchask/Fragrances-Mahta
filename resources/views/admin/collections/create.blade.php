<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Collection') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('admin.collections.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700">Name</label>
                        <input type="text" name="name" class="w-full border-gray-300 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Description</label>
                        <textarea name="description" class="w-full border-gray-300 rounded"></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Image</label>
                        <input type="file" name="image" class="w-full" accept="image/*">
                    </div>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
