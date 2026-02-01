@extends('layouts.app')
@section('content')

<!-- Page Header -->
<section class="bg-blue-200 text-black py-12">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-4xl font-bold">Book Your Repair</h1>
        <p class="mt-2">Fill out the form below to schedule your repair service.</p>
    </div>
</section>

<!-- Booking Form -->
<section class="py-12 bg-gray-100">
    <div class="container mx-auto px-4 max-w-lg">
        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ url('/repair/submit') }}" method="POST">
                @csrf

                <!-- Full Name -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-semibold mb-2">Full Name</label>
                    <input type="text" id="name" name="name" required class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Email Address -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email Address</label>
                    <input type="email" id="email" name="email" required class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Device Type -->
                <div class="mb-4">
                    <label for="device_type" class="block text-gray-700 font-semibold mb-2">Device Type</label>
                    <select id="device_type" name="device_type" required class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">-- Select Device --</option>
                        <option value="Laptop">Laptop</option>
                        <option value="Desktop">Desktop</option>
                        <option value="Mobile">Mobile Phone</option>
                        <option value="Tablet">Tablet</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <!-- Issue Description -->
                <div class="mb-4">
                    <label for="issue_description" class="block text-gray-700 font-semibold mb-2">Describe the Issue</label>
                    <textarea id="issue_description" name="issue_description" rows="4" required class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>

                <!-- Photo Upload -->
                <div class="mb-4">
                    <label for="photo" class="block text-gray-700 font-semibold mb-2">Upload Photo URL (optional)</label>
                    <input type="text" id="photo" name="photo" class="w-full  border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                    Submit Booking Request
                </button>
            </form>
        </div>
    </div>
</section>

@endsection