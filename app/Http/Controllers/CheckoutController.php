<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderSupplement;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function showCheckoutPage()
    {
        // Display the checkout page
        return view('checkout');
    }

    public function processCheckout(Request $request)
    {
        $data = $request->validate([
            'cart' => 'required|array',
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'Location' => 'required|string',
            'cardNumber' => 'required|string',
            'expiryDate' => 'required|string',
            'cvv' => 'required|string',
        ]);

        try {
            // Create new order
            $order = Order::create([
                'user_id' => auth()->id(),
                'total_price' => collect($data['cart'])->sum(function ($item) {
                    return $item['price'] ?? 0;
                }),
                'status' => 'confirmed',
                'Location' => $data['Location']
            ]);

            // Add order items
            foreach ($data['cart'] as $item) {
                OrderSupplement::create([
                    'order_id' => $order->id,
                    'supplement_id' => $item['id'],
                    'quantity' => $item['quantity'] ?? 1,
                    'subtotal' => $item['price'] ?? 0,
                ]);
            }

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            \Log::error('Checkout Error: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
