@extends('layouts.app')

@section('content')
<style>
    .product-card {
        max-width: 300px;
        height: 400px;
    }

    .product-image {
        width: 100%;
        height: 210px;
    }

    .product-description {
        max-height: 120px;
        /* Adjust height as needed */
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        /* Number of lines to show */
        -webkit-box-orient: vertical;
    }
</style>

<div class="container mt-12 pt-1 mb-24">
    <form method="GET" action="{{ route('computer.index') }}" class="mb-4 flex items-center gap-3" style="flex-wrap: nowrap;">

        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..."
            class="px-3 py-2 border rounded flex-shrink-0 flex-grow-0 w-48" />

        <select name="category" class="px-3 py-2 border rounded flex-shrink-0 flex-grow-0 w-48">
            <option value="" {{ request('category') == '' ? 'selected' : '' }}>
                All Categories
            </option>
            @foreach($categories as $cat)
            <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>
                {{ $cat }}
            </option>
            @endforeach
        </select>

        <select name="sort" class="px-3 py-2 border rounded flex-shrink-0 flex-grow-0 w-48">
            <option value="">Sort by</option>
            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
        </select>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 whitespace-nowrap">
            Apply
        </button>
    </form>


    <h3 class="font-bold text-blue-700 ">Listing our Products</h3>
    <hr class="mb-3">
    <div class="row">
        @foreach($computers->chunk(4) as $chunk)
        @foreach($chunk as $computer)

        <div class="col col-sm-12 col-md-4 col-lg-3 flex justify-center mt-4 pt-1">
            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow product-card">
                <img class="pb-8 rounded-t-lg product-image" src="{{$computer->image}}" alt="product image" />
                <div class="px-4">
                    <h5 class="text-xl font-bold tracking-tight text-gray-700 truncate pb-2">{{$computer->name}}</h5>
                    <p class="product-description text-gray-500">{{$computer->description}}</p>
                    <div class="flex items-center justify-between mt-4 ">
                        <span class="text-1xl font-semibold text-gray-900">${{$computer->price}}</span>
                        <a href="{{url('computerdetails', $computer->id)}}" class="text-white bg-blue-500 hover:bg-blue-950 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-2.5 py-1.5 no-underline font-normal">View</a>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
        @endforeach
    </div>
    <div class="mt-4 d-flex justify-content-center">
        {{ $computers->appends(request()->input())->links() }}
    </div>
</div>
@endsection