<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function confirmOrder(Request $request)
    {
        // Get the user's cart items
        $cartItems = Cart::where('user_id', Auth::id())->get();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // Loop through each cart item and create an order
        foreach ($cartItems as $cart) {
            $order = new Order();
            $order->user_id = Auth::id();
            $order->name = $request->name1;
            $order->address = $request->address;
            $order->phone = $request->phone;
            $order->product_id = $cart->product_id;
            $order->quantity = 1; // Assuming 1 quantity per item (modify as needed)
            $order->price = $cart->product->price;
            $order->status = 'Pending';
            $order->payment_status = 'Cash on Delivery';
            $order->product_details = json_encode([
                'product_id' => $cart->product_id,
                'quantity' => 1,
                'price' => $cart->product->price,
            ]);
            $order->save();
        }

        // Clear the cart after the order is placed
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->back()->with('success', 'Your order has been placed successfully.');
    }
}
