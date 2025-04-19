<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Manage Supplements (AJAX)</h2>
    </x-slot>

    <div class="py-6 px-4 mx-auto sm:px-6 lg:px-8">
        <div class="bg-black shadow-sm rounded-lg p-6">
            <div class="flex items-center justify-between">
                <h1 class="text-white text-[30px]">
                    Supplements Management
                </h1>
                <button id="addNew" class="mb-4 bg-red-600 text-white px-4 py-2 rounded hover:bg-red-800">
                    + Add New Supplement
                </button>
            </div>

            <!-- Supplement Form -->
            <div id="supplementForm" class="hidden mb-4">
                <h3 id="formTitle" class="text-white text-lg font-semibold mb-2">Add Supplement</h3>
                <form id="ajaxSupplementForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="supplementId">

                    <input type="text" name="name" id="name" placeholder="Name" class="w-full mb-2 p-2 border rounded text-white bg-zinc-800 border-zinc-700 focus:outline-none focus:ring-2 focus:ring-blue-600">
                    <input type="number" name="price" id="price" placeholder="Price" class="w-full mb-2 p-2 border rounded text-white bg-zinc-800 border-zinc-700 focus:outline-none focus:ring-2 focus:ring-blue-600">
                    <input type="number" name="stock" id="stock" placeholder="Stock" class="w-full mb-2 p-2 border rounded text-white bg-zinc-800 border-zinc-700 focus:outline-none focus:ring-2 focus:ring-blue-600">

                    <input type="hidden" name="category_id" value="1">

                    <!-- Description input -->
                    <textarea name="description" id="description" placeholder="Description" class="w-full mb-2 p-2 border rounded text-white bg-zinc-800 border-zinc-700 focus:outline-none focus:ring-2 focus:ring-blue-600"></textarea>

                    <input type="file" name="image" id="image" class="w-full mb-2 p-2 border rounded text-white bg-zinc-800 border-zinc-700 focus:outline-none focus:ring-2 focus:ring-blue-600">

                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-800 transition">Save</button>
                </form>
            </div>

            <!-- Supplements Table -->
            <table class="min-w-full text-left border rounded">
                <thead class="bg-zinc-800 border-zinc-700 border-3 border text-white">
                    <tr>
                        <th class="px-4 py-2">Image</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Price</th>
                        <th class="px-4 py-2">Stock</th>
                        <th class="px-4 py-2">Description</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody id="supplementsTable">
                    @foreach ($supplements as $supplement)
                        <tr data-id="{{ $supplement->id }}" class="border-zinc-900 text-white border border-t-0 hover:bg-zinc-900">
                            <td class="px-4 py-2">
                                @if($supplement->image)
                                    <img src="{{ $supplement->image }}" class="w-12 h-12 object-cover rounded">
                                @else
                                    <span class="text-gray-400">No image</span>
                                @endif
                            </td>
                            <td class="px-4 py-2">{{ $supplement->name }}</td>
                            <td class="px-4 py-2">${{ number_format($supplement->price, 2) }}</td>
                            <td class="px-4 py-2">{{ $supplement->stock }}</td>
                            <td class="px-4 py-2">{{ $supplement->description ?? 'No description' }}</td>
                            <td class="px-4 py-2">
                                <button class="editBtn text-blue-600 hover:underline mr-3">Edit</button>
                                <button class="deleteBtn text-red-600 hover:underline">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/js/adminSupplement.js"></script>
</x-app-layout>
