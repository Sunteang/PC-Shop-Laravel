<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $completedOrders = Order::with('user') // or 'customer' if that's the right relationship
            ->where('status', 'completed')
            ->latest()
            ->get();

        return view('admin.payments.index', ['payments' => $completedOrders]);
    }



    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()->route('payments.index')->with('success', 'Payment deleted successfully.');
    }
}
