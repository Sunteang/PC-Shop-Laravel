@extends('layout')

@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg mt-14">

        <!-- Dashboard Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div class="flex items-center justify-between bg-blue-200 p-4 rounded shadow">
                <div>
                    <p class="text-sm text-gray-600">Total Orders</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $orders->total() }}</p>
                </div>
                <i class="fa-solid fa-receipt text-blue-600 text-3xl"></i>
            </div>
            <div class="flex items-center justify-between bg-yellow-200 p-4 rounded shadow">
                <div>
                    <p class="text-sm text-gray-600">Today's Orders</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $ordersTodayCount }}</p>
                </div>
                <i class="fa-solid fa-calendar-day text-yellow-600 text-3xl"></i>
            </div>
            <div class="flex items-center justify-between bg-green-200 p-4 rounded shadow">
                <div>
                    <p class="text-sm text-gray-600">Total Revenue</p>
                    <p class="text-2xl font-bold text-gray-900">${{ number_format($totalRevenue, 2) }}</p>
                </div>
                <i class="fa-solid fa-dollar-sign text-green-600 text-3xl"></i>
            </div>
        </div>

        <!-- Tabs for Orders and Invoices -->
        <div class="mb-4 border-b border-gray-200">
            <nav class="-mb-px flex space-x-4" aria-label="Tabs">
                @php
                $tabs = [
                'all' => 'All Orders',
                'pending' => 'Pending Orders',
                'completed' => 'Completed Orders',
                'canceled' => 'Canceled/Returned Orders',
                ];
                @endphp

                @foreach ($tabs as $key => $label)
                <a href="{{ route('admin.orders.index', ['status' => $key]) }}"
                    class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm no-underline
                       {{ ($status ?? 'all') === $key ? 'border-blue-600 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                    {{ $label }}
                </a>
                @endforeach
            </nav>
        </div>

        @if (($status ?? 'all') !== 'invoices')

        <!-- Orders Table -->
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="w-full text-sm text-left text-gray-600">
                <thead class="text-sm text-blue-800 uppercase bg-blue-100">
                    <tr>
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Customer</th>
                        <th class="px-4 py-3">Phone</th>
                        <th class="px-4 py-3">Total</th>
                        <th class="px-4 py-3">Placed At</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $order->id }}</td>
                        <td class="px-4 py-2">{{ $order->customer_name }}</td>
                        <td class="px-4 py-2">{{ $order->phone_number }}</td>
                        <td class="px-4 py-2">${{ number_format($order->total, 2) }}</td>
                        <td class="px-4 py-2">{{ $order->created_at->format('Y-m-d H:i') }}</td>
                        <td class="px-4 py-2 capitalize">{{ $order->status }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('admin.orders.show', $order->id) }}"
                                class="inline-block px-3 py-1 text-xs font-medium text-white bg-blue-600 rounded hover:bg-blue-700 no-underline">
                                View
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-gray-500">No orders found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $orders->links() }}
        </div>
        @endif

    </div>
</div>
@endsection