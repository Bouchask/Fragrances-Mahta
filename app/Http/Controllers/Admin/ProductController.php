<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['collection' => fn($q) => $q->select('id', 'name')])->latest()->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $collections = Collection::select('id', 'name')->get();
        return view('admin.products.create', compact('collections'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'collection_id' => 'required|exists:collections,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'original_price' => 'nullable|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $data = [
            'collection_id' => $request->collection_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'original_price' => $request->original_price,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'is_active' => $request->has('is_active'),
        ];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->extension();
            $base64 = base64_encode(file_get_contents($file));
            $data['image_data'] = 'data:image/' . $extension . ';base64,' . $base64;
        }

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Product created.');
    }

    public function edit(Product $product)
    {
        $collections = Collection::select('id', 'name')->get();
        return view('admin.products.edit', compact('product', 'collections'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'collection_id' => 'required|exists:collections,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'original_price' => 'nullable|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $data = [
            'collection_id' => $request->collection_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'original_price' => $request->original_price,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'is_active' => $request->has('is_active'),
        ];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->extension();
            $base64 = base64_encode(file_get_contents($file));
            $data['image_data'] = 'data:image/' . $extension . ';base64,' . $base64;
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Product updated.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted.');
    }
}
