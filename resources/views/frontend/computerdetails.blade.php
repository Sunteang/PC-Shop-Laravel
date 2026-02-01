@extends('layouts.app')

@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show mt-3 mx-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="mb-24 mt-5">
    <div class="container">
        <h3 class="font-bold text-blue-700">Product Details</h3>
        <hr class="mb-20">
        <div class="row items-center">
            <div class="mt-3 col col-md-6">
                <div class="pe-5 me-5">
                    <!-- Product Name with Toggleable Favourite Icon -->
                    <div class="flex items-center justify-between mb-4" x-data="{ fav: false }">
                        <h2 class="text-gray-700 text-xl font-semibold">{{ $computer->name }}</h2>

                        <!-- Clickable Favourite Icon -->
                        <button @click="fav = !fav" class="focus:outline-none">
                            <!-- Unfilled Heart -->
                            <svg x-show="!fav" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2" class="w-6 h-6 text-red-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.318 6.318a4.5 4.5 0 016.364 0L12 7.636l1.318-1.318a4.5 4.5 0 116.364 6.364L12 21l-7.682-7.682a4.5 4.5 0 010-6.364z" />
                            </svg>

                            <!-- Filled Heart -->
                            <svg x-show="fav" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2" class="w-6 h-6 text-red-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.318 6.318a4.5 4.5 0 016.364 0L12 7.636l1.318-1.318a4.5 4.5 0 116.364 6.364L12 21l-7.682-7.682a4.5 4.5 0 010-6.364z" />
                            </svg>
                        </button>
                    </div>

                    <p class="font-semibold text-gray-600 mb-4">{{ $computer->description }}</p>
                    <h3 class="mb-4 pb-1 font-bold">${{ $computer->price }}</h3>

                    <!-- Add to Cart Button -->
                    @if(auth()->check())
                    <form method="POST" action="{{ route('cart.add') }}">
                        @csrf
                        <input type="hidden" name="product_type" value="computer">
                        <input type="hidden" name="product_id" value="{{ $computer->id }}">
                        <button type="submit" class="btn btn-success">
                            Add to Cart
                        </button>
                    </form>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-success">
                        Add to Cart
                    </a>
                    @endif

                </div>
            </div>

            <div class="col col-md-6">
                <img src="{{ $computer->image }}" alt="Computer" style="max-width: 100%; height: auto;" class="rounded-md">
            </div>
        </div>
    </div>
</div>


<!-- js -->
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endsection