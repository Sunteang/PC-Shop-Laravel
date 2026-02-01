@extends('layout')

@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg mt-14">

        <!-- Dashboard Header -->
        <h2 class="mb-4 text-3xl font-semibold text-gray-800">Dashboard Overview</h2>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">

            <!-- Total Sales -->
            <div class="bg-green-500 text-white rounded-lg p-6 shadow flex items-center justify-between">
                <div>
                    <p class="uppercase font-semibold text-sm">Total Sales</p>
                    <h3 class="text-2xl font-bold">${{ number_format($totalSales, 2) }}</h3>
                </div>
                <i class="fa-solid fa-dollar-sign fa-3x"></i>
            </div>

            <!-- Total Repair Bookings -->
            <div class="bg-blue-500 text-white rounded-lg p-6 shadow flex items-center justify-between">
                <div>
                    <p class="uppercase font-semibold text-sm">Total Repair Bookings</p>
                    <h3 class="text-2xl font-bold">{{ $totalRepairBookings }}</h3>
                </div>
                <i class="fa-solid fa-tools fa-3x"></i>
            </div>

            <!-- Recent Orders Count -->
            <div class="bg-yellow-500 text-white rounded-lg p-6 shadow flex items-center justify-between">
                <div>
                    <p class="uppercase font-semibold text-sm">Recent Orders</p>
                    <h3 class="text-2xl font-bold">{{ $recentOrders->count() }}</h3>
                </div>
                <i class="fa-solid fa-receipt fa-3x"></i>
            </div>

            <!-- Low Stock Alerts -->
            <div class="bg-red-500 text-white rounded-lg p-6 shadow flex items-center justify-between">
                <div>
                    <p class="uppercase font-semibold text-sm">Low Stock Alerts</p>
                    <h3 class="text-2xl font-bold">{{ $lowStockItems->count() }}</h3>
                </div>
                <i class="fa-solid fa-box-open fa-3x"></i>
            </div>

        </div>

        <!-- Recent Orders Table -->
        <div class="bg-white shadow rounded-lg mb-6">
            <div class="px-6 py-4 border-b">
                <h3 class="text-lg font-semibold text-gray-700">Recent Orders</h3>
            </div>
            <div class="p-4 overflow-x-auto">
                @if($recentOrders->count() > 0)
                <table class="w-full text-left text-gray-600">
                    <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
                        <tr>
                            <th class="px-4 py-2">Order ID</th>
                            <th class="px-4 py-2">Customer</th>
                            <th class="px-4 py-2">Amount</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentOrders as $order)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $order->id }}</td>
                            <td class="px-4 py-2">{{ $order->customer_name ?? $order->user->name ?? 'N/A' }}</td>
                            <td class="px-4 py-2">${{ number_format($order->total, 2) }}</td>
                            <td class="px-4 py-2 capitalize">{{ $order->status }}</td>
                            <td class="px-4 py-2">{{ $order->created_at->format('M d, Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <p class="p-4 text-gray-500">No recent orders found.</p>
                @endif
            </div>
        </div>

        <!-- Low Stock Items -->
        <div class="bg-white shadow rounded-lg mb-6">
            <div class="px-6 py-4 border-b">
                <h3 class="text-lg font-semibold text-gray-700">Low Stock Alerts</h3>
            </div>
            <div class="p-4">
                @if($lowStockItems->count() > 0)
                <ul class="list-disc list-inside text-red-600">
                    @foreach($lowStockItems as $item)
                    <li>{{ $item->name }} - Stock: {{ $item->stock }}</li>
                    @endforeach
                </ul>
                @else
                <p class="text-gray-500">No low stock items.</p>
                @endif
            </div>
        </div>

        <!-- Upcoming Repair Requests -->
        <div class="bg-white shadow rounded-lg">
            <div class="px-6 py-4 border-b">
                <h3 class="text-lg font-semibold text-gray-700">Upcoming Repair Requests</h3>
            </div>
            <div class="p-4">
                @if($upcomingRepairs->count() > 0)
                <ul class="space-y-3">
                    @foreach($upcomingRepairs as $repair)
                    <li class="flex justify-between bg-gray-50 px-4 py-2 rounded hover:bg-gray-100">
                        <div>
                            <p class="font-medium text-gray-800">{{ $repair->name ?? 'N/A' }}</p>
                            <p class="text-sm text-gray-500">
                                Status: <span class="capitalize">{{ $repair->status ?? 'Unknown' }}</span>
                            </p>
                        </div>
                        <span class="text-sm text-gray-600">{{ $repair->created_at->format('M d, Y h:i A') }}</span>
                    </li>
                    @endforeach
                </ul>
                @else
                <p class="text-gray-500">No upcoming repair requests.</p>
                @endif
            </div>
        </div>

    </div>
</div>
@endsection