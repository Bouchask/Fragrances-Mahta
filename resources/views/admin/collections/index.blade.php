<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Collections') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <a href="{{ route('admin.collections.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150 mb-4">Add Collection</a>
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr>
                            <th class="border-b py-2">Image</th>
                            <th class="border-b py-2">Name</th>
                            <th class="border-b py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($collections as $collection)
                            <tr>
                                <td class="border-b py-2">
                                    @if($collection->image_data)
                                        <img src="{{ $collection->image_data }}" width="50" height="50">
                                    @endif
                                </td>
                                <td class="border-b py-2">{{ $collection->name }}</td>
                                <td class="border-b py-2">
                                    <a href="{{ route('admin.collections.edit', $collection) }}" class="text-blue-500">Edit</a>
                                    <form action="{{ route('admin.collections.destroy', $collection) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 ml-2" onclick="return confirm('Delete this collection?')">Delete</button>
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
