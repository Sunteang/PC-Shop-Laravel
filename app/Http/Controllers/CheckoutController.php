<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    //step 1: Customer Information
    public function showStep1()
    {
        return view('checkout.step1');
    }

    public function processStep1(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'shipping_address' => 'required|string|max:1000',
        ]);

        session(['checkout.customer' => [
            'customer_name' => $validated['customer_name'],
            'phone_number' => $validated['phone_number'],
        ]]);

        session(['checkout.shipping' => [
            'shipping_address' => $validated['shipping_address'],
        ]]);

        return redirect()->route('checkout.step2');
    }

    //step 2: Payment Method
    public function showStep2()
    {
        return view('checkout.step2');
    }

    public function processStep2(Request $request)
    {
        $validated = $request->validate([
            'payment_method' => 'required|in:aba,acleda,wing,cod',
        ]);

        session(['checkout.payment' => $validated]);

        return redirect()->route('checkout.review');
    }

    //step 3: Review Order
    public function showReview()
    {
        $customer = session('checkout.customer');
        $shipping = session('checkout.shipping');
        $payment = session('checkout.payment');

        $cartItems = Cart::where('user_id', auth()->id())->get()->map(function ($item) {
            $product = $item->product_type === 'computer'
                ? \App\Models\Computer::find($item->product_id)
                : \App\Models\Accessary::find($item->product_id);

            $item->product = $product;
            return $item;
        });

        return view('checkout.review', compact('customer', 'shipping', 'payment', 'cartItems'));
    }

    // Complete Order
    public function completeOrder()
    {
        // Save Order logic (same as your CartController)
        $customer = session('checkout.customer');
        $shipping = session('checkout.shipping');
        $payment = session('checkout.payment');
        $cartItems = Cart::where('user_id', auth()->id())->get()->map(function ($item) {
            $product = $item->product_type === 'computer'
                ? \App\Models\Computer::find($item->product_id)
                : \App\Models\Accessary::find($item->product_id);

            $item->product = $product;
            return $item;
        });


        $order = Order::create([
            'user_id' => auth()->id(),
            'customer_name' => $customer['customer_name'],
            'phone_number' => $customer['phone_number'],
            'shipping_address' => $shipping['shipping_address'],
            'payment_method' => $payment['payment_method'],
            'total' => $cartItems->sum(function ($item) {
                return ($item->product->price ?? 0) * $item->quantity;
            }),

        ]);

        foreach ($cartItems as $item) {

            OrderItem::create([
                'order_id' => $order->id,
                'item_type' => $item->product_type,
                'item_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price ?? 0,
            ]);
        }


        Cart::where('user_id', auth()->id())->delete();
        session()->forget('checkout');

        return redirect()->route('cart.confirmation', ['order' => $order->id]);
    }
}
