<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $status = request('status', 'all');

        $ordersQuery = Order::latest();

        if ($status !== 'all' && in_array($status, ['pending', 'completed', 'canceled'])) {
            $ordersQuery->where('status', $status);
        }

        $orders = $ordersQuery->paginate(10)->withQueryString();

        $ordersTodayCount = Order::whereDate('created_at', today())->count();
        $totalRevenue = Order::sum('total');


        return view('admin.orders.index', compact('orders', 'ordersTodayCount', 'totalRevenue', 'status'));
    }

    public function show($id)
    {
        $order = Order::with([
            'user',
            'items',
            'items.computer',
            'items.accessary'
        ])->findOrFail($id);

        return view('admin.orders.show', compact('order'));
    }


    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,completed,canceled,returned',
        ]);

        $order = Order::findOrFail($id);
        $order->status = $request->input('status');
        $order->save();

        return redirect()->route('admin.orders.show', $order->id)
            ->with('success', 'Order status updated successfully.');
    }
}
