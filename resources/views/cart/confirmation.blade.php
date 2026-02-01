@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm border-0">
        <div class="card-body p-5 text-center">
            <div class="mb-4">
                <i class="bi bi-check-circle-fill text-success" style="font-size: 3rem;"></i>
                <h2 class="mt-3 text-success fw-bold">Order Placed Successfully!</h2>
                <p class="text-muted">Thank you, <strong>{{ $order->customer_name }}</strong>.<br>Your order has been received and is now being processed.</p>
            </div>

            <hr>

            <h5 class="text-primary text-start mb-3">📄 Order Summary</h5>
            <div class="row text-start justify-content-center">
                <div class="col-md-6">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Order ID:</strong> #{{ $order->id }}</li>
                        <li class="list-group-item"><strong>Phone:</strong> {{ $order->phone_number }}</li>
                        <li class="list-group-item"><strong>Shipping Address:</strong> {{ $order->shipping_address }}</li>
                        <li class="list-group-item"><strong>Payment Method:</strong> {{ strtoupper($order->payment_method) }}</li>
                        <li class="list-group-item"><strong>Total Amount:</strong> ${{ number_format($order->price ?? $order->total ?? 0, 2) }}</li>
                    </ul>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ url('/home') }}" class="btn btn-primary px-4 w-100">
                    <i class="bi bi-house-door-fill me-2"></i>Return to Home
                </a>
            </div>
        </div>
    </div>
</div>
@endsection