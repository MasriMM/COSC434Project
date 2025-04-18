<x-app-layout>
    <h1>Suuplements</h1>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Manage Supplements</h2>
    </x-slot>

    <div class="py-6 px-4 mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm rounded-lg p-6">
            <!-- Search and Filter -->
            <form method="GET" class="mb-6 flex flex-wrap items-center gap-4">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search supplements..." class="border p-2 rounded w-full sm:w-1/3">

                <select name="sort" class="border p-2 rounded">
                    <option value="">Sort by</option>
                    <option value="name" {{ request('sort') === 'name' ? 'selected' : '' }}>Name</option>
                    <option value="price" {{ request('sort') === 'price' ? 'selected' : '' }}>Price</option>
                    <option value="quantity" {{ request('sort') === 'quantity' ? 'selected' : '' }}>Quantity</option>
                </select>

                <select name="direction" class="border p-2 rounded">
                    <option value="asc" {{ request('direction') === 'asc' ? 'selected' : '' }}>ASC</option>
                    <option value="desc" {{ request('direction') === 'desc' ? 'selected' : '' }}>DESC</option>
                </select>

                <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Filter</button>

                <a href="{{ route('supplements.create') }}" class="ml-auto bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    + Add New
                </a>
            </form>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full text-left border rounded">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border">Image</th>
                            <th class="px-4 py-2 border">Name</th>
                            <th class="px-4 py-2 border">Price</th>
                            <th class="px-4 py-2 border">Quantity</th>
                            <th class="px-4 py-2 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($supplements as $supplement)
                            <tr class="border-t hover:bg-gray-50">
                                <td class="px-4 py-2">
                                    @if($supplement->image)
                                        <img src="{{ asset('storage/' . $supplement->image) }}" alt="{{ $supplement->name }}" class="w-12 h-12 object-cover rounded">
                                    @else
                                        <span class="text-gray-400">No image</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2">{{ $supplement->name }}</td>
                                <td class="px-4 py-2">${{ number_format($supplement->price, 2) }}</td>
                                <td class="px-4 py-2">{{ $supplement->quantity }}</td>
                                <td class="px-4 py-2 space-x-2">
                                    <a href="{{ route('supplements.show', $supplement) }}" class="text-blue-600 hover:underline">View</a>
                                    <a href="{{ route('supplements.edit', $supplement) }}" class="text-yellow-600 hover:underline">Edit</a>
                                    <form action="{{ route('supplements.destroy', $supplement) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-4 text-center text-gray-500">No supplements found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $supplements->withQueryString()->links() }}
            </div>
        </div>
    </div>
</x-app-layout>