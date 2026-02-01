@extends('layouts.app')

@section('content')

<section class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-blue-100 py-12 px-4">
    <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-md transition-all duration-300 hover:shadow-2xl">
        <div class="text-center mb-6">
            <h2 class="text-3xl font-extrabold text-blue-700 mb-1">Track Your Repair</h2>
            <p class="text-gray-600 text-sm">Enter your email to view your repair status.</p>
        </div>

        <!-- Status alert -->
        @if(session('status'))
        <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded mb-5 text-sm">
            <strong>Status:</strong> {{ session('status') }}
        </div>
        @elseif(session('not_found'))
        <div class="bg-red-100 border border-red-400 text-red-800 px-4 py-3 rounded mb-5 text-sm">
            {{ session('not_found') }}
        </div>
        @endif

        <!-- Form -->
        <form action="{{ url('/repair/track') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-blue-500">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        required
                        class="pl-10 pr-4 py-2 w-full rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 transition"
                        placeholder="your@email.com">
                </div>
            </div>

            <button
                type="submit"
                class="w-full bg-blue-700 text-white py-2 rounded-lg font-semibold hover:bg-blue-800 transition duration-200">
                Check Status
            </button>
        </form>

        <!-- Optional additional links -->
        <div class="mt-6 text-center text-sm text-gray-500">
            Need help? <a href="{{ url('/contact') }}" class="text-blue-600 hover:underline">Contact Support</a>
        </div>
    </div>
</section>

@endsection