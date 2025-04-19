<x-app-layout>
    <div class="container mx-auto p-6">
        <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center mb-6 gap-4">
            <h1 class="text-3xl font-bold text-white text-center">Supplements Management</h1>
            <div class="flex justify-center">
                <button id="addNew" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-500 text-sm">
                    + Add New Supplement
                </button>
            </div>
        </div>

        <!-- Supplement Form -->
        <div id="supplementForm" class="hidden mb-6 bg-zinc-900 text-white rounded-lg p-4 border border-zinc-700 shadow">
            <h3 id="formTitle" class="text-lg font-semibold mb-3">Add Supplement</h3>
            <form id="ajaxSupplementForm" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="supplementId">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input type="text" name="name" id="name" placeholder="Name"
                        class="px-3 py-2 rounded-md bg-zinc-800 text-white border border-zinc-600 placeholder-gray-400 text-sm focus:outline-none focus:ring-1 focus:ring-red-500 focus:border-red-500" />

                    <input type="number" name="price" id="price" placeholder="Price"
                        class="px-3 py-2 rounded-md bg-zinc-800 text-white border border-zinc-600 placeholder-gray-400 text-sm focus:outline-none focus:ring-1 focus:ring-red-500 focus:border-red-500" />

                    <input type="number" name="stock" id="stock" placeholder="Stock"
                        class="px-3 py-2 rounded-md bg-zinc-800 text-white border border-zinc-600 placeholder-gray-400 text-sm focus:outline-none focus:ring-1 focus:ring-red-500 focus:border-red-500" />

                    <input type="file" name="image" id="image"
                        class="px-3 py-2 rounded-md bg-zinc-800 text-white border border-zinc-600 text-sm focus:outline-none focus:ring-1 focus:ring-red-500 focus:border-red-500" />
                </div>

                <input type="hidden" name="category_id" value="1" />

                <textarea name="description" id="description" placeholder="Description"
                    class="mt-4 px-3 py-2 w-full rounded-md bg-zinc-800 text-white border border-zinc-600 placeholder-gray-400 text-sm focus:outline-none focus:ring-1 focus:ring-red-500 focus:border-red-500"></textarea>

                <button type="submit"
                    class="mt-4 px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-500 text-sm">
                    Save
                </button>
            </form>
        </div>

        <!-- Supplements Table -->
        <div class="overflow-x-auto bg-zinc-900 text-gray-100 rounded-lg shadow border border-zinc-700">
            <table class="min-w-full divide-y divide-zinc-700 text-sm">
                <thead class="bg-zinc-800 text-gray-300">
                    <tr>
                        <th class="px-4 py-3 text-left">Image</th>
                        <th class="px-4 py-3 text-left">Name</th>
                        <th class="px-4 py-3 text-left">Price</th>
                        <th class="px-4 py-3 text-left">Stock</th>
                        <th class="px-4 py-3 text-left">Description</th>
                        <th class="px-4 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody id="supplementsTable" class="divide-y divide-zinc-800">
                    @forelse($supplements as $supplement)
                        <tr data-id="{{ $supplement->id }}" class="hover:bg-zinc-800 transition">
                            <td class="px-4 py-2">
                                @if($supplement->image)
                                    <img src="{{ $supplement->image }}" class="w-12 h-12 object-cover rounded" />
                                @else
                                    <span class="text-gray-500">No image</span>
                                @endif
                            </td>
                            <td class="px-4 py-2 font-semibold text-white">{{ $supplement->name }}</td>
                            <td class="px-4 py-2">${{ number_format($supplement->price, 2) }}</td>
                            <td class="px-4 py-2">{{ $supplement->stock }}</td>
                            <td class="px-4 py-2">{{ $supplement->description ?? '-' }}</td>
                            <td class="px-4 py-2 text-center">
                                <div class="flex justify-center items-center space-x-2">
                                    <button class="editBtn text-blue-400 hover:text-blue-300 transition">
                                        <i class="fas fa-edit mr-1"></i>Edit
                                    </button>
                                    <button class="deleteBtn text-red-400 hover:text-red-300 transition">
                                        <i class="fas fa-trash mr-1"></i>Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-6 text-gray-500">No supplements found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/js/adminSupplement.js"></script>
</x-app-layout>
