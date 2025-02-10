<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        $shipping = 40.00; // Flat shipping rate

        return view('checkout', compact('cart', 'subtotal', 'shipping'));
    }

    public function process(Request $request)
    {
        // Validate form inputs
        $request->validate([
            'email' => 'required|email',
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'payment_method' => 'required',
            'card_number' => 'required_if:payment_method,Credit Card|nullable|digits:16',
            'expiration_date' => 'required_if:payment_method,Credit Card|nullable|date_format:m/y',
            'security_code' => 'required_if:payment_method,Credit Card|nullable|digits:3',
        ]);

        $cart = Session::get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        // Create Order
        $order = Order::create([
            'user_id' => auth()->id() ?? null, // If user is logged in, attach ID
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'payment_method' => $request->payment_method,
            'total' => collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']) + 40.00,
            'status' => 'Pending',
        ]);

        // Save Order Items
        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'subtotal' => $item['price'] * $item['quantity'],
            ]);
        }

        // Clear cart after successful checkout
        Session::forget('cart');

        return redirect()->route('home')->with('success', 'Your order has been placed successfully!');
    }
}
