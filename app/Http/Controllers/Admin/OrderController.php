<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Collection;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with([
            'items.product' => function ($q) {
                $q->select('id', 'name', 'collection_id');
            },
            'items.product.collection' => function ($q) {
                $q->select('id', 'name');
            }
        ])->orderBy('created_at', 'desc');

        // Filter by Date
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        // Filter by Product
        if ($request->filled('product_id')) {
            $query->whereHas('items', function ($q) use ($request) {
                $q->where('product_id', $request->product_id);
            });
        }

        // Filter by Collection
        if ($request->filled('collection_id')) {
            $query->whereHas('items.product', function ($q) use ($request) {
                $q->where('collection_id', $request->collection_id);
            });
        }

        $orders = $query->paginate(15);
        $products = Product::select('id', 'name')->get();
        $collections = Collection::select('id', 'name')->get();

        return view('admin.orders.index', compact('orders', 'products', 'collections'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|string|in:Créé,Validation de confirmation,Livré'
        ]);

        $order->update([
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Statut de la commande mis à jour.');
    }
}
