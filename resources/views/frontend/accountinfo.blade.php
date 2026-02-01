@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Profile Card -->
    <div class="bg-white shadow rounded-lg p-6 mb-6 relative">

        <!-- Dropdown Menu for Edit & Logout -->
        <div class="absolute top-4 right-4" x-data="{ open: false }">
            <button @click="open = !open" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                <!-- Dots Vertical Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6v.01M12 12v.01M12 18v.01" />
                </svg>
            </button>

            <!-- Dropdown -->
            <div x-show="open" @click.away="open = false"
                class="absolute right-0 mt-2 w-40 bg-white border rounded shadow-lg z-50">

                @if(auth()->user()->role === 'admin')
                <a href="{{ url('/dashboard-admin') }}"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 no-underline">Dashboard</a>
                @endif

                <a href="{{ route('profile.edit') }}"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 no-underline">Edit Profile</a>

                <form method="POST" action="{{ route('user.logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        Logout
                    </button>
                </form>
            </div>
        </div>


        <div class="flex items-center space-x-6">
            <img class="w-20 h-20 rounded-full object-cover border shadow"
                src="{{ auth()->user()->profile_image ? auth()->user()->profile_image : 'https://i.pinimg.com/736x/71/5c/9f/715c9f198dea9567698f90c366eaf636.jpg' }}"
                alt="User photo">
            <div>
                <h2 class="text-xl font-semibold text-gray-800">{{ auth()->user()->name }}</h2>
                <p class="text-sm text-gray-500">Joined {{ auth()->user()->created_at->format('F j, Y') }}</p>
            </div>
        </div>
    </div>

    <!-- Alpine.js -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>



    <!-- Tabs -->
    <div class="bg-white shadow rounded-lg">
        <div class="border-b flex">
            <button class="tab-button py-3 px-6 text-sm font-medium text-gray-600 hover:text-blue-600 active"
                onclick="openTab(event, 'favourite')">Favourites</button>
            <button class="tab-button py-3 px-6 text-sm font-medium text-gray-600 hover:text-blue-600"
                onclick="openTab(event, 'contact')">Contact Info</button>
        </div>

        <!-- Tab Content -->
        <div id="favourite" class="tab-content p-6">
            @if($favourites->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($favourites as $item)
                <div class="bg-white shadow rounded-lg overflow-hidden hover:shadow-md transition duration-200">
                    <img src="{{ $item->image_url ?? 'https://www.aputf.org/wp-content/uploads/2015/06/default-placeholder1-1024x1024-960x540.png' }}"
                        alt="{{ $item->name }}"
                        class="w-full h-40 object-cover">

                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $item->name }}</h3>
                        <p class="text-sm text-gray-500 mt-1">{{ $item->category }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <p class="text-gray-500">No favourite items found.</p>
            @endif
        </div>




        <div id="contact" class="tab-content p-6 hidden">
            <ul class="text-gray-700 space-y-3">
                <li><strong>Email:</strong> {{ auth()->user()->email }}</li>
                <li><strong>Phone:</strong> {{ auth()->user()->phone ?? 'Not provided' }}</li>
                <li><strong>Address:</strong> {{ auth()->user()->address ?? 'Not provided' }}</li>
            </ul>
        </div>
    </div>
</div>

<!-- JS for tab switching -->
<script>
    function openTab(evt, tabId) {
        const tabs = document.querySelectorAll('.tab-content');
        const buttons = document.querySelectorAll('.tab-button');
        tabs.forEach(tab => tab.classList.add('hidden'));
        buttons.forEach(btn => btn.classList.remove('active', 'text-blue-600'));
        evt.currentTarget.classList.add('active', 'text-blue-600');
        document.getElementById(tabId).classList.remove('hidden');
    }
</script>
@endsection