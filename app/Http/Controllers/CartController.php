<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Computer;
use App\Models\Accessary;
use App\Models\Order;
use App\Models\OrderItem;

class CartController extends Controller
{

    public function index()
    {
        $userId = auth()->id();
        $items = Cart::where('user_id', $userId)->get();

        $cartItems = $items->map(function ($item) {
            $product = $item->product_type === 'computer'
                ? Computer::find($item->product_id)
                : Accessary::find($item->product_id);

            return [
                'id' => $item->id,
                'product' => $product,
                'type' => $item->product_type,
                'quantity' => $item->quantity
            ];
        });

        return view('cart.index', compact('cartItems'));
    }



    // addToCart method to handle adding items to the cart
    public function addToCart(Request $request)
    {
        $userId = auth()->id();
        $productType = $request->input('product_type');
        $productId = $request->input('product_id');

        // Check if item already in cart
        $cartItem = Cart::where('user_id', $userId)
            ->where('product_type', $productType)
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => $userId,
                'product_type' => $productType,
                'product_id' => $productId,
                'quantity' => 1
            ]);
        }

        return redirect()->back()->with('success', 'Item added to cart.');
    }


    // showCart method to display the cart items
    public function showCart()
    {
        $userId = auth()->id();
        $items = Cart::where('user_id', $userId)->get();

        $cartItems = $items->map(function ($item) {
            $product = $item->product_type === 'computer'
                ? Computer::find($item->product_id)
                : Accessary::find($item->product_id);

            return [
                'id' => $item->id,
                'product' => $product,
                'type' => $item->product_type,
                'quantity' => $item->quantity
            ];
        });

        return view('cart.index', compact('cartItems'));
    }


    //update method to handle increasing or decreasing item quantity
    public function updateQuantity(Request $request)
    {
        $cart = Cart::find($request->input('cart_id'));
        if ($cart) {
            $cart->quantity = $request->input('quantity');
            $cart->save();
        }

        return back();
    }

    // removeFromCart method to handle removing an item from the cart
    public function removeFromCart($id)
    {
        Cart::destroy($id);
        return back()->with('success', 'Item removed.');
    }

    public function checkout(Request $request)
    {
        $userId = auth()->id();
        $cartItems = Cart::where('user_id', $userId)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Cart is empty.');
        }

        $total = 0;
        $productDetails = "";

        foreach ($cartItems as $item) {
            $product = $item->product_type === 'computer'
                ? \App\Models\Computer::find($item->product_id)
                : \App\Models\Accessary::find($item->product_id);

            $price = $product->price ?? 0;
            $total += $price * $item->quantity;

            $productDetails .= "📦 Product: {$product->name}\n";
            $productDetails .= "📝 Description: {$product->description}\n";
            $productDetails .= "💵 Price: \${$price}\n";
            $productDetails .= "🔢 Quantity: {$item->quantity}\n";
            $productDetails .= "------------------------------\n";
        }

        // 🧾 Create Order
        $order = Order::create([
            'user_id' => $userId,
            'customer_name' => $request->input('customer_name'),
            'phone_number' => $request->input('phone_number'),
            'shipping_address' => $request->input('shipping_address'),
            'payment_method' => $request->input('payment_method'),
            'order_details' => '',
            'total' => $total,
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'item_type' => $item->product_type,
                'item_id' => $item->product_id,
                'price' => $product->price ?? 0,
                'quantity' => $item->quantity,
            ]);
        }

        // ✅ SEND TELEGRAM MESSAGE
        $token = env('TELEGRAM_BOT_TOKEN');
        $chat_id = env('CHAT_ID');

        $message = "🛒 <b>New Order</b>\n";
        $message .= "------------------------------\n";
        $message .= $productDetails;
        $message .= "👤 <b>Customer:</b> " . $request->input('customer_name') . "\n";
        $message .= "📞 <b>Phone:</b> " . $request->input('phone_number') . "\n";
        $message .= "📦 <b>Shipping:</b> " . $request->input('shipping_address') . "\n";
        $message .= "💳 <b>Payment:</b> " . $request->input('payment_method') . "\n";
        $message .= "💰 <b>Total:</b> \${$total}";

        file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query([
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'HTML',
        ]));

        // 🧹 Clear cart
        Cart::where('user_id', $userId)->delete();

        return redirect()->route('cart.confirmation', ['order' => $order->id]);
    }

    public function orderConfirmation($orderId)
    {
        $order = Order::with('items')->findOrFail($orderId);
        return view('cart.confirmation', compact('order'));
    }
}
