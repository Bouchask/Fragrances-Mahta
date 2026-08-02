<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'city' => 'required|string|max:500',
            'product_id' => 'nullable|exists:products,id',
            'quantity' => 'nullable|integer|min:1',
            'cart_data' => 'nullable|string'
        ]);

        $itemsToOrder = [];
        $totalPrice = 0;

        if ($request->filled('cart_data')) {
            $cartItems = json_decode($request->cart_data, true);
            if (is_array($cartItems)) {
                foreach ($cartItems as $item) {
                    if (isset($item['id']) && isset($item['quantity'])) {
                        $p = Product::find($item['id']);
                        if ($p) {
                            $qty = max(1, (int)$item['quantity']);
                            $itemsToOrder[] = [
                                'product' => $p,
                                'quantity' => $qty,
                                'price' => $p->price
                            ];
                            $totalPrice += ($p->price * $qty);
                        }
                    }
                }
            }
        }

        if (empty($itemsToOrder) && $request->product_id) {
            $p = Product::findOrFail($request->product_id);
            $qty = max(1, (int)($request->quantity ?: 1));
            $itemsToOrder[] = [
                'product' => $p,
                'quantity' => $qty,
                'price' => $p->price
            ];
            $totalPrice += ($p->price * $qty);
        }

        if (empty($itemsToOrder)) {
            return redirect()->back()->withErrors(['error' => 'Aucun produit sélectionné pour la commande.']);
        }

        // Create Order
        $order = Order::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'city' => $request->city,
            'total_price' => $totalPrice,
            'status' => 'Créé'
        ]);

        // Create Order Items
        foreach ($itemsToOrder as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product']->id,
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);
        }

        // Build concise Darija WhatsApp confirmation message
        $whatsappMsg = "Salam, yallah dert commande fe Fragrances Mahta :\n\n";
        $whatsappMsg .= "👤 *Smya* : " . $request->name . "\n";
        $whatsappMsg .= "📞 *Tél* : " . $request->phone . "\n";
        $whatsappMsg .= "📍 *Mdina/Adresse* : " . $request->city . "\n\n";
        $whatsappMsg .= "🛍️ *Selaa* :\n";
        foreach ($itemsToOrder as $item) {
            $whatsappMsg .= "▪️ " . $item['product']->name . " *(x" . $item['quantity'] . ")*\n";
        }
        $whatsappMsg .= "\n💰 *Total* : *" . $totalPrice . " DH* *(Tawsil fabor)*\n\n";
        $whatsappMsg .= "Wach selaa mojoda bach tsiftohali ? Choukran 🙏";

        $whatsappUrl = "https://api.whatsapp.com/send?phone=212639048453&text=" . rawurlencode($whatsappMsg);

        return redirect()->back()->with('success', 'Merci pour votre commande !')->with('whatsapp_url', $whatsappUrl);
    }
}
