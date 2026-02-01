@php
$steps = [
1 => 'Customer Info & Shipping',
2 => 'Payment Method',
3 => 'Review & Confirm'
];
@endphp


<div class="mb-5">
    <div class="d-flex justify-content-between position-relative">
        @foreach ($steps as $number => $label)
        <div class="d-flex flex-column align-items-center flex-fill position-relative">

            {{-- Step circle --}}
            <div class="rounded-circle {{ $currentStep >= $number ? 'bg-primary text-white' : 'bg-light text-muted' }} d-flex align-items-center justify-content-center mb-1" style="width: 40px; height: 40px;">
                {{ $number }}
            </div>

            {{-- Step label --}}
            <div class="{{ $currentStep >= $number ? 'fw-bold text-dark' : 'text-muted' }}" style="line-height: 1;">
                {{ $label }}
            </div>
        </div>
        @endforeach
    </div>
</div>