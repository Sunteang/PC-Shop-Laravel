@extends('layouts.app')
@section('content')
<div class="container mt-5">
    @include('components.checkout-steps', ['currentStep' => 3])
    <h4 class="mb-4 text-primary fw-bold">Step 3: Review & Confirm</h4>

    <div class="card p-4 shadow-sm mb-4">
        <h5 class="text-primary fw-bold mb-3">👤 Customer Info</h5>
        <p><strong>Name:</strong> {{ $customer['customer_name'] }}</p>
        <p><strong>Phone:</strong> {{ $customer['phone_number'] }}</p>

        <h5 class="text-primary fw-bold mt-4 mb-3">📦 Shipping</h5>
        <p><strong>Address:</strong> {{ $shipping['shipping_address'] }}</p>

        <h5 class="text-primary fw-bold mt-4 mb-3">💳 Payment Method</h5>
        <p>{{ strtoupper($payment['payment_method']) }}</p>

        <h5 class="text-primary fw-bold mt-4 mb-3">🛒 Cart Items</h5>
        <ul class="list-group mb-3">
            @foreach($cartItems as $item)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $item->product->name ?? 'Unknown' }} (x{{ $item->quantity }})
                <span>${{ number_format(($item->product->price ?? 0) * $item->quantity, 2) }}</span>
            </li>
            @endforeach
        </ul>

        <div class="flex justify-content-end">
            <div class="my-4">
                <a href="{{ route('checkout.step2') }}" class="btn btn-secondary w-32 me-2">&larr; Back</a>
            </div>
            <form method="POST" action="{{ route('checkout.complete') }}">
                @csrf
                <button type="submit" class="btn btn-success my-4">Confirm & Place Order</button>
            </form>
        </div>
    </div>
</div>
@endsection