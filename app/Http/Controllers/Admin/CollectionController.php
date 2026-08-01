<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CollectionController extends Controller
{
    public function index()
    {
        $collections = Collection::latest()->get();
        return view('admin.collections.index', compact('collections'));
    }

    public function create()
    {
        return view('admin.collections.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048', // Max 2MB
            'description' => 'nullable|string',
        ]);

        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
        ];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->extension();
            $base64 = base64_encode(file_get_contents($file));
            $data['image_data'] = 'data:image/' . $extension . ';base64,' . $base64;
        }

        Collection::create($data);

        return redirect()->route('admin.collections.index')->with('success', 'Collection created.');
    }

    public function edit(Collection $collection)
    {
        return view('admin.collections.edit', compact('collection'));
    }

    public function update(Request $request, Collection $collection)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
        ]);

        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
        ];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->extension();
            $base64 = base64_encode(file_get_contents($file));
            $data['image_data'] = 'data:image/' . $extension . ';base64,' . $base64;
        }

        $collection->update($data);

        return redirect()->route('admin.collections.index')->with('success', 'Collection updated.');
    }

    public function destroy(Collection $collection)
    {
        $collection->delete();
        return redirect()->route('admin.collections.index')->with('success', 'Collection deleted.');
    }
}
