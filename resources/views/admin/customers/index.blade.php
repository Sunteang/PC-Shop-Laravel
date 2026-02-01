@extends('layout')

@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg mt-14">

        <!-- Dashboard Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div class="flex items-center justify-between bg-blue-200 p-4 rounded shadow">
                <div>
                    <p class="text-sm text-gray-600">Total Customers</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $customers->count() }}</p>
                </div>
                <i class="fa-solid fa-users text-blue-600 text-3xl"></i>
            </div>
            <div class="flex items-center justify-between bg-yellow-200 p-4 rounded shadow">
                <div>
                    <p class="text-sm text-gray-600">New This Month</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $customers->where('created_at', '>=', now()->startOfMonth())->count() }}</p>
                </div>
                <i class="fa-solid fa-user-plus text-yellow-600 text-3xl"></i>
            </div>
            <div class="flex items-center justify-between bg-green-200 p-4 rounded shadow">
                <div>
                    <p class="text-sm text-gray-600">Active Customers</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $customers->where('status', 'active')->count() }}</p>
                </div>
                <i class="fa-solid fa-user-check text-green-600 text-3xl"></i>
            </div>
        </div>

        <!-- Customers Table -->
        <div class="overflow-x-auto mt-8 bg-white rounded-lg shadow">
            <table class="w-full text-sm text-left text-gray-600">
                <thead class="text-sm text-blue-800 uppercase bg-blue-100">
                    <tr>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Phone</th>
                        <th class="px-4 py-3">Registered</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($customers as $customer)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3 font-medium text-gray-900">{{ $customer->name }}</td>
                        <td class="px-4 py-3">{{ $customer->email }}</td>
                        <td class="px-4 py-3">{{ $customer->phone ?? '—' }}</td>
                        <td class="px-4 py-3">{{ $customer->created_at->format('M d, Y') }}</td>
                        <td class="px-4 py-3 capitalize">
                            <span class="inline-block px-2 py-1 rounded text-white text-xs {{ $customer->status === 'active' ? 'bg-green-500' : 'bg-gray-400' }}">
                                {{ $customer->status }}
                            </span>
                        </td>
                        <td class="px-4 py-3 space-x-2">

                            <button
                                class="px-3 py-1 text-xs font-medium text-white bg-red-600 rounded hover:bg-red-700 delete-btn"
                                data-id="{{ $customer->id }}"
                                data-name="{{ $customer->name }}">
                                Delete
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-gray-500">No customers found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Delete Modal -->
        <div id="delete-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white rounded-lg shadow-lg p-6 max-w-md w-full">
                <h2 class="text-lg font-semibold mb-4 text-gray-800">Confirm Delete</h2>
                <p class="mb-6 text-gray-600" id="delete-message">Are you sure you want to delete this customer?</p>
                <div class="flex justify-end space-x-4">
                    <button id="cancel-delete" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancel</button>
                    <form id="delete-form" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Delete</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Modal Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.delete-btn');
        const modal = document.getElementById('delete-modal');
        const deleteForm = document.getElementById('delete-form');
        const cancelBtn = document.getElementById('cancel-delete');
        const deleteMessage = document.getElementById('delete-message');

        deleteButtons.forEach(button => {
            button.addEventListener('click', () => {
                const id = button.getAttribute('data-id');
                const name = button.getAttribute('data-name');

                deleteForm.action = `/dashboard-admin/customers/${id}`;
                deleteMessage.textContent = `Are you sure you want to delete customer "${name}"?`;
                modal.classList.remove('hidden');
            });
        });

        cancelBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
        });

        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.add('hidden');
            }
        });
    });
</script>
@endsection