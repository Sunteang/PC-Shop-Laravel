<?php

namespace App\Http\Controllers;

use App\Models\Accessary;
use App\Models\RepairRequest;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSales = Order::where('status', 'completed')->sum('total');
        $totalRepairBookings = RepairRequest::count();
        $recentOrders = Order::latest()->take(5)->get();
        $lowStockItems = Accessary::where('price', '<=', 20)->get();

        $upcomingRepairs = RepairRequest::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalSales',
            'totalRepairBookings',
            'recentOrders',
            'lowStockItems',
            'upcomingRepairs'
        ));
    }
}
