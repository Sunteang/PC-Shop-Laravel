@extends('layout')

@section('content')
<div class="p-6 sm:ml-64">
    <div class="p-4 rounded-lg mt-14">
        <!-- Stat Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div class="flex items-center justify-between p-4 bg-blue-200 rounded shadow">
                <div>
                    <p class="text-sm text-gray-600">Total Computers</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $computer->count() }}</p>
                </div>
                <i class="fa-solid fa-computer text-blue-600 text-3xl"></i>
            </div>
            <div class="flex items-center justify-between p-4 bg-yellow-200 rounded shadow">
                <div>
                    <p class="text-sm text-gray-600">Total Accessary</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $totalAccessories }}</p>
                </div>
                <i class="fa-solid fa-microchip text-yellow-600 text-3xl"></i>
            </div>
            <div class="flex items-center justify-between p-4 bg-green-200 rounded shadow">
                <div>
                    <p class="text-sm text-gray-600">Total Repair Services</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $totalServices }}</p>
                </div>
                <i class="fa-solid fa-cogs text-green-600 text-3xl"></i>
            </div>
        </div>


        <!-- Action Buttons -->
        <div class="flex flex-col md:flex-row md:justify-between items-center mb-4">
            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                class="mb-2 md:mb-0 text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                Insert Computer
            </button>
            <form method="GET" action="{{ url('/comsearch') }}" class="mt-4 md:mt-0">
                <div class="flex">
                    <input type="text" name="search" class="form-input rounded-l-lg border border-gray-300 focus:outline-none focus:ring focus:border-blue-300 px-4 py-2" placeholder="Search...">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-r-lg hover:bg-blue-700">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </form>
        </div>

        <!-- Modal -->
        <div id="crud-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white rounded-lg shadow w-full max-w-xl p-6">
                <div class="flex justify-between items-center border-b pb-3 mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Insert New Computer</h3>
                    <button type="button" class="text-red-500 hover:text-red-700" data-modal-toggle="crud-modal">
                        <i class="fa-solid fa-xmark text-xl"></i>
                    </button>
                </div>

                <form method="POST" action="{{ route('computer.store') }}">
                    @csrf
                    @if ($errors->any())
                    <div class="mb-4 p-3 rounded bg-red-100 text-red-700">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                value="{{ old('name') }}"
                                required
                                class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror">
                            @error('name')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:col-span-2">
                            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                            <input type="text" name="price" id="price" required class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="md:col-span-2">
                            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                            <select name="category" id="category" required
                                class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="" disabled selected>Select Category</option>
                                <option value="Laptop">Laptop</option>
                                <option value="Desktop">Desktop</option>
                                <option value="Gaming">Gaming</option>
                                <option value="Monitor">Monitor</option>
                                <option value="Other">Other</option>

                            </select>
                        </div>

                        <div class="md:col-span-2">
                            <label for="image" class="block text-sm font-medium text-gray-700">Image URL</label>
                            <input type="text" name="image" id="image" required class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="md:col-span-2">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea type="text" name="description" id="description" required class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                        </div>
                    </div>
                    <div class="mt-6">
                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-semibold">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto mt-8 bg-white rounded-lg shadow">
            <table class="w-full text-sm text-gray-700">
                <thead class="text-sm text-blue-800 uppercase bg-blue-100">
                    <tr>
                        <th class="px-6 py-3 text-left">Image</th>
                        <th class="px-6 py-3 text-left">Computer Name</th>
                        <th class="px-6 py-3 text-left">Price</th>
                        <th class="px-6 py-3 text-left">Edit</th>
                        <th class="px-6 py-3 text-left">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($computer as $item)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-3">
                            <img src="{{ $item->image }}" alt="Computer Image" class="w-20 h-auto rounded-md">
                        </td>
                        <td class="px-6 py-3 font-semibold">{{ $item->name }}</td>
                        <td class="px-6 py-3 font-semibold">${{ $item->price }}</td>
                        <td class="px-6 py-3">
                            <a href="{{ route('computer.edit', $item->id) }}">
                                <button class="text-white bg-blue-500 hover:bg-blue-600 px-3 py-1 rounded-md">Edit</button>
                            </a>
                        </td>
                        <td class="px-6 py-3">
                            @csrf
                            @method('DELETE')
                            <!-- Delete button triggers modal -->
                            <button
                                class="text-white bg-red-500 hover:bg-red-600 px-3 py-1 rounded-md delete-btn"
                                data-id="{{ $item->id }}"
                                data-name="{{ $item->name }}">
                                Delete
                            </button>
                        </td>
                    </tr>
                    @endforeach

                    <!-- Delete Confirmation Modal -->
                    <div id="delete-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                        <div class="bg-white rounded-lg shadow-lg p-6 max-w-md w-full">
                            <h2 class="text-lg font-semibold mb-4 text-gray-800">Confirm Delete</h2>
                            <p class="mb-6 text-gray-600" id="delete-message">Are you sure you want to delete this computer?</p>

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

                    <!-- Add this script before closing </body> or in a scripts section -->
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const deleteButtons = document.querySelectorAll('.delete-btn');
                            const modal = document.getElementById('delete-modal');
                            const deleteForm = document.getElementById('delete-form');
                            const cancelBtn = document.getElementById('cancel-delete');
                            const deleteMessage = document.getElementById('delete-message');

                            deleteButtons.forEach(button => {
                                button.addEventListener('click', () => {
                                    const computerId = button.getAttribute('data-id');
                                    const computerName = button.getAttribute('data-name');

                                    // Update the form action URL dynamically
                                    deleteForm.action = `/dashboard-admin/computer/${computerId}`;

                                    // Update the message with the computer name
                                    deleteMessage.textContent = `Are you sure you want to delete the computer "${computerName}"?`;

                                    // Show the modal
                                    modal.classList.remove('hidden');
                                });
                            });

                            // Cancel button hides the modal
                            cancelBtn.addEventListener('click', () => {
                                modal.classList.add('hidden');
                            });

                            // Optional: close modal on clicking outside the modal box
                            modal.addEventListener('click', (e) => {
                                if (e.target === modal) {
                                    modal.classList.add('hidden');
                                }
                            });
                        });
                        document.addEventListener('DOMContentLoaded', function() {
                            const nameInput = document.getElementById('name');
                            const submitBtn = document.querySelector('form button[type="submit"]');
                            let toastTimeout;

                            // Create toast div
                            function showToast(message) {
                                clearTimeout(toastTimeout);

                                let toast = document.getElementById('toast');
                                if (!toast) {
                                    toast = document.createElement('div');
                                    toast.id = 'toast';
                                    toast.style.position = 'fixed';
                                    toast.style.bottom = '20px';
                                    toast.style.right = '20px';
                                    toast.style.padding = '10px 20px';
                                    toast.style.backgroundColor = 'rgba(220, 38, 38, 0.9)'; // red
                                    toast.style.color = 'white';
                                    toast.style.borderRadius = '5px';
                                    toast.style.fontWeight = 'bold';
                                    toast.style.zIndex = '9999';
                                    document.body.appendChild(toast);
                                }
                                toast.textContent = message;
                                toast.style.display = 'block';

                                toastTimeout = setTimeout(() => {
                                    toast.style.display = 'none';
                                }, 3000);
                            }

                            // Check name existence via AJAX
                            async function checkNameExists(name) {
                                if (!name.trim()) return false;
                                try {
                                    const response = await fetch(`{{ route('computer.checkName') }}?name=${encodeURIComponent(name)}`);
                                    const data = await response.json();
                                    return data.exists;
                                } catch (error) {
                                    console.error('Error checking name:', error);
                                    return false;
                                }
                            }

                            // Validate name on input change or blur
                            nameInput.addEventListener('input', async () => {
                                const name = nameInput.value;

                                const exists = await checkNameExists(name);
                                if (exists) {
                                    submitBtn.disabled = true;
                                    showToast('This name already exists. Please choose another.');
                                } else {
                                    submitBtn.disabled = false;
                                }
                            });

                            // Also validate on form submit just in case
                            const form = nameInput.closest('form');
                            form.addEventListener('submit', async (e) => {
                                e.preventDefault();
                                const name = nameInput.value;
                                const exists = await checkNameExists(name);
                                if (exists) {
                                    showToast('Cannot submit. The name already exists.');
                                    submitBtn.disabled = true;
                                    return false;
                                } else {
                                    submitBtn.disabled = false;
                                    form.submit();
                                }
                            });
                        });
                    </script>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection