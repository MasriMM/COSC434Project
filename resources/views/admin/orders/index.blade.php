<x-app-layout>
    <div class="container mx-auto p-6">
        <!-- Filters and success message ... -->
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold text-white text-center">Orders Management</h1>
            <!-- Search input -->
            <form method="GET" action="{{ route('admin.orders.index') }}" class="flex space-x-2">
                <input type="text" name="search" placeholder="Search by User Name" value="{{ request('search') }}" 
                    class="px-4 py-2 rounded-md bg-zinc-800 text-white border border-zinc-600" />
                
                <!-- Sorting filter -->
                <select name="sort" class="px-4 py-2 rounded-md bg-zinc-800 text-white border border-zinc-600">
                    <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
                    <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest</option>
                </select>

                <button type="submit" class="px-4 py-2 rounded-md bg-red-600 text-white">Apply</button>
            </form>
        </div>

        <div class="overflow-x-auto bg-zinc-900 text-gray-100 rounded-lg shadow border border-zinc-700">
            <table class="min-w-full divide-y divide-zinc-700 text-sm">
                <thead class="bg-zinc-800 text-gray-300">
                    <tr>
                        <th class="px-4 py-3 text-left">Order ID</th>
                        <th class="px-4 py-3 text-left">User Name</th>
                        <th class="px-4 py-3 text-left">Total Price</th>
                        <th class="px-4 py-3 text-left">Status</th>
                        <th class="px-4 py-3 text-left">Created At</th>
                        <th class="px-4 py-3 text-left">Location</th>
                        <th class="px-4 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-800">
                    @foreach($orders as $order)
                        <tr class="hover:bg-zinc-800 transition" data-id="{{ $order->id }}">
                            <td class="px-4 py-2 font-semibold text-white">{{ $order->id }}</td>
                            <td class="px-4 py-2">{{ $order->user->name }}</td>
                            <td class="px-4 py-2">${{ number_format($order->total_price, 2) }}</td>
                            <td class="px-4 py-2">
                                <select class="status-dropdown bg-zinc-800 text-white border border-zinc-600 rounded p-1" data-order-id="{{ $order->id }}">
                                    @foreach(['pending', 'confirmed', 'shipped', 'cancelled'] as $status)
                                        <option value="{{ $status }}" {{ $order->status === $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="px-4 py-2">{{ $order->created_at->format('Y-m-d H:i:s') }}</td>
                            <td class="px-4 py-2">{{ $order->Location }}</td>
                            <td class="px-4 py-2 text-center">
                                <div class="flex justify-center items-center space-x-2">
                                    <a href="{{ route('admin.orders.show', $order->id) }}"
                                       class="px-3 py-1 bg-blue-600 text-white text-sm rounded hover:bg-blue-500 transition">View</a>
                                    <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="px-3 py-1 bg-red-600 text-white text-sm rounded hover:bg-red-500 transition">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="/js/order.js"></script>
</x-app-layout>
