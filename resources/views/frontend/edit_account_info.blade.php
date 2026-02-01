@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Profile Edit Card -->
    <div class="bg-white shadow rounded-lg p-6 mb-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Edit Profile</h2>

        <form action="{{ route('profile.update') }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block mb-1 text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label for="email" class="block mb-1 text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label for="phone" class="block mb-1 text-sm font-medium text-gray-700">Phone <span class="text-gray-400">(optional)</span></label>
                <input type="text" name="phone" id="phone" value="{{ old('phone', auth()->user()->phone) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label for="address" class="block mb-1 text-sm font-medium text-gray-700">Address <span class="text-gray-400">(optional)</span></label>
                <input type="text" name="address" id="address" value="{{ old('address', auth()->user()->address) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label for="profile_image" class="block mb-1 text-sm font-medium text-gray-700">Profile Image URL <span class="text-gray-400">(optional)</span></label>
                <input type="url" name="profile_image" id="profile_image" value="{{ old('profile_image', auth()->user()->profile_image) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200">
            </div>

            <div class="flex justify-end space-x-3 mt-6">
                <a href="{{url('/account-info')}}" class="no-underline">
                    <button type="button"
                        class="bg-gray-300 text-gray-700 font-semibold px-6 py-2 rounded hover:bg-gray-400 transition">
                        Cancel
                    </button>
                </a>
                <button type="submit"
                    class="bg-blue-600 text-white font-semibold px-6 py-2 rounded shadow hover:bg-blue-700 transition">
                    Update Profile
                </button>
            </div>

        </form>
    </div>
</div>
@endsection