@extends('layouts.app')
@section('content')
<div class="container mt-5">
    @include('components.checkout-steps', ['currentStep' => 2])
    <h4 class="mb-4 text-primary fw-bold">Step 3: Choose Payment Method</h4>

    <form action="{{ route('checkout.step2.post') }}" method="POST">
        @csrf

        <div class="row g-3">
            @php
            $methods = [
            'aba' => 'ABA Bank',
            'acleda' => 'ACLEDA Bank',
            'wing' => 'Wing',
            'cod' => 'Cash on Delivery',
            ];
            $selected = old('payment_method', session('checkout.payment.payment_method'));
            @endphp

            @foreach($methods as $key => $label)
            <div class="col-md-4">
                <label
                    class="card border p-3 shadow-sm d-flex flex-column align-items-center justify-content-center text-center"
                    style="height: 150px; cursor: pointer;"
                    for="payment-{{ $key }}">
                    <input
                        type="radio"
                        id="payment-{{ $key }}"
                        name="payment_method"
                        value="{{ $key }}"
                        class="form-check-input mb-3"
                        style="width: 20px; height: 20px;"
                        {{ $selected == $key ? 'checked' : '' }}
                        required>
                    <img
                        src="/images/payments/{{ $key }}.png"
                        alt="{{ $label }}"
                        style="max-height: 60px; max-width: 120px; object-fit: contain;"
                        class="mb-2">
                    <span class="fw-semibold">{{ $label }}</span>
                </label>
            </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-end my-4">
            <a href="{{ route('checkout.step1') }}" class="btn btn-secondary me-2" style="width: 130px;">&larr; Back</a>
            <button type="submit" class="btn btn-primary" style="width: 130px;">Next &rarr;</button>
        </div>
    </form>
</div>
@endsection