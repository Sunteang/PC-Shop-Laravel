@extends('layout')

@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg mt-14">

        <!-- Dashboard Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div class="flex items-center justify-between bg-blue-200 p-4 rounded shadow">
                <div>
                    <p class="text-sm text-gray-600">Total Repair Requests</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $repairRequests->count() }}</p>
                </div>
                <i class="fa-solid fa-tools text-blue-600 text-3xl"></i>
            </div>
            <div class="flex items-center justify-between bg-yellow-200 p-4 rounded shadow">
                <div>
                    <p class="text-sm text-gray-600">Completed Requests</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $repairRequests->where('status', 'completed')->count() }}</p>
                </div>
                <i class="fa-solid fa-wrench text-yellow-600 text-3xl"></i>
            </div>
            <div class="flex items-center justify-between bg-green-200 p-4 rounded shadow">
                <div>
                    <p class="text-sm text-gray-600">Remaining Requests</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $repairRequests->where('status', '!=', 'completed')->count() }}</p>
                </div>
                <i class="fa-solid fa-cogs text-green-600 text-3xl"></i>
            </div>
        </div>

        <!-- Repair Request Table -->
        <div class="overflow-x-auto  mt-8 bg-white rounded-lg shadow">
            <table class="w-full text-sm text-left text-gray-600">
                <thead class="text-sm text-blue-800 uppercase bg-blue-100">
                    <tr>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Device</th>
                        <th class="px-4 py-3">Issue</th>
                        <th class="px-4 py-3">Photo</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($repairRequests as $request)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3 font-medium text-gray-900">{{ $request->name }}</td>
                        <td class="px-4 py-3">{{ $request->email }}</td>
                        <td class="px-4 py-3">{{ $request->device_type }}</td>
                        <td class="px-4 py-3">{{ $request->issue_description }}</td>
                        <td class="px-4 py-3">
                            @if($request->photo_path)
                            @if(Str::startsWith($request->photo_path, ['http://', 'https://']))
                            <img src="{{ $request->photo_path }}" alt="Photo" class="w-20 h-auto rounded">
                            @else
                            <img src="{{ asset('storage/' . $request->photo_path) }}" alt="Photo" class="w-20 h-auto rounded">
                            @endif
                            @else
                            <span class="text-gray-400 italic">No photo</span>
                            @endif
                        </td>

                        <!-- test dropdown status -->
                        <td class="px-4 py-3">
                            <select class="status-dropdown border rounded px-4 py-1 text-sm"
                                data-id="{{ $request->id }}">
                                <option value="pending" {{ $request->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="in progress" {{ $request->status == 'in progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="completed" {{ $request->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </td>

                        <td class=" px-4 py-3 gap-2">
                            <!-- <a href="{{ route('admin.repairrequest.edit', $request->id) }}" -->
                            <!-- <a href="{{ url('#', $request->id) }}"
                                    class="inline-block px-3 py-1 text-xs font-medium text-white bg-blue-600 rounded hover:bg-blue-700">
                                    Edit
                                </a> -->

                            <button
                                class="inline-block px-3 py-1 text-xs font-medium text-white bg-red-600 rounded hover:bg-red-700 delete-btn"
                                data-id="{{ $request->id }}"
                                data-name="{{ $request->name }}">
                                Delete
                            </button>
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="10" class="text-center py-4 text-gray-500">No repair requests found.</td>
                    </tr>
                    @endforelse

                    <!-- Delete Confirmation Modal -->
                    <div id="delete-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                        <div class="bg-white rounded-lg shadow-lg p-6 max-w-md w-full">
                            <h2 class="text-lg font-semibold mb-4 text-gray-800">Confirm Delete</h2>
                            <p class="mb-6 text-gray-600" id="delete-message">Are you sure you want to delete this repair request?</p>

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
                </tbody>

                <!-- Script for modal delete -->
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const deleteButtons = document.querySelectorAll('.delete-btn');
                        const modal = document.getElementById('delete-modal');
                        const deleteForm = document.getElementById('delete-form');
                        const cancelBtn = document.getElementById('cancel-delete');
                        const deleteMessage = document.getElementById('delete-message');

                        deleteButtons.forEach(button => {
                            button.addEventListener('click', () => {
                                const requestId = button.getAttribute('data-id');
                                const requestName = button.getAttribute('data-name');

                                // Update form action URL dynamically (adjust the URL pattern to your routes)
                                deleteForm.action = `/admin/repairrequest/${requestId}`;

                                // Update the modal message dynamically
                                deleteMessage.textContent = `Are you sure you want to delete the repair request from "${requestName}"?`;

                                // Show the modal
                                modal.classList.remove('hidden');
                            });
                        });

                        cancelBtn.addEventListener('click', () => {
                            modal.classList.add('hidden');
                        });

                        // Close modal if clicking outside the modal box
                        modal.addEventListener('click', (e) => {
                            if (e.target === modal) {
                                modal.classList.add('hidden');
                            }
                        });
                    });
                </script>

                <!-- script dropdown status -->
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        document.querySelectorAll('.status-dropdown').forEach(select => {
                            select.addEventListener('change', function() {
                                const requestId = this.dataset.id;
                                const newStatus = this.value;

                                fetch(`/admin/repairrequest/${requestId}/status`, {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                        },
                                        body: JSON.stringify({
                                            status: newStatus
                                        })
                                    })
                                    .then(response => {
                                        if (!response.ok) {
                                            throw new Error('Failed to update status');
                                        }
                                        return response.json();
                                    })
                                    .then(data => {
                                        console.log('Status updated:', data);
                                        // Optionally show a success notification
                                    })
                                    .catch(error => {
                                        alert('Error updating status');
                                        console.error(error);
                                    });
                            });
                        });
                    });
                </script>

            </table>
        </div>

    </div>
</div>
@endsection