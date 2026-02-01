@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3 class="mb-4 text-primary fw-bold">🛒 Your Shopping Cart</h3>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(count($cartItems) > 0)
    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th>Image</th>
                <th>Product</th>
                <th>Type</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php $grandTotal = 0; @endphp
            @foreach($cartItems as $item)
            @php
            $total = $item['product']->price * $item['quantity'];
            $grandTotal += $total;
            @endphp
            <tr>
                <td><img src="{{ $item['product']->image }}" alt="" width="80" class="rounded"></td>
                <td>{{ $item['product']->name }}</td>
                <td>{{ ucfirst($item['type']) }}</td>
                <td>${{ number_format($item['product']->price, 2) }}</td>
                <td>
                    <form action="{{ route('cart.update') }}" method="POST" class="d-flex align-items-center">
                        @csrf
                        <input type="hidden" name="cart_id" value="{{ $item['id'] }}">
                        <input type="number" name="quantity" min="1" value="{{ $item['quantity'] }}" class="form-control w-50 me-2">
                        <button type="submit" class="btn btn-sm btn-outline-success">Update</button>
                    </form>
                </td>
                <td>${{ number_format($total, 2) }}</td>
                <td>
                    <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Remove</button>
                    </form>
                </td>
            </tr>
            @endforeach
            <tr class="fw-bold">
                <td colspan="5" class="text-end">Grand Total:</td>
                <td>${{ number_format($grandTotal, 2) }}</td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <!-- Checkout Process -->
    <div class="text-end my-4 ">
        <a href="{{ route('checkout.step1') }}" class="btn btn-primary w-100">
            Proceed to Checkout
        </a>
    </div>
    @else
    <p class="alert alert-info mb-8" style="margin-bottom: 150px;">Your cart is empty.</p>
    @endif
</div>
@endsection