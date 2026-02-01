@extends('layout')

@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg mt-14 bg-white shadow">

        <h2 class="text-2xl font-bold mb-6 text-gray-800">Order #{{ $order->id }} Details</h2>

        <!-- Customer Info -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div>
                <p class="text-gray-700"><strong>Customer:</strong> {{ $order->customer_name }}</p>
                <p class="text-gray-700"><strong>Phone:</strong> {{ $order->phone_number }}</p>

                <!-- Status update form -->
                <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="mt-4">
                    @csrf
                    @method('PATCH')

                    <label for="status" class="block text-gray-700 font-semibold mb-1">Status:</label>
                    <select name="status" id="status" class="border rounded px-3 py-2 w-full max-w-xs">
                        @php
                        $statuses = ['pending', 'completed', 'canceled', 'returned'];
                        @endphp
                        @foreach($statuses as $status)
                        <option value="{{ $status }}" {{ $order->status === $status ? 'selected' : '' }}>
                            {{ ucfirst($status) }}
                        </option>
                        @endforeach
                    </select>

                    <button type="submit" class="mt-2 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                        Update Status
                    </button>
                </form>

            </div>
            <div>
                <p class="text-gray-700"><strong>Order Date:</strong> {{ $order->created_at->format('Y-m-d H:i') }}</p>
                <p class="text-gray-700"><strong>Total:</strong> ${{ number_format($order->total, 2) }}</p>
                <p class="text-gray-700"><strong>Payment Method:</strong> {{ $order->payment_method ?? 'N/A' }}</p>
                <p class="text-gray-700"><strong>Payment Status:</strong> {{ ucfirst($order->payment_status ?? 'Pending') }}</p>
            </div>
        </div>

        <!-- Items Table -->
        <h4 class="text-xl font-semibold mb-4 text-gray-800">Items</h4>
        <div class="overflow-x-auto rounded-lg shadow">
            <table class="w-full text-sm text-left text-gray-600">
                <thead class="text-sm text-blue-800 uppercase bg-blue-100">
                    <tr>
                        <th class="px-4 py-3">Type</th>
                        <th class="px-4 py-3">Product</th>
                        <th class="px-4 py-3">Price</th>
                        <th class="px-4 py-3">Quantity</th>
                        <th class="px-4 py-3">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">{{ ucfirst($item->item_type) }}</td>
                        <td class="px-4 py-2">
                            @if($item->item_type === 'computer')
                            {{ optional($item->computer)->name }}
                            @elseif($item->item_type === 'accessary')
                            {{ optional($item->accessary)->name }}
                            @endif
                        </td>
                        <td class="px-4 py-2">${{ number_format($item->price, 2) }}</td>
                        <td class="px-4 py-2">{{ $item->quantity }}</td>
                        <td class="px-4 py-2">${{ number_format($item->price * $item->quantity, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <a href="{{ route('admin.orders.index') }}" class="inline-block mt-6 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 no-underline">
            &larr; Back to Orders
        </a>

    </div>
</div>
@endsection