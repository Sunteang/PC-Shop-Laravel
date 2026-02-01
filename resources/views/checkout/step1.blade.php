@extends('layouts.app')
@section('content')
<div class="container mt-5">
    @include('components.checkout-steps', ['currentStep' => 1])

    <h4 class="mb-4 text-primary fw-bold">Step 1: Customer Info & Shipping Address</h4>

    <form method="POST" action="{{ route('checkout.step1.post') }}">
        @csrf

        <div class="mb-3">
            <label for="customer_name" class="form-label">Username</label>
            <input type="text" name="customer_name" class="form-control" value="{{ old('customer_name', session('checkout.customer.customer_name')) }}" required>
        </div>

        <div class="mb-3">
            <label for="phone_number" class="form-label">Phone</label>
            <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number', session('checkout.customer.phone_number')) }}" required>
        </div>

        <div class="mb-3">
            <label for="shipping_address" class="form-label">Shipping Address</label>
            <textarea name="shipping_address" class="form-control" rows="4" required>{{ old('shipping_address', session('checkout.shipping.shipping_address')) }}</textarea>
        </div>

        <div class="flex justify-content-end">
            <div class="my-4">
                <a href="{{ url('/cart') }}" class="btn btn-secondary w-32 me-2">&larr; Back</a>
            </div>
            <div class="my-4 ">
                <button type="submit" class="btn btn-primary w-32">Next &rarr;</button>
            </div>
        </div>
    </form>
</div>
@endsection